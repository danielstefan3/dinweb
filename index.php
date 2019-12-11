<?php

define('APP_VERSION', '1.0.0');

session_start();

include "config.php";
include "functions.php";
include "database.php";

$page = isset($_GET['p']) ? $_GET['p'] : 'home';
$db = db_connect();

if (file_exists("./views/$page.php")) {
    if (isset( $_SESSION['user_id'])) {
        include "./views/$page.php";
    }
    elseif($page == 'login' || $page == 'registration') {
        include "./views/$page.php";
    }
    else include "./views/login.php";
} else {
    include "./views/404.php";
}

db_close();