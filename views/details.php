<?php if (!defined('APP_VERSION')) { exit; } ?>
<?php
    if(!isset($_GET['id'])) {
        redirect("404");
    }

    $series = get_series_by_id($_GET['id']);

    if($series == null) {
        redirect("404");
    }
?>
<?php include "_header.php"; ?>
<div class="container">
    <div class="row">
        <div class="col-12 col-md-6 d-flex flex-column justify-content-center">
            <h1 class="text-center"><?php echo $series['title'];?></h1>
            <p class="text-center small text-muted"><?php echo get_genres_by_id($series['series_id'])?></p>
            <p><?php echo $series['story']?></p>
        </div>
        <div class="col-12 col-md-6 img-container">
        <div class="skewd top"></div>
            <img src="<?php echo $series['cover']?>" class="img-fluid" alt="<?php echo $series['title'];?>" title="<?php echo $series['title'];?>">
        <div class="skewd bottom"></div>
        </div>
        <div class="col-12 mt-4 my-5">
        <blockquote class="blockquote text-center border border-secondary p-4 bg-light">
            <p class="mb-0"><?php echo $series['description']?></p>
            <footer class="blockquote-footer">review by <cite title="Source Title"><?php echo get_username_by_id($series['user_id'])?></cite></footer>
        </blockquote>
        </div>
    </div>
</div>
<?php include "_footer.php"; ?>