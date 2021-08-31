<?php

require "all_need.php";
$header_page = 'Register-form';
print_r($_SESSION)
?>

<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="../cameras.js"></script>
    <script src="../ymap.js"></script>
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/style.css">
    <title><?= $header_page; ?></title>
</head>
<body>
<div class="container-fluid d-flex h-100 justify-content-center">
    <form class="form" action="registration.php" method="post">
        <div class="row">
            <h1 class="h3 fw-normal text-center mb-3">Зарегистрируйтесь</h1>
        </div>

        <div class="row  bg-white shadow-sm mb-3">
            <div class="form-label-group ">
                <label for="inputName">Введите имя :</label>
                <input type="text" id="inputName" class="form-control" placeholder="Введите имя : "
                       name="input_name" required autofocus>
            </div>
        </div>
        <div class="row bg-white shadow-sm mb-3">
            <div class="form-label-group">
                <label for="inputEmail">Введите email : </label>
                <input type="email" id="inputEmal" class="form-control" placeholder="Введите email : "
                       name="input_email" required autofocus>
            </div>
        </div>

        <div class="row bg-white shadow-sm mb-3">
            <div class="form-label-group">
                <label for="inputPhone">Введите телефон : </label>
                <input type="text" id="inputPhone" class="form-control" placeholder="Введите телефон : "
                       name="input_phone" required autofocus>
            </div>
        </div>
        <div class="row bg-white shadow-sm mb-3">
            <div class="form-label-group">
                <label for="inputPassword">Ведите пароль :</label>
                <input type="text" id="inputPhone" class="form-control" placeholder="Ведите пароль : "
                       name="input_password" required autofocus>
            </div>
        </div>
        <div class="row bg-white shadow-sm mb-3">
            <div class="form-label-group">
                <label for="inputPasswors2">Ведите пароль повторно : </label>
                <input type="text" id="inputPhone" class="form-control" placeholder="Ведите пароль повторно : "
                       name="input_password2" required autofocus>
            </div>
        </div>

        <div class="row">
            <button class="w-100 btn btn-lg btn-primary" type="submit" name="input_submit">Вход</button>
        </div>
        <div class="row">
           <a href="../index_1.php"> <button class="w-100 btn btn-lg" type="button" name="input_submit">Отмена</a></button>

        </div>
    </form>
</div>

<?php
if (isset($_SESSION['message_no_user'])) {
    if ($_SESSION['message_no_user']) {
        echo '<span class="badge bg-danger">' . $_SESSION['message_no_user'] . '</span>';
        $location = "sign_in_form.php";
    }

}

if (isset($_SESSION['message'])) {
    if ($_SESSION['message']) {
        echo '<span class="badge bg-danger">' . $_SESSION['message'] . '</span>';
    }

}

?>

</div>
</body>
<script src="/js/jquery-3.6.0.min.js"></script>
<script src="js/bootstrap.bundle.js"></script>
<script src="/js/phpmail.js"></script>
</html>

