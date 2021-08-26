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
            <ul class="aside c-6">

                <?php
                for ($i = 0;$i<count($all_cameras);$i++){
//                    $foto = '<img src="images\/">' . $all_cameras[$i] ;
                    $link = "<a href='camera.php?camera=$all_cameras[$i]'" . "'><img src='images/$all_cameras[$i]~400.jpg'". "'></a>";
                    echo $link;
                }

                ?>
            </ul>
<!--                end aside-->
            </aside>




        </div>
        <footer class="footer">
            <p>
                Copyright&copy;
            </p>

        </footer>
    </div>
    <hr>
    <!--    карта -->

    </body>

<?php
include "blocks/footer.php";

