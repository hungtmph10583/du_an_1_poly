<?php
session_start();
require_once "../../lib/db.php";
require_once "../../lib/common.php";
checkAuths();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách loại hàng</title>
    <?php include_once "../../_share/style.php" ?>
</head>

<body>
    <?php include_once "../../_share/header.php" ?>
    <main class="container-fluid">
        <div class="container">
            <div class="row">
                <div class="col-6 offset-3">
                    <h3>Tạo loại hàng</h3>
                    <form action="save-push.php" method="post">
                        <div class="form-group">
                            <label for="">Mã giảm giá</label>
                            <input type="text" class="form-control" name="code_sale">
                            <?php if(isset($_GET['code_saleerr'])):?>
                            <span class="text-danger"><?= $_GET['code_saleerr'] ?></span>
                            <?php endif ?>
                        </div>
                        <div class="form-group">
                            <label for="">Ngày bắt đầu</label>
                            <input type="date" class="form-control" name="ngay_thang">
                            <?php if(isset($_GET['ngay_thangerr'])):?>
                            <span class="text-danger"><?= $_GET['ngay_thangerr'] ?></span>
                            <?php endif ?>
                        </div>
                        <div class="form-group">
                            <label for="">Ngày hết hạn</label>
                            <input type="date" class="form-control" name="het_han">
                            <?php if(isset($_GET['het_hanerr'])):?>
                            <span class="text-danger"><?= $_GET['het_hanerr'] ?></span>
                            <?php endif ?>
                        </div>
                        <div class="form-group">
                            <label for="">Phần trăm giảm giá</label>
                            <input type="number" class="form-control" name="percent">
                            <?php if(isset($_GET['percenterr'])):?>
                            <span class="text-danger"><?= $_GET['percenterr'] ?></span>
                            <?php endif ?>
                        </div>
                        <div class="form-group" style=" margin-top: 10px;">
                            <label for="">Hoạt động</label><br>
                            <label><input style="width:10px;height:auto;" name="status" value="0" type="radio">Chưa
                                kích hoạt</label>
                            <label><input style="width:10px;height:auto;" name="status" value="1" type="radio"
                                    checked>Kích hoạt</label>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-sm btn-info">Lưu</button>
                            <a href="<?= BASE_URL_S ?>code_sale/code_sale.php" class="btn btn-sm btn-danger">Hủy</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
</body>

</html>