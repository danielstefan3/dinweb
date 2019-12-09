<?php if (!defined('APP_VERSION')) { exit; } ?>
<?php include "_header.php";?>
<p>Home content</p>
<div>
    <?php echo page('about'); ?> <br>
    <?php echo page('details', ['id' => 5]); ?> <br>
    <?php echo page('details', ['id' => 10]); ?> <br>

    <?php echo page('watch', ['v' => '3rfsw4t3w', 't' => 310]); ?> <br>
    
</div>
<?php include "_footer.php"; ?>