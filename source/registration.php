<?php
include '../source/all_need.php';
$header_page = "Регистрация";
include "../blocks/headers_no_map.php";
?>

    <body>
    <div class="container">
        <div class="row">
            <h1>Регистрация</h1>
            <div class="col-12">
                <form class="form-control" action="signup.php" method="post">
                    <label for="FormControlMame" class="form-label ">Введите свое имя :</label>
                    <input id="FormControlMame" type="text" class="form-control" name="input_name"
                           placeholder="Введите свое имя">
                    <label for="FormControlEmail" class="form-label">Введите свой email : </label>
                    <input type="email" class="form-control" id="FormControlEmail" placeholder="name@example.com"
                           name="input_email">
                    <label for="FormControlTelephone" class="form-label">Введите свой телефон : </label>
                    <input type="tel" class="form-control" name="input_telephone" id="FormControlTelephone"
                           placeholder="номер телефона">
                    <label for="FormControlPassword" class="form-label">Введите свой пароль : </label>
                    <input type="password" autocomplete="on" class="form-control" name="input_password"
                           id="FormControlPassword">
                    <label for="FormControlPassword2" class="form-label">Введите свой пароль повторно : </label>
                    <input type="password" autocomplete="on" class="form-control" name="input_password2"
                           id="FormControlPassword2">
                    <div class="form-control">
                        <input type="submit" class="bnt btn-outline-primary" name="input_submit" value="Регимтрироваит">
                        <a class="nav-link active" href="signin.php">Отменить</a>
                    </div>
                    <div class="form-control">
                        <?php
                        if (isset($_SESSION['message'])) {
                            echo '<div class="form-control"> ' . $_SESSION['message'] . ' </p>';

                        }
                        unset($_SESSION['message']);
                        ?>
                        <a href="registration.php"></a>

                    </div>
                </form>
            </div>
        </div>
    </div>

    </body>
<?php
include "../blocks/footer.php";
print_r($_SESSION);