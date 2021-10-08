<?php
session_start();
require_once "../../lib/db.php";
require_once "../../lib/common.php";
checkAuths();
$userId = isset($_GET['ma_kh']) ? $_GET['ma_kh']: "";
$sql = "select * from users where ma_kh = '$userId' ";
$user = dbfetch($sql);
if(!$user){
    header("location: " . BASE_URL_1 . "?msg=User không tồn tại");
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
        main{
            width: 1000px;
            margin: auto;
        }
        main h2{
            text-align: center;
            margin: 25px 0 10px 0;
        }
        main form .row{
            display: grid;
            grid-template-columns: auto auto;   
        }
        main form .row .col-md-6 .form-group{
            display: grid;
            grid-template-columns: 30% auto;   
        }

        main form .row .col-md-6 .form-group .hdd,
        main form .row .col-md-7 .form-group .hdd{
            display: grid;
            grid-template-columns: auto auto; 
            border: 1px solid gray;
            border-radius: 5px;
        }

        main form .row .col-md-6 .form-group .hdd label,
        main form .row .col-md-7 .form-group .hdd label{
            margin: 5px 0 0 0;
            padding: 0 0 0 10px;
        }

        main form .row .col-md-7 .form-group{
            display: grid;
            grid-template-columns: 30% auto; 
            margin: 0 0 0 40px;  
        }

        main form .row .col-md-6 .form-group label,
        main form .row .col-md-7 .form-group label{
            margin: 12px 0 5px 0;
        }

        main form .row .col-md-6 .form-group input,
        main form .row .col-md-7 .form-group input{
            margin: 5px 0 0 0;
            padding: 5px 10px;
            line-height: 18px;
            border: 1px solid gray;
            border-radius: 5px;
        }
        .align{
            text-align: center;
            margin: 20px 0 0 0;
        }
        .align button{
            padding: 10px 20px;
            border: 1px solid gray;
            border-radius: 10px;
            cursor: pointer;
            margin: 0 10px 0 0;
        }
        .align button:hover{
            padding: 10px 20px;
            border: 1px solid #309a13;
            background: #309a13;
            color: #fff;
        }
        .align a{
            padding: 10px 20px;
            border: 1px solid gray;
            border-radius: 10px;
            cursor: pointer;
            margin: 0 10px 0 0;
            color: #222;
            text-decoration: none;
        }
        .align a:hover{
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
        <form action="<?= BASE_URL ?>luu-sua.php?ma_kh=<?=$user['ma_kh']?>" method="POST" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Mã khách hàng</label>
                        <input type="text" name="ma_kh" value="<?= $user['ma_kh'] ?>" class="form-control">
                        <?php if(isset($_GET['ma_kherr'])):?>
                        <span class="text-danger"><?= $_GET['ma_kherr'] ?></span>
                        <?php endif ?>
                    </div><br>
                    <div class="form-group">
                        <label for="">Họ và tên</label>
                        <input type="text" name="name" value="<?= $user['name'] ?>" class="form-control">
                        <?php if(isset($_GET['nameerr'])):?>
                        <span class="text-danger"><?= $_GET['nameerr'] ?></span>
                        <?php endif ?>
                    </div><br>
                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="text" name="email" value="<?= $user['email'] ?>" class="form-control">
                        <?php if(isset($_GET['emailerr'])):?>
                        <span class="text-danger"><?= $_GET['emailerr'] ?></span>
                        <?php endif ?>
                    </div><br>
                    <div class="form-group">
                        <label for="">Kích hoạt</label>
                        <div class="hdd">
                        <label><input name="kich_hoat" value="1" <?php if($user['kich_hoat'] == 1): ?> checked
                                <?php endif ?> type="radio">Kích hoạt</label>
                        <label><input name="kich_hoat" value="0" <?php if($user['kich_hoat'] == 0): ?> checked
                                <?php endif ?> type="radio">Chưa kích hoạt</label>
                        </div>
                        
                    </div>

                    <div class="col-md">
                        <div class="row-1">
                            <div class="col-4 offset-4">
                                <img width=70 src="<?= BASE_URL_B . $user['avatar'] ?>" class="img-fluid">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">Ảnh đại diện</label>
                            <input type="file" name="avatar" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="form-group">
                        <label for="">Vai trò</label>
                        <div class="hdd">
                            <label><input name="vai_tro" value="1" <?php if($user['vai_tro'] == 1): ?> checked
                                <?php endif ?> type="radio">Nhân viên</label>
                            <label><input name="vai_tro" value="0" <?php if($user['vai_tro'] == 0): ?> checked
                                <?php endif ?> type="radio">Khách hàng</label>
                        </div>
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="">Số điện thoại</label>
                        <input type="number" name="phone_number" value="<?= $user['phone_number'] ?>"
                            class="form-control"><br>
                        <?php if(isset($_GET['phone_numbererr'])):?>
                        <span cl><?= $_GET['phone_numbererr'] ?></span>
                        <?php endif ?>
                    </div>
                    <div class="form-group">
                        <label for="">Ngày sinh</label>
                        <input type="text" name="ngay_sinh" value="<?= $user['ngay_sinh'] ?>" class="form-control"><br>
                        <?php if(isset($_GET['ngay_sinherr'])):?>
                        <span class="text-danger" ><?= $_GET['ngay_sinherr'] ?></span>
                        <?php endif ?>
                    </div>
                    <div class="form-group">
                        <label for="">Câu hỏi kiểm tra : Họ và Tên của Bố hoặc mẹ bạn là ?</label>
                        <input type="text" name="cau_hoi" value="<?= $user['cau_hoi']?>" class="form-control"><br>
                        <?php if(isset($_GET['cau_hoierr'])):?>
                        <span class="text-danger" style="color:red;"><?= $_GET['cau_hoierr'] ?></span>
                        <?php endif ?>
                    </div>
                </div>
            </div>
            <div class="align" >
                <button type="submit" class="btn btn-sm btn-info" >Lưu</button>
                <a href="<?= BASE_URL_1 ?>" class="btn btn-sm btn-danger">Hủy</a>
            </div>
        </form>
    </main>
</body>

</html>