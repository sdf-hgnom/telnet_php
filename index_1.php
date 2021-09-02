<?php
require 'vendor/autoload.php';
require 'source/funcs.php';
require 'source/all_need.php';
require 'config.php';
$header_page = "Main-1";
unset($_SESSION['message_no_user']);
unset($_SESSION['message']);
global $db_client;
$all_cameras = [];
$res = mysqli_query($db_client,"SELECT * FROM `cameras` WHERE `is_use` = 1 ");
if(!$res){
    echo mysqli_error($db_client);

}
$row_count = mysqli_num_rows($res);
for ($i = 0;$i<$row_count;$i++){
    $one = mysqli_fetch_assoc($res);
    array_push($all_cameras,$one);
}
$json_camera = json_encode($all_cameras);
mysqli_close($db_client);
var_dump($all_cameras);
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
<div class="block" data-attr ='<?= $json_camera;?>'></div>
<script>
    var block = document.querySelector('.block').getAttribute('data-attr');
    var all_cameras = JSON.parse(block);
    alert(all_cameras);

</script>
<div class="block" data-attr='<?= $all_cameras;?>'></div>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                </li>

            </ul>
<!--        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="navbarNav" aria-controls="navbarNav" aria-expanded="true" aria-label="Toggle navigation">-->
<!--            <span class="navbar-toggler-icon"></span>-->
<!--        </button>-->


        <div class="navbar-item"> Камеры</div>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto btn-group border">
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
</html>
<?php


