<?php
session_start();
require_once '../../lib/db.php';
require_once "../../lib/common.php";
checkAuths();
//lấy id trên đường dẫn xuống
$ten_hh = isset($_GET['ten_hh']) ? $_GET['ten_hh'] : "";
$ma_hd = isset($_GET['ma_hd']) ? $_GET['ma_hd'] : "";
if(isset($_GET['action'])){
    $action = $_GET['action'];
    if($action == "delete"){
        $sql = "select * from orders_products where ma_hd like '%$ma_hd%'";
        $order = dbfetch($sql);
        if($order != ""){
            $sql = "delete from orders_products where ma_hd like '%$ma_hd%'";
            $orders = dbfetch($sql);
            if(!$orders){
                $sql = "delete from cart where ma_hd like '%$ma_hd%'";
                $code = dbfetch($sql);
            }
            header("location: ".BASE_URL_S."order/don-hang.php?msg=Xóa đơn hàng thành công");
            die;
        }else{
            header("location: ".BASE_URL_S."order/don-hang.php?msg=Đơn hàng không");
            die;
        }
    }
}
//kiểm tra xem ten_hh có tồn tại trong đó hay không
$sql = "select * from cart where ten_hh like '%$ten_hh%' and ma_hd like '%$ma_hd%'";
$order = dbfetch($sql);
if($order != ""){
    $sql = "delete from cart where ten_hh like '%$ten_hh%' and ma_hd like '%$ma_hd%'";
    $code = dbfetch($sql);
    if($code == ""){
        $sql = "delete from orders_products where ma_hd like '%$ma_hd%'";
        $codes = dbfetch($sql);
        header("location: ".BASE_URL_S."order/don-hang.php?msg=Xóa sản phẩm thành công");
    }else{
        header("location: ".BASE_URL_S."order/xem-chi-tiet.php?ma_hd=$ma_hd&msg=Xóa sản phẩm thành công");
    }
}else{
    header("location: ".BASE_URL_S."order/xem-chi-tiet.php?ma_hd=$ma_hd&msg=Sản phẩm không tồn tại");
}
?>