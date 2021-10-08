<?php
session_start();
require_once '../../lib/db.php';
require_once "../../lib/common.php";
checkAuths();
//lấy id trên đường dẫn xuống
$id = isset($_GET['id']) ? $_GET['id'] : -1;
//kiểm tra xem ma_hh có tồn tại trong đó hay không
$sql = "select * from manage_img where id = $id";
$product = dbfetch($sql);
if($product != ""){
    $sql = "delete from manage_img where id = $id";
    $products = dbfetch($sql);
    header("location: ".BASE_URL_12."?msg=Xóa hàng hóa thành công");
}else{
    header("location: ".BASE_URL_12."?msg=Hàng hóa không tồn tại");
}
?>