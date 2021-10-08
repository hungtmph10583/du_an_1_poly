<header class="container-fluid" style="height:120px;">
    <nav class="navbar navbar-expand-lg navbar-light bg-light" style="height:120px;">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav" style="position:relative;left:150px;top:-20px;">
            <ul class="navbar-nav" style="width:1000px;">
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
                    <a class="nav-link" href="<?= BASE_URL_H ?>">Trang chủ</a>
                </li>
            </ul>
        </div>
        <div class="collapse navbar-collapse" id="navbarNav" style="position:relative;top:30px;right:540px;">
            <ul class="navbar-nav" style="width:380px;">
                <?php
                    if(isset($_SESSION['auth']) && !empty($_SESSION['auth'])){
                        if($_SESSION['auth']['vai_tro']>0 && $_SESSION['auth']['vai_tro']>0){?><?php
                            $ma_kh = $_SESSION['auth']['ma_kh'];
                            $sql = "select * from users where ma_kh = '$ma_kh'";
                            $products4 = dbfetchAll($sql);
                        ?>
                <?php foreach($products4 as $keys => $cursors): ?>
                <li>
                    <a href="<?= BASE_URL?>users/sua.php?ma_kh=<?= $cursors['ma_kh'] ?>" class="nav-link">
                        <img style="border-radius:50%;" width=50 height=50 src="<?= BASE_URL_B . $cursors['avatar'] ?>">
                    </a>
                </li>
                <?php endforeach ?>
                <li>
                    <a href="javascript:;" class="nav-link">
                        Hello, <?= $_SESSION['auth']['name'] ?>
                    </a>
                </li>
                <li>
                    <a class="nav-link" href="<?= BASE_URL. "doi-mk.php"?>">Đổi mk</a>
                </li>
                <li>
                    <a class="nav-link" href="<?= BASE_URL_B. "logout.php"?>">Đăng xuất</a>
                </li>
                <?php
                        }
                    }
                ?>
            </ul>
        </div>
    </nav>
</header>