<?php
session_start();
require_once "../../lib/db.php";
require_once "../../lib/common.php";
checkAuths();
// lấy dữ liệu từ trên url => keyword
$keyword = isset($_GET['keyword']) ? $_GET['keyword'] : "";
$msg = isset($_GET['msg'])?$_GET['msg']:"";
// query lấy danh sách từ db
$sql = "select
                          p.*,
                          c.ten_loai as cate_loai
                    from products p 
                    join sectors c
                     on p.tenloai = c.ma_loai where name like '%$keyword%' or tenloai like '%$keyword%'";               
$products = dbfetchAll($sql);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách products</title>
    <?php include_once "../../_share/style.php" ?>
</head>

<body>
    <?php include_once "../../_share/header-admin.php" ?>
    <main class="container-fluid">
        <!-- Hiển thị danh sách products -->
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
                    <th width="70">Mã hàng hóa</th>
                    <th>Tên hàng hóa</th>
                    <th>Đơn giá</th>
                    <th>Sale</th>
                    <th width="70">Ảnh</th>
                    <th>Tên loại</th>
                    <th>Trạng thái</th>
                    <th>Ngày nhập</th>
                    <th>
                        <a href="<?= BASE_URL_S?>products/tao-sp.php" class="btn btn-sm btn-success">
                            Tạo mới
                        </a>
                    </th>
                </thead>
                <tbody>
                    <?php
			            foreach ($products as $keys => $cursors){
					?>
                    <tr>
                        <td><?= $cursors['ma_hh'] ?></td>
                        <td><?= $cursors['name'] ?></td>
                        <td><?= $cursors['don_gia'] . "VNĐ" ?>
                        </td>
                        <td><?= $cursors['sale'] .'%' ?></td>
                        <td>
                            <img src="<?= BASE_URL_B . $cursors['image'] ?>" class="img-fluid">
                        </td>
                        <td><?= $cursors['cate_loai'] ?></td>
                        <td><?php if ($cursors['trang_thai'] == 0): ?>
                            Còn hàng
                            <?php endif ?>
                            <?php if ($cursors['trang_thai'] == 1): ?>
                            Hết hàng
                            <?php endif ?>
                            <?php if ($cursors['trang_thai'] == 2): ?>
                            Đang cập nhật
                            <?php endif ?>
                        </td>
                        <td>
                            <?= datetimeConvert($cursors['ngay_nhap'], "d/m/Y")?>
                        </td>
                        <td>
                            <a href="<?= BASE_URL_S?>products/xem-chi-tiet.php?ma_hh=<?= $cursors['ma_hh'] ?>"
                                class="btn btn-info btn-sm">
                                xem chi tiết
                        </td>
                    </tr>
                    <?php
			}
			?>
                </tbody>
            </table>
    </main>
</body>

</html>