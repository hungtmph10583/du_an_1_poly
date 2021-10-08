<h1 style="text-align:center;">Giảm giá</h1>
<div class="cont">
    <?php
    $sql1 = "select * from products where sale > 0";
    $SanPham5 = dbfetchAll($sql1);?>
    <?php foreach ($SanPham5 as $key => $cursor): ?>
    <div class="f12">
        <?php if($cursor['sale'] > 0):?>
        <span class="sale">
            <?= $cursor['sale'] ?>%
        </span>
        <?php endif?>
        <a href="<?= BASE_URL_B?>chi-tiet.php?ma_hh=<?= $cursor['ma_hh'] ?>&tenloai=<?= $cursor['tenloai']?>">
            <img src="<?= BASE_URL_B . $cursor['image'] ?>" class="img-fluid">
        </a>
        <div class="noi">
            <button class="gio_hang">
                <a href="<?= BASE_URL_B?>site/gio-hang/gio-hang.php?&ma_hh=<?= $cursor['ma_hh'] ?>">
                    <i class="fas fa-shopping-cart"></i> Thêm Giỏ Hàng
                </a>
            </button>
        </div>
        <div class="ttgt">
            <h4><?=$cursor['name'] ?></h4>
            <div class="rating">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star-half-alt"></i>
                <i class="far fa-star"></i>
            </div>
            <p><?= '$' . number_format( $cursor['don_gia']) ?></p>
        </div>


    </div>
    <?php endforeach?>
</div>