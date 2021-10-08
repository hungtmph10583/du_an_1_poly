<?php
session_start();
require_once '../../lib/db.php';
require_once "../../lib/common.php";
// xử lý dữ liệu để tạo ra tk trong csdl
// 1. Nhận dữ liệu từ request
checkAuths();
$name = trim($_POST['name']);
$nameErr = "";

$ma_kh = $_POST['ma_kh'];
$ma_khErr = "";

$email = $_POST['email'];
$emailErr = "";

$password = $_POST['password'];
$passwordErr = "";

$cfpassword = $_POST['cfpassword'];
$cfpasswordErr = "";

$kich_hoat = ($_POST['kich_hoat'])?$_POST['kich_hoat']:0;

$avatar = $_FILES['avatar'];
$avatarErr = "";

$vai_tro = ($_POST['vai_tro'])?$_POST['vai_tro']:0;

$phone_number = $_POST['phone_number'];
$phone_numberErr = "";

$ngay_sinh = $_POST['ngay_sinh'];
$ngay_sinhErr = "";

$cau_hoi = isset($_POST['cau_hoi'])?$_POST['cau_hoi']:"";
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
if($ma_kh == ""){
    $ma_khErr = "Hãy nhập mã khách hàng";
}
if(!preg_match("/^[a-zA-Z0-9]*$/",$ma_kh)){
    $ma_khErr = "Hãy nhập mã khách hàng không có kí tự đặc biệt";
}
$Ma_kh = $_SESSION['auth']['ma_kh'];
if($ma_kh == $Ma_kh){
    $ma_khErr = "Đã có người sử dụng";
}
if($ma_kh === "" && (strlen($ma_kh) < 4 || strlen($ma_kh) > 30)){
    $ma_khErr = "Độ dài mã khách hàng nằm trong khoảng 4 - 30 ký tự";
}
if(strlen($phone_number)>10){
    $phone_numberErr = "SĐT có độ dài 10 số !";
}
if(!preg_match('/^[0-9. ]*$/',$phone_number)){
    $phone_numberErr = "SĐT không chứa kí tự chữ";
}elseif($phone_number === "" && (strlen($phone_number) > 10 || strlen($phone_number) < 10)){
    $phone_numberErr = "SĐT có độ dài 10 số !";
}else {
    $pattern = '/032|033|034|035|036|037|038|039|056|058|059|070|076|077|078|079|081|082|083|084|085|086|088|089|090|091|092|093|094|096|097|098|099/';
    if(!preg_match($pattern,$phone_number)){
        $phone_numberErr = "SĐT không hợp lệ với Quốc Gia VN !";
    }
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
// ít nhất 6 ký tự
// không chứa dấu cách
$removeWhiteSpacePassword = str_replace(" ", "", $password);
if(strlen($password) < 6 || (strlen($removeWhiteSpacePassword) != strlen($password))){
    $passwordErr = "Mật khẩu không thỏa mãn ";
}
// giống với xác nhận mk
if($password != $cfpassword){
    $cfpasswordErr = "Mật khẩu và xác nhận mật khẩu không khớp";
}
//Xử lý upload ảnh
$path = "";
if($avatar['size']<1500000 && $avatar['size']>0){
    $filename = uniqid() . "-" . $avatar["name"];
    move_uploaded_file($avatar["tmp_name"], '../../public/uploads/' . $filename);
    $path = 'public/uploads/' . $filename;
    $expensions= array("jpeg","jpg","png","bmp");
    $file_ext = strtolower(end(explode('.',$_FILES['avatar']['name'])));
    if(in_array($file_ext,$expensions)=== false){
    $avatarErr = "Chỉ hỗ trợ upload file JPEG hoặc PNG.";
    }
}elseif($avatar['size'] == 0){
    $avatarErr = "Chưa chọn ảnh đại diện";
}else{
    $avatarErr = "Hình ảnh phải nhỏ hơn 1.5mb";
}
if($ma_khErr.$nameErr.$emailErr.$passwordErr.$cfpasswordErr.$avatarErr.$phone_numberErr.$ngay_sinhErr != ""){
    header('location: ' . BASE_URL . "tao-tk.php?ma_kherr=$ma_khErr&nameerr=$nameErr&emailerr=$emailErr&passworderr=$passwordErr&avatarerr=$avatarErr&phone_numbererr=$phone_numberErr&ngay_sinherr=$ngay_sinhErr&cau_hoierr=$cau_hoiErr");
    die;
}

// mã hóa mật khẩu
$hashPassword = password_hash($password, PASSWORD_DEFAULT);
// 4. Tạo câu query để insert data
$sql = "insert into users 
                    (ma_kh, name,  
                    password, kich_hoat, email, avatar, vai_tro, ngay_sinh, phone_number, cau_hoi)
                values 
                    ('$ma_kh', '$name' ,
                    '$hashPassword', '$kich_hoat', '$email','$path','$vai_tro' ,'$ngay_sinh','$phone_number', '$cau_hoi')";
                    // 5. Thực thi câu query với csdl
dbexe($sql);
// 6. Điều hướng về trang danh sách
header("location: " . BASE_URL_1);


?>