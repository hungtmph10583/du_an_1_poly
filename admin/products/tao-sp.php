<?php
session_start();
require_once "../../lib/db.php";
require_once "../../lib/common.php";
checkAuths();
$sql = "select * from sectors";
$sectors = dbfetchAll($sql);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PT15317-web Assignment</title>
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
        grid-template-columns: 27% auto;
    }

    main form .row .col-md-6 .form-group .hdd,
    main form .row .col-md-7 .form-group .hdd {
        display: grid;
        grid-template-columns: auto auto auto;
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
    main form .row .col-md-7 .form-group input,
    main form .row .col-md-7 .form-group select,
    main form .row .col-md-7 .form-group textarea,
    main form .row .col-md-6 .form-group textarea {
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
    <main class="container-fluid">
        <!-- Form t???o m???i tk -->
        <h2>T???o m???i s???n ph???m</h2>
        <form action="<?= BASE_URL_S ?>products/luu-tao.php" method="POST" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">T??n H??ng H??a</label>
                        <input type="text" name="name" class="form-control" placeholder="T??n H??ng H??a *">
                        <?php if(isset($_GET['nameerr'])):?>
                        <span class="text-danger"><?= $_GET['nameerr'] ?></span>
                        <?php endif ?>
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="">????n Gi??</label>
                        <input type="number" name="don_gia" class="form-control" placeholder="????n Gi?? *">
                        <?php if(isset($_GET['don_giaerr'])):?>
                        <span class="text-danger"><?= $_GET['don_giaerr'] ?></span>
                        <?php endif ?>
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="">Sale</label>
                        <input type="text" name="sale" class="form-control" placeholder="Gi???m Gi?? *">
                        <?php if(isset($_GET['saleerr'])):?>
                        <span class="text-danger"><?= $_GET['saleerr'] ?></span>
                        <?php endif ?>
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="">L?????t xem</label>
                        <input type="text" name="luot_xem" readonly value="0" class="form-control">
                    </div><br>
                    <div class="form-group">
                        <label for="">M?? T???</label>
                        <textarea name="mo_ta" rows="4" cols="85" placeholder="M?? T??? *"></textarea><br>
                        <?php if(isset($_GET['mo_taerr'])):?>
                        <span class="text-danger"><?= $_GET['mo_taerr'] ?></span>
                        <?php endif ?>
                    </div>
                </div>

                <div class="col-md-7">
                    <div class="form-group">
                        <label for="">???nh s???n ph???m</label>
                        <input type="file" name="image" class="form-control">
                        <?php if(isset($_GET['imageerr'])):?>
                        <span class="text-danger"><?= $_GET['imageerr'] ?></span>
                        <?php endif ?>
                    </div><br>
                    <div class="form-group">
                        <label for="">T??n lo???i</label>
                        <select name="tenloai">
                            <?php foreach ($sectors as $c):?>
                            <option value="<?= $c['ma_loai'] ?>">
                                <?= $c['ten_loai']?>
                            </option>
                            <?php endforeach ?>
                        </select>
                    </div><br>
                    <div class="form-group">
                        <label for="">Tr???ng th??i</label>
                        <div class="hdd">
                            <label><input name="trang_thai" value="0" type="radio">C??n h??ng</label>
                            <label><input name="trang_thai" value="1" type="radio" checked>H???t h??ng</label>
                            <label><input name="trang_thai" value="2" type="radio" checked>??ang c???p nh???t</label>
                        </div>
                    </div><br>
                    <div class="form-group">
                        <label for="">Ng??y nh???p</label>
                        <input type="date" name="ngay_nhap" class="form-control">
                        <?php if(isset($_GET['ngay_nhaperr'])):?>
                        <span class="text-danger"><?= $_GET['ngay_nhaperr'] ?></span>
                        <?php endif ?>
                    </div><br>
                    <div class="form-group">
                        <label for="">Th??? lo???i li??n quan</label>
                        <textarea name="theloailq" rows="4"
                            cols="85"><?php foreach ($sectors as $c):?> <?= $c['ten_loai']?> - <?php endforeach ?></textarea><br>
                        <?php if(isset($_GET['theloailqerr'])):?>
                        <span class="text-danger"><?= $_GET['theloailqerr'] ?></span>
                        <?php endif ?>
                    </div>
                </div>
            </div>
            <div class="align">
                <button type="submit">L??u</button>
                <a href="<?= BASE_URL_3 ?>">H???y</a>
            </div>
        </form>
    </main>
</body>

</html>