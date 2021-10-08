<?php
session_start();
require_once "../../lib/db.php";
require_once "../../lib/common.php";
$keyword = isset($_GET['keyword']) ? $_GET['keyword'] : "";
checkAuths();
$sql = "select * from library where chu_de like '%$keyword%'";
$library = dbfetchAll($sql);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách tài khoản</title>
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
                    <th>Hình ảnh</th>
                    <th>Chủ đề</th>
                    <th>Nội dung</th>
                    <th>Ngày đăng</th>
                    <th>
                        <a href="<?= BASE_URL_G?>tao-thu-vien.php" class="btn btn-sm btn-success">
                            Tạo mới
                        </a>
                    </th>
                </thead>
                <tbody>
                    <?php foreach($library as $key => $cursor): ?>
                    <tr>
                        <td><img width=100 src="<?= BASE_URL_B . $cursor['image'] ?>" class="img-fluid"></td>
                        <td><?= $cursor['chu_de'] ?></td>
                        <td><?= $cursor['noi_dung'] ?></td>
                        <td><?= $cursor['ngay_dang'] ?></td>
                        <td>
                            <a href="<?= BASE_URL_G?>sua.php?id=<?= $cursor['id'] ?>" class="btn btn-info btn-sm">
                                Sửa
                            </a>
                            <a onclick="return confirm('bạn có chắc muốn xóa tài khoản này?')"
                                href="<?= BASE_URL_G?>xoa.php?id=<?= $cursor['id'] ?>" class="btn btn-danger btn-sm">
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