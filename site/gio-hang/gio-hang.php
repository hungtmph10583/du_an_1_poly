<?php
session_start();
require_once "../../lib/db.php";
require_once "../../lib/common.php";
if(isset($_SESSION['auth']) && !empty($_SESSION['auth'])){
    $name = $_SESSION['auth']['name'];
$sql = "select * from users where name = '$name'";
$user = dbfetch($sql);
}else {
    $name = NULL;
$sql = "select * from users where name = '$name'";
$user = dbfetch($sql);
}
$ma_hh = $_GET['ma_hh'];
$quantity = !empty($_GET['quantity'])?$_GET['quantity'] : 1;
$action = !empty($_GET['action'])?$_GET['action'] : 'add';
$sql = "select * from products where ma_hh = $ma_hh";
$product = dbfetch($sql);
if($product && $action == 'add' || $action == 'thanhtoan'){
    if(isset($_SESSION['carts'][$ma_hh])){
        $_SESSION['carts'][$ma_hh]['quantity'] += $quantity;
    }else{
        if($product['giam_gia'] <= 0){
            $gia = $product['don_gia'];
        }else{
            $gia = $product['giam_gia'];
        }
        $carts = [
            'ten_kh' => $user['name'],
            'ma_kh' => $user['ma_kh'],
            'ma_hh' => $product['ma_hh'],
            'name' => $product['name'],
            'don_gia' => $gia,
            'sale'=> $product['sale'],
            'image' => $product['image'],
            'quantity' => $quantity
        ];
        $_SESSION['carts'][$ma_hh] = $carts;
    }
}
if($action == "thanhtoan"){
    header('location: '. BASE_URL_B . "site/gio-hang/thanh-toan.php");
}else{
    header('location: '. BASE_URL_C.'?action=index');
}

?>