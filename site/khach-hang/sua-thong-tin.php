<?php
session_start();
require_once "../../lib/db.php";
require_once "../../lib/common.php";
// lấy dữ liệu từ trên url => keyword
$keyword = isset($_GET['keyword']) ? $_GET['keyword'] : "";
// query lấy danh sách user từ db
$userId = isset($_GET['ma_kh']) ? $_GET['ma_kh']: "";
$sql = "select * from users where ma_kh = '$userId' ";
$user = dbfetch($sql);
if(!$user){
    header("location: " . BASE_URL_C . "?msg=User không tồn tại");
    die;
}
?>
<!DOCTYPE html>
<html lang="en">
<style type="text/css">
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Poppins', sans-serif;
}

html,
body {
    overflow-x: hidden;
    width: 100%;
}

img {
    width: 100px;
    height: auto;
}

.small-container {
    max-width: 1000px;
    margin: auto;

}

.small-container h2 {
    padding: 15px 0 20px 0;
    text-align: center;
}

.row {
    display: flex;
    align-items: center;
    display: grid;
    grid-template-columns: auto auto;
}

.col-2 {
    padding: 0 0 0 130px;
}

.col-2 a {
    text-decoration: none;
}

.col-2 h1 {
    font-size: 50px;
    line-height: 50px;
    margin: 25px 0;
}

.col-2 .form-group {
    margin: 0 0 30px 0;
}

.col-2 .form-group input {
    width: 250px;
    height: 30px;
    border-radius: 5px;
    border: 1px solid #222222;
    margin: 10px 0 0 0;
    padding: 0 0 0 5px;
}

.btnt {
    display: inline-block;
    text-decoration: none;
    background: #1b6109;
    color: #fff;
    padding: 8px 30px;
    margin: 30px 0;
    border-radius: 30px;
    transition: 0.5s;
    cursor: pointer;
}

.sub-center {
    text-align: center;
}

.sub-center button {
    border: 1px solid #1b6109;
}

.sub-center a:hover {
    background: #f12020;
    color: #fff;
}

.btn:hover {
    color: #f1f40a;

}
</style>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang Chủ</title>
</head>
<style>
.container-fluid {
    height: 830px;
}

html {
    overflow-x: hidden;
}
</style>

<body>
    <?php include_once "../../header.php" ?>
    <?php include_once "../../banner.php" ?>
    <main class="small-container">
        <h2>Chỉnh sửa tài khoản</h2>
        <form action="http://localhost/php1/project_sample_1/site/khach-hang/luu-sua.php?ma_kh=<?= $user['ma_kh']?>"
            method="POST" enctype="multipart/form-data">
            <div class="row">
                <div class="col-2">
                    <div class="form-group">
                        <label for="">Tên đăng nhập</label><br>
                        <input type="text" name="ma_kh" value="<?= $user['ma_kh'] ?>" class="form-control">
                        <?php if(isset($_GET['ma_kherr'])):?>
                        <span class="text-danger"><?= $_GET['ma_kherr'] ?></span>
                        <?php endif ?>
                    </div>
                    <!------------------Tên đăng nhập------------------>
                    <div class="form-group">
                        <label for="">Họ và tên</label><br>
                        <input type="text" name="name" value="<?= $user['name'] ?>" class="form-control">
                        <?php if(isset($_GET['nameerr'])):?>
                        <span class="text-danger"><?= $_GET['nameerr'] ?></span>
                        <?php endif ?>
                    </div>
                    <!------------------Họ tên------------------>
                    <div class="form-group">
                        <label for="">Ngày sinh</label><br>
                        <input type="text" name="ngay_sinh" value="<?= $user['ngay_sinh'] ?>" class="form-control"><br>
                        <?php if(isset($_GET['ngay_sinherr'])):?>
                        <span class="text-danger"><?= $_GET['ngay_sinherr'] ?></span>
                        <?php endif ?>
                    </div>
                    <!------------------Ngày sinh------------------>
                    <div class="form-group">
                        <input type="text" name="email" value="<?= $user['email'] ?>" class="form-control">
                        <?php if(isset($_GET['emailerr'])):?>
                        <span class="text-danger"><?= $_GET['emailerr'] ?></span>
                        <?php endif ?>
                    </div>
                    <!------------------Email------------------>
                </div>
                <div class="col-2">
                    <div class="form-group"><br>
                        <div class="col-8 offset-2">
                            <img width=70 src="<?= BASE_URL_B . $user['avatar'] ?>" class="img-fluid">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">Image</label>
                        <input type="file" name="avatar" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Số điện thoại</label><br>
                        <input type="number" name="phone_number" value="<?= $user['phone_number'] ?>"
                            class="form-control"><br>
                        <?php if(isset($_GET['phone_numbererr'])):?>
                        <span class="text-danger" style="color:red;"><?= $_GET['phone_numbererr'] ?></span>
                        <?php endif ?>
                    </div>
                    <div class="form-group">
                        <label for="">Câu hỏi kiểm tra : Họ và Tên của Bố hoặc mẹ bạn là ?</label>
                        <input type="text" name="cau_hoi" value="<?= $user['cau_hoi']?>" class="form-control"><br>
                        <?php if(isset($_GET['cau_hoierr'])):?>
                        <span class="text-danger" style="color:red;"><?= $_GET['cau_hoierr'] ?></span>
                        <?php endif ?>
                    </div>
                    <!------------------Số điện thoại------------------>

                </div>
                <!------------------class = col-md-5------------------>
            </div>
            <!------------------class = row------------------>
            <div class="sub-center">
                <button type="submit" class="btnt btn-sm btn-info">Lưu</button>
                <a href="<?= BASE_URL_1 ?>" class="btnt btn-sm btn-danger">Hủy</a>
            </div>
        </form>
    </main>
    <?php include_once "../../footer.php" ?>
</body>

</html>