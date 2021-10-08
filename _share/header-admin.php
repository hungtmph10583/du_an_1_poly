<link rel="stylesheet" href="<?= BASE_URL_B ?>_share/header-admin.css">
<!-- ================Link Css======================== -->
<script src="https://kit.fontawesome.com/a076d05399.js"></script>
<!-- ================Link W3schools-menu============= -->
<!-- <?php
$sql = "select * from sectors";
$sector = dbfetchAll($sql);
$sql1 = "select sale from products where sale > 0";
$SanPham2 = dbfetchColumn($sql1);
?> -->
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
                <a href="<?= BASE_URL_C ?>">
                    Trang Chủ
                </a>
                <p>|</p>
                <a href="<?= BASE_URL ?>">
                    Giới Thiệu
                </a>
                <p>|</p>
                <a href="<?= BASE_URL ?>">
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
    $produccts = dbfetchAll($sql);
    ?>
    <div class="header-bottom">
        <div class="header-logo">
            <?php foreach($produccts as $key => $cursor):?>
            <img src="<?= BASE_URL_B . $cursor['logo'] ?>" class="img-fluid">
            <!-- <img src="../content/image/n.jpg" alt=""> -->
            <?php endforeach?>
        </div>
        <div class="header-search">
            <!-- <form action="<?= BASE_URL_17?>">
                <input type="search" name="keyword" class="form-control" id="exampleInputEmail1" value="<?= $keyword ?>"
                    placeholder="Search projectbook.xyz">
                <button>
                    <i class="fa fa-search"></i>
                    Tìm Kiếm
                </button>
            </form> -->
        </div>
    </div>
</header>
<div class="header-navbar">
    <nav class="navbarad2">
        <ul>
            <div class="header-navbar-nav-left2">
                <li class="nav-item active">
                    <a class="nav-link" href="<?= BASE_URL_1 ?>">Tài khoản</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="<?= BASE_URL_2 ?>">Loại Hàng<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= BASE_URL_3 ?>">Hàng Hóa<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= BASE_URL_12 ?>">Quản lý hình ảnh</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= BASE_URL_13 ?>">Thống kê bình luận</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= BASE_URL_6 ?>">Đơn hàng</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= BASE_URL_7 ?>">Thống kê hàng hóa</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= BASE_URL_16 ?>">Quản lý tin tức</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= BASE_URL_S ?>code_sale/code_sale.php">Mã khuyến mãi</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= BASE_URL_H ?>?action=index">Trang chủ</a>
                </li>
            </div>
            <div class="header-navbar-nav-right-cart">
                <!-- <?php if (isset($_SESSION['auth']) && !empty($_SESSION['auth'])): ?>
                    <li>
                        <a href=""><i class="fas fa-user-circle" aria-hidden="true"></i> <?= $_SESSION['auth']['name'] ?></a>
                        <ul>
                            <li>
                                <a class="" href="<?= BASE_URL . 'doi-mk.php'?>">Đổi mật khẩu</a>
                            </li>
                            <li>
                                <a class="" href="<?= BASE_URL_B . 'logout.php'?>"><i class="fas fa-sign-out-alt"></i> Đăng xuất</a>
                            </li>
                        </ul>
                    </li>                      
                <?php endif ?> -->
            </div>
        </ul>
    </nav>
</div>