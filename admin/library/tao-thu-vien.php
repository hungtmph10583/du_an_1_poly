<?php
session_start();
require_once "../../lib/db.php";
require_once "../../lib/common.php";
checkAuths();
$sql = "select * from news";
$news = dbfetchAll($sql);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PT15317-web Assignment</title>
    <script src="tinymce/js/tinymce/tinymce.min.js">
    </script>

    <style>
    main {
        width: 900px;
        margin: auto;
    }

    main h2 {
        text-align: center;
        margin: 25px 0 10px 0;
    }

    main form .row {
        display: grid;
        grid-template-columns: auto;
    }

    main form .row .col-md-6 .form-group {
        display: grid;
        grid-template-columns: 20% auto;
    }

    main form .row .col-md-6 .form-group .hdd,
    main form .row .col-md-7 .form-group .hdd {
        display: grid;
        grid-template-columns: auto auto;
        border: 1px solid gray;
        border-radius: 5px;
    }

    main form .row .col-md-6 .form-group .hdd label,
    main form .row .col-md-7 .form-group .hdd label {
        margin: 5px 0 0 0;
        padding: 0 0 0 10px;
    }

    main form .row .col-md-7 .form-group {
        display: grid;
        grid-template-columns: 20% auto;
        margin: 0 0 0 40px;
    }

    main form .row .col-md-6 .form-group label,
    main form .row .col-md-7 .form-group label {
        margin: 12px 0 5px 0;
    }

    main form .row .col-md-6 .form-group input,
    main form .row .col-md-7 .form-group input {
        margin: 5px 0 0 0;
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
        padding: 8px 20px;
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
</head>

<body>
    <?php include_once "../../_share/header-admin.php" ?>
    <main class="container-fluid">
        <!-- Form tạo mới tk -->
        <h2>Tạo mới sản phẩm</h2>
        <form action="<?= BASE_URL_G ?>luu-tao.php" method="POST" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Chủ Đề</label>
                        <input type="text" name="chu_de" class="form-control">
                        <?php if(isset($_GET['chu_deerr'])):?>
                        <span class=" text-danger"><?= $_GET['chu_deerr'] ?></span>
                        <?php endif ?>
                    </div><br>
                    <div class="form-group">
                        <label for="">Hình Ảnh Tin</label>
                        <input type="file" name="image" class="form-control">
                        <?php if(isset($_GET['imageerr'])):?>
                        <span class="text-danger"><?= $_GET['imageerr'] ?></span>
                        <?php endif ?>
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="">Nội Dung</label>
                        <textarea name="noi_dung" id="noi_dung" rows="4" cols="85"></textarea><br>
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