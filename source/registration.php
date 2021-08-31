<?php
include 'all_need.php';
$header_page = "Регистрация";
print_r($_POST);
$input_name = $_POST['input_name'];
$input_emal = $_POST['input_email'];
$input_phone = $_POST['input_phone'];
$input_password = $_POST['input_password'];
$input_password2 = $_POST['input_password2'];
global $db_client;

if ($input_password != $input_password2){
    $_SESSION['message'] = 'Введенные пароли не соврадают (повторите ввод) !! ';
}

?>
<pre>
    <?
    echo $input_name;
    echo $input_emal;
    echo $input_password;
    echo $input_password2;
    echo $input_phone;
    ?>
</pre>

