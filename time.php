<?php
require_once  'vendor/autoload.php';
require 'source/funcs.php';
require 'source/all_need.php';
$header_page = "First";
include "blocks/headers.php";
?>


<?php
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
<!--страница -->


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
<?php
include "blocks/footer.php";
