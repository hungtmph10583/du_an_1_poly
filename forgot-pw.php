<?php
session_start();
require_once "./lib/db.php";
require_once "./lib/common.php";
// lấy dữ liệu từ trên url => keyword
$keyword = isset($_GET['keyword']) ? $_GET['keyword'] : "";
// query lấy danh sách user từ db
$sql1 = "select * from products where mo_ta like '%$keyword%' or name like '%$keyword%' or theloailq like '%$keyword%' order by luot_xem desc limit 0,4";
$SanPham1 = dbfetchAll($sql1);
?>
<!DOCTYPE html>
<html lang="en">
<style>
.cont {
    margin: auto;
    height: 500px;
    width: 1000px;
}

.f12 {
    width: 220px;
    height: 300px;
    float: left;
    border: 1px solid black;
    margin-top: 10px;
    margin-bottom: 20px;
    margin-left: 13px;
    margin-right: 12px;
    text-align: center;
    background-color: #f5f5f7;
    border-radius: 10px;
}

.f12:hover {
    border: 1px solid red;
    box-shadow: 3px 3px 5px 0px #666;
}

.f12>a>img {
    width: 80%;
    height: 90%;
    margin-top: 10px;
    padding-top: 10px;
    border-radius: 10px;
}

.f12>h5 {
    position: relative;
    margin-top: -80px;
    background-color: #f5f5f7;
    padding-top: 5px;
    margin-right: 15px;
    padding-bottom: 5px;
    margin-left: 15px;
    color: black;
    border-radius: 10px;
}

.f12>button {
    padding-top: 5px;
    padding-right: 8px;
    padding-bottom: 5px;
    padding-left: 8px;
    background-color: #309a13;
    border: 1px solid black;
    color: white;
    border-radius: 5px;
}

.f12>button:hover {
    border: 1px solid lightgreen;
    color: #f1f40a;
    box-shadow: 3px 3px 5px 0px #666;
}



.f12>h6 {
    padding-top: 5px;
    padding-right: 8px;
    padding-bottom: 5px;
    padding-left: 8px;
    background-color: #309a13;
    border: 1px solid black;
    color: white;
    border-radius: 5px;
}

.f12>h6 {
    border: 1px solid lightgreen;
    color: #f1f40a;
    box-shadow: 3px 3px 5px 0px #666;
}

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
    grid-template-columns: 40% auto;
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
    margin: 20px 0 20px 0;
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

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang Chủ</title>
</head>

<body>
    <?php include_once "header.php" ?>
    <?php include_once "banner.php" ?>
    <main>
        <h2>Nhập thông tin</h2>
        <form action="http://localhost/php1/project_sample_1/post-forgot.php" method="POST"
            enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Mã khách hàng</label>
                        <input type="text" name="ma_kh" class="form-control"><br>
                        <?php if(isset($_GET['ma_kherr'])):?>
                        <span class="text-danger" style="color:red;"><?= $_GET['ma_kherr'] ?></span>
                        <?php endif ?>
                    </div>
                    <div class="form-group">
                        <label for="">Họ và tên</label>
                        <input type="text" name="name" class="form-control"><br>
                        <?php if(isset($_GET['nameerr'])):?>
                        <span class="text-danger" style="color:red;"><?= $_GET['nameerr'] ?></span>
                        <?php endif ?>
                    </div>
                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="text" name="email" class="form-control"><br>
                        <?php if(isset($_GET['emailerr'])):?>
                        <span class="text-danger" style="color:red;"><?= $_GET['emailerr'] ?></span>
                        <?php endif ?>
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="form-group">
                        <label for="">Số điện thoại</label>
                        <input type="text" name="phone_number" class="form-control"><br>
                        <?php if(isset($_GET['phone_numbererr'])):?>
                        <span class="text-danger" style="color:red;"><?= $_GET['phone_numbererr'] ?></span>
                        <?php endif ?>
                    </div>
                    <div class="form-group">
                        <label for="">Ngày sinh</label>
                        <input type="text" name="ngay_sinh" class="form-control"><br>
                        <?php if(isset($_GET['ngay_sinherr'])):?>
                        <span class="text-danger" style="color:red;"><?= $_GET['ngay_sinherr'] ?></span>
                        <?php endif ?>
                    </div>
                    <div class="form-group">
                        <label for="">Câu hỏi kiểm tra : Họ và Tên của Bố hoặc mẹ bạn là ?</label>
                        <input type="text" name="cau_hoi" class="form-control"><br>
                        <?php if(isset($_GET['cau_hoierr'])):?>
                        <span class="text-danger" style="color:red;"><?= $_GET['cau_hoierr'] ?></span>
                        <?php endif ?>
                    </div>
                </div>
            </div>
            <div class="align">
                <button type="submit" class="btn btn-sm btn-info">Lưu</button>
                <a href="<?= BASE_URL_C ?>" class="btn btn-sm btn-danger">Hủy</a>
            </div>
        </form>
    </main>
    <?php include_once "footer.php" ?>
</body>

</html>