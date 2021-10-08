<?php
session_start();
require_once "./lib/db.php";
require_once "./lib/common.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <style>
    * {
        box-sizing: border-box;
    }

    body {
        margin: 0;
        padding: 0;
        font-family: sans-serif;
        /* background-image: url(content/image/paris2.jpg); */
    }

    .login-box {
        width: 280px;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        color: white;
    }

    img {
        width: 100%;
        height: auto;
    }

    .login-box h1 {
        float: left;
        font-size: 40px;
        border-bottom: 6px solid #4caf50;
        margin-bottom: 50px;
        padding: 13px 0;
    }

    .login-textbox {
        width: 100%;
        overflow: hidden;
        font-size: 20px;
        padding: 8px 0;
        margin: 8px 0;
        border-bottom: 1px solid #4caf50;
    }

    .login-textbox .fa {
        width: 26px;
        float: left;
        text-align: center;
    }

    .login-textbox input {
        border: none;
        outline: none;
        background: none;
        color: white;
        font-size: 18px;
        float: left;
        margin: 0 10px;
    }

    .login-box-btn {
        width: 100%;
        background: none;
        border: 2px solid #4caf50;
        color: white;
        padding: 5px;
        font-size: 18px;
        cursor: pointer;
        margin: 12px 0;
        border-radius: 30px;
    }

    .login-box-btn:hover {
        color: #4caf50;
    }

    .login-box .login-quenmk a {
        color: white;
        text-decoration: none;
    }

    .login-box .login-quenmk a:hover {
        text-decoration: underline;
    }
    </style>
</head>

<body><img src="<?= BASE_URL_A?>paris2.jpg" alt="">
    <div class="login-box">
        <form action="post-login.php" method="post">
            <h1>Login</h1>
            <div class="login-textbox">
                <i class="fa fa-user" aria-hidden="true"></i>
                <input type="text" placeholder="Username" name="ma_kh" value="">
                <?php if(isset($_GET['ma_kherr'])):?>
                <span class="text-danger" style="color:red;"><?= $_GET['ma_kherr'] ?></span>
                <?php endif ?>
            </div>
            <div class="login-textbox">
                <i class="fa fa-lock" aria-hidden="true"></i>
                <input type="password" placeholder="Password" name="password" value="">
                <?php if(isset($_GET['passworderr'])):?>
                <span class="text-danger" style="color:red;"><?= $_GET['passworderr'] ?></span>
                <?php endif ?>
            </div>

            <input type="submit" class="login-box-btn" value="Sign in">
            <p class="login-quenmk"><a href="forgot-pw.php">Quên mật khẩu?</a></p>
            <p class="login-quenmk"><a href="<?= BASE_URL_14 ?>">Tạo
                    tài khoản?</a></p>
        </form>
    </div>
</body>

</html>