<!--signin.php-->
<!--форма входа-->
<?php
require 'all_need.php';
global $db_client;
$header_page = "Вход";
include "../blocks/headers_no_map.php";
?>
    <body>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="text-center">
                <h1 class="h3 mb-3 fw-normal">Please sign in</h1>
                <form class="form text-center" action="">
                    <div class="form-label-group">
                    <label for="inputEmail" class="visually-hidden">Email address</label>
                    <input type="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
                    </div>
                    <div class="form-label-group">
                    <label for="inputPassword" class="visually-hidden">Password</label>
                    <input type="password" id="inputPassword" class="form-control" placeholder="Password" required>
                    </div>
                    <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
                </form>
                </div>
<!--                <form class="form-control" action="#" method="post">-->
<!--                    <label for="FormControlName" class="form-label ">Введите свое имя :</label>-->
<!--                    <input id="FormControlName" type="text" class="form-control" name="input_name"-->
<!--                           placeholder="Введите свое имя">-->
<!--                    <label for="FormControlPassword" class="form-label ">Введите свой пароль :</label>-->
<!--                    <input id="FormControlPassword" type="password" class="form-control" name="input_password"-->
<!--                           placeholder="Введите свой пароль">-->
<!--                    <input type="submit" class="bnt btn-outline-primary" name="input_submit" value="отправить">-->
<!--                </form>-->
<!--            </div>-->
        </div>
<?php
include "../blocks/footer.php";
if (isset($_POST['input_submit'])) {
    $input_name = $_POST['input_name'];
    $input_password = $_POST['input_password'];
    $check_user = mysqli_query($db_client, "SELECT * FROM `users` WHERE `name` = '$input_name'");
    if (!$check_user) {
        echo mysqli_error($db_client);
    }
    if (mysqli_num_rows($check_user) > 0) {

        $user = mysqli_fetch_assoc($check_user);
        if (password_verify($input_password, $user['password'])) {
            $_SESSION['user'] = [
                'id' => $user['id'],
                'name' => $user['name'],
                'email' => $user['email'],
                'status' => $user['status'],
                'telephone' => $user['telephone'],
            ];
            var_dump($_SESSION);

        } else {
            echo "Error password !!";
        }


    } else {
        echo 'Нет такого пользователя !! -- Зарегистрируйтусь !!';
        echo '<a href="registration.php">Зарегистрируйтусь !!</a>';
    }
}
