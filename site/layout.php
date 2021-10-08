<?php
session_start();
require_once "./../lib/db.php";
require_once "./../lib/common.php";
// lấy dữ liệu từ trên url => keyword
$keyword = isset($_GET['keyword']) ? $_GET['keyword'] : "";
// query lấy danh sách user từ db
?>
<!DOCTYPE html>
<html lang="en">
<style>
.text-danger {
    color: red;
}

html,
body {
    overflow-x: hidden;
    width: 100%;
}

.cont {

    width: 1000px;
    margin: auto;
    margin-top: 15px;
    margin-bottom: 30px;
    display: grid;
    grid-template-columns: auto auto auto auto;
}

.cont2 {
    width: 800px;
    margin: auto;
    margin-top: 15px;
    margin-bottom: 30px;
    display: grid;
    grid-template-columns: auto;
}

.f12 {
    position: relative;
    width: 230px;
    height: 450px;
    margin: 0 10px 40px 10px;
}

/* .f12:hover{
            box-shadow: 3px 3px 5px 0px #666;
        } */

.f12 a img {
    width: 100%;
    height: auto;
    margin: 0;
    padding: 0;
}

.f12 h4 {
    width: 100%;
    margin: 2px 0 2px 15px;
}

.f12 .rating {
    color: #ff523b;
    margin: 2px 0 2px 15px;
}

.f12 p {
    margin: 2px 0 2px 15px;
}


.f12 button {
    /* position: absolute;*/
    /* position: relative; */
    padding: 5px 10px 5px 10px;
    background-color: #309a13;
    border: 1px solid #309a13;
    color: white;
    border-radius: 5px;
    cursor: pointer;
    margin: 2px 0 2px 15px;
    /* display: none; */
}

.f12 button:hover {
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

.noi {
    position: absolute;
    top: 80%;
    width: 100%;
    /* left: 25%; */
    /* display: none; */
    opacity: 0;
    visibility: hidden;
    transition: top .4s;
}

.noi .gio_hang {
    width: 100%;
    margin: 0;
    padding: 10px auto;
}

.noi .gio_hang a {
    line-height: 30px;
    text-decoration: none;
    color: #fff;
}

.f12:hover>.noi {
    /* display: block; */
    top: 60%;
    opacity: 1;
    visibility: visible;
}

.ttgt {
    position: absolute;
    top: 100%;
    opacity: 0;
    visibility: hidden;
    transition: top .4s;
}

.ttgt h4 {
    width: 95%;
}

.f12:hover>.ttgt {
    /* display: block; */
    top: 80%;
    opacity: 1;
    visibility: visible;
}
</style>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang Chủ</title>
</head>
<style>
html {
    overflow-x: hidden;
}

@font-face {
    font-family: huyquoc;
    src: url(font/OpenSans_BoldItalic.ttf);
}

.sale {
    position: absolute;
    margin: 5px 0 0 170px;
    width: 50px;
    height: 50px;
    text-align: center;
    padding: 1px 6px 1px 6px;
    cursor: pointer;
    font-size: 20px;
    font-weight: bold;
    color: #fff;
    background: #e11b1e;
    border: solid 1px #e11b1e;
    border-radius: 100px;
    line-height: 40px;
    font-family: huyquoc
}
</style>

<body>
    <?php include_once "./../header.php" ?>
    <?php include_once "./../banner.php" ?>
    <?php $action = !empty($_GET['action'])?$_GET['action']:"index";
          $sale = !empty($_GET['sale'])?$_GET['sale']:"sale";
          $history = !empty($_GET['history'])?$_GET['history']:"lichsu";
          $news = !empty($_GET['news'])?$_GET['news']:"tintuc";
          if(isset($_GET['action'])){
            switch($action){
                case "index" :
                    include_once('../index.php');
                    break;
                case "$action" :
                    include_once('./the-loai/the-loai.php');
                    break;
                default:
                    echo 'Không tìm thấy';
                    break;
                }
          }elseif(isset($_GET['sale'])){
              if($sale == "giamgia"){
                include_once('../site/giam-gia/giam-gia.php');
              }
          }elseif (isset($_GET['history'])){
              if($history == "lichsu"){
                include_once('../site/history-cart/history.php');
              }
          }elseif (isset($_GET['news'])) {
              if($news == "tintuc"){
                include_once('../site/tin-tuc/tin-tuc.php');
              }
          }
    ?>
    <?php include_once "./../footer.php" ?>
</body>

</html>