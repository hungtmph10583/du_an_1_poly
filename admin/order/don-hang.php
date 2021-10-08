<?php
session_start();
require_once "../../lib/db.php";
require_once "../../lib/common.php";
checkAuths();
// lấy dữ liệu từ trên url => keyword
$keyword = isset($_GET['keyword']) ? $_GET['keyword'] : "";
$msg = isset($_GET['msg'])?$_GET['msg']:"";
// query lấy danh sách user từ db
$product = !empty($_SESSION['carts'])?$_SESSION['carts'] : [];

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách đơn hàng</title>
    <?php include_once "../../_share/style.php" ?>
</head>

<body>
    <?php include_once "../../_share/header-admin.php" ?>
    <main class="container-fluid">
        <!-- Hiển thị danh sách users -->
        <div class="container">
            <br>
            <form action="" method="get">
                <div class="form-group row">
                    <label for="" class="col-sm-1 col-form-label">Từ khóa</label>
                    <div class="col-sm-4">
                        <input type="text" name="keyword" class="form-control" value="<?= $keyword ?>">
                    </div>
                </div>
            </form>
            <span style="color:red;"><?= $msg?></span>
            <table class="table table-stripped">
                <thead>
                    <th>Mã đơn hàng</th>
                    <th>Yêu cầu</th>
                    <th>Số điện thoại</th>
                    <th>Ngày mua</th>
                    <th>Tác vụ</th>
                </thead>
                <tbody>
                    <?php 
                    $sql = "select distinct ma_hd from cart";
                    $order = dbfetchAll($sql);
                    foreach($order as $key => $cursors){
                        $ma_hd = $cursors['ma_hd'];
                        $sql = "select * from orders_products where ma_hd like '%$ma_hd%'";
                        if($keyword !== ""){
                            $sql .= " and ngay_mua like '%$keyword%' or phone_number like '%$keyword%'";
                        }
                      
                        $orders = dbfetchAll($sql);
                        foreach($orders as $key => $cursor){
                     ?>
                    <tr>
                        <td><?= $cursors['ma_hd']?></td>
                        <td><?= $cursor['yeu_cau']?></td>
                        <td><?= $cursor['phone_number']?></td>
                        <td><?= $cursor['ngay_mua']?></td>
                        <td><a href="<?= BASE_URL_B?>admin/order/xem-chi-tiet.php?ma_hd=<?= $cursors['ma_hd'] ?>"
                                class="btn btn-danger btn-sm">
                                Xem chi tiết
                            </a>
                            <a onclick="return confirm('bạn có chắc muốn xóa sản phẩm này?')"
                                href="<?= BASE_URL_S?>order/xoa.php?action=delete&ma_hd=<?= $cursor['ma_hd']?>"
                                class="btn btn-danger btn-sm">
                                Xóa
                            </a>
                        </td>
                    </tr>
                    <?php }} ?>
                </tbody>
            </table>
        </div>
    </main>
</body>

</html>