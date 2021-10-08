<?php
session_start();
require_once '../../lib/db.php';
require_once "../../lib/common.php";
checkAuths();
//lấy id trên đường dẫn xuống
$userId = isset($_GET['ma_kh']) ? $_GET['ma_kh'] : -1;
$ma_kh = $_SESSION['auth']['ma_kh'];
if($userId != $ma_kh){
    $sql = "select * from users where ma_kh = '$userId' ";
    $user = dbfetch($sql);
    if($user != ""){
        $sql = "delete from users where ma_kh = '$userId' ";
        $users = dbfetch($sql);
        header("location: ".BASE_URL_1."?msg=Xóa tài khoản thành công");
    }else{
        header("location: ".BASE_URL_1."?msg=Tài khoản không tồn tại");
    }
}else {
    header("location: ".BASE_URL_1."?msg=Bạn không thể tự xóa tài khoản của mình");
}
//kiểm tra xem id có tồn tại trong đó hay không
?>