<?php
session_start();
require_once "lib/db.php";
require_once "lib/common.php";

$productId = isset($_GET['ma_hh']) ? $_GET['ma_hh'] : 0;

$keyword = isset($_GET['keyword']) ? $_GET['keyword'] : "";

$tenloai = isset($_GET['tenloai']) ? $_GET['tenloai'] : 0;

$getProductsQuery = "select * from products where ma_hh = $productId ";
$product = dbfetchAll($getProductsQuery);
// var_dump($product); die();
if ($product == false) {
    header("location: " . BASE_URL . 'index.php' . "?msg=Không tồn tại sản phẩm này!");
} 
if (is_numeric($productId ) == false) {
    header("location: " . BASE_URL . 'index.php' . "?msg=Mã hàng hóa không đúng!");
}

$getHangQuery = "update products set luot_xem = luot_xem + 1 where ma_hh = '$productId'";
$hang = dbfetchAll($getHangQuery);

$getBinhLuanQuery = "select * from comments";
$binhLuan = dbfetchAll($getBinhLuanQuery);

$so_luot_bl = 0;
foreach ($binhLuan as $key => $value) {
    if ($value['id_hh'] == $productId) {
        $so_luot_bl++;
    }
}
$sql = "select * from users";
$taiKhoan = dbfetchAll($sql);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thông tin chi tiết</title>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
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

    img {
        width: 100px;
        height: auto;
    }

    .small-container {
        max-width: 1000px;
        margin: auto;
        /* height: 1300px; */
    }

    .row {
        display: flex;
        display: grid;
        grid-template-columns: 45% 55%;
        margin: 10px 0 0 0;
    }

    .col-2-left {
        /* border: 1px solid black; */
        text-align: center;
        padding: 10px 5px 5px 5px;
    }

    .col-2-left img {
        width: 250px;
        height: auto;
    }

    .col-2-right {
        /* border: 1px solid black; */
        padding: 20px 5px 5px 5px;
    }

    .col-2-right p {
        font-size: 18px;
        padding: 15px 0 5px 0;
    }

    .rating {
        width: 250px;
        display: grid;
        grid-template-columns: auto auto;
        margin: 10px 0 10px 0;

    }

    .rating-two i {
        font-size: 13px;
        color: #ff523b;
    }

    .rating-two.two {
        width: 110px;
        margin: 0 0 0 10px;
        border-right: 1px solid black;
    }

    .col-2-right button {
        /* padding: 10px 15px; */
        width: auto;
        height: auto;
        margin: 10px 5px 0 5px;
        border: 1px solid #222;
        cursor: pointer;
    }

    .col-2-right button a {
        line-height: 38px;
        padding: 15px 17px;
        text-decoration: none;
        color: black;
        font-size: 16px;
    }

    .col-2-right button:hover {
        background: #1b6109;
        border: 1px solid #1b6109;
        color: #fff;
    }

    .col-2-right button a:hover {
        color: #fff;
    }

    .col-2-right p span {
        padding: 0 0 0 10px;
        color: gray;
    }

    .col-2-right p span i {
        padding: 0 0 0 10px;
        color: #222;
    }

    .col-bottom {
        width: 1000px;
        margin: auto;
        padding: 30px 0 20px 0;
        display: grid;
        grid-template-columns: 80% 20%;
    }

    .col-bottom-top h4 {
        padding: 25px 0 0 0;
    }

    .col-bottom .col-bottom-top form {
        margin: 15px 0 5px 0;
        display: grid;
        grid-template-columns: 90% 10%;
    }

    .col-bottom .col-bottom-top form textarea {
        padding: 10px;
    }

    .col-bottom .col-bottom-top form .btnt {
        cursor: pointer;
        font-size: 14px;
        height: 100%;
        width: 50px;
        margin: 0 0 0 5px;
    }

    .col-bottom .col-bottom-bottom-tai-khoan {
        display: grid;
        grid-template-columns: 90px auto;
    }

    .col-bottom .col-bottom-bottom-tai-khoan1 {
        padding: 0;
        margin: 5px 0 20px 0;
    }

    .col-bottom .col-bottom-bottom-tai-khoan2 {
        padding: 0;
        margin: 8px 0 0 0;
    }

    .col-bottom .col-bottom-bottom-tai-khoan2 p {
        margin: 5px 0 5px 0;
    }

    .col-bottom .col-bottom-bottom-tai-khoan .img-user-bl {
        width: 70px;
        height: 70px;
        border-radius: 10px;
        padding: 0;
        margin: 0;
    }

    .col-bottom .col-bottom-bottom-tai-khoan .img-user-bl img {
        width: 70px;
        height: 70px;
        border-radius: 10px;
        border: none;
        padding: 0;
        margin: 0;
    }

    .don-gia {
        font-size: 30px;
        margin: 15px 0 10px 0;
        color: #ff523b;
    }

    .add-to-cart a {
        padding: 10px 15px;
    }

    .col-bottom-left {
        margin: 25px 0 0 0;
    }
    </style>
</head>

