<?php

require 'vendor/autoload.php';
require 'source/funcs.php';
require 'source/all_need.php';
$header_page = "Main";
include "headers.php";
?>

<?php

$token = get_token();

$body = array('fields' => array(
    'number', 'token_l', 'address', 'server'),
    'numbers' => ['1627277293VCG202'],
);
$one = get_api('https://cloud.ucams.ru/api/v0/cameras/this/', $token, $body);
$num = $one['results'][0]['number'];
$token_l = $one['results'][0]['token_l'];
$address = $one['results'][0]['address'];
$server_d = $one['results'][0]['server']['domain'];
$server_s = $one['results'][0]['server']['screenshot_domain'];

save_camera_foto($num,$server_s,$token_l);

?>

<body>
<h1 class="main_header"> Камеры Усть-Илимска </h1>
<div class="container">
    <div id="map" class="map">

    </div>
</div>
<hr>
<!--    карта -->


<?php
include "blocks/footer.php";
echo '<script> sessionStorage.getItem("numbers");</script>';
print_r($_SESSION['numbers']);

