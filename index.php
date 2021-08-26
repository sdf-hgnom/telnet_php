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
global $all_cameras;
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



?>

<body>
<header class="main_header">
    <a href="#"> <img src="images/telnet_logo.png" alt="logo_telnet"> </a>
    <h1 class="page_header"> Камеры Усть-Илимска </h1>
    <a href="source/signout.php"> Выйти  </a>

</header>
<div class="container">
    <div class="context">
    <aside class="aside c-6">
        <?php
        echo "<ul class='aside-'>";
        for ($i = 0;$i<count($all_cameras);$i++){

            echo "<li>$all_cameras[$i]</li>";
        }
        echo "</ul>"
        ?>
        <div id="map" class="my_map">

        </div>

    </aside>




</div>
</div>
<hr>
<!--    карта -->
<footer class="footer">
    <p>
        Copyright&copy;
    </p>

</footer>
</body>
<?php
include "blocks/footer.php";

