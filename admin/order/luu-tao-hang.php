<?php
session_start();
require_once '../../lib/db.php';
require_once "../../lib/common.php";
$product = !empty($_SESSION['carts'])?$_SESSION['carts'] : [];
    $ma_hd = $_POST['ma_hd'];
        
    $phone_number = $_POST['phone_number'];

    $dia_chi = $_POST['dia_chi'];
    $dia_chiErr = "";

    $yeu_cau = $_POST['yeu_cau'];

    date_default_timezone_set("Asia/Ho_Chi_Minh");
    $ngay_dang = date_format(date_create(),'Y-m-d');
// 2. Kiểm tra dữ liệu (validate)
// ktra rỗng
if($dia_chi == ""){
    $dia_chiErr = "Hãy nhập địa chỉ";
}
if($phone_number == ""){
    $phone_numberErr = "Hãy nhập số điện thoại";
}
?>
<?php
foreach($product as $key => $cursor):?>
<?php if(isset($_SESSION['auth']) && !empty($_SESSION['auth'])){
    $ma_kh = $_SESSION['auth']['ma_kh'];
    $ten_kh = $_SESSION['auth']['name'];
    }else{
        $ten_kh = $_POST['ten_kh'];
        $ten_khErr = "";
        if($ten_kh == ""){
            $ten_khErr = "Hãy nhập tên khách hàng";
        }
    }
    ?>
<?php if(isset($_POST['code_sale'])){
        $code_sale = $_POST['code_sale'];
    }?>
<?php
    if($dia_chiErr.$ten_khErr.$phone_numberErr != ""){
        header('location: ' . BASE_URL_B . "site/gio-hang/thanh-toan.php?dia_chierr=$dia_chiErr&ten_kherr=$ten_khErr&phone_numbererr=$phone_numberErr");
        die;
    }
    ?>
<?php $ten_hh = $cursor['name'];?>
<?php $image = $cursor['image'];?>
<?php $gia = $cursor['don_gia'];?>
<?php $so_luong = $cursor['quantity'];?>
<?= $insertQuery = "insert into cart 
                    (ten_hh, ma_kh , dia_chi, so_luong, yeu_cau, image, gia, phone_number, ten_kh, ma_hd, code_sale)
                values 
                    ('$ten_hh', '$ma_kh', '$dia_chi', '$so_luong', '$yeu_cau', '$image', '$gia', '$phone_number', '$ten_kh', '$ma_hd', '$code_sale')";
                    dbexe($insertQuery);
                    ?>
<?php endforeach ?>
<?php 
$insertQuery = "insert into orders_products 
                    (dia_chi, yeu_cau, phone_number, ma_hd, ngay_mua)
                values 
                    ('$dia_chi', '$yeu_cau', '$phone_number', '$ma_hd', '$ngay_dang')";
                    dbexe($insertQuery);?>
<?php
 header("location: http://localhost/php1/project_sample_1/site/gio-hang/complete-cart.php");?>