<?php


require_once 'c:\work\telnet_cams\vendor\autoload.php';
//require 'd:/PHP_composer/vendor/autoload.php';
require 'funcs.php';

//use GuzzleHttp\Client;
//use function GuzzleHttp\get_token;

$name = getenv("VIDEO_USER");
$yandex_map_api = getenv("YANDEX_MAP_API_KEY");
$password = getenv("VIDEO_PASSWORD");
$token = get_token($name, $password);

$body = array('fields' => array(
    'number', 'token_l', 'address', 'server'),
    'numbers' => ['1627277293VCG202'],
);
$one = get_api('https://cloud.ucams.ru/api/v0/cameras/this/', $token, $body);
//var_dump($one);
$num = $one['results'][0]['number'];
$token_l = $one['results'][0]['token_l'];
$address = $one['results'][0]['address'];
$server_d = $one['results'][0]['server']['domain'];
$server_s = $one['results'][0]['server']['screenshot_domain'];

save_camera_foto($num,$server_s,$token_l);
var_dump($token_l);
?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <title>Камеры</title>
</head>
<body>
<h1 class="main_header"> Камеры Усть-Илимска </h1>
<div class="container">
    <div id="map" class="map">

    </div>
</div>
<hr>
<!--    карта -->
<script src="https://api-maps.yandex.ru/2.1/?apikey=<?php echo $yandex_map_api;?>&lang=ru_RU" type="text/javascript"></script>
<script src="ymap.js"></script>
</body>
</html>
