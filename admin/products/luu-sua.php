<?php
session_start();
require_once '../../lib/db.php';
require_once "../../lib/common.php";
checkAuths();
$productsId = isset($_GET['ma_hh']) ? $_GET['ma_hh'] : -1;
// kiểm tra xem id có tồn tại trong db hay không 
$sql = "select * from products where ma_hh = $productsId";
$products = dbfetch($sql);
if(!$products){
    header("location: " . BASE_URL_3 . "?msg=Sản phẩm không tồn tại");
    die;
}
// 1. Nhận dữ liệu từ request
$name = $_POST['name'];
$nameErr = "";

$don_gia = $_POST['don_gia'];
$don_giaErr = "";

$sale = $_POST['sale'];
$saleErr = "";

$image = $_FILES['image'];
$imageErr = "";
$tenloai = $_POST['tenloai'];

$trang_thai = ($_POST['trang_thai']);

$ngay_nhap = $_POST['ngay_nhap'];
$ngay_nhapErr = "";

$luot_xem = $_POST['luot_xem'];

$mo_ta = $_POST['mo_ta'];
$mo_taErr = "";

$theloailq = $_POST['theloailq'];
$theloailqErr = "";
// 2. Kiểm tra dữ liệu (validate)
// ktra rỗng
if(strlen($name) < 3){
    $nameErr = "Hãy nhập tên sản phẩm";
}
if($nameErr === "" && (strlen($name) < 3 || strlen($name) > 100)){
    $nameErr = "Độ dài họ và tên nằm trong khoảng 3 - 50 ký tự";
}
 //ktra giá trị
if($don_gia == ""){
    $don_giaErr = "Hãy nhập vào giá";
}else if($don_gia < 0){
    $don_giaErr = "Hãy nhập lại giá";
}

if($sale == ""){
    $saleErr = "Hãy nhập đơn giá sale";
}else if($sale < 0){
    $saleErr = "Hãy nhập lại đơn giá sale";
}

if($ngay_nhap == ""){
    $ngay_nhapErr = "Vui lòng nhập ngày tháng !";
}elseif(strtotime($ngay_nhap) && 1 === preg_match('~[0-9]~', $ngay_nhap)){
    //
}else {
    $ngay_nhapErr = "Ngày tháng không hợp lệ !";
}

if($mo_ta == ""){
    $mo_taErr = "Mô tả không được để rỗng !";
}

if($theloailq == ""){
    $theloailqErr = "Mô tả không được để rỗng !";
}
// 3. Xử lý dữ liệu (bao gồm lưu ảnh)
$path = $products['image'];
// 3.1 thực hiện lưu ảnh
if($image['size']<1500000 && $image['size']>0){
    $filename = uniqid() . "-" . $image["name"];
    move_uploaded_file($image["tmp_name"], '../../public/uploads/' . $filename);
    $path = 'public/uploads/' . $filename;
    $expensions= array("jpeg","jpg","png","bmp");
    $file_ext = strtolower(end(explode('.',$_FILES['image']['name'])));
    if(in_array($file_ext,$expensions)=== false){
    $imageErr = "Chỉ hỗ trợ upload file JPEG hoặc PNG.";
    }
}elseif($image['size']>1500000){
    $imageErr = "Hình ảnh phải nhỏ hơn 1.5mb";
}
$dongia = ($don_gia - ($don_gia * ($sale / 100)));
if($nameErr.$don_giaErr.$saleErr.$ngay_nhapErr.$imageErr.$mo_taErr.$theloailqErr != ""){
    header('location: ' . BASE_URL . "products/sua.php?ma_hh=$productsId&nameerr=$nameErr&don_giaerr=$don_giaErr&ngay_nhaperr=$ngay_nhapErr&saleerr=$saleErr&imageerr=$imageErr&mo_taerr=$mo_taErr&theloailqerr=$theloailqErr");
    die;
}
// 4. Tạo câu query để insert data
$sql = "update products 
                        set 
                           name = '$name',
                           don_gia = '$don_gia',
                           sale = '$sale',
                           image = '$path',
                           tenloai = '$tenloai',
                           trang_thai = '$trang_thai',
                           ngay_nhap = '$ngay_nhap',
                           luot_xem = '$luot_xem',
                           mo_ta = '$mo_ta',
                           theloailq = '$theloailq',
                           giam_gia = '$dongia'
                    where ma_hh = $productsId ";
                    // 5. Thực thi câu query với csdl
dbexe($sql);
// 6. Điều hướng về trang danh sách
header("location: " . BASE_URL_3 . "?msg=Lưu sửa sản phẩm thành công");


?>