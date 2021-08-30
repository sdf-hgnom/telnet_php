<?php
session_start();
unset($_SESSION['user']);
$location = "../index_1.php";
unset($_SESSION['message_no_user']);
unset($_SESSION['message']);
header("Location:" .$location);
