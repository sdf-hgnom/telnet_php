<?php
require 'd:/PHP_composer/vendor/autoload.php';
require 'funcs.php';

use GuzzleHttp\Client;

$name = getenv("VIDEO_USER");
$password = getenv("VIDEO_PASSWORD");
$token = get_token($name, $password);
//$body = array('fields' => array(
//    'number', 'token_l', 'address', 'server','title'),
//    'numbers' => ['1627277293VCG202'],
//);
$one = get_this('1627277293VCG202',$token);
$token_l = $one['results'][0]['token_l'];
$number = $one['results'][0]['number'];
$address = $one['results'][0]['address'];
$title = $one['results'][0]['title'];
$server = $one['results'][0]['server']['domain'];
//$body_dl = array('fields' => array(
//    'number', 'token_l', 'address', 'server','token_d'),
//    'numbers' => ['1627277293VCG202'],
//    'token_d_ttl' => 3600,
//
//
//);

//$body_l = array('fields' => array(
//    'token_d', 'server','address','title'),
//    'numbers' => ['1627277293VCG202'],
//    'token_d_ttl' => 3600,
//    'token_d_duration' => 300,
//    "token_d_start" => '1628661488',
//
//
//);
//echo  time();

echo '<pre>';
//var_dump($res);
var_dump($number);
var_dump($address);
var_dump($title);
var_dump($server);
echo '</pre>';

echo "<hr>";


?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <title>One camera</title>
</head>
<body>
<div class="container">
    <a href="index.php">Назад</a>
    <h1 class="main_header"><?php echo $address . "( " . $title ." )";?></h1>
    <img class="foto" src="<?php echo "images/" .$number . "~400.jpg";?>" alt="camera">
    <form class="form" action="" method="post">
        <label>
            Start data :
            <input type="datetime" name="start_time" pattern="[0-9]{2}-[0-9]{2}-[0-9]{4} [0-9]{2}:[0-9]{2}" placeholder="dd-mm-yyyy hh:mm">
        </label>

        <br>
        <input type = "submit" name = "submit" value = "отправить">
        <button type="reset" name="reset"> Отчистить</button>
    </form>
    <?php
    $date_time = null;
    if (isset($_POST['submit'] ) and isset($_POST['start_time']) and ltrim($_POST['start_time']) != ''){
        $date_time = $_POST['start_time'];
        if (!check_datetime($date_time)){
            echo "Error date : " . $date_time;
            $date_time = null;
        }
        $unix_datetime_start  = 0;
        $unix_datetime_start = strtotime($date_time);

        $body_dl = array('fields' => array(
            'token_d',),
            'numbers' => [$number],
            'token_d_ttl' => 3600,
            'token_d_duration' => 300,
            "token_d_start" => $unix_datetime_start,
        );
        var_dump($unix_datetime_start);
        $res =  get_api('https://cloud.ucams.ru/api/v0/cameras/this/', $token, $body_dl);
        $token_d = $res['results'][0]['token_d'];
        $url_dl = "https://" . $server . "/" . $number ."/archive-" .$unix_datetime_start . "-300.mp4?token=" . $token_d;
//        echo $date_time . "-->" .  $unix_datetime_start . "<br>";
//        echo $token_d;
        $video_save = "upload/" . $number . "_" . $unix_datetime_start . "_300.mp4";
//        var_dump($url_dl);
//        $handle_in = fopen($url_dl,"rb");
//        $handle_out = fopen($video_save,"wb");
//        $res_copy = stream_copy_to_stream($handle_in,$handle_out);
//        fclose($handle_in);
//        fclose($handle_out);
//        var_dump($res_copy);

        echo "<hr>";


    }


    ?>

<!--    <video src="--><?php //echo $url_dl ?><!-- " controls="controls" preload="auto"> Просморт </video>-->
    <?php


    ?>


    <a href="<?php echo $url_dl; ?>"> Save</a>
</div>
</body>
</html>
