<?php
session_start();
require_once '../../lib/db.php';
require_once "../../lib/common.php";
checkAuths();
//lấy id trên đường dẫn xuống
$id_hh = isset($_GET['ma_hh']) ? $_GET['ma_hh'] : 0;
$id_bl = isset($_GET['id']) ? $_GET['id'] : 0;
if(isset($_GET['action'])){
    $action = $_GET['action'];
    if($action == "delete"){
        $sql = "select * from comments where id_hh = '$id_hh'";
        $comment = dbfetch($sql);
        if($comment != ""){
            $sql = "delete from comments where id_hh = '$id_hh'";
            $comments = dbfetch($sql);
            if(!$comments){
                $sql = "delete from comments where id = '$id_bl' and id_hh = '$id_hh'";
                $code = dbfetch($sql);
            }
            header("location: ".BASE_URL_S."order/don-hang.php?msg=Xóa đơn hàng thành công");
            die;
        }else{
            header("location: ".BASE_URL_S."order/don-hang.php?msg=Đơn hàng không");
            die;
        }
    }
}
//kiểm tra xem id có tồn tại trong đó hay không
$sql = "select * from comments where id = '$id_bl' and id_hh = '$id_hh'";
$comment = dbfetch($sql);
if($comment != ""){
    $sql = "delete from comments where id = '$id_bl' and id_hh = '$id_hh'";
    $comments = dbfetch($sql);
    header('location: '.BASE_URL_S."comments/view-comment.php?ma_hh=$id_hh&msg=Xóa sản phẩm thành công");
}else{
    header('location: '.BASE_URL_S."comments/view-comment.php?ma_hh=$id_hh&msg=Sản phẩm không tồn tại");
}
?>