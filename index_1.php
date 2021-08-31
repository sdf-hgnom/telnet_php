<?php
require 'vendor/autoload.php';
require 'source/funcs.php';
require 'source/all_need.php';
require 'config.php';
$header_page = "Main-1";
global $all_cameras;
unset($_SESSION['message_no_user']);
unset($_SESSION['message']);
print_r($_SESSION);
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
    <title><?php global $header_page;
        echo $header_page ?></title>
</head>
<body>
<nav class="navbar navbar-light bg-light">
    <div class="container-fluid d-flex">
        <a class="navbar-brand" href="#"> <img class="foto" src="images/telnet_logo.png" alt="foto"></a>
        <div class="h4 "> Камеры Усть-Илимска </div>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!--        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".nav-my" aria-controls="nav-my"-->
        <!--                aria-expanded="false" aria-label="Toggle navigation">-->
        <!--            <span class="navbar-toggler-icon"></span>-->
        <!--        </button>-->
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav btn-group border">
                <li class="nav-item">
                    <a class="nav-link active " href="source/sign_in_form.php"> Вход </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active " href="source/register_form.php"> Регистрация </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="source/signout.php"> Выйти </a>
                </li>
            </ul>
        </div>
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

<script src="js/jquery-3.6.0.min.js"></script>
<script src="js/bootstrap.bundle.js"></script>
<script src="/js/phpmail.js"></script>
</html>

