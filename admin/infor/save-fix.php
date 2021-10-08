<?php
session_start();
require_once '../../lib/db.php';
require_once "../../lib/common.php";
checkAuths();
// xử lý dữ liệu để tạo ra tk trong csdl;
// 1. Nhận dữ liệu từ request
$id = $_GET['id'];
// dựa vào id để truy vấn ra dữ liệu của sản phẩm
$sql = "select * from manage_img where id = $id";
$products = dbfetch($sql);
if(!$products){
    header("location: ".BASE_URL_5."?msg=Hàng hóa không tồn tại");
    die;
}
$banner1 = $_FILES['banner1'];
$banner1Err = "";
$banner2 = $_FILES['banner2'];
$banner2Err = "";
$banner3 = $_FILES['banner3'];
$banner3Err = "";
$logo = $_FILES['logo'];
$logoErr = "";
//Xử lý upload ảnh
$path = $products['banner1'];
$path1 = $products['banner2'];
$path2 = $products['banner3'];
$path3 = $products['logo'];
if($banner1['size']<1500000 && $banner1['size']>0){
    $filename = uniqid() . "-" . $banner1["name"];
    move_uploaded_file($banner1["tmp_name"], '../../public/uploads/' . $filename);
    $path = 'public/uploads/' . $filename;
    $expensions= array("jpeg","jpg","png","bmp");
    $file_ext = strtolower(end(explode('.',$_FILES['banner1']['name'])));
    if(in_array($file_ext,$expensions)=== false){
    $banner1Err = "Chỉ hỗ trợ upload file JPEG hoặc PNG.";
    }
}elseif($banner1['size'] = 0){
    $banner1Err = "tải ảnh";
}elseif($banner1['size']>1500000){
    $banner1Err = "Hình ảnh phải nhỏ hơn 1.5mb";
}

if($banner2['size']<1500000 && $banner2['size']>0){
    $filename = uniqid() . "-" . $banner2["name"];
    move_uploaded_file($banner2["tmp_name"], '../../public/uploads/' . $filename);
    $path1 = 'public/uploads/' . $filename;
    $expensions= array("jpeg","jpg","png","bmp");
    $file_ext = strtolower(end(explode('.',$_FILES['banner2']['name'])));
    if(in_array($file_ext,$expensions)=== false){
    $banner2Err = "Chỉ hỗ trợ upload file JPEG hoặc PNG.";
    }
}elseif($banner2['size'] = 0){
    $banner2Err = "tải ảnh";
}elseif($banner2['size']>1500000){
    $banner2Err = "Hình ảnh phải nhỏ hơn 1.5mb";
}

if($banner3['size']<1500000 && $banner3['size']>0){
    $filename = uniqid() . "-" . $banner3["name"];
    move_uploaded_file($banner3["tmp_name"], '../../public/uploads/' . $filename);
    $path2 = 'public/uploads/' . $filename;
    $expensions= array("jpeg","jpg","png","bmp");
    $file_ext = strtolower(end(explode('.',$_FILES['banner3']['name'])));
    if(in_array($file_ext,$expensions)=== false){
    $banner3Err = "Chỉ hỗ trợ upload file JPEG hoặc PNG.";
    }
}elseif($banner3['size'] = 0){
    $banner3Err = "tải ảnh";
}elseif($banner3['size']>1500000){
    $banner3Err = "Hình ảnh phải nhỏ hơn 1.5mb";
}

if($logo['size']<1500000 && $logo['size']>0){
    $filename = uniqid() . "-" . $logo["name"];
    move_uploaded_file($logo["tmp_name"], '../../public/uploads/' . $filename);
    $path3 = 'public/uploads/' . $filename;
    $expensions= array("jpeg","jpg","png","bmp");
    $file_ext = strtolower(end(explode('.',$_FILES['logo']['name'])));
    if(in_array($file_ext,$expensions)=== false){
    $logoErr = "Chỉ hỗ trợ upload file JPEG hoặc PNG.";
    }
}elseif($logo['size'] = 0){
    $logoErr = "tải ảnh";
}elseif($logo['size']>1500000){
    $logoErr = "Hình ảnh phải nhỏ hơn 1.5mb";
}
if($banner1Err.$banner2Err.$banner3Err.$logoErr != ""){
    header('location: ' . BASE_URL_S . "infor/push-image.php?banner1err=$banner1Err&banner2err=$banner2Err&banner3err=$banner3Err&logoerr=$logoErr");
    die;
}

// 4. Tạo câu query để insert data
$insertQuery = "update manage_img 
                set
                    banner1 = '$path',
                    banner2 = '$path1',
                    banner3 = '$path2',
                    logo = '$path3'
                    where id = $id ";
                    // 5. Thực thi câu query với csdl
dbexe($insertQuery);

// 6. Điều hướng về trang danh sách
header("location: " . BASE_URL_12);
?>