<?php

require 'vendor/autoload.php';
require 'source/funcs.php';
require 'source/all_need.php';
require 'config.php';
$header_page = "Main";
include "headers.php";
?>

<?php
global $yandex_map_api;
$yandex_map_api = getenv("YANDEX_MAP_API_KEY");
//echo $yandex_map_api;
global $all_cameras;
//var_dump($all_cameras);
$token = get_token();

foreach ($all_cameras as $item){
    $body = array('fields' => array(
        'number', 'token_l', 'address', 'server'),
        'numbers' => [$item],
);
    $one = get_api('https://cloud.ucams.ru/api/v0/cameras/this/', $token, $body);
    $token_l = $one['results'][0]['token_l'];
    $server_s = $one['results'][0]['server']['screenshot_domain'];
    save_camera_foto($item,$server_s,$token_l);
}


//var_dump($one);
//$num = $one['results'][0]['number'];
//$token_l = $one['results'][0]['token_l'];
//$address = $one['results'][0]['address'];
//$server_d = $one['results'][0]['server']['domain'];
//$server_s = $one['results'][0]['server']['screenshot_domain'];

//save_camera_foto($num,$server_s,$token_l);

?>

<body>
<h1 class="main_header"> Камеры Усть-Илимска </h1>
<div class="container">
    <div id="map" class="my_map">

    </div>

</div>
<hr>
<!--    карта -->

</body>
<?php
include "blocks/footer.php";

