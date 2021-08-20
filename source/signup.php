<?php
require 'all_need.php';
global $db_client;
$input_name = null;
$input_email= null;
$input_telephone= null;
$input_password= null;
$input_password2= null;
$error_message = null;
if(isset($_POST['input_submit'])){
    if (isset($_POST['input_name'])){
        $input_name = trim($_POST['input_name']);
        if ($input_name == ''){
            $_SESSION['message'] = 'Введите имя !!';
            header('Location: registration.php');
            exit();
        }
    }
    if (isset($_POST['input_email'])){
        $input_email = trim($_POST['input_email']);
        if ($input_email == ''){
            $_SESSION['message'] = 'Введите email !!';
            header('Location: registration.php');
            exit();
        }
    }
    if (isset($_POST['input_telephone'])){
        $input_telephone = trim($_POST['input_telephone']);
        if ($input_telephone == ''){
            $_SESSION['message'] = 'Введить телефон !!';
            header('Location: registration.php');
            exit();
        }
    }
    if (isset($_POST['input_password'])){
        $input_password = trim($_POST['input_password']);
        if ($input_password == ''){
            $_SESSION['message'] = 'Введите пароль !!';
            header('Location: registration.php');
            exit();
        }
    }
    if (isset($_POST['input_password2'])){
        $input_password2 = trim($_POST['input_password2']);
        if ($input_password2 == ''){
            $_SESSION['message'] = 'Введите пароль  повторно !!';
            header('Location: registration.php');
            exit();
        }
    }
    if ($input_password != $input_password2){
        $_SESSION['message'] = 'Введенные пароли не совпадают !!';
        header('Location: registration.php');
        exit();
    }
    echo $input_name . '<br>';
    echo $input_email . '<br>';
    echo $input_telephone . '<br>';
    echo $input_password . '<br>';
    echo $input_password2 . '<br>';
    $hash = password_hash($input_password, PASSWORD_DEFAULT);

    if (mysqli_query($db_client, "INSERT INTO `users` (`name`, `email`,  `password`,`telephone` ) VALUES ( '$input_name','$input_email', '$hash', '$input_telephone')")){
        echo 'OK !!';
    }else {
        echo mysqli_error($db_client);
    }



}

print_r($_SESSION);

