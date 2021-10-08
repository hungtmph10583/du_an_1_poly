<?php
 session_start();
 require_once "../../lib/db.php";
 require_once "../../lib/common.php";
 checkAuths();
$keyword = isset($_GET['keyword']) ? $_GET['keyword'] : "";
                    
$ma_hh = $_GET['ma_hh'];

$getCommentQuery ="select * from comments where id_hh = '$ma_hh'";
if($keyword !== ""){
    $getCommentQuery .= " and noi_dung like '%$keyword%' or ma_kh like '%$keyword%' ";
}
$comments = dbfetchAll($getCommentQuery);

$getCommentQuery ="select * from products where ma_hh = '$ma_hh'";
$products = dbfetchAll($getCommentQuery);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách bình luận</title>
    <?php include_once "../../_share/style.php" ?>
</head>

<body>
    <?php include_once "../../_share/header-admin.php" ?>
    <main class="container-fluid">
        <!-- Hiển thị danh sách users -->
        <div class="container">
            <br>
            <form action="<?= BASE_URL_S?>search.php" method="get">
                <div class="form-group row">
                    <label for="" class="col-sm-1 col-form-label">Từ khóa</label>
                    <div class="col-sm-4">
                        <input type="text" name="keyword" class="form-control" value="<?= $keyword ?>">
                    </div>
                </div>
            </form>
            <table class="table table-stripped">
                <thead>
                    <th>Mã sản phẩm</th>
                    <th>Ảnh sản phẩm</th>
                    <th>Nội dung</th>
                    <th>Ngày bình luận</th>
                    <th>Tác vụ</th>
                </thead>
                <tbody>
                    <?php
                    foreach($comments as $key => $cursor){
                        foreach($products as $key => $cursors){
                            ?>
                    <tr>
                        <td><?= $cursors['ma_hh'] ?></td>
                        <td><img width=50 height=50 src="<?= BASE_URL_B . $cursors['image'] ?>" class="img-fluid"></td>
                        <td><?= $cursor['noi_dung'] ?></td>
                        <td><?= $cursor['ngay_bl'] ?></td>
                        <td>
                            <a onclick="return confirm('bạn có chắc muốn xóa bình luận này?')"
                                href="<?= BASE_URL_S?>comments/delete.php?id=<?= $cursor['id'] ?>&ma_hh=<?= $ma_hh ?>"
                                class="btn btn-info btn-sm">
                                Xóa
                            </a>
                        </td>
                    </tr>
                    <?php
                        }
                    }
                ?>
                </tbody>
            </table>
        </div>
    </main>
</body>

</html>