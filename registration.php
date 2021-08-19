<?php
require 'vendor/autoload.php';
require 'source/funcs.php';
require 'source/all_need.php';
$header_page = "Регистрация";
include "blocks/headers_no_map.php";
?>

<?php
$error_register = '';
if(isset($_POST['input_submit'])) {

    if (isset($_POST['input_name'])) {
        $input_name = trim($_POST['input_name']);
        if ($input_name == '' or strlen($input_name) < 4){
            $error_register = 'Не введено или короткое имя !!';
            $_SESSION['error_registration'] = $error_register;

        }
    }
    if (isset($_POST['input_email'])) {
        $input_email = trim($_POST['input_email']);
        if (!($input_email == '' and strpos($input_email,'@'))){
            $error_register = 'Не корректное  или пустой email   !!';
            $_SESSION['error_registration'] = $error_register;
        }
    }
    if (isset($_POST['$input_telephone'])) {
        $input_telephone = trim($_POST['$input_telephone']);
        if ($input_telephone == '') {
            $error_register = 'Не введен телефон !!';
            $_SESSION['error_registration'] = $error_register;
        }
    }
    if (isset($_POST['input_password'])) {
        $input_password = trim($_POST['input_password']);
        if ($input_password == '' ){
            $error_register = 'Введен пустой пароль !!';
            $_SESSION['error_registration'] = $error_register;
        }
    }
    echo '<hr>';
    echo $input_name;
    echo $input_email;
    echo $input_telephone;
    echo $input_password;
}
?>
<body>
<div class="container">
    <h1>Регистрация</h1>
    <form action="#">
        <form class="form-control" action="time.php" method="post">
            <label for="FormControlMame" class="form-label ">Введите свое имя :</label>
            <input id="FormControlMame" type="text" class="form-control" name="input_name" placeholder="Введите свое имя">
            <label for="FormControlEmail" class="form-label">Введите свой email : </label>
            <input type="email" class="form-control" id="FormControlEmail" placeholder="name@example.com" name="input_email">
            <label for="FormControlTelephone" class="form-label">Введите свой телефон : </label>
            <input type="tel" class="form-control" name="input_telephone" id="FormControlTelephone" placeholder="номер телефона">
            <label for="FormControlPassword" class="form-label">Введите свой пароль : </label>
            <input type="password" autocomplete="on" class="form-control" name="input_password" id="FormControlPassword" >
            <label for="FormControlPassword2" class="form-label">Введите свой пароль повторно : </label>
            <input type="password" autocomplete="on" class="form-control" name="input_password2" id="FormControlPassword2" av >
            <input type = "submit" class="bnt btn-outline-primary" name = "input_submit" value = "отправить">
            <div class="form-control" >
                <?php
                var_dump($_SESSION);
                echo $error_register;
                unset($_SESSION['error_registration']);
                ?>

            </div>
        </form>
    </form>
</div>

</body>
<?php
include "blocks/footer.php";
