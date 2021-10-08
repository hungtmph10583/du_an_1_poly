<?php
session_start();
require_once '../../lib/db.php';
require_once "../../lib/common.php";
checkAuths();
//lấy id trên đường dẫn xuống
$id = isset($_GET['id']) ? $_GET['id'] : -1;
//kiểm tra xem id có tồn tại trong đó hay không
$sql = "select * from code where id = $id";
$code = dbfetch($sql);
if($code != ""){
    $sql = "delete from code where id = $id";
    $codes = dbfetch($sql);
    header("location: ".BASE_URL_S."code_sale/code_sale.php?msg=Xóa mã thành công");
}else{
    header("location: ".BASE_URL_S."code_sale/code_sale.php?msg=Mã thành công");
}
?>