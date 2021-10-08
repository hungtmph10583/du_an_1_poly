<?php
session_start();
session_destroy();
header("location: http://localhost/php1/project_sample_1/index.php");
?>