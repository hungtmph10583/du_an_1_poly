<?php
session_start();
require_once "../../lib/db.php";
require_once "../../lib/common.php";
$action = $_POST['action'];
$ma_hh = $_POST['ma_hh'];
$quantity = !empty($_POST['quantity'])?$_POST['quantity']:1;
if($action == "update"){
  $quantity = $quantity >= 1 ? $quantity : 1;
  if(isset($_SESSION['carts'][$ma_hh])){
    $_SESSION['carts'][$ma_hh]['quantity'] = $quantity;
    
  }
}
header("location: cart.php");
?>