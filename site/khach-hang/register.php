<?php
session_start();
require_once "../../lib/db.php";
require_once "../../lib/common.php";
// lấy dữ liệu từ trên url => keyword
$keyword = isset($_GET['keyword']) ? $_GET['keyword'] : "";
// query lấy danh sách user từ db
$sql1 = "select * from products where mo_ta like '%$keyword%' or name like '%$keyword%' or theloailq like '%$keyword%' order by luot_xem desc limit 0,4";

$SanPham1 = dbfetchAll($sql1);
?>
<!DOCTYPE html>
<html lang="en">
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
    grid-template-columns: 47% 53%;
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

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang Chủ</title>
</head>

<body>
    <?php include_once "../../header.php" ?>
    <?php include_once "../../banner.php" ?>
    <main>
        <h2> Tạo mới tài khoản</h2>
        <form action="http://localhost/php1/project_sample_1/site/khach-hang/luu-tao.php" method="POST"
            enctype="multipart/form-data" style="height:650px;">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group" style=" margin-top: 10px;">
                        <label for="">Mã khách hàng</label>
                        <input type="text" name="ma_kh" class="form-control"><br>
                        <?php if(isset($_GET['ma_kherr'])):?>
                        <span class="text-danger" style="color:red;"><?= $_GET['ma_kherr'] ?></span>
                        <?php endif ?>
                    </div>
                    <div class="form-group" style=" margin-top: 10px;">
                        <label for="">Họ và tên</label>
                        <input type="text" name="name" class="form-control"><br>
                        <?php if(isset($_GET['nameerr'])):?>
                        <span class="text-danger" style="color:red;"><?= $_GET['nameerr'] ?></span>
                        <?php endif ?>
                    </div>
                    <div class="form-group" style=" margin-top: 10px;">
                        <label for="">Email</label>
                        <input type="text" name="email" class="form-control"><br>
                        <?php if(isset($_GET['emailerr'])):?>
                        <span class="text-danger" style="color:red;"><?= $_GET['emailerr'] ?></span>
                        <?php endif ?>
                    </div>
                    <div class="form-group" style=" margin-top: 10px;">
                        <label for="">Mật khẩu</label>
                        <input type="password" name="password" class="form-control"><br>
                        <?php if(isset($_GET['passworderr'])):?>
                        <span class="text-danger" style="color:red;"><?= $_GET['passworderr'] ?></span>
                        <?php endif ?>
                    </div>
                    <div class="form-group" style=" margin-top: 10px;">
                        <label for="">Xác nhận mật khẩu</label>
                        <input type="password" name="cfpassword" class="form-control">
                        <?php if(isset($_GET['cfpassworderr'])):?>
                        <span class="text-danger" style="color:red;"><?= $_GET['cfpassworderr'] ?></span>
                        <?php endif ?>
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="form-group">
                        <label for="">Ảnh đại diện</label>
                        <input type="file" name="avatar" class="form-control"><br>
                        <?php if(isset($_GET['avatarerr'])):?>
                        <span class="text-danger" style="color:red;"><?= $_GET['avatarerr'] ?></span>
                        <?php endif ?>
                    </div>
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
                <button type="submit">Lưu</button>
                <a href="<?= BASE_URL_1 ?>">Hủy</a>
            </div>
        </form>
    </main>
    <?php include_once "../../footer.php" ?>
</body>

</html>