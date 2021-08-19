<?php
require_once  'vendor/autoload.php';
require 'source/funcs.php';
require 'source/all_need.php';
$header_page = "First";
include "blocks/headers_no_map.php";
?>


<?php
global $db_client;
$t_s = '';
$start_date = null;
if(isset($_POST['submit'])){
    try {
        $t_s = new DateTime($_POST['start_time']);
    } catch (Exception $e) {
    }

    if (check_datetime($t_s->format("d-m-Y H:i"))){
        echo 'Valid';
        $start_date = $t_s->getTimestamp();
    } else {
        echo '<span>Введите корректеую дату-время</span>>';

    }
} else {
    echo "<span>Not Submitted!</span>";
}

echo date('d-m-Y H:i',$start_date) .  '<hr>';
?>
<!--страница -->


<body>
<div class="container">
<h1>TIME</h1>


</div>
</body>
<?php
include "blocks/footer.php";
