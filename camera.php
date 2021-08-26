<?php
require_once  'vendor/autoload.php';
require 'source/funcs.php';
require 'source/all_need.php';
$header_page = "One camera";
include "blocks/headers_no_map.php";
?>

<?php
var_dump($_REQUEST);
var_dump($_GET);
$current_number = $_REQUEST['camera'];
$name = getenv("VIDEO_USER");
$password = getenv("VIDEO_PASSWORD");
$token = get_token($name, $password);

$one = get_this($current_number,$token);
$token_l = $one['results'][0]['token_l'];
$number = $one['results'][0]['number'];
$address = $one['results'][0]['address'];
$title = $one['results'][0]['title'];
$server = $one['results'][0]['server']['domain'];
$video_live = "https://" . $server . "/" . $number ."/embed.html?autoplay=true&realtime=true&token=".$token_l;

echo '<pre>';
//var_dump($res);
var_dump($number);
var_dump($address);
var_dump($title);
var_dump($server);
echo '</pre>';

echo "<hr>";


?>
<!---->
<body>
<div class="container">
    <a href="index.php">Назад</a>
    <h1 class="main_header"><?php echo $address . "( " . $title ." )";?></h1>
<!--    <img class="foto" source="--><?php //echo "images/" .$number . "~400.jpg";?><!--" alt="camera">-->
    <iframe style="width:400px; height:300px;display: block; margin: 0 auto"  src="<?php echo  $video_live;?>"></iframe>

    <form class="form" action="" method="post">
        <label>
            Start data :
            <input type="text" name="start_time" pattern="[0-9]{2}-[0-9]{2}-[0-9]{4} [0-9]{2}:[0-9]{2}" placeholder="dd-mm-yyyy hh:mm">
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
        $unix_datetime_correct = $unix_datetime_start - (8 *60*60);
        var_dump($unix_datetime_start);
        var_dump($date_time);

        $body_dl = array('fields' => array(
            'token_d',),
            'numbers' => [$number],
            'token_d_ttl' => 3600,
            'token_d_duration' => 300,
            "token_d_start" => $unix_datetime_correct,
        );
        var_dump($unix_datetime_start);
        $res =  get_api('https://cloud.ucams.ru/api/v0/cameras/this/', $token, $body_dl);
        $token_d = $res['results'][0]['token_d'];
        $url_dl = "https://" . $server . "/" . $number ."/archive-" .$unix_datetime_correct . "-300.mp4?token=" . $token_d;
        $url_dl1 = "https://" . $server . "/" . $number ."/" .$number ."-" .$unix_datetime_correct . "-300.mp4?token=" . $token_d;
//        echo $date_time . "-->" .  $unix_datetime_start . "<br>";
//        echo $token_d;
        $video_save = "upload/" . $number . "_" . $unix_datetime_correct . "_300.mp4";

/*
 *    save file
 */
//        var_dump($url_dl);
        $handle_in = fopen($url_dl,"rb");
        $handle_out = fopen($video_save,"wb");
        $res_copy = stream_copy_to_stream($handle_in,$handle_out);
        fclose($handle_in);
        fclose($handle_out);
//        var_dump($res_copy);

        echo "<hr>";


    }


    ?>

<!--    <video source="--><?php //echo $url_dl ?><!-- " controls="controls" preload="auto"> Просморт </video>-->
    <?php
    sleep(5);


    ?>


<!--    <a href="--><?php //echo $url_dl; ?><!--"> Save</a>-->
</div>
</body>
<?php
include "blocks/footer.php";
