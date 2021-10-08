<?php
session_start();
require_once "../../lib/db.php";
require_once "../../lib/common.php";
checkAuths();
$id = $_GET['id'];
$sql = "select * from code where id = $id";
$code = dbfetch($sql);

// fetch => tìm ra bản ghi đầu tiên thỏa mãn câu sql => [ 'id' => xxx, 'name' => 'xxx' ]
if(!$code){
    header("location: ".BASE_URL_S."code_sale/code_sale.php?msg=Danh mục không tồn tại");
    die;
}
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
    <?php include_once "../../_share/header-admin.php" ?>
    <main class="container-fluid">
        <div class="container">
            <div class="row">
                <div class="col-6 offset-3">
                    <h3>Tạo loại hàng</h3>
                    <form action="save-fix.php?id=<?= $code['id'] ?>" method="post">
                        <div class="form-group">
                            <label for="">Mã giảm giá</label>
                            <input type="text" class="form-control" name="code_sale" value="<?= $code['code_sale']?>">
                            <?php if(isset($_GET['code_saleerr'])):?>
                            <span class="text-danger"><?= $_GET['code_saleerr'] ?></span>
                            <?php endif ?>
                        </div>
                        <div class="form-group">
                            <label for="">Ngày tháng</label>
                            <input type="date" class="form-control" name="ngay_thang" value="<?= $code['ngay_thang']?>">
                            <?php if(isset($_GET['ngay_thangerr'])):?>
                            <span class="text-danger"><?= $_GET['ngay_thangerr'] ?></span>
                            <?php endif ?>
                        </div>
                        <div class="form-group">
                            <label for="">Ngày hết hạn</label>
                            <input type="date" class="form-control" name="het_han" value="<?= $code['het_han']?>">
                            <?php if(isset($_GET['het_hanerr'])):?>
                            <span class="text-danger"><?= $_GET['het_hanerr'] ?></span>
                            <?php endif ?>
                        </div>
                        <div class="form-group">
                            <label for="">Phần trăm giảm giá</label>
                            <input type="number" class="form-control" name="percent" value="<?= $code['percent']?>">
                            <?php if(isset($_GET['percenterr'])):?>
                            <span class="text-danger"><?= $_GET['percenterr'] ?></span>
                            <?php endif ?>
                        </div>
                        <div class="form-group">
                            <label for="">Kích hoạt</label><br>
                            <label><input name="kich_hoat" value="1" <?php if($code['kich_hoat'] == 1): ?> checked
                                    <?php endif ?> type="radio">Kích hoạt</label>
                            <label><input name="kich_hoat" value="0" <?php if($code['kich_hoat'] == 0): ?> checked
                                    <?php endif ?> type="radio">Chưa kích hoạt</label>
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