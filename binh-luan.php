<?php
session_start();
require_once "lib/common.php";
require_once "lib/db.php";
if(!isset($_SESSION['auth']) || !$_SESSION['auth'] && isset($_POST['comment'])){
    echo "<script>
    alert('Vui lòng đăng nhập trước khi bình luận!')
    </script>";
    header('location: login.php');die;
}else{
    $khachHang = $_SESSION['auth'];

$hangHoaId = isset($_GET['ma_hh']) ? $_GET['ma_hh']: -1;

$tenloai = isset($_GET['tenloai']) ? $_GET['tenloai']: -1;

$getHangHoaByIdQuery = "select * from products where ma_hh = $hangHoaId";

$hangHoa =dbfetch($getHangHoaByIdQuery);

$noi_dung = $_POST['noi_dung'];
$noi_dungErr = "";

$ma_hh = $hangHoaId;

$ma_kh = $khachHang['ma_kh'];

$ngay_bl = date_format(date_create(),'Y-m-d');

$insertQuery = "insert into comments
                    (noi_dung, id_hh, ma_kh, ngay_bl)
                values 
                    ('$noi_dung', '$ma_hh', '$ma_kh', '$ngay_bl')";
dbexe($insertQuery); // thực thi lệnh với csdl
// 6. Điều hướng về trang danh sách
header("location: " . BASE_URL_B . 'chi-tiet.php' . "?ma_hh=$hangHoaId&tenloai=$tenloai");

}
?>