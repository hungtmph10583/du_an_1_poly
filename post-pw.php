<?php
session_start();
require_once "./lib/db.php";
require_once "./lib/common.php";
$password = $_POST['password'];
$passwordErr = "";
// validate
$ma_kh = isset($_POST['ma_kh']) ? $_POST['ma_kh'] : "";
// ktra mk cũ có khớp với mk trong db hay không
$getUserById = "select * from users where ma_kh = $ma_kh";
$user = dbfetch($getUserById);
$removeWhiteSpacePassword = str_replace(" ", "", $password);
if(strlen($password) < 6 || (strlen($removeWhiteSpacePassword) != strlen($password))){
    $passwordErr = "Mật khẩu không thỏa mãn ";
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
header('location: ' . BASE_URL_11."?msg=Đổi mật khẩu thành công mời đăng nhập" );

?>