<body>
    <?php include_once "header.php" ?>
    <main class="small-container">
        <div class="row">
            <div class="col-2-left">
                <?php foreach ($product as $key => $cursor): ?>
                <img src="<?= BASE_URL_B . $cursor['image'] ?>" class="img-fluid">
                <?php endforeach?>
            </div>
            <div class="col-2-right">
                <?php foreach ($product as $key => $cursor): ?>
                <h2><?= $cursor['name'] ?></h2>
                <?php endforeach?>
                <div class="rating">
                    <div class="rating-two two">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                        <i class="far fa-star"></i>
                    </div>
                    <div class="rating-two">
                        <?php
                            if ($so_luot_bl != 0) {
                                echo "$so_luot_bl Đánh Giá";
                            }
                            if ($so_luot_bl == 0) {
                                echo " 0 Đánh Giá";
                            }
                        ?>
                    </div>
                </div>
                <?php foreach ($product as $key => $cursor): ?>
                <span class="don-gia"><?= number_format($cursor['don_gia']) ?></span>
                <p> Thể loại:
                    <?php if ($cursor['tenloai'] == 1): ?>
                    Anime
                    <?php endif ?>
                    <?php if ($cursor['tenloai'] == 2): ?>
                    Kinh Dị
                    <?php endif ?>
                    <?php if ($cursor['tenloai'] == 3): ?>
                    Tình cảm
                    <?php endif ?>
                    <?php if ($cursor['tenloai'] == 4): ?>
                    Hài hước
                    <?php endif ?>
                    <?php if ($cursor['tenloai'] == 5): ?>
                    phiêu lưu
                    <?php endif ?>
                    <?php if ($cursor['tenloai'] == 6): ?>
                    Học đường
                    <?php endif ?>
                    <?php if ($cursor['tenloai'] == 7): ?>
                    Đời thường
                    <?php endif ?>
                    <?php if ($cursor['tenloai'] == 8): ?>
                    Hành động
                    <?php endif ?>
                    <?php if ($cursor['tenloai'] == 9): ?>
                    Viễn tưởng
                    <?php endif ?>
                    <?php if ($cursor['tenloai'] == 10): ?>
                    Văn học
                    <?php endif ?>
                    <?php if ($cursor['tenloai'] == 11): ?>
                    Trinh thám
                    <?php endif ?>
                </p>
                <p>Ngày nhập: <?= datetimeConvert($cursor['ngay_nhap']) ?></p>
                <p>Vận chuyển<span><i class="fas fa-truck-moving"></i> Miễn phí vận chuyển tất cả các loại sản
                        phẩm</span></p>
                <button>
                    <a
                        href="<?= BASE_URL_B?>site/gio-hang/gio-hang.php?&ma_hh=<?= $cursor['ma_hh'] ?>&action=thanhtoan">Mua
                        Hàng</a>
                </button>
                <button>
                    <a href="<?= BASE_URL_B?>site/gio-hang/gio-hang.php?&ma_hh=<?= $cursor['ma_hh'] ?>"><i
                            class="fas fa-cart-plus"></i> Thêm Vào Giỏ Hàng</a>
                </button>
                <?php endforeach?>
            </div>
        </div>
        <div class="col-bottom">
            <div class="col-bottom-right">
                <div class="col-bottom-top">
                    <h4>
                        <i class="fas fa-comments" aria-hidden="true"></i> Bình luận <i class="fas fa-sort-amount-down"
                            aria-hidden="true" style="color: black"></i>
                    </h4>
                    <form action="binh-luan.php?ma_hh=<?= $cursor['ma_hh'] ?>&tenloai=<?= $cursor['tenloai']?>"
                        method="POST" enctype="multipart/form-data">
                        <textarea name="noi_dung" class="comment" id="" cols="100" rows="5" padding="15px"
                            placeholder="Comment"></textarea>
                        <button type="submit" class="btnt">Lưu</button>
                    </form>
                </div>
                <div class="col-bottom-bottom">
                    <div class="col-bottom-bottom-tai-khoan">
                        <?php foreach ($binhLuan as $key => $cursor): ?>
                        <?php if ($cursor['id_hh'] == $productId): ?>
                        <div class="col-bottom-bottom-tai-khoan1">
                            <?php foreach ($taiKhoan as $key => $cur): ?>
                            <?php if ($cur['ma_kh'] == $cursor['ma_kh']): ?>
                            <buttom class="img-user-bl">
                                <img src="<?= BASE_URL_B . $cur['avatar'] ?>" alt="">
                            </buttom>
                            <?php endif?>
                            <?php endforeach?>
                        </div>
                        <div class="col-bottom-bottom-tai-khoan2">
                            <h4><?= $cursor['ma_kh'] ?></h4>
                            <p><?= datetimeConvert($cursor['ngay_bl']) ?></p>
                            <p><?= $cursor['noi_dung'] ?></p>
                        </div>
                        <?php endif?>
                        <?php endforeach?>
                    </div>
                </div>
                <?php 
                    $getProductQuery = "select * from products where tenloai = $tenloai order by rand() limit 3";
                    $suggest = dbfetchAll($getProductQuery);
                ?>
            </div>
            <div class="col-bottom-left">
                <div class="row-9">
                    <?php foreach($suggest as $key => $cursor):?>
                    <div style="text-align:center; margin: 0 0 15px 0;">
                        <div>
                            <a><img src="<?= BASE_URL_B . $cursor['image'] ?>" class="img-fluid"></a>
                        </div>
                        <div>
                            <span><?= $cursor['name']?></span><br>
                        </div>
                    </div>
                    <?php endforeach?>
                </div>
            </div>
        </div>
    </main>
    <?php include_once "footer.php" ?>
</body>

</html>