<?php

require 'vendor/autoload.php';
require 'source/funcs.php';
require 'source/all_need.php';
require 'config.php';
$header_page = "Main";
include "blocks/headers_no_map.php";
require "config.php";
global $all_cameras;
?>
<!-- Кнопка акардеона   &#9776;-->
    <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#" > <img class="foto" src="images/telnet_logo.png" alt="foto"></a>
            <h1 class="page_header"> Камеры Усть-Илимска </h1>
            <a href="source/signout.php"> Выйти  </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="aside" aria-controls="aside" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

        </div>
    </nav>
    <!--    <header class="main_header">-->
<!---->
<!--    </header>-->
    <div class="container-fluid">
        <div class="row position-relative">
            <div id="map" class="my_map col-12">
            </div>
            <aside class="aside position-absolute">
                <ul class="aside-ul">

                <?php
                for ($i = 0;$i<count($all_cameras);$i++){
                    $link = "<li class='aside-link'> <a href='camera.php?camera=$all_cameras[$i]'" . "'><img src='images/$all_cameras[$i]~400.jpg' alt='foto'". "'></a></li>";
                    echo $link;
                }

                ?>
                </ul>
            </aside>

        </div>
        <footer class="footer">
            <p>
                Copyright&copy;
            </p>

        </footer>
    </div>
    <hr>

    </body>

<?php
include "blocks/footer.php";

