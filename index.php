<?php

define('APP_VERSION', '1.0.0');

include "config.php";
include "functions.php";
include "database.php";

$page = isset($_GET['p']) ? $_GET['p'] : 'home';
$db = db_connect();

if (file_exists("./views/$page.php")) {
    include "./views/$page.php";
} else {
    include "./views/404.php";
}

db_close();