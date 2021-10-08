<?php
session_start();
require_once "../../lib/db.php";
require_once "../../lib/common.php";
checkAuths();
$msg = isset($_GET['msg'])?$_GET['msg']:"";
// lấy dữ liệu từ trên url => keyword
$keyword = isset($_GET['keyword']) ? $_GET['keyword'] : "";
// query lấy danh sách user từ db
$getImgQuery = "select * from manage_img";//câu lệnh chọn tất cả trong sectors

$img = dbfetchAll($getImgQuery);//fetchAll => tìm ra tất cả các bản ghi thỏa mãn câu sql => [ [], [], [] ]
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
            <h1 style="text-align:center;color:red;"><?= $msg?></h1>
            <table class="table table-stripped">
                <thead>
                    <th>banner1</th>
                    <th>banner2</th>
                    <th>banner3</th>
                    <th>logo</th>
                    <th>
                        <a href="<?= BASE_URL_S?>infor/push-image.php" class="btn btn-sm btn-success">
                            Tạo mới
                        </a>
                    </th>
                </thead>
                <tbody>
                    <?php foreach ($img as $key => $cursor): ?>
                    <tr>
                        <td>
                            <img src="<?= BASE_URL_B . $cursor['banner1'] ?>" class="img-fluid">
                        </td>
                        <td>
                            <img src="<?= BASE_URL_B . $cursor['banner2'] ?>" class="img-fluid">
                        </td>
                        <td>
                            <img src="<?= BASE_URL_B . $cursor['banner3'] ?>" class="img-fluid">
                        </td>
                        <td>
                            <img src="<?= BASE_URL_B . $cursor['logo'] ?>" class="img-fluid">
                        </td>
                        <td>
                            <a href="<?= BASE_URL_S?>infor/fix.php?id=<?= $cursor['id'] ?>" class="btn btn-info btn-sm">
                                Sửa
                            </a>
                            <a onclick="return confirm('bạn có chắc muốn xóa tài khoản này?')"
                                href="<?= BASE_URL_S?>infor/delete.php?id=<?= $cursor['id'] ?>"
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