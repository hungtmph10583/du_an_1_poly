<?php
session_start();
require_once "../../lib/db.php";
require_once "../../lib/common.php";
checkAuths();
// lấy dữ liệu từ trên url => keyword
$keyword = isset($_GET['keyword']) ? $_GET['keyword'] : "";
$msg = isset($_GET['msg'])?$_GET['msg']:"";
// query lấy danh sách user từ db
$sql = "select * from sectors where ten_loai like '%$keyword%'";//câu lệnh chọn tất cả trong sectors
$sectors = dbfetchAll($sql);
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
            <span style="color:red;"><?= $msg?></span>
            <table class="table table-stripped">
                <thead>
                    <th>Mã loại</th>
                    <th>Tên loại</th>
                    <th>
                        <a href="<?= BASE_URL_S?>sectors/tao-loai.php" class="btn btn-sm btn-success">
                            Tạo mới
                        </a>
                    </th>
                </thead>
                <tbody>
                    <?php foreach ($sectors as $key => $cursor): ?>
                    <tr>
                        <td><?= $cursor['ma_loai'] ?></td>
                        <td><?= $cursor['ten_loai'] ?></td>
                        <td>
                            <a href="<?= BASE_URL_S?>sectors/sua.php?ma_loai=<?= $cursor['ma_loai'] ?>"
                                class="btn btn-info btn-sm">
                                Sửa
                            </a>
                            <a onclick="return confirm('bạn có chắc muốn xóa tài khoản này?')"
                                href="<?= BASE_URL_S?>sectors/xoa.php?ma_loai=<?= $cursor['ma_loai'] ?>"
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