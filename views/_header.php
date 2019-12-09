<?php if (!defined('APP_VERSION')) { exit; } ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>play.it</title>
 
    <link rel="stylesheet" href="<?php echo asset("/css/bootstrap.min.css");?>">
</head>
<body>
    <header>
        <div class="container">
            <a class="logo" href="#">play.it</a>
            <nav>
                <ul>
                    <li>
                        <a <?php echo $page == 'home' ? 'class="active"' : ""; ?> href="<?php echo page(); ?>">Home</a>
                    </li>
                    <li>
                        <a <?php echo $page == 'about' ? 'class="active"' : ""; ?> href="<?php echo page('about'); ?>">About</a>
                    </li>
                    <li>
                        <a <?php echo $page == 'upload' ? 'class="active"' : ""; ?> href="<?php echo page('upload'); ?>">Upload</a>
                    </li>
                    <li>
                        <a href="?logout=1">Logout</a>
                    </li>
                </ul>
            </nav>
        </div>
    </header>
    <main class="container">
    <!-- End of Header -->