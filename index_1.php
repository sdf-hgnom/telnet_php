<?php

require 'vendor/autoload.php';
require 'source/funcs.php';
require 'source/all_need.php';
require 'config.php';
$header_page = "Main";
include "blocks/headers_no_map.php";
//const CAMERA_CVS = 'E:\work\prog\php\telnet\camera.cvs';
const CAMERA_CVS = '/camera.cvs';
global $all_cameras;
var_dump($all_cameras);


?>

<body>
<h1>test 34343</h1>
<!--<form action="index_1.php" method="post">-->
<!--    <input id="id_text" type="text" name="param" value="">-->
<!--    <input id="id_submit" type="submit">-->
<!--</form>-->
</body>

<?php
include "blocks/footer.php";

var_dump($_POST);

