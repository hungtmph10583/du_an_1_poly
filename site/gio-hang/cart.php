<?php
session_start();
require_once "../../lib/db.php";
require_once "../../lib/common.php";
$ma_hd = rand_string(3);
$keyword = isset($_GET['keyword']) ? $_GET['keyword'] : "";
// query lấy danh sách user từ db
$product = !empty($_SESSION['carts'])?$_SESSION['carts'] : [];
if(isset($_SESSION['auth']) && !empty($_SESSION['auth'])){
    $ma_kh = $_SESSION['auth']['ma_kh'];
    $ten_kh = $_SESSION['auth']['name'];
    $getProductsQuery = "select * from users where name = '$ten_kh'";
$products4 = dbfetchAll($getProductsQuery);
$getProductsQuery = "select ten_kh from orders_products";
$products5 = dbfetchColumn($getProductsQuery);
}
date_default_timezone_set("Asia/Ho_Chi_Minh");
$ngay_dang = date_format(date_create(),'Y-m-d');
$sql = "select * from code where kich_hoat = 1";
$code = dbfetch($sql);
if($code){
    $bat_dau = $code['ngay_thang'];
$het_han = $code['het_han'];
$sql = "select count(id) from orders_products where ngay_mua like '%$bat_dau%' order by '%$het_han%'";
$order = dbfetchColumn($sql);
}


$sql = "select * from sectors";
$sectors = dbfetch($sql);
// var_dump($id); die;
?>
<!DOCTYPE html>
<html lang="en">
<style type="text/css">
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Poppins', sans-serif;
}

html,
body {
    overflow-x: hidden;
    width: 100%;
}

.small-container {
    max-width: 1000px;
    margin: auto;

}

.small-container h2 {
    padding: 15px 0 20px 0;
    text-align: center;
}

.row {
    display: flex;
    display: grid;
    grid-template-columns: auto auto auto auto auto;
}

.col-1 {

    text-align: center;
    margin: 0 0 20px 0;
}

.col-1 img {
    width: 100px;
    height: auto;
}

.col-2 {
    padding: 18px 0 0 0;
    margin: 0 0 20px 0;
}

.col-3 {
    margin: 0 0 20px 0;
    padding: 18px 0 0 0;
}

.col-3 h4 {
    font-size: 18px;
    color: #ff523b;
    margin: 5px 0 0 0;
}

.col-4 {
    margin: 0 0 20px 0;

}

.col-5 {
    margin: 0 0 20px 0;
    padding: 18px 0 0 0;
}

.col-5 form {
    display: flex;
    display: grid;
    grid-template-columns: auto auto;
}

.col-5 form .col-5-2 .hide {
    line-height: 32px;
    margin: 5px 0 0 0;
}

.col-5 form .col-5-2-2 {
    margin: 0 0 0 0;
}

.col-5 form .col-5-2-2 .button {
    border: 1px solid #222;
    border-radius: 5px;
    margin: 0 0 10px 0;
}

.col-5 form .col-5-2-2 .button a {
    font-size: 14px;
    text-decoration: none;
    line-height: 32px;
    color: #222;
    padding: 0 22px 0 22px;
}

.col-5 form .col-5-2-2 input {
    border: 1px solid #222;
    border-radius: 5px;
    font-size: 14px;
    line-height: 32px;
    padding: 0 10px 0 10px;
    cursor: pointer;
}

/* .col-5 form .col-5-2-2 .button:hover{
            background: #f12020;
            color: #fff;
        } */
.btnt {
    display: inline-block;
    text-decoration: none;
    background: #1b6109;
    color: #fff;
    padding: 8px 30px;
    margin: 30px 0;
    border-radius: 30px;
    transition: 0.5s;
}

.sub-center {
    text-align: center;
}

.btnt:hover {
    color: #f1f40a;

}
</style>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang Chủ</title>
</head>

<body>
    <?php include_once "../../header.php" ?>
    <?php include_once "../../banner.php" ?>
    <?php if(isset($_GET['msg'])):?>
    <p class="text-danger"><?= $_GET['msg']?></p>
    <?php endif?>
    <main class="small-container">
        <div class="row">
            <?php foreach($product as $keys => $cursor):?>
            <div class="col-1">
                <a href="#">
                    <img src="<?= BASE_URL_B . $cursor['image'] ?>" class="img-fluid" ?>
                </a>
            </div>
            <div class="col-2">
                <h3><?= $cursor['name'] ?></h3>
            </div>
            <div class="col-3">
                <p>Đơn giá</p>
                <h4><?= number_format($cursor['don_gia']) . "VNĐ" ?></h4>
            </div>
            <div class="col-4">

            </div>
            <div class="col-5">
                <form action="update.php" method="POST" enctype="multipart/form-data">
                    <div class="col-5-2">
                        <p>Số lượng</p>
                        <input class="hide" type="number" min="1" name="quantity" value="<?= $cursor['quantity']?>">
                        <input type="hidden" name="action" value="update">
                        <input type="hidden" name="ma_hh" value="<?= $cursor['ma_hh']?>">
                    </div>
                    <div class="col-5-2-2">
                        <button class="button"><a
                                href="delete.php?action=delete&ma_hh=<?= $cursor['ma_hh']?>">Xóa</a></button><br>
                        <input type="submit" value="capnhat">
                    </div>
                </form>
            </div>
            <?php endforeach?>
        </div>
        <?php if(!empty($product)):?>
        <div class="sub-center">
            <a href="thanh-toan.php" class="btnt btn-danger btn-sm">
                Thanh toán
            </a>
        </div>
        <?php endif?>
    </main>
    <?php include_once "../../footer.php" ?>
</body>

</html>