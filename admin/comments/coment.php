<?php
 session_start();
 require_once "../../lib/db.php";
 require_once "../../lib/common.php";
 checkAuths();
$msg = isset($_GET['msg'])?$_GET['msg']:"";
$keyword = isset($_GET['keyword']) ? $_GET['keyword'] : "";
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
                    <th>Mã sản phẩm</th>
                    <th>Ảnh sản phẩm</th>
                    <th>Số bình luận</th>
                    <th>Ngày bình luận</th>
                </thead>
                <tbody>
                    <?php 
                    $getCommentQuery = "select distinct id_hh from comments";
                    if($keyword !== ""){
                        $getCommentQuery .= " where ngay_bl like '%$keyword%' or ma_kh like '%$keyword%' ";
                    }
                    $commented = dbfetchAll($getCommentQuery);
                    foreach ($commented as $keys => $cursor){
                        $id_hh = $cursor['id_hh'];
                        $getCommentQuery = "select * from products where ma_hh = '$id_hh'";
                        $products2 = dbfetchAll($getCommentQuery);
                        foreach ($products2 as $keys => $cursorser){
                            $getCommentQuery = "select count(*) from comments where id_hh = '$id_hh'";
                            $comment2 = dbfetchColumn($getCommentQuery);//trả về một cột từ hàng tiếp theo của tập kết quả
                            $getCommentQuery = "select * from comments where id_hh = '$id_hh' order by id desc limit 1";
                            $commentv = dbfetchAll($getCommentQuery);
                            foreach ($commentv as $keys => $cursorse){
                        ?>
                    <tr>
                        <td><?= $cursor['id_hh'] ?></td>
                        <td><img width=50 height=50 src="<?= BASE_URL_B . $cursorser['image'] ?>" class="img-fluid">
                        </td>
                        <td><?= $comment2 ?></td>
                        <td><?= $cursorse['ngay_bl'] ?></td>
                        <td>
                            <a href="<?= BASE_URL_S?>comments/view-comment.php?ma_hh=<?= $cursor['id_hh'] ?>"
                                class="btn btn-info btn-sm">
                                Xem chi tiết
                            </a>
                            <a onclick="return confirm('bạn có chắc muốn xóa toàn bộ bình luận này?')"
                                href="<?= BASE_URL_S?>comments/delete.php?action=delete&id=<?= $cursor['id'] ?>&ma_hh=<?= $ma_hh ?>"
                                class="btn btn-info btn-sm">
                                Xóa
                            </a>
                        </td>
                    </tr>
                    <?php
                            }
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </main>
</body>

</html>