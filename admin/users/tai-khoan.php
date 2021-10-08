<?php
session_start();
require_once "../../lib/db.php";
require_once "../../lib/common.php";
$keyword = isset($_GET['keyword']) ? $_GET['keyword'] : "";
$msg = isset($_GET['msg'])?$_GET['msg']:"";
checkAuths();
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
            <span style="color:red;"><?= $msg?></span>
            <table class="table table-stripped">
                <thead>
                    <th>Mã khách hàng</th>
                    <th>Họ và tên</th>
                    <th>Hoạt động</th>
                    <th>Email</th>
                    <th>SĐT</th>
                    <th width="70">Ảnh</th>
                    <th>Vai trò</th>
                    <th>Ngày sinh</th>
                    <th>
                        <a href="<?= BASE_URL?>tao-tk.php" class="btn btn-sm btn-success">
                            Tạo mới
                        </a>
                    </th>
                </thead>
                <tbody>
                    <?php foreach (dbfetchAll("select * from users where name like '%$keyword%' or email like '%$keyword%' or ma_kh like '%$keyword%'") as $cursor): ?>
                    <tr>
                        <td><?= $cursor['ma_kh'] ?></td>
                        <td><?= $cursor['name'] ?></td>
                        <td><?= ($cursor['kich_hoat'])?"kích hoạt":"chưa kích hoạt" ?></td>
                        <td><?= $cursor['email'] ?></td>
                        <td><?= $cursor['phone_number'] ?></td>
                        <td>
                            <img src="<?= BASE_URL_B.$cursor['avatar'] ?>" class="img-fluid">
                        </td>
                        <td><?= ($cursor['vai_tro'])?"Nhân viên":"Khách hàng" ?></td>
                        <td>
                            <?= datetimeConvert($cursor['ngay_sinh'], "d/m/Y")?>
                        </td>
                        <td>
                            <a href="<?= BASE_URL?>sua.php?ma_kh=<?= $cursor['ma_kh'] ?>" class="btn btn-info btn-sm">
                                Sửa
                            </a>
                            <a onclick="return confirm('bạn có chắc muốn xóa tài khoản này?')"
                                href="<?= BASE_URL_S?>users/xoa.php?ma_kh=<?= $cursor['ma_kh'] ?>"
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