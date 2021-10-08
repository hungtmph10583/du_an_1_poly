<?php
session_start();
require_once '../../lib/db.php';
require_once "../../lib/common.php";
checkAuths();
//lấy id trên đường dẫn xuống
$orderId = isset($_GET['id']) ? $_GET['id'] : -1;
//kiểm tra xem id có tồn tại trong đó hay không
$getOrderByIdQuery = "delete from orders_products where id = $orderId ";
$stmt = dbexe($getOrderByIdQuery);
header("location: " . BASE_URL_6 . "?msg=Xóa đơn hàng thành công");
?>