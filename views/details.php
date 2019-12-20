<?php if (!defined('APP_VERSION')) { exit; } ?>
<?php
    if(!isset($_GET['id'])) {
        redirect("404");
    }

    $album = get_series_by_id($_GET['id']);

    if($album == null) {
        redirect("404");
    }
?>
<?php include "_header.php"; ?>
<div class="container">
    <h1><?php echo $album['title'];?></h1>
    <p><?php?></p>
</div>
<?php include "_footer.php"; ?>