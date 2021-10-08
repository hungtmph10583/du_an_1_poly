<?php
session_start();
require_once "../../lib/db.php";
require_once "../../lib/common.php";
$action = $_GET['action'];
$ma_hh = $_GET['ma_hh'];
if($action == "delete"){
    if(isset($_SESSION['carts'][$ma_hh])){
        unset($_SESSION['carts'][$ma_hh]);
    }
}
header("location: cart.php");
?>