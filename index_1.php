<?php
require 'vendor/autoload.php';
require 'source/funcs.php';
require 'source/all_need.php';
require 'config.php';
$header_page = "Main-1";
global $all_cameras;
unset($_SESSION['message_no_user']);
unset($_SESSION['message']);
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
    <title><?php  global $header_page; echo $header_page?></title>
</head>
    <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#" > <img class="foto" src="images/telnet_logo.png" alt="foto"></a>
            <h1 class="page_header"> Камеры Усть-Илимска </h1>
            <a href="source/signout.php"> Выйти  </a>
            <a href="source/sign_in_form.php"> Вход  </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="aside" aria-controls="aside" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </nav>
    <div class="container-fluid">
        <div class="row">
            <div id="map" class="my_map col-12">

            </div>
        </div>
        <footer class="footer">
            <p>
                Copyright&copy;
            </p>
        </footer>
    </div>
    <hr>

    </body>

<script src="/js/jquery-3.6.0.min.js"></script>
<script src="/js/bootstrap.bundle.js"></script>
<script src="/js/phpmail.js"></script>
</html>

