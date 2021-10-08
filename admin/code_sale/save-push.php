<?php
session_start();
require_once '../../lib/db.php';
require_once "../../lib/common.php";
checkAuths();
// xử lý dữ liệu để tạo ra loại hàng trong csdl
// 1. Nhận dữ liệu từ request
$code_sale = $_POST['code_sale'];
$code_saleErr = "";
$ngay_thang = $_POST['ngay_thang'];
$ngay_thangErr = "";
$het_han = $_POST['het_han'];
$het_hanErr = "";
$percent = $_POST['percent'];
$percentErr = "";
$kich_hoat = ($_POST['kich_hoat'])?$_POST['kich_hoat']:0;
if($code_sale == "" ){
    $code_saleErr = "Hãy nhập tên loại";
}
if($ngay_thang == "" ){
    $ngay_thangErr = "Hãy nhập ngày tháng";
}
if($het_han == "" ){
    $het_hanErr = "Hãy nhập ngày tháng";
}
if($percent == "" ){
    $percentErr = "Hãy nhập vào phần trăm";
}elseif($percent < 0){
    $percentErr = "Phần trăm không được phép âm";
}
if($code_saleErr === "" && (strlen($code_sale) < 3 || strlen($code_sale) > 50)){
    $code_saleErr = "Độ dài họ và tên nằm trong khoảng 3 - 50 ký tự";
}
if($code_saleErr.$percentErr != ""){
    header('location: ' . BASE_URL_S . "code_sale/push.php?code_salerr=$code_salErr&percenterr=$percentErr");
    die;
}
// 4. Tạo câu query để insert data
$sql = "insert into code
                    (code_sale,ngay_thang,het_han, percent, kich_hoat)
                values 
                    ('$code_sale','$ngay_thang','$het_han', '$percent', '$kich_hoat')";
                    // 5. Thực thi câu query với csdl
dbexe($sql);
// 6. Điều hướng về trang danh sách
header("location: " . BASE_URL_S . "code_sale/code_sale.php?msg=Tạo mới loại hàng thành công");


?>