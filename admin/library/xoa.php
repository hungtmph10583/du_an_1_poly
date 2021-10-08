<?php
session_start();
require_once '../../lib/db.php';
require_once "../../lib/common.php";
checkAuths();
//lấy id trên đường dẫn xuống
$libraryid = isset($_GET['id']) ? $_GET['id'] : -1;
//kiểm tra xem id có tồn tại trong đó hay không
$sql = "select * from library where id = $libraryid";
$library = dbfetch($sql);
if($library != ""){
    $sql = "delete from library where id = $libraryid";
    $librarys = dbfetch($sql);
    header("location: ".BASE_URL_16."?msg=Xóa tin tức thành công");
}else{
    header("location: ".BASE_URL_16."?msg=Tin tức không tồn tại");
}
?>