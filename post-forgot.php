<?php
session_start();
require_once "lib/common.php";
require_once "lib/db.php";
$ma_kh = $_POST['ma_kh'];
$ma_khErr = "";
$sql = "select * from users where ma_kh = '$ma_kh'";
$user = dbfetchAll($sql);
if(!$user){
    header('location: quen-mk.php?ma_kherr=Người dùng không tồn tại!');
}else {
$name = $_POST['name'];
$nameErr = "";
$email = $_POST['email'];
$emailErr = "";
$phone_number = $_POST['phone_number'];
$phone_numberErr = "";
$ngay_sinh = $_POST['ngay_sinh'];
$ngay_sinhErr = "";
$cau_hoi = $_POST['cau_hoi'];
$cau_hoiErr = "";
}
?>
<?php foreach($user as $key => $cursor):?>
<?php 
if($name == ""){
    $nameErr = "không được để trống!";
}elseif ($name != $cursor['name']) {
    $nameErr = "Failed!";
}
if($email == ""){
    $emailErr = "không được để trống!";
}elseif ($email != $cursor['email']) {
    $emailErr = "Failed!";
}
if($phone_number == ""){
    $phone_numberErr = "không được để trống!";
}elseif ($phone_number != $cursor['phone_number']) {
    $phone_numberErr = "Failed!";
}
if($ngay_sinh == ""){
    $ngay_sinhErr = "không được để trống!";
}elseif ($ngay_sinh != $cursor['ngay_sinh']) {
    $ngay_sinhErr = "Failed!";
}
if($cau_hoi == ""){
    $cau_hoiErr = "không được để trống!";
}elseif ($cau_hoi != $cursor['cau_hoi']) {
    $cau_hoiErr = "Failed!";
}
if($ma_kh == $cursor['ma_kh'] && $name == $cursor['name'] && $email == $cursor['email'] && $phone_number == $cursor['phone_number'] && $ngay_sinh == $cursor['ngay_sinh'] && $cau_hoi == $cursor['cau_hoi']){
        header('location: new-pw.php?ma_kh='.$ma_kh);
    }elseif ($nameErr.$emailErr.$phone_numberErr.$cau_hoiErr.$ngay_sinhErr != "") {
        header('location: forgot-pw.php'."?nameerr=$nameErr&emailerr=$emailErr&phone_numbererr=$phone_numberErr&ngay_sinherr=$ngay_sinhErr&cau_hoierr=$cau_hoiErr");
        die;
}?>
<?php endforeach?>