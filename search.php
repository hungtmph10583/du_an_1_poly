<?php
session_start();
require_once "./lib/db.php";
require_once "./lib/common.php";
// lấy dữ liệu từ trên url => keyword
$keyword = isset($_GET['keyword']) ? $_GET['keyword'] : "";
// query lấy danh sách user từ db
$sql1 = "select * from products where mo_ta like '%$keyword%' or name like '%$keyword%' or theloailq like '%$keyword%' ";

$SanPham1 = dbfetchAll($sql1);
?>
<!DOCTYPE html>
<html lang="en">
<style>
main {
    width: 1000px;
    margin: auto;
}

main h2 {
    text-align: center;
    margin: 20px 0;
}


.f12 {
    position: relative;
    width: 230px;
    height: 430px;
    margin: 0 10px 40px 10px;
    float: left;
}

.f12:hover {
    box-shadow: 3px 3px 5px 0px #666;
}

.f12 a img {
    width: 100%;
    height: 85%;
    margin: 0;
    padding: 0;
}

.f12 h4 {
    width: 100%;
    margin: 2px 0 2px 15px;
}

.f12 .rating {
    color: #ff523b;
    margin: 2px 0 2px 15px;
}

.f12 p {
    margin: 2px 0 2px 15px;
}

.f12 button {
    padding: 5px 10px 5px 10px;
    background-color: #309a13;
    border: 1px solid #309a13;
    color: white;
    border-radius: 5px;
    cursor: pointer;
    margin: 2px 0 2px 15px;
}

.f12 button:hover {
    border: 1px solid lightgreen;
    color: #f1f40a;
    box-shadow: 3px 3px 5px 0px #666;
}

.noi {
    position: absolute;
    top: 80%;
    width: 100%;
    opacity: 0;
    visibility: hidden;
    transition: top .4s;
}

.noi .gio_hang {
    width: 100%;
    margin: 0;
    padding: 10px auto;
}

.noi .gio_hang a {
    line-height: 30px;
    text-decoration: none;
    color: #fff;
}

.f12:hover>.noi {
    top: 60%;
    opacity: 1;
    visibility: visible;
}

.ttgt {
    position: absolute;
    top: 80%;
    opacity: 0;
    visibility: hidden;
    transition: top .4s;
}

.f12:hover>.ttgt {
    top: 85%;
    opacity: 1;
    visibility: visible;
}
</style>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang Chủ</title>
</head>

<body>
    <?php include_once "header.php" ?>
    <?php include_once "banner.php" ?>
    <main class="cont">
        <h2>Kết quả tìm kiếm</h2>
        <?php foreach ($SanPham1 as $key => $cursor): ?>
        <div class="f12">
            <a href="<?= BASE_URL_B?>chi-tiet.php?ma_hh=<?= $cursor['ma_hh'] ?>">
                <img src="<?= BASE_URL_B . $cursor['image'] ?>" class="img-fluid">
            </a>
            <div class="noi">
                <button class="gio_hang">
                    <a href="<?= BASE_URL_B?>site/gio-hang/gio-hang.php?&ma_hh=<?= $cursor['ma_hh'] ?>">
                        <i class="fas fa-shopping-cart"></i> Thêm Giỏ Hàng
                    </a>
                </button>
            </div>
            <div class="ttgt">
                <h4><?=$cursor['name'] ?></h4>
                <div class="rating">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                    <i class="far fa-star"></i>
                </div>
                <p><?= '$' . number_format( $cursor['don_gia']) ?></p>
            </div>
        </div>
        <?php endforeach?>
    </main>
    <?php include_once "footer.php" ?>
</body>

</html>