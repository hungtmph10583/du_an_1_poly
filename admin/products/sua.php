<?php
session_start();
require_once "../../lib/db.php";
require_once "../../lib/common.php";
checkAuths();
// lấy id từ đường dẫn
$id = $_GET['ma_hh'];
// dựa vào id để truy vấn ra dữ liệu của sản phẩm
$sql = "select * from products where ma_hh = $id";
$products = dbfetch($sql);
if(!$products){
    header("location: ".BASE_URL_5."?msg=Hàng hóa không tồn tại");
    die;
}
// lấy danh sách tất cả các danh mục
$sql = "select * from sectors";
$sectors = dbfetchAll($sql);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PT15317-web Assignment</title>
    <?php include_once "../../_share/style.php" ?>
</head>

<body>
    <?php include_once "../../_share/header-admin.php" ?>
    <main class="container-fluid">
        <!-- Form tạo mới tk -->
        <h3>Chỉnh sửa hàng hóa</h3>
        <form action="<?= BASE_URL_S . "products/luu-sua.php?ma_hh=" . $products['ma_hh'] ?>" method="POST"
            enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Tên hàng hóa</label>
                        <input type="text" name="name" value="<?= $products['name'] ?>" class="form-control">
                        <?php if(isset($_GET['nameerr'])):?>
                        <span class="text-danger"><?= $_GET['nameerr'] ?></span>
                        <?php endif ?>
                    </div>
                    <div class="form-group">
                        <label for="">Đơn giá</label>
                        <input type="number" name="don_gia" value="<?= $products['don_gia'] ?>" class="form-control">
                        <?php if(isset($_GET['don_giaerr'])):?>
                        <span class="text-danger"><?= $_GET['don_giaerr'] ?></span>
                        <?php endif ?>
                    </div>
                    <div class="form-group">
                        <label for="">Sale</label>
                        <input type="text" name="sale" value="<?= $products['sale'] ?>" class="form-control">
                        <?php if(isset($_GET['saleerr'])):?>
                        <span class="text-danger"><?= $_GET['saleerr'] ?></span>
                        <?php endif ?>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="row-1">
                    <div class="col-4 offset-4">
                        <img width=70 src="<?= BASE_URL_B . $products['image'] ?>" class="img-fluid">
                    </div>
                </div>
                <div class="form-group">
                    <label for="">Ảnh đại diện</label>
                    <input type="file" name="image" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Tên loại</label>
                    <select name="tenloai">
                        <?php foreach ($sectors as $c):?>
                        <option <?php if($c['ma_loai'] == $products['tenloai'] ): ?> selected <?php endif ?>
                            value="<?= $c['ma_loai'] ?>">
                            <?= $c['ten_loai']?>
                        </option>
                        <?php endforeach ?>
                        value="<?= $products['tenloai'] ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Trạng thái</label>
                    <label><input name="trang_thai" value="2" <?php if($products['trang_thai'] == 2): ?> checked
                            <?php endif ?> type="radio">Đang cập nhật</label>
                    <label><input name="trang_thai" value="1" <?php if($products['trang_thai'] == 1): ?> checked
                            <?php endif ?> type="radio">Hết hàng</label>
                    <label><input name="trang_thai" value="0" <?php if($products['trang_thai'] == 0): ?> checked
                            <?php endif ?> type="radio">Còn hàng</label>
                </div>
                <div class="form-group">
                    <label for="">Ngày nhập</label>
                    <input type="date" name="ngay_nhap" value="<?= $products['ngay_nhap'] ?>" class="form-control">
                    <?php if(isset($_GET['ngay_nhaperr'])):?>
                    <span class="text-danger"><?= $_GET['ngay_nhaperr'] ?></span>
                    <?php endif ?>
                </div>
                <div class="form-group">
                    <label for="">Lượt xem</label>
                    <input type="text" name="luot_xem" value="<?= $products['luot_xem'] ?>" readonly value="0"
                        class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label for="">Mô tả</label>
                <textarea name="mo_ta" rows="4" cols="85"><?= $products['mo_ta'] ?></textarea>
                <?php if(isset($_GET['mo_taerr'])):?>
                <span class="text-danger"><?= $_GET['mo_taerr'] ?></span>
                <?php endif ?>
            </div>
            <div class="form-group">
                <label for="">Thể loại liên quan</label>
                <textarea name="theloailq" rows="4" cols="85"><?php if($products['theloailq'] == ""){?><?php foreach ($sectors as $c) :?> <?= $c['ten_loai']?><?php endforeach ?>
                <?php }else{?><?= $products['theloailq']?><?php } ?></textarea><br>
                <?php if(isset($_GET['theloailqerr'])):?>
                <span class="text-danger"><?= $_GET['theloailqerr'] ?></span>
                <?php endif ?>
            </div>
            </div>
            <div class="d-flex justify-content-end">
                <button type="submit" class="btn btn-sm btn-info">Lưu</button>
                &nbsp;
                <a href="<?= BASE_URL_3 ?>" class="btn btn-sm btn-danger">Hủy</a>
            </div>
        </form>
    </main>
</body>

</html>