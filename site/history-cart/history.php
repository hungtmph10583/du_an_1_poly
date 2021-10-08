<h1 style="text-align:center;">Lịch sử mua hàng</h1>
<div class="cont2">
    <table class="table table-stripped">
        <thead>
            <th>Mã đơn hàng</th>
            <th>Yêu cầu</th>
            <th>Số điện thoại</th>
            <th>Tác vụ</th>
        </thead>
        <tbody>
            <?php 
                if(isset($_SESSION['auth']) && !empty($_SESSION['auth'])){
                    $ma_kh = $_SESSION['auth']['ma_kh'];
                    $sql = "select distinct ma_hd from cart where ma_kh = '$ma_kh'";
                    $order = dbfetchAll($sql);
                    foreach($order as $key => $cursors){
                        $ma_hd = $cursors['ma_hd'];
                        $sql = "select * from orders_products where ma_hd = '$ma_hd'";
                        $orders = dbfetchAll($sql);
                        foreach($orders as $key => $cursor){
                     ?>
            <tr>
                <td style="text-align: center; padding: 5px 0 5px 0;"><?= $cursors['ma_hd']?></td>
                <td style="text-align: center; padding: 5px 0 5px 0;"><?= $cursor['yeu_cau']?></td>
                <td style="text-align: center; padding: 5px 0 5px 0;"><?= $cursor['phone_number']?></td>
                <td style="text-align: center; padding: 5px 0 5px 0;">
                    <a style="text-decoration: none; color: #222;"
                        href="<?= BASE_URL_B?>site/history-cart/view-history.php?ma_hd=<?= $cursors['ma_hd'] ?>"
                        class="btn btn-danger btn-sm">
                        Xem chi tiết
                    </a>
                </td>
            </tr>
            <?php }} ?>
            <?php } ?>
        </tbody>
    </table>
</div>