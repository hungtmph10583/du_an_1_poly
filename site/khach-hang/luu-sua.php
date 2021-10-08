<?php
session_start();
require_once '../../lib/db.php';
require_once "../../lib/common.php";
checkAuth();
// lấy id trên đường dẫn xuống
$userId = isset($_GET['ma_kh']) ? $_GET['ma_kh']: "";
$sql = "select * from users where ma_kh = '$userId' ";
$user = dbfetch($sql);

if(!$user){
    header("location: " . BASE_URL_C . "?msg=User không tồn tại");
    die;
}

$name = trim($_POST['name']);
$nameErr = "";

$ma_kh = $_POST['ma_kh'];
$ma_khErr = "";

$email = $_POST['email'];
$emailErr = "";

$vai_tro = 1;

$avatar = $_FILES['avatar'];
$avatarErr = "";

$kich_hoat = 1;

$phone_number = $_POST['phone_number'];
$phone_numberErr = "";

if(isset($_POST['ngay_sinh'])){
    $ngay_sinh = $_POST['ngay_sinh'];
    $ngay_sinhErr = "";
}
$cau_hoi = $_POST['cau_hoi'];
$cau_hoiErr = "";
if($cau_hoi == ""){
    $cau_hoiErr = "Buộc phải trả lời !";
}
// 2. Kiểm tra dữ liệu (validate)
// ktra rỗng
if (!preg_match("/[^\d]$/",$name)) {
    $nameErr = "Không chứa số, không chứa ký tự đặc biệt";
} elseif (!preg_match("/[^`~!@#$%^&*()_+=|\,.<>?]$/",$name)) {
    $nameErr = "Không chứa số và ký tự đặc biệt";
}
if(strlen($name) == 0){
    $nameErr = "Hãy nhập họ và tên";
}
if($nameErr === "" && (strlen($name) < 4 || strlen($name) > 30)){
    $nameErr = "Độ dài họ và tên nằm trong khoảng 4 - 30 ký tự";
}
$Email = $_SESSION['auth']['email'];
if($email == $Email){
    $emailErr = "Email này đã được sử dụng";
}
if($email == ""){
    $emailErr = "Hãy nhập email";
}elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
    $emailErr = "Yêu cầu nhập đúng dạng email";
}
$ma_Kh = $_SESSION['auth']['ma_kh'];
if($ma_kh == ""){
    $ma_khErr = "Hãy nhập mã khách hàng";
}elseif($ma_kh == $ma_Kh){
    $ma_khErr = "Mã này đã có người sử dụng";
}
if($ma_khErr === "" && (strlen($ma_kh) < 4 || strlen($ma_kh) > 30)){
    $ma_khErr = "Độ dài mã khách hàng nằm trong khoảng 4 - 30 ký tự";
}
if(!preg_match('/^[0-9. ]*$/',$phone_number)){
    $phone_numberErr = "SĐT không chứa kí tự chữ";
}elseif(strlen($phone_number) > 10 || strlen($phone_number) < 10){
    $phone_numberErr = "SĐT có độ dài 10 số !";
}
$pattern = '/032|033|034|035|036|037|038|039|056|058|059|070|076|077|078|079|081|082|083|084|085|086|088|089|090|091|092|093|094|096|097|098|099/';
if(!preg_match($pattern,$phone_number)){
    $phone_numberErr = "SĐT không hợp lệ với Quốc Gia VN !";
}
$tmp = explode('/',$ngay_sinh);
    $tmp = array_reverse($tmp);
    $ngaysinh = implode("-",$tmp);
if($ngaysinh == ""){
    $ngay_sinhErr = "Vui lòng nhập ngày tháng !";
}elseif(strtotime($ngaysinh) && 1 === preg_match('~[0-9]~', $ngaysinh)){
    //
}else {
    $ngay_sinhErr = "Ngày tháng không hợp lệ !";
}
if($cau_hoi == ""){
    $cau_hoiErr = "Buộc phải trả lời !";
}
$path = $user['avatar'];
// 3.1 thực hiện lưu ảnh
if($avatar['size']<1500000 && $avatar['size']>0){
    $filename = uniqid() . "-" . $avatar["name"];
    move_uploaded_file($avatar["tmp_name"], '../../public/uploads/' . $filename);
    $path = 'public/uploads/' . $filename;
    $expensions= array("jpeg","jpg","png");
    $file_ext = strtolower(end(explode('.',$_FILES['avatar']['name'])));
    if(in_array($file_ext,$expensions)=== false){
    $avatarErr = "Chỉ hỗ trợ upload file JPEG hoặc PNG.";
    }
}elseif($avatar['size']>1500000){
    $avatarErr = "Hình ảnh phải nhỏ hơn 1.5mb";
}
if($ma_khErr.$nameErr.$emailErr.$avatarErr.$phone_numberErr.$ngay_sinhErr.$cau_hoiErr != ""){
    header('location: ' . BASE_URL_B . "site/khach-hang/sua-thong-tin.php?ma_kherr=$ma_khErr&nameerr=$nameErr&emailerr=$emailErr&avatarerr=$avatarErr&phone_numbererr=$phone_numberErr&cau_hoierr=$cau_hoiErr");
    die;
}

// 4. Tạo câu query để insert data
$updateUserSql = "update users 
                    set 
                        ma_kh = '$ma_kh',
                        name = '$name',
                        kich_hoat = '$kich_hoat',
                        email = '$email',
                        avatar = '$path',
                        vai_tro = '$vai_tro',
                        ngay_sinh = '$ngay_sinh',
                        phone_number = '$phone_number',
                        cau_hoi = '$cau_hoi'
                  where ma_kh = '$userId' ";
dbexe($updateUserSql);
header("location: " . BASE_URL_C . "?msg=Cập nhật tài khoản thành công");

?>