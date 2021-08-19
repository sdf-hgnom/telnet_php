<?php

require 'vendor/autoload.php';
require 'funcs.php';
require 'all_need.php';
$header_page = "Main";
include "blocks/headers.php";
?>

<?php


//$name = getenv("VIDEO_USER");
$yandex_map_api = getenv("YANDEX_MAP_API_KEY");
//$password = getenv("VIDEO_PASSWORD");
//var_dump($name);
//var_dump($password);
$token = get_token();
//var_dump($token);
var_dump($yandex_map_api);

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

<body>
<h1 class="main_header"> Камеры Усть-Илимска </h1>
<div class="container">
    <div id="map" class="map">

    </div>
</div>
<hr>
<!--    карта -->

</body>
<?php
include "blocks/footer.php";

