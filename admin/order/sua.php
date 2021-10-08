<?php
session_start();
require_once "../../lib/db.php";
require_once "../../lib/common.php";
checkAuths();
$ten_hh = isset($_GET['ten_hh']) ? $_GET['ten_hh']: "";
$sql = "select * from cart where ten_hh = '$ten_hh' ";
$cart = dbfetch($sql);
if(!$cart){
    header("location: " . BASE_URL_1 . "?msg=đơn hàng không tồn tại");
    die;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="users/css/layout_project.css">
    <style>
    main {
        width: 1000px;
        margin: auto;
    }

    main h2 {
        text-align: center;
        margin: 25px 0 10px 0;
    }

    main form .row {
        display: grid;
        grid-template-columns: auto auto;
    }

    main form .row .col-md-6 .form-group {
        display: grid;
        grid-template-columns: 30% auto;
    }

    main form .row .col-md-6 .form-group .hdd,
    main form .row .col-md-7 .form-group .hdd {
        display: grid;
        grid-template-columns: auto auto;
        border: 1px solid gray;
        border-radius: 5px;
    }

    main form .row .col-md-6 .form-group .hdd label,
    main form .row .col-md-7 .form-group .hdd label {
        margin: 5px 0 0 0;
        padding: 0 0 0 10px;
    }

    main form .row .col-md-7 .form-group {
        display: grid;
        grid-template-columns: 30% auto;
        margin: 0 0 0 40px;
    }

    main form .row .col-md-6 .form-group label,
    main form .row .col-md-7 .form-group label {
        margin: 12px 0 5px 0;
    }

    main form .row .col-md-6 .form-group input,
    main form .row .col-md-7 .form-group input {
        margin: 5px 0 0 0;
        padding: 5px 10px;
        line-height: 18px;
        border: 1px solid gray;
        border-radius: 5px;
    }

    .align {
        text-align: center;
        margin: 20px 0 0 0;
    }

    .align button {
        padding: 10px 20px;
        border: 1px solid gray;
        border-radius: 10px;
        cursor: pointer;
        margin: 0 10px 0 0;
    }

    .align button:hover {
        padding: 10px 20px;
        border: 1px solid #309a13;
        background: #309a13;
        color: #fff;
    }

    .align a {
        padding: 10px 20px;
        border: 1px solid gray;
        border-radius: 10px;
        cursor: pointer;
        margin: 0 10px 0 0;
        color: #222;
        text-decoration: none;
    }

    .align a:hover {
        padding: 10px 20px;
        border: 1px solid #ff523b;
        background: #ff523b;
        color: #fff;
    }
    </style>
</head>

<body>
    <?php include_once "../../_share/header-admin.php" ?>
    <main>
        <!-- Form tạo mới tk -->
        <h2>Chỉnh sửa tài khoản</h2>
        <form action="<?= BASE_URL_S ?>order/luu-sua.php?ten_hh=<?=$cart['ten_hh']?>&ma_hd=<?= $cart['ma_hd']?>"
            method="POST" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Số lượng</label>
                        <input type="number" name="so_luong" value="<?= $cart['so_luong'] ?>" class="form-control">
                        <?php if(isset($_GET['so_luongerr'])):?>
                        <span class="text-danger"><?= $_GET['so_luongerr'] ?></span>
                        <?php endif ?>
                    </div>
                </div>
            </div>
            <div class="align">
                <button type="submit" class="btn btn-sm btn-info">Lưu</button>
                <a href="<?= BASE_URL_6 ?>" class="btn btn-sm btn-danger">Hủy</a>
            </div>
        </form>
    </main>
</body>

</html>