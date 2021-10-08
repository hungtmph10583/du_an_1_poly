<?php
session_start();
require_once "../../lib/db.php";
require_once "../../lib/common.php";
checkAuth();
$old_password = $_POST['old_password'];
$password = $_POST['password'];
$passwordErr = "";
$cfpassword = $_POST['cfpassword'];
$cfpasswordErr = "";
// validate
$removeWhiteSpacePassword = str_replace(" ", "", $password);
if((strlen($removeWhiteSpacePassword) != strlen($password))){
    $passwordErr = "Mật khẩu không thỏa mãn ";
}
if(strlen($password) < 6 ){
    $passwordErr = "Mật khẩu không thỏa mãn ";
}
// giống với xác nhận mk
if($password != $cfpassword){
    $cfpasswordErr = "Mật khẩu và xác nhận mật khẩu không khớp";
}

if($passwordErr.$cfpasswordErr != ""){
    header('location: ' . BASE_URL . "doi-mk.php?ma_kherr=$ma_khErr&passworderr=$passwordErr&cfpassworderr=$cfpasswordErr");
    die;
}
$ma_kh = $_SESSION['auth']['ma_kh'];
// ktra mk cũ có khớp với mk trong db hay không
$sql = "select * from users where ma_kh = '$ma_kh'";
$user = dbfetch($sql);

if(!password_verify($old_password, $user['password'])){
    header('location: ' . BASE_URL . 'doi-mk.php?msg=Mật khẩu cũ không đúng');
    die;
}
// mã hóa mk mới
$passwordHash = password_hash($password, PASSWORD_DEFAULT);
// cập nhật tài khoản với mk = mk mới đã đc mã hóa
$updateUserPasswordQuery = "update users
                            set 
                                password = '$passwordHash'
                            where ma_kh = '$ma_kh'";
dbexe($updateUserPasswordQuery);
// điều hướng website sang trang chủ
if($user['vai_tro'] < 1){
    if($user['kich_hoat'] < 1){
        header("location: " . BASE_URL . "login.php" . "?msg=chưa kích hoạt tài khoản");
        die;
    }else {
        header('location: ' . BASE_URL_C . "?msg=đổi mật khẩu thành công");
        die;
    }
}else {
    header('location: ' . BASE_URL_1 . "?msg=đăng nhập thành công");
    die;
}
?>