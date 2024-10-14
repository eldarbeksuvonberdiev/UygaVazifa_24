<?php
use App\App;
session_start();

include "autoload.php";
include "web.php";
include "App/Helpers/helper.php";

$app = new App();
$app->run();

?>