<?php
require_once '../../lib/db.php';
require_once "../../lib/common.php";
checkAuths();
// xử lý dữ liệu để tạo ra loại hàng trong csdl
// 1. Nhận dữ liệu từ request
$ten_loai = $_POST['ten_loai'];
$ten_loaiErr = "";

if($ten_loai == "" ){
    $ten_loaiErr = "Hãy nhập tên loại";
}
if($ten_loaiErr === "" && (strlen($ten_loai) < 3 || strlen($ten_loai) > 50)){
    $ten_loaiErr = "Độ dài họ và tên nằm trong khoảng 3 - 50 ký tự";
}
if($ten_loaiErr!= ""){
    header('location: ' . BASE_URL_S . "sectors/tao-loai.php?ten_loaierr=$ten_loaiErr");
    die;
}
// 4. Tạo câu query để insert data
$sql = "insert into sectors
                    (ten_loai)
                values 
                    ('$ten_loai')";
                    // 5. Thực thi câu query với csdl
dbexe($sql);
// 6. Điều hướng về trang danh sách
header("location: " . BASE_URL_2 . "?msg=Tạo mới loại hàng thành công");


?>