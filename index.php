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
        <div id="map" class="my_map">
        </div>
        <aside class="aside">
            <ul class="aside-ul">

                <?php
                for ($i = 0;$i<count($all_cameras);$i++){
                    $link = "<li class='aside-link'> <a href='camera.php?camera=$all_cameras[$i]'" . "'><img src='images/$all_cameras[$i]~400.jpg' alt='foto'". "'></a></li>";
                    echo $link;
                }

                ?>
            </ul>
        </aside>
<!--    -->




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

