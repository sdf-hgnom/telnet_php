<?php

require "all_need.php";
$header_page = 'Signin-form';
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
<div class="container-fluid d-flex h-100 justify-content-center align-items-center p-0">
    <div class="row  bg-white shadow-sm">
        <div class="col-12">
            <div class="text-center">
                <h1 class="h3 mb-3 fw-normal">Please sign in</h1>
                <form class="form text-center" action="signin.php" method="post">
                    <div class="form-label-group">
                        <label for="inputEmail" class="visually-hidden">Email address</label>
                        <input type="text" id="inputEmail" class="form-control" placeholder="Введите имя"
                               name="input_name" required autofocus>
                    </div>
                    <div class="form-label-group">
                        <label for="inputPassword" class="visually-hidden">Password</label>
                        <input type="password" id="inputPassword" class="form-control" placeholder="Ведите пароль"
                               name="input_password" required>
                    </div>
                    <button class="w-100 btn btn-lg btn-primary" type="submit" name="input_submit">Вход</button>
                    <a href="../index_1.php"> Вход  </a>
                </form>
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
        </div>
    </div>
</body>
<script src="/js/jquery-3.6.0.min.js"></script>
<script src="js/bootstrap.bundle.js"></script>
<script src="/js/phpmail.js"></script>
</html>
