<?php
global $yandex_map_api;
$yandex_map_api  = getenv("YANDEX_MAP_API_KEY");
?>

<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://api-maps.yandex.ru/2.1/?apikey=<?php echo $yandex_map_api;?>&lang=ru_RU" type="text/javascript"></script>
    <script src="cameras.js"></script>
    <script src="ymap.js"></script>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/style.css">
    <title><?php  global $header_page; echo $header_page?></title>
</head>
