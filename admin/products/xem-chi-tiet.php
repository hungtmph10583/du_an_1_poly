<?php
 session_start();
 require_once "../../lib/db.php";
 require_once "../../lib/common.php";
 checkAuths();
$ma_hh = $_GET['ma_hh'];
$sql ="select
                          p.*,
                          c.ten_loai as cate_loai
                    from products p 
                    join sectors c
                     on p.tenloai = c.ma_loai where ma_hh = $ma_hh";
$products = dbfetchAll($sql);
if(!$products){
    header("location: " . BASE_URL_5 . "?msg=Sản phẩm không tồn tại");
    die;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách bình luận</title>
    <?php include_once "../../_share/style.php" ?>
</head>

<body>
    <?php include_once "../../_share/header-admin.php" ?><br><br>
    <main class="container-fluid">
        <div class="container">
            <?php
                        foreach($products as $key => $cursors){
                            $ten_hh = $cursors['name'];
                            $sql = "select count(ten_hh) from cart where ten_hh = '$ten_hh'";
                            $cart = dbfetchColumn($sql);
                            ?>
            <div class="sp" style="display: grid;
    grid-template-columns: 1fr 1fr;">
                <div class="image"><img width=300 src="<?= BASE_URL_B . $cursors['image'] ?>" class="img-fluid"></div>
                <div class="info">
                    <h2><?= $cursors['name'] ?></h2>
                    <p>Giá : <?= number_format($cursors['don_gia'])." ".'VNĐ' ?></p>
                    <p>Sale : <?= $cursors['sale'] .'%' ?></p>
                    <?php if($cursors['sale'] > 0){ ?>
                    <p>Giá sale : <?= number_format($cursors['giam_gia'])." " . "VNĐ" ?></p>
                    <?php }?>
                    <p>Tên loại : <?= $cursors['cate_loai'] ?></p>
                    <p>Thể loại liên quan : <?= $cursors['theloailq'] ?></p>
                    <p>Trạng thái : <?php if ($cursors['trang_thai'] == 0): ?>
                        Còn hàng
                        <?php endif ?>
                        <?php if ($cursors['trang_thai'] == 1): ?>
                        Hết hàng
                        <?php endif ?>
                        <?php if ($cursors['trang_thai'] == 2): ?>
                        Đang cập nhật
                        <?php endif ?></p>
                    <p>Ngày nhập : <?= datetimeConvert($cursors['ngay_nhap'], "d/m/Y")?></p>
                    <p>Số lượt xem : <?= $cursors['luot_xem'] ?></p>
                    <p>Mô tả : <?= $cursors['mo_ta'] ?></p>
                    <p>Số lượt mua : <?= $cart ?></p>
                </div>
            </div>
            <div class="mission" style="float:right;">
                <a href="<?= BASE_URL_S?>products/sua.php?ma_hh=<?= $cursors['ma_hh'] ?>" class="btn btn-info btn-sm">
                    Sửa
                </a>
                <a onclick="return confirm('bạn có chắc muốn xóa tài khoản này?')"
                    href="<?= BASE_URL_S?>products/xoa.php?ma_hh=<?= $cursors['ma_hh'] ?>"
                    class="btn btn-danger btn-sm">
                    Xóa
                </a>
            </div>
            <?php
                        }
                ?>
        </div>
    </main>
</body>

</html>