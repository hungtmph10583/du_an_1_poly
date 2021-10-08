<?php
session_start();
require_once './lib/common.php';
require_once './lib/db.php';
$ma_kh = isset($_GET['ma_kh'])?$_GET['ma_kh']: "";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lấy lại mật khẩu</title>
    <?php include_once "./_share/style.php" ?>
</head>

<body>
    <main class="container-fluid">
        <!-- Hiển thị danh sách users -->
        <div class="container"
            style="position:relative;top:50px;background-color:#ffffff;height:300px;width:400px;opacity:0.7">
            <h1 style="text-align:center;color:#02AFFA;padding-top:20px;font-weight:bold;">Lấy lại mật khẩu</h1>
            <div class="row">
                <div class="col-6 offset-3">
                    <form action="<?= BASE_URL_B ?>post-pw.php" method="post">
                        <div class="form-group">
                            <label for="">Mã khách hàng</label>
                            <input type="text" name="ma_kh" value="<?= $ma_kh?>" class="form-control">
                            <?php if(isset($_GET['ma_kherr'])):?>
                            <span class="text-danger" style="color:red;"><?= $_GET['ma_kherr'] ?></span>
                            <?php endif ?>
                        </div>
                        <div class="form-group">
                            <label for="">Mật Khẩu mới</label>
                            <input type="password" class="form-control" name="password">
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-sm btn-info">Đổi mật khẩu</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>

</body>

</html>