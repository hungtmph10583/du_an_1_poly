<?php
session_start();
require_once "../../lib/common.php";
require_once "../../lib/db.php";
checkAuths();
$keyword = isset($_GET['keyword']) ? $_GET['keyword'] : "";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tạo tài khoản</title>
</head>

<body>
    <?php include_once "../../_share/header-admin.php" ?>
    <main class="container-fluid">
        <!-- Form tạo mới tk -->
        <h2>Tạo mới tài khoản</h2>
        <form action="<?= BASE_URL_D?>save-push.php" method="POST" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Banner1</label>
                        <input type="file" name="banner1" class="form-control">
                        <?php if(isset($_GET['banner1err'])):?>
                        <span class="text-danger" style="color:red;"><?= $_GET['banner1err'] ?></span>
                        <?php endif ?>
                    </div>
                    <div class="form-group">
                        <label for="">Banner2</label>
                        <input type="file" name="banner2" class="form-control">
                        <?php if(isset($_GET['banner2err'])):?>
                        <span class="text-danger" style="color:red;"><?= $_GET['banner2err'] ?></span>
                        <?php endif ?>
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="form-group">
                        <label for="">Banner3</label>
                        <input type="file" name="banner3" class="form-control">
                        <?php if(isset($_GET['bannererr3'])):?>
                        <span class="text-danger" style="color:red;"><?= $_GET['bannererr3'] ?></span>
                        <?php endif ?>
                    </div>
                    <div class="form-group">
                        <label for="">logo</label>
                        <input type="file" name="logo" class="form-control">
                        <?php if(isset($_GET['logoerr'])):?>
                        <span class="text-danger" style="color:red;"><?= $_GET['logoerr'] ?></span>
                        <?php endif ?>
                    </div>
                </div>
            </div>
            <div class="align">
                <button type="submit" class="btn btn-sm btn-info">Lưu</button>
                <a href="<?= BASE_URL_12 ?>" class="btn btn-sm btn-danger">Hủy</a>
            </div>
        </form>
    </main>
</body>

</html>