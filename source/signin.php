<!--signin.php-->
<!--форма входа-->
<?php
require 'all_need.php';
global $db_client;
$header_page = "Вход";
//unset($_SESSION['message_no_user']);
//unset($_SESSION['message']);
$location_error = "sign_in_form.php";
$location_ok = "../index_1.php";
if (isset($_POST['input_submit'])) {
    $input_name = $_POST['input_name'];
    $input_password = $_POST['input_password'];
    var_dump($input_name);
    var_dump($input_password);
    $check_user = mysqli_query($db_client, "SELECT * FROM `users` WHERE `name` = '$input_name'");
    if (!$check_user) {
        echo mysqli_error($db_client);
    }
    if (mysqli_num_rows($check_user) > 0) {

        $user = mysqli_fetch_assoc($check_user);
        if (password_verify($input_password, $user['password'])) {
            $_SESSION['user'] = [
                "id" => $user['id'],
                "name" => $user['name'],
                "email" => $user['email'],
                "status" => $user['status'],
                "phone" => $user['phone'],
                "date_registation" => $user['date_registation']
            ];

        } else {
            $_SESSION['message'] = 'Введенный пароль не верен !!';
            header('Location:' . $location_error);
        }


    } else {
        $_SESSION['message_no_user'] = "Нету пользователя $input_name Зарегистрируйтесь !!";
        header("Location:" .$location_error);

    }
}
if ($_SESSION['user']){
    unset($_SESSION['message_no_user']);
    unset($_SESSION['message']);
    header("Location:" .$location_ok);
};


