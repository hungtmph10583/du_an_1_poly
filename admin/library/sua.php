<?php
session_start();
require_once "../../lib/db.php";
require_once "../../lib/common.php";
checkAuths();
// lấy id từ đường dẫn
$id = $_GET['id'];
// dựa vào id để truy vấn ra dữ liệu của sản phẩm
$sql = "select * from library where id = $id";
$library = dbfetch($sql);
if(!$library){
    header("location: ".BASE_URL_15."?msg=Hàng hóa không tồn tại");
    die;
}
// lấy danh sách tất cả các danh mục
$sql = "select * from news";
$news = dbfetchAll($sql);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PT15317-web Assignment</title>
    <style>
    main {
        width: 1000px;
        margin: auto;
    }

    main h2 {
        text-align: center;
        margin: 25px 0 10px 0;
    }

    main form .row {
        display: grid;
        grid-template-columns: 30% auto;
    }

    main form .row .col-md-6 .form-group label,
    main form .row .col-md-7 .form-group label {
        margin: 12px 0 5px 0;
    }

    main form .row .col-md-6 .form-group input,
    main form .row .col-md-7 .form-group input {
        margin: 10px 0 0 0;
        padding: 5px 10px;
        line-height: 18px;
        border: 1px solid gray;
        border-radius: 5px;
    }

    .align {
        text-align: center;
        margin: 20px 0 20px 0;
    }

    .align button {
        padding: 10px 20px;
        border: 1px solid gray;
        border-radius: 10px;
        cursor: pointer;
        margin: 0 10px 0 0;
    }

    .align button:hover {
        padding: 10px 20px;
        border: 1px solid #309a13;
        background: #309a13;
        color: #fff;
    }

    .align a {
        padding: 9px 20px;
        border: 1px solid gray;
        border-radius: 10px;
        cursor: pointer;
        margin: 0 10px 0 0;
        color: #222;
        text-decoration: none;
    }

    .align a:hover {

        border: 1px solid #ff523b;
        background: #ff523b;
        color: #fff;
    }
    </style>
    <script src="tinymce/js/tinymce/tinymce.min.js">
    </script>
</head>

<body>
    <?php include_once "../../_share/header-admin.php" ?>
    <main class="container-fluid">
        <!-- Form tạo mới tk -->
        <h2>Chỉnh sửa hàng hóa</h2>
        <form action="<?= BASE_URL_G . "luu-sua.php?id=" . $library['id'] ?>" method="POST"
            enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Chủ đề</label><br>
                        <input type="text" name="chu_de" value="<?= $library['chu_de']?>">
                        <?php if(isset($_GET['chu_deerr'])):?>
                        <span class="text-danger"><?= $_GET['chu_deerr'] ?></span>
                        <?php endif ?>
                    </div><br>
                    <div class="row-1">
                        <div class="col-4 offset-4">
                            <img width=70 src="<?= BASE_URL_B . $library['image'] ?>" class="img-fluid">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">Ảnh đại diện</label><br>
                        <input type="file" name="image" class="form-control">
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="form-group">
                        <label for="">Nội dung</label>
                        <textarea name="noi_dung" id="noi_dung" rows="4"
                            cols="85"><?= $library['noi_dung']?></textarea><br>
                        <?php if(isset($_GET['noi_dungerr'])):?>
                        <span class="text-danger"><?= $_GET['noi_dungerr'] ?></span>
                        <?php endif ?>
                    </div>
                </div>
            </div>
            <div class="align">
                <button type="submit" class="btn btn-sm btn-info">Lưu</button>

                <a href="<?= BASE_URL_16 ?>" class="btn btn-sm btn-danger">Hủy</a>
            </div>
        </form>
    </main>
    <?php include_once "../../footer.php" ?>
    <script>
    tinymce.init({
        selector: 'textarea#noi_dung',
        height: 500,
        menubar: false,
        plugins: [
            'advlist autolink lists link image charmap print preview anchor',
            'searchreplace visualblocks code fullscreen',
            'insertdatetime media table paste code help wordcount'
        ],
        toolbar: 'undo redo | formatselect | ' +
            'bold italic backcolor | alignleft aligncenter ' +
            'alignright alignjustify | bullist numlist outdent indent | ' +
            'removeformat | image | help',
        content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }',
        images_upload_handler: function(blobInfo, success, failure) {
            var xhr, formData;
            xhr = new XMLHttpRequest();
            xhr.withCredentials = false;
            xhr.open('POST', "postAccesstor.php");
            xhr.onload = function() {
                var json;

                if (xhr.status != 200) {
                    failure('HTTP Error: ' + xhr.status);
                    return;
                }
                json = JSON.parse(xhr.responseText);

                if (!json || typeof json.location != 'string') {
                    failure('Invalid JSON: ' + xhr.responseText);
                    return;
                }
                success(json.location);
            };
            formData = new FormData();
            formData.append('file', blobInfo.blob(), blobInfo.filename());
            xhr.send(formData);
        }
    });
    </script>
</body>

</html>