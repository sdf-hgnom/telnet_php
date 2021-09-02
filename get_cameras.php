<?php
require 'source/all_need.php';
global $db_client;
$all_in = [];
$res = mysqli_query($db_client,"SELECT * FROM `cameras` WHERE `is_use` = 1 ");
if(!$res){
    echo mysqli_error($db_client);

}
$row_count = mysqli_num_rows($res);
for ($i = 0;$i<$row_count;$i++){
    $one = mysqli_fetch_assoc($res);
    array_push($all_in,$one);
}
var_dump($all_in);
?>

<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="cameras.js"></script>
    <script src="ymap.js"></script>
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/style.css">
    <title><?php global $header_page;
        echo $header_page ?></title>
</head>
<body>
<!--<div class="block" data-attr='--><?//= $all_cameras;?><!--'></div>-->
</body>
<script src="js/jquery-3.6.0.min.js"></script>

</html>