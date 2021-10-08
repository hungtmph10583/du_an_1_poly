<?php
session_start();
require_once "../../lib/db.php";
require_once "../../lib/common.php";
checkAuths();
// lấy dữ liệu từ trên url => keyword
$keyword = isset($_GET['keyword']) ? $_GET['keyword'] : "";
$msg = isset($_GET['msg'])?$_GET['msg']:"";
$id = isset($_GET['ma_hd'])?$_GET['ma_hd']:"";

$getOrderQuery = "select * from cart where ma_hd = '$id'";

if($keyword !== ""){
    $getOrderQuery .= " where ten_hh like '%$keyword%' ";
}
$orders = dbfetchAll($getOrderQuery);
$getOrdersQuery = "select sum(gia*so_luong) from cart where ma_hd = '$id'";
$order = dbfetchColumn($getOrdersQuery);
$sql = "select * from code where kich_hoat = 1";
$code = dbfetch($sql);
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
            <h1 style="text-align:center;color:red;"><?= $msg?></h1>
            <table class="table table-stripped">
                <thead>
                    <th>Mã khách hàng</th>
                    <th>Tên khách hàng</th>
                    <th>Tên hàng hóa</th>
                    <th width="70">Ảnh hàng hóa</th>
                    <th>Số lượng</th>
                    <th>Đơn giá</th>
                    <th>Địa chỉ</th>
                    <th>Yêu cầu</th>
                    <th>Số điện thoại</th>
                    <th>Tác vụ</th>
                </thead>
                <tbody>
                    <?php 
                    foreach($orders as $key => $cursor){
                     ?>
                    <tr>
                        <?php if($cursor['ma_kh'] == ""):?>
                        <td>Chưa đăng ký tài khoản</td>
                        <?php endif ?>
                        <?php
                           if($cursor['ma_kh'] != ""):?>
                        <td><?= $cursor['ma_kh']?></td>
                        <?php endif ?>
                        <td><?= $cursor['ten_kh'] ?></td>
                        <td><?= $cursor['ten_hh'] ?></td>
                        <td><img width=50 height=50 src="<?= BASE_URL_B . $cursor['image'] ?>" class="img-fluid"></td>
                        <td><?= $cursor['so_luong']?></td>
                        <td><?= number_format($cursor['gia'] * $cursor['so_luong']) . " VNĐ" ?>
                        </td>
                        <td><?= $cursor['dia_chi']?></td>
                        <td><?= $cursor['yeu_cau']?></td>
                        <td><?= $cursor['phone_number']?></td>
                        <td>
                            <a href="<?= BASE_URL_S?>order/sua.php?ten_hh=<?= $cursor['ten_hh'] ?>&ma_hd=<?= $cursor['ma_hd']?>"
                                class="btn btn-info btn-sm">
                                Sửa
                            </a>
                            <a onclick="return confirm('bạn có chắc muốn xóa sản phẩm này?')"
                                href="<?= BASE_URL_S?>order/xoa.php?ten_hh=<?= $cursor['ten_hh'] ?>&ma_hd=<?= $cursor['ma_hd']?>"
                                class="btn btn-danger btn-sm">
                                Xóa
                            </a>
                        </td>
                    </tr>
        </div>
        <?php } ?>
        </tbody>
        <div class="sum" style="margin-left:840px;"><strong>Tổng tiền đơn hàng :
                <?php if($cursor['code_sale'] == ""){?>
                <?= $order ?>
                <?php }else {?>
                <?= ($order- ($order*($code['percent']/100))) ?>
                <?php   }?>
                VNĐ</strong>
        </div>
        <div class="sum" style="margin-left:840px;"><strong>Mã giảm giá :
                <?php if($cursor['code_sale'] == ""):?>
                Không có mã
                <?php endif ?>
                <?php
                           if($cursor['code_sale'] != ""):?>
                <?= $cursor['code_sale']?>
                <?php endif ?>
        </div>
        </table>
    </main>
</body>

</html>