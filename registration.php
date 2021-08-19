<?php
require 'vendor/autoload.php';
require 'source/funcs.php';
require 'source/all_need.php';
$header_page = "Регистрация";
include "blocks/headers_no_map.php";
?>

<?php
$error_register = [];
if(isset($_POST['input_submit'])) {
    if (isset($_POST['input_name'])) {
        $input_name = trim($_POST['input_name']);
        if ($input_name == '' or strlen($input_name) < 4){
            $error_message = 'Не введено или короткое имя !!';
            $error_register[] = $error_message;
            $_SESSION['error_registration'] = $error_register;
        }
    }
    if (isset($_POST['input_email'])) {
        $input_email = trim($_POST['input_email']);
        $t = $input_email == '';
        $p = strpos($input_email,'@') ==0;
        var_dump($t);
        var_dump($p);
        if (($input_email == '' and strpos($input_email,'@'))){
            $error_message = 'Не корректное  или пустой email   !!';
            $error_register[] = $error_message;
            $_SESSION['error_registration'] = $error_register;
        }
    }
    if (isset($_POST['input_telephone'])){
        $input_telephone = trim($_POST['input_telephone']);
        if ($input_telephone == ''){
            $error_message = 'Введен пустой телефон !!';
            $error_register[] = $error_message;
            $_SESSION['error_registration'] = $error_register;
        }
    }
    if (isset($_POST['input_password'])) {
        $input_password = trim($_POST['input_password']);
        if ($input_password == '' ){
            $error_message = 'Введен пустой пароль !!';
            $error_register[] = $error_message;
            $_SESSION['error_registration'] = $error_register;
        }
    }
    echo '<hr>';
    echo '<pre>';
    echo $input_name . '<br>';
    echo $input_email. '<br>';
    echo $input_telephone. '<br>';
    echo $input_password. '<br>';
    echo '</pre>';
    echo '<hr>';
}
?>
<body>
<div class="container">
    <h1>Регистрация</h1>
    <form action="#" method="post">
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
            <input type="password" autocomplete="on" class="form-control" name="input_password2" id="FormControlPassword2"  >
            <input type = "submit" class="bnt btn-outline-primary" name = "input_submit" value = "отправить">
            <div class="form-control" >


            </div>
        </form>
    </form>
</div>

</body>
<?php
include "blocks/footer.php";
var_dump($_POST);
print_r($_SESSION);
