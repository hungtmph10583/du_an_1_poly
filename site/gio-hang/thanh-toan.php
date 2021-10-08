<?php
session_start();
require_once "../../lib/db.php";
require_once "../../lib/common.php";
$ma_hd = rand_string(3);
$keyword = isset($_GET['keyword']) ? $_GET['keyword'] : "";
// query lấy danh sách user từ db
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
?>
<!DOCTYPE html>
<html lang="en">
<style>
html,
body {
    overflow-x: hidden;
    width: 100%;
}

.small-container {
    max-width: 1000px;
    margin: auto;
    height: 350px;
}

.small-container h2 {
    padding: 15px 0 20px 0;
    text-align: center;
}

.row {
    display: grid;
    grid-template-columns: 50% 50%;
}

.row .row-left {
    margin: 0 50px 0 0;
}

.row .row-right {
    margin: 0 0 0 50px;
}

.row-one {
    display: grid;
    grid-template-columns: 27% auto;
    margin: 5px 0 5px 0;
}

.row-two {
    display: grid;
    grid-template-columns: 17% auto;
    margin: 5px 0 5px 0;
}

.row-one label,
.row-two label {
    margin: 7px 0 0 0;
}


.row-one input,
.row-two input {
    line-height: 25px;
    font-size: 14px;
    padding: 3px 5px;
    border-radius: 5px;
    border: 1px solid gray;
}

.row-two textarea {
    padding: 10px 10px;
    height: 75px;
    border-radius: 5px;
}

.btnt {
    display: inline-block;
    text-decoration: none;
    background: #1b6109;
    border: 1px solid #1b6109;
    color: #fff;
    padding: 8px 30px;
    margin: 30px 0;
    border-radius: 30px;
    transition: 0.5s;
    cursor: pointer;
}

.sub-center {
    text-align: center;
}

.sub-center a {
    text-decoration: none;
    line-height: 33px;
    color: #222;
    margin: 30px 0;
    padding: 7px 30px 8px 30px;
    border: 1px solid gray;
    border-radius: 30px;
    transition: 0.5s;
    cursor: pointer;
}

.sub-center a:hover {
    background: #f12020;
    border: 1px solid #f12020;
    color: #fff;
}

/* .sub-center .huy a {
        text-decoration: none;   
        line-height: 33px;
        color: #222;
    }

    .sub-center .huy{
        text-decoration: none;
        color: #222;
        margin: 30px 0;
        padding: 0 30px 0 30px;
        border: 1px solid gray;
        border-radius: 30px;
        transition: 0.5s;
        cursor: pointer;
    }

    
    .sub-center a:hover{
        background: #f12020;
        color: #fff;
    } */
.btnt:hover {
    color: #f1f40a;
}
</style>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản Trị</title>
</head>

<body>
    <?php include_once "../../header.php" ?>
    <main class="small-container">
        <h2>Thanh Toán</h2>
        <form action="http://localhost/php1/project_sample_1/admin/order/luu-tao-hang.php" method="POST"
            enctype="multipart/form-data">
            <div class="row">
                <div class="row-left">
                    <div class="row-one">
                        <label for="">Mã Đơn Hàng</label>
                        <input type="text" name="ma_hd" value="<?= $ma_hd?>">
                    </div>
                    <?php if($code == true):?>
                    <?php if((strtotime($ngay_dang) >= strtotime($bat_dau) && strtotime($ngay_dang) <= strtotime($het_han)) && $order <= 10 ){?>
                    <div class="row-one">
                        <label for="">Mã Khuyến Mãi</label>
                        <input type="text" name="code_sale" value="<?= $code['code_sale']?>">
                    </div>
                    <?php }?>
                    <?php  endif?>
                    <div class="row-one">
                        <label for="">Họ và Tên</label>
                        <?php if(isset($products4)){?>
                        <?php foreach($products4 as $keys => $cursors)?>
                        <input type="text" name="ten_kh" value="<?= $cursors['name']?>">
                        <?php if(isset($_GET['ten_kherr'])):?>
                        <span class="text-danger" style="color:red;width:200px;"><?= $_GET['ten_kherr'] ?></span>
                        <?php endif ?>
                        <?endforeach?>
                        <?php }else{?>
                        <input type="text" name="ten_kh" placeholder="Họ và Tên *">
                        <?php if(isset($_GET['ten_kherr'])):?>
                        <span class="text-danger" style="color:red;width:200px;"><?= $_GET['ten_kherr'] ?></span>
                        <?php endif ?>
                        <?php }?>
                    </div>
                    <div class="row-one">
                        <label for="">Số Điện Thoại</label>
                        <?php if(isset($products4)){?>
                        <?php foreach($products4 as $keys => $cursors)?>
                        <input name="phone_number" value="<?= $cursors['phone_number'] ?>">
                        <?php if(isset($_GET['phone_numbererr'])):?>
                        <span class="text-danger" style="color:red;width:200px;"><?= $_GET['phone_numbererr'] ?></span>
                        <?php endif ?>
                        <?endforeach?>
                        <?php }else{?>
                        <input name="phone_number" placeholder="Số Điện Thoại *">
                        <?php if(isset($_GET['phone_numbererr'])):?>
                        <span class="text-danger" style="color:red;width:200px;"><?= $_GET['phone_numbererr'] ?></span>
                        <?php endif ?>
                        <?php }?>
                    </div>
                </div>
                <div class="row-right">
                    <div class="row-two">
                        <label for="">Địa Chỉ</label>
                        <input type="text" name="dia_chi" placeholder="Địa Chỉ *">
                        <?php if(isset($_GET['dia_chierr'])):?>
                        <span class="text-danger" style="color:red;width:200px;"><?= $_GET['dia_chierr'] ?></span>
                        <?php endif ?>
                    </div>
                    <div class="row-two">
                        <label for="">Lưu Ý</label>
                        <textarea name="yeu_cau" placeholder="Yêu cầu bổ xung của khách hàng"></textarea>
                    </div>
                </div>

            </div>
            <div class="sub-center">
                <button type="submit" class="btnt">Lưu</button>
                <a href="#">Hủy</a>
            </div>
        </form>
    </main>
    <?php include_once "../../footer.php" ?>
</body>

</html>