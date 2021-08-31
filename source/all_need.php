<?php
if(!isset($_SESSION))
{
    session_start();
}
$db_name = 'test';
$db_username = 'sdf';
$db_password = '!exesoft12';
$db_host = '127.0.0.1';
$db_client = mysqli_connect($db_host,$db_username,$db_password,$db_name);
if(!$db_client){
    die('Error db connect !!');
}
global $all_cameras;
global $db_client;