<link rel="stylesheet" href="<?= BASE_URL_B ?>content/css/header.css">
<!-- ================Link Css======================== -->
<script src="https://kit.fontawesome.com/a076d05399.js"></script>
<!-- ================Link W3schools-menu============= -->
<?php
$sql = "select * from sectors where ma_loai > 1";
$sector = dbfetchAll($sql);
$sql = "select * from sectors where ma_loai = 1";
$sectors = dbfetchAll($sql);
$sql1 = "select sale from products where sale > 0";
$SanPham2 = dbfetchColumn($sql1);
?>
<style>
nav ul li a {
    text-decoration: none;
    color: #fff;
    padding: 15px 15px;
    font-size: 13px;
    line-height: 45px;
}
</style>
<header>
    <div class="header-top">
        <div class="header-top-top">
            <div class="header-top-left">
                <a href="<?= BASE_URL_H ?>">
                    Trang Chủ
                </a>
                <p>|</p>
                <a href="#">
                    Giới Thiệu
                </a>
                <p>|</p>
                <a href="#">
                    <i class="fa fa-question-circle"></i> Trợ giúp
                </a>
            </div>
            <div class="header-top-center">
                <a href="<?= BASE_URL ?>">
                    <i class="far fa-clock"></i> 07:00 - 23:00
                </a>
                <p>|</p>
                <a href="<?= BASE_URL ?>">
                    <i class="fas fa-phone-volume"></i> 0336126725
                </a>
            </div>
            <div class="header-top-right">
                <a href="<?= BASE_URL ?>"><span class="fab fa-facebook-f"></span></a>
                <a href="<?= BASE_URL ?>"><span class="fab fa-twitter"></span></a>
                <a href="<?= BASE_URL ?>"><span class="fab fa-instagram"></span></a>
                <a href="<?= BASE_URL ?>"><span class="fab fa-youtube"></span></a>
            </div>
        </div>
    </div>
    <?php
    $sql = "select * from manage_img";
    $products = dbfetchAll($sql);
    ?>
    <div class="header-bottom">
        <div class="header-logo">
            <?php foreach($products as $key => $cursor):?>
            <img src="<?= BASE_URL_B . $cursor['logo'] ?>" class="img-fluid">
            <!-- <img src="../content/image/n.jpg" alt=""> -->
            <?php endforeach?>
        </div>
        <div class="header-search">
            <form action="<?= BASE_URL_17?>">
                <input type="search" name="keyword" class="form-control" id="exampleInputEmail1" value="<?= $keyword ?>"
                    placeholder="Search projectbook.xyz">
                <button>
                    <i class="fa fa-search"></i>
                    Tìm Kiếm
                </button>
            </form>
        </div>

        <div class="header-user" style="list-style:none">
            <?php
                if(isset($_SESSION['auth']) && !empty($_SESSION['auth'])) { ?>
            <?php
                    $ma_kh = $_SESSION['auth']['ma_kh'];
                    $sql = "select * from users where ma_kh = '$ma_kh'";
                    $users = dbfetchAll($sql);
                ?>
            <?php foreach ($users as $key => $cursors) :?>
            <a href="">
                <div class="img" style="width:50px;height:50px;">
                    <li><a href="<?= BASE_URL_B?>site/khach-hang/sua-thong-tin.php?ma_kh=<?= $cursors['ma_kh'] ?>"><img
                                style="border-radius:50%;" width=50 height=50
                                src="<?= BASE_URL_B . $cursors['avatar'] ?>" class="img-fluid"></a></li>
                </div>
            </a>
            <?php endforeach ?>
            <?php }?>
        </div>
    </div>
</header>
<div class="header-navbar">
    <nav>
        <ul>
            <div class="header-navbar-nav-left">
                <li>
                    <a href="<?= BASE_URL_H ?>?action=index">Trang Chủ</a>
                </li>
                <li>
                    <?php foreach($sectors as $key => $double):?>
                    <?php $double['ma_loai'] = "Anime";
                    $action = "anime";?>
                    <a href="<?= BASE_URL_H ?>?action=<?= $action?>">Anime</a>
                    <?php endforeach?>
                    <ul>
                        <?php foreach($sector as $key => $couple):?>
                        <li><a href="<?= BASE_URL_H ?>?action=<?=$couple['ten_loai']?>"><?= $couple['ten_loai']?></a>
                        </li>
                        <?php endforeach?>
                    </ul>
                </li>
                <li>
                    <?php 
                    $sale = $SanPham2;
                    switch($sale){
                        case '10':
                            $sale = "Sách Giảm Giá";
                            $action = "giamgia";
                            break;
                            default:
                            echo 'Không tìm thấy';
                            break;
                        }?>
                    <a href="<?= BASE_URL_H ?>?sale=<?=$action?>"><?=$sale?></a>
                </li>
                <li>
                    <a href="<?= BASE_URL_H ?>?news=tintuc">Tin Tức</a>
                </li>
            </div>
            <div class="header-navbar-nav-right-cart">
                <?php if (isset($_SESSION['auth']) && !empty($_SESSION['auth'])): ?>
                <li>
                    <a href="<?= BASE_URL . 'tai-khoan.php'?>"><i class="fas fa-user-circle" aria-hidden="true"></i>
                        <?= $_SESSION['auth']['name'] ?></a>
                    <ul>
                        <?php if (($_SESSION['auth']['vai_tro'] > 0) ): ?>
                        <li>
                            <a style="text-decoration: none" class="" href="<?= BASE_URL . 'tai-khoan.php'?>">Quản
                                Trị</a>
                        </li>
                        <?php endif ?>
                        <li>
                            <a class="" href="<?= BASE_URL . 'doi-mk.php'?>">Đổi Mật Khẩu</a>
                        </li>
                        <li>
                            <a href="<?= BASE_URL_H ?>?history=lichsu">Lịch Sử Mua Hàng</a>
                        </li>
                        <li>
                            <a class="" href="<?= BASE_URL_B . 'logout.php'?>"><i class="fas fa-sign-out-alt"></i> Đăng
                                Xuất</a>
                        </li>
                    </ul>
                </li>
                <?php endif ?>
                <?php if (isset($_SESSION['auth']) == 0 ): ?>
                <li>
                    <a href="<?= BASE_URL_B?>login.php"><i class="fas fa-user-circle" aria-hidden="true"></i> Tài
                        Khoản</a>
                    <ul class="ul-userr">
                        <li>
                            <a href="<?= BASE_URL_B?>login.php"><i class="fas fa-user"></i> Đăng Nhập</a>
                        </li>
                        <li>
                            <a href="<?= BASE_URL_14?>"><i class="fas fa-user-plus"></i> Đăng Ký</a>
                        </li>
                    </ul>
                </li>
                <?php endif ?>
                <li>
                    <a href="<?= BASE_URL_B?>site/gio-hang/cart.php">Giỏ Hàng
                        <i class="fa fa-shopping-bag"></i>
                    </a>
                </li>
            </div>
        </ul>
    </nav>
</div>