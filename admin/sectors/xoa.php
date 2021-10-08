<?php
session_start();
require_once '../../lib/db.php';
require_once "../../lib/common.php";
checkAuths();
//lấy id trên đường dẫn xuống
$sectorId = isset($_GET['ma_loai']) ? $_GET['ma_loai'] : -1;
//kiểm tra xem id có tồn tại trong đó hay không
$sql = "select * from sectors where ma_loai = $sectorId";
$sector = dbfetch($sql);
if($sector != ""){
    $sql = "delete from sectors where ma_loai = $sectorId";
    $sectors = dbfetch($sql);
    header("location: ".BASE_URL_2."?msg=Xóa danh mục thành công");
}else{
    header("location: ".BASE_URL_2."?msg=Danh mục không tồn tại");
}



    
?>