<?php
require_once  'vendor/autoload.php';
require 'source/funcs.php';
require 'source/all_need.php';
$header_page = "One camera";
include "blocks/headers_no_map.php";
?>

<body>
<div class="container-fluid text-center vh-100">
    <div class="row">
        <div class="col-12">
            <h1 class="header-h1">Заголовок</h1>
            <div class="video-container">

            </div>


        </div>
    </div>
    <div class="d-flex row justify-content-center">
        <div class="col-4">
            <h4>Вход</h4>
            <form class="form-control " action="#" method="post">
                <label for="FormControlName" class="form-label ">Введите свое имя :</label>
                <input id="FormControlName" type="text" class="form-control" name="input_name"
                       placeholder="Введите свое имя" required>
                <label for="FormControlPassword" class="form-label ">Введите свой пароль :</label>
                <input id="FormControlPassword" type="password" class="form-control" name="input_password"
                       placeholder="Введите свой пароль" required>
                <input type="submit" class="bnt btn-outline-primary" name="input_submit" value="Войти">
            </form>
        </div>
    </div>
</div>

<?php
$tt = random_string(5);
var_dump($tt);
?>

<?php
include "blocks/footer.php";


