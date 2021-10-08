<?php
session_start();
require_once "../../lib/db.php";
require_once "../../lib/common.php";
// lấy dữ liệu từ trên url => keyword
$keyword = isset($_GET['keyword']) ? $_GET['keyword'] : "";
// query lấy danh sách user từ db
$sql1 = "select * from products where mo_ta like '%$keyword%' or name like '%$keyword%' or theloailq like '%$keyword%' order by luot_xem desc limit 0,4";
$SanPham1 = dbfetchAll($sql1);
unset($_SESSION['carts']);
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
</style>

<body>
    <?php include_once "../../header.php" ?>
    <?php include_once "../../banner.php" ?>
    <div class="product" style="display:grid;grid-template-columns: 1fr;">
        <img id="slideshows" width=700 height=700 style="margin-left:300px;" src="../../public/uploads/chan-trai.jpg"
            alt="">
    </div>
    <script>
    var arr1 = [
        '../../public/uploads/chan-trai.jpg',
        '../../public/uploads/chan-pha.jpg',
    ];
    var index1 = 0;

    function slideshow() {
        document.getElementById("slideshows").src = arr1[index1];
        index1++;
        if (index1 == arr1.length) {
            index1 = 0;
        }
        setTimeout("slideshow()", 500);
    }
    slideshow();
    </script>
    <?php include_once "../../footer.php" ?>
</body>

</html>