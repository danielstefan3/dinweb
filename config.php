<?php if (!defined('APP_VERSION')) { exit; } ?>
<?php

define('DOMAIN', 'http://localhost:80/dinw/');

define('DB_HOST', '127.0.0.1');
define('DB_NAME', 'dinw');
define('DB_USER', 'root');
define('DB_PASS', '');

if (isset($_GET['logout'])) {
    session_destroy();
    header("Location:" . DOMAIN);
}