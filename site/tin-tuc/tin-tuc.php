<?php
// lấy dữ liệu từ trên url => keyword
$keyword = isset($_GET['keyword']) ? $_GET['keyword'] : "";
// query lấy danh sách user từ db
$sql1 = "select * from library";
$SanPham1 = dbfetchAll($sql1);
?>
<!DOCTYPE html>
<html lang="en">
<style>
.main-tintuc {
    margin: auto;
    width: 800px;
    position: relative;
}

.main-tintuc h1 {
    text-align: center;
    margin: 0 0 17px 0;
}

.cont-tintuc {
    display: grid;
    grid-template-columns: 30% 70%;
}

.cont-tintuc-left {
    width: 100%;
    height: auto;
    margin: 0 0 17px 0;
}

.cont-tintuc-left a img {
    width: 100%;
    height: auto;
}

.cont-tintuc-right {
    padding: 0 0 0 15px;
    margin: 0 0 17px 0;
}

.cont-tintuc-right a {
    text-decoration: none;
    color: #222;
}
</style>
<main class="main-tintuc">
    <h1>Tin tức</h1>
    <div class="cont-tintuc">
        <?php foreach ($SanPham1 as $key => $cursor): ?>
        <div class="cont-tintuc-left">
            <a href="./tin-tuc/chi-tiet-tin-tuc.php?id=<?= $cursor['id']?>">
                <img src="<?= BASE_URL_B . $cursor['image'] ?>" class="img-fluid">
            </a>
        </div>
        <div class="cont-tintuc-right">
            <a href="./tin-tuc/chi-tiet-tin-tuc.php?id=<?= $cursor['id']?>">
                <h3><?=$cursor['chu_de'] ?></h3>
            </a><br>
        </div>
        <?php endforeach?>
    </div>

</main>