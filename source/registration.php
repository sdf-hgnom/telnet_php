<?php
include 'all_need.php';
$header_page = "Регистрация";
print_r($_POST);
$input_name = $_POST['input_name'] ??'';
$input_email = $_POST['input_email']??'';
$input_phone = $_POST['input_phone']??'';
$input_password = $_POST['input_password']??'';
$input_password2 = $_POST['input_password2']??'';
global $db_client;
$location_error = "register_form.php";

if (($input_password != $input_password2)){
    $_SESSION['message'] = 'Введенные пароли не соврадают (повторите ввод) !! ';
    header('Location:' . $location_error);

}
$check_user = mysqli_query($db_client, "SELECT * FROM `users` WHERE `name` = '$input_name'");
if (!$check_user) {
    echo mysqli_error($db_client);
}
if (mysqli_num_rows($check_user) > 0){
    $_SESSION['message'] = 'Такое имя уже есть придумайте другое !! ';
    header('Location:' . $location_error);
}
$password = password_hash($input_password,PASSWORD_DEFAULT );
$sql = "insert into `users`(`password`,`name`,`email`,phone) values ('$password','$input_name','$input_email','$input_phone')";
if (mysqli_query($db_client,$sql)){
    $last_id = mysqli_insert_id($db_client);
    print_r($last_id);
    $check_user = mysqli_query($db_client, "SELECT * FROM `users` WHERE `id` = $last_id");
    $user = mysqli_fetch_assoc($check_user);
    print_r($user);
    $_SESSION['user'] = [
        "id" => $user['id'],
        "name" => $user['name'],
        "email" => $user['email'],
        "status" => $user['status'],
        "phone" => $user['phone'],
        "date_registation" => $user['date_registation'],
    ];

    mysqli_close($db_client);
    if ($_SESSION['message']){
        $location = "register_form.php";
    }else{
        $location = "../index_1.php";
        unset($_SESSION['message']);
    }
//    unset($_SESSION['message']);
    header('Location: ' . $location);

}else{
    echo "Error insert" .mysqli_error($db_client) ,PHP_EOL;
}
?>
