<?php
require_once  'vendor/autoload.php';
require 'funcs.php';
require 'all_need.php';

global $db_client;
$t_s = '';
if(isset($_POST['submit'])){
    echo "<span>Submitted!</span>";
    $t_s =$_POST['start_time'];
    var_dump($t_s);
    if (check_datetime($t_s)){
        echo 'Valid';
        $start_date = strtotime($t_s);
    } else {
        echo '<span>Введите корректеую дату-время</span>>';

    }
} else {
    echo "<span>Not Submitted!</span>";
}

echo $start_date . '<br>';
echo date('d-m-Y H:i',$start_date) .  '<hr>';
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>time</title>
</head>
<body>
<h1>TIME</h1>

<form action="time.php" method="post">
    <label>
        Start data :
        <input type="datetime-local" name="start_time" pattern="[0-9]{2}-[0-9]{2}-[0-9]{4} [0-9]{1,2}:[0-9]{1,2}" placeholder="dd-mm-yyyy hh:mm">
    </label>

    <br>
    <input type = "submit" name = "submit" value = "отправить">
</form>

</body>
</html>