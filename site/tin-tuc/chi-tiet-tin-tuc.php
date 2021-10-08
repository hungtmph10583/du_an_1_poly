<?php
session_start();
require_once "../../lib/db.php";
require_once "../../lib/common.php";
// lấy dữ liệu từ trên url => keyword
$keyword = isset($_GET['keyword']) ? $_GET['keyword'] : "";
$id = $_GET['id'];
$sql = "select * from library where id=$id";
$library = dbfetchAll($sql);
?>
<!DOCTYPE html>
<html lang="en">
<style>
.cont {
    margin: auto;
    width: 1000px;
}


html,
body {
    overflow-x: hidden;
}
</style>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang Chủ</title>
</head>
<style>
.conts {
    width: 640px;
    margin: auto;
}

.conts img {
    width: 100%;
    height: auto;
}

@font-face {
    font-family: huy;
    src: url(font/times.ttf);
}

p {
    padding-bottom: 20px;
    font-family: huy;
    font-size: 17px;
    color: #333;
}

h1 {
    font-size: 30px;
    color: #2b2a2a;
}
</style>

<body>
    <?php include_once "../../header.php" ?>
    <?php include_once "../../banner.php" ?>
    <div class="conts">
        <?php foreach($library as $key => $cursor): ?>
        <h1><?=$cursor['chu_de'] ?></h1><br>
        <p style="font-style:italic;">Ngày đăng : <?=$cursor['ngay_dang']?></p>
        <p><?=$cursor['noi_dung'] ?></p>
        <?php endforeach?>
        <div class="push" style="float:right;padding-bottom: 20px;">
            <p style="font-style:italic;">Người đăng : <?= $cursor['nguoi_dang'] ?></p>
        </div>
    </div>
    <?php include_once "../../footer.php" ?>
</body>

</html>