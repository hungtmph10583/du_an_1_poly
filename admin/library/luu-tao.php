<?php
session_start();
require_once '../../lib/db.php';
require_once "../../lib/common.php";
// xử lý dữ liệu để tạo ra tk trong csdl
// 1. Nhận dữ liệu từ request
checkAuths();
$noi_dung = $_POST['noi_dung'];

$chu_de = $_POST['chu_de'];
$chu_deErr = "";

$image = $_FILES['image'];
$imageErr = "";

date_default_timezone_set("Asia/Ho_Chi_Minh");
$ngay_dang = date_format(date_create(),'Y-m-d h:i:s');
$nguoi_dang = $_SESSION['auth']['name'];

// 2. Kiểm tra dữ liệu (validate)
// ktra rỗng
// ktra số lượng ký tự
if($chu_de == ""){
    $chu_deErr = "Hãy nhập chủ_de";
}
$path = "";
if($image['size']<1500000 && $image['size']>0){
    $filename = uniqid() . "-" . $image["name"];
    move_uploaded_file($image["tmp_name"], '../../public/uploads/' . $filename);
    $path = 'public/uploads/' . $filename;
    $expensions= array("jpeg","jpg","png","bmp");
    $file_ext = strtolower(end(explode('.',$_FILES['image']['name'])));
    if(in_array($file_ext,$expensions)=== false){
    $imageErr = "Chỉ hỗ trợ upload file JPEG hoặc PNG.";
    }
}elseif($image['size'] = 0){
    $imageErr = "tải ảnh";
}elseif($image['size']>1500000){
    $imageErr = "Hình ảnh phải nhỏ hơn 1.5mb";
}
//Xử lý upload ảnh
if($chu_deErr.$imageErr != ""){
    header('location: ' . BASE_URL_G . "tao-thu-vien.php?chu_deerr=$chu_deErr&imageerr=$imageErr");
    die;
}

// 4. Tạo câu query để insert data
$sql = "insert into library 
                    (chu_de, image, noi_dung, ngay_dang, nguoi_dang)
                values 
                    ('$chu_de','$path', '$noi_dung', '$ngay_dang', '$nguoi_dang')";
                    // 5. Thực thi câu query với csdl
dbexe($sql);
// 6. Điều hướng về trang danh sách
header("location: " . BASE_URL_16);


?>