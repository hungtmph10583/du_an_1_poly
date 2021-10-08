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
    <!-- <?php include_once "../../_share/style.php" ?> -->
    <style>
    main {
        width: 900px;
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
        padding: 9px 20px;
        border: 1px solid gray;
        border-radius: 10px;
        cursor: pointer;
        margin: 0 10px 0 0;
        color: #222;
        text-decoration: none;
    }

    .align a:hover {

        border: 1px solid #ff523b;
        background: #ff523b;
        color: #fff;
    }

    .text-danger {
        color: red;
    }
    </style>
</head>

<body>
    <?php include_once "../../_share/header-admin.php" ?>
    <main class="container-fluid">
        <!-- Form tạo mới tk -->
        <h2>Tạo mới tài khoản</h2>
        <form action="<?= BASE_URL?>luu-tao-tk.php" method="POST" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Mã khách hàng</label>
                        <input type="text" name="ma_kh" class="form-control"><br>
                        <?php if(isset($_GET['ma_kherr'])):?>
                        <span class="text-danger"><?= $_GET['ma_kherr'] ?></span>
                        <?php endif ?>
                    </div>
                    <div class="form-group">
                        <label for="">Họ và tên</label>
                        <input type="text" name="name" class="form-control"><br>
                        <?php if(isset($_GET['nameerr'])):?>
                        <span class="text-danger"><?= $_GET['nameerr'] ?></span>
                        <?php endif ?>
                    </div>
                    <div class="form-group hdd">
                        <label for="">Hoạt động</label>
                        <div class="hdd">
                            <label><input name="kich_hoat" value="0" type="radio">Chưa kích hoạt</label>
                            <label><input name="kich_hoat" value="1" type="radio" checked>Kích hoạt</label>
                        </div>
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="text" name="email" class="form-control"><br>
                        <?php if(isset($_GET['emailerr'])):?>
                        <span class="text-danger"><?= $_GET['emailerr'] ?></span>
                        <?php endif ?>
                    </div>
                    <div class="form-group">
                        <label for="">Mật khẩu</label>
                        <input type="password" name="password" class="form-control"><br>
                        <?php if(isset($_GET['passworderr'])):?>
                        <span class="text-danger"><?= $_GET['passworderr'] ?></span>
                        <?php endif ?>
                    </div>
                </div>

                <div class="col-md-7">
                    <div class="form-group xnmk">
                        <label for="">Xác nhận mật khẩu</label>
                        <input type="password" name="cfpassword" class="form-control">
                        <?php if(isset($_GET['cfpassworderr'])):?>
                        <span class="text-danger"><?= $_GET['cfpassworderr'] ?></span>
                        <?php endif ?>
                    </div>
                    <br>
                    <div class="form-group add">
                        <label for="">Ảnh đại diện</label>
                        <input type="file" name="avatar" class="form-control">
                        <?php if(isset($_GET['avatarerr'])):?>
                        <span class="text-danger"><?= $_GET['avatarerr'] ?></span>
                        <?php endif ?>
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="">Vai trò</label>
                        <div class="hdd">
                            <label><input name="vai_tro" value="1" type="radio" checked>Nhân viên</label>
                            <label><input name="vai_tro" value="0" type="radio">Khách hàng</label>
                        </div>
                    </div><br>
                    <div class="form-group">
                        <label for="">Số điện thoại</label>
                        <input type="text" name="phone_number" class="form-control"><br>
                        <?php if(isset($_GET['phone_numbererr'])):?>
                        <span class="text-danger"><?= $_GET['phone_numbererr'] ?></span>
                        <?php endif ?>
                    </div>
                    <div class="form-group">
                        <label for="">Ngày sinh</label>
                        <input type="text" name="ngay_sinh" class="form-control"><br>
                        <?php if(isset($_GET['ngay_sinherr'])):?>
                        <span class="text-danger"><?= $_GET['ngay_sinherr'] ?></span>
                        <?php endif ?>
                    </div>
                </div>
            </div>
            <div class="align">
                <button type="submit" class="btn btn-sm btn-info">Lưu</button>
                <a href="<?= BASE_URL_1 ?>" class="btn btn-sm btn-danger">Hủy</a>
            </div>
        </form>
    </main>
</body>

</html>