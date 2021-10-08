<?php
session_start();
require_once './lib/db.php';
require_once "./lib/common.php";
//lấy id trên đường dẫn xuống
$id = isset($_GET['id']) ? $_GET['id'] : -1;
//kiểm tra xem id có tồn tại trong đó hay không
$sql = "delete from cart where id = $id";
$cart = dbfetch($sql);
header("location: ".BASE_URL_B."push-cart.php"."?msg=Xóa hàng hóa thành công");
?>