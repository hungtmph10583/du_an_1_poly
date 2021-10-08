<?php
session_start();
require_once "../../lib/db.php";
require_once "../../lib/common.php";
checkAuths();
// lấy id từ đường dẫn
$id = $_GET['id'];
// dựa vào id để truy vấn ra dữ liệu của sản phẩm
$sql = "select * from manage_img where id = $id";
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
    <title>Tạo tài khoản</title>
    <?php include_once "../../_share/style.php" ?>
</head>

<body>
    <?php include_once "../../_share/header-admin.php" ?>
    <main class="container-fluid">
        <!-- Form tạo mới tk -->
        <h3>Tạo mới tài khoản</h3>
        <form action="<?= BASE_URL_D . "save-fix.php?id=" . $products['id'] ?>" method="POST"
            enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-6">

                    <label for="">Banner1</label>
                    <div class="row-1">
                        <div class="col-4 offset-4">
                            <img src="<?= BASE_URL_B . $products['banner1'] ?>" class="img-fluid">
                        </div>
                        <div class="form-group">
                            <label for="">Ảnh đại diện</label>
                            <input type="file" name="banner1" class="form-control">
                        </div>
                    </div>

                    <label for="">Banner2</label>
                    <div class="row-1">
                        <div class="col-4 offset-4">
                            <img src="<?= BASE_URL_B . $products['banner2'] ?>" class="img-fluid">
                        </div>
                        <div class="form-group">
                            <label for="">Ảnh đại diện</label>
                            <input type="file" name="banner2" class="form-control">
                        </div>
                    </div>

                    <label for="">Banner3</label>
                    <div class="row-1">
                        <div class="col-4 offset-4">
                            <img src="<?= BASE_URL_B . $products['banner3'] ?>" class="img-fluid">
                        </div>
                        <div class="form-group">
                            <label for="">Ảnh đại diện</label>
                            <input type="file" name="banner3" class="form-control">
                        </div>
                    </div>

                    <label for="">Logo</label>
                    <div class="row-1">
                        <div class="col-4 offset-4">
                            <img src="<?= BASE_URL_B . $products['logo'] ?>" class="img-fluid">
                            <div class="form-group">
                                <label for="">Ảnh đại diện</label>
                                <input type="file" name="logo" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-sm btn-info">Lưu</button>
                    &nbsp;
                    <a href="<?= BASE_URL_12 ?>" class="btn btn-sm btn-danger">Hủy</a>
                </div>
        </form>
    </main>
</body>

</html>