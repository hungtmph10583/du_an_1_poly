<?php
session_start();
require_once '../../lib/db.php';
require_once "../../lib/common.php";
checkAuths();
// lấy id trên đường dẫn xuống
$ten_hh = isset($_GET['ten_hh']) ? $_GET['ten_hh'] : -1;
$ma_hd = isset($_GET['ma_hd']) ? $_GET['ma_hd'] : -1;
// kiểm tra xem ten_hh có tồn tại trong db hay không 
$sql = "select * from cart where ten_hh like '%$ten_hh%' and ma_hd like '%$ma_hd%'";
$cart = dbfetch($sql);
// 1. Nhận dữ liệu từ request
$so_luong = $_POST['so_luong'];
$so_luongErr = "";

if($so_luong == ""){
    $so_luongErr = "Hãy nhập số lượng";
}elseif ($so_luong < 1) {
    $so_luongErr = "Số lượng phải lớn hơn 0";
}
if($so_luongErr != ""){
    header('location: ' . BASE_URL_S . "order/sua.php?so_luongerr=$so_luongErr");
    die;
}
// 4. Tạo câu query để insert data
$sql = "update cart 
                    set
                        so_luong = '$so_luong'
                where ten_hh like '%$ten_hh%' and ma_hd like '%$ma_hd%'";
                    // 5. Thực thi câu query với csdl
dbexe($sql);
// 6. Điều hướng về trang danh sách
header("location: " . BASE_URL_S . "order/xem-chi-tiet.php?ma_hd=$ma_hd");
?>