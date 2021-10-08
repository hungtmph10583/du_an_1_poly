<?php
session_start();
require_once '../../lib/db.php';
require_once "../../lib/common.php";
checkAuths();
//lấy id trên đường dẫn xuống
$productId = isset($_GET['ma_hh']) ? $_GET['ma_hh'] : -1;
//kiểm tra xem ma_hh có tồn tại trong đó hay không
$sql = "select * from products where ma_hh = $productId";
$product = dbfetch($sql);
if($product != ""){
    $sql = "delete from products where ma_hh = $productId";
    $products = dbfetch($sql);
    header("location: ".BASE_URL_3."?msg=Xóa hàng hóa thành công");
}else{
    header("location: ".BASE_URL_3."?msg=Hàng hóa không tồn tại");
}
?>