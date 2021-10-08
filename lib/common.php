<?php
define("BASE_URL_A", "http://localhost/php1/project_sample_1/public/uploads/");
define("BASE_URL_S", "http://localhost/php1/project_sample_1/admin/");
define("BASE_URL_B", "http://localhost/php1/project_sample_1/");
define("BASE_URL_E", "http://localhost/php1/project_sample_1/content/");
define("BASE_URL_F", "http://localhost/php1/project_sample_1/admin/news/");
define("BASE_URL_G", "http://localhost/php1/project_sample_1/admin/library/");
define("BASE_URL_C", "http://localhost/php1/project_sample_1/index.php");
define("BASE_URL_H", "http://localhost/php1/project_sample_1/site/layout.php");
define("BASE_URL", "http://localhost/php1/project_sample_1/admin/users/");
define("BASE_URL_D", "http://localhost/php1/project_sample_1/admin/infor/");
define("BASE_URL_1", "http://localhost/php1/project_sample_1/admin/users/tai-khoan.php");
define("BASE_URL_2", "http://localhost/php1/project_sample_1/admin/sectors/loai-hang.php");
define("BASE_URL_3", "http://localhost/php1/project_sample_1/admin/products/san-pham.php");
define("BASE_URL_4", "http://localhost/php1/project_sample_1//admin/products/tao-sp.php");
define("BASE_URL_5", "http://localhost/php1/project_sample/coment.php");
define("BASE_URL_6", "http://localhost/php1/project_sample_1/admin/order/don-hang.php");
define("BASE_URL_7", "http://localhost/php1/project_sample_1/admin/products/thong-ke-hang-hoa.php");
define("BASE_URL_8", "http://localhost/php1/project_sample_1/don-hang.php");
define("BASE_URL_9", "http://localhost/php1/project_sample_1/thong-ke-don-dat-hang.php");
define("BASE_URL_10", "http://localhost/php1/project_sample_1/fogot.php");
define("BASE_URL_11", "http://localhost/php1/project_sample_1/login.php");
define("BASE_URL_12", "http://localhost/php1/project_sample_1/admin/infor/manage-infor.php");
define("BASE_URL_13", "http://localhost/php1/project_sample_1/admin/comments/coment.php");
define("BASE_URL_14", "http://localhost/php1/project_sample_1/site/khach-hang/register.php");
define("BASE_URL_16", "http://localhost/php1/project_sample_1/admin/library/thu-vien.php");
define("BASE_URL_17", "http://localhost/php1/project_sample_1/search.php");

function datetimeConvert($datetimeData, $formatString = "d/m/Y"){
    $date = new DateTime($datetimeData);
    return $date->format($formatString);
}

function checkAuth(){
    if(!isset($_SESSION['auth']) || !$_SESSION['auth']){
        header('location: '.BASE_URL_B . 'login.php');
        die;
    }
}
function checkAuths(){
    if(!isset($_SESSION['auth']) || !$_SESSION['auth']){
        header('location: '.BASE_URL_B . 'login.php');
        die;
    }elseif($_SESSION['auth']['vai_tro']<1 && $_SESSION['auth']['vai_tro']<1) {
        header('location: '.BASE_URL_B . 'login.php');
        die;
    }
}
function rand_string( $length ) {
$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
$size = strlen( $chars );
$str = substr( str_shuffle( $chars ), 0, $length );
for( $i = 0; $i < $length; $i++ ) {
$str .= $chars[ rand( 0, $size - 1 ) ];
 }
return $str;
}
?>