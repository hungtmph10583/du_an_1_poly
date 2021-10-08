<?php
session_start();
require_once "../../lib/db.php";
require_once "../../lib/common.php";
checkAuths();
// lấy dữ liệu từ trên url => keyword
$keyword = isset($_GET['keyword']) ? $_GET['keyword'] : "";
// query lấy danh sách user từ db
$sql = "select * from code where code_sale like '%$keyword%'";//câu lệnh chọn tất cả trong sectors
$sale = dbfetchAll($sql);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách loại hàng</title>
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
            <table class="table table-stripped">
                <thead>
                    <th>STT</th>
                    <th>Mã khuyễn mãi</th>
                    <th>Ngày bắt đầu</th>
                    <th>Ngày kết thúc</th>
                    <th>Phần trăm khuyến mãi</th>
                    <th>Trạng thái</th>
                    <th>Tác vụ</th>
                    <th>
                        <a href="<?= BASE_URL_S?>code_sale/push.php" class="btn btn-sm btn-success">
                            Tạo mới
                        </a>
                    </th>
                </thead>
                <tbody>
                    <?php foreach ($sale as $key => $cursor): ?>
                    <tr>
                        <td><?= $cursor['id'] ?></td>
                        <td><?= $cursor['code_sale'] ?></td>
                        <td><?= $cursor['ngay_thang'] ?></td>
                        <td><?= $cursor['het_han'] ?></td>
                        <td><?= $cursor['percent']."%" ?></td>
                        <td><?= ($cursor['kich_hoat'])?"kích hoạt":"chưa kích hoạt" ?></td>
                        <td>
                            <a href="<?= BASE_URL_S?>code_sale/fix.php?id=<?= $cursor['id'] ?>"
                                class="btn btn-info btn-sm">
                                Sửa
                            </a>
                            <a onclick="return confirm('bạn có chắc muốn xóa tài khoản này?')"
                                href="<?= BASE_URL_S?>code_sale/delete.php?id=<?= $cursor['id'] ?>"
                                class="btn btn-danger btn-sm">
                                Xóa
                            </a>
                        </td>
                    </tr>
                    <?php endforeach?>
                </tbody>
            </table>
        </div>
    </main>
</body>

</html>