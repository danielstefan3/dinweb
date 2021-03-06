<?php if (!defined('APP_VERSION')) { exit; } ?>
<?php include "_header.php";?>
  <section class="jumbotron text-center">
    <div class="container pb-4">
      <h1 class="font-weight-bold">Series example</h1>
      <p class="lead font-weight-normal">Something short and leading about the collection below—its contents, the creator, etc. Make it short and sweet, but not too short so folks don’t simply skip over it entirely.</p>
      <p>
        <a href="?p=upload" class="btn btn-primary my-2">Upload a series</a>
      </p>
    </div>
    <div class="skewd bg-white"></div>
  </section>
  <div class="album py-5">
    <div class="container">
      <div class="row">
        <?php
          $series_array = get_all_series(6);
          if(!empty($series_array)):
          foreach ($series_array as $series):?>
          <div class="col-md-6 col-lg-4 d-flex flex-column">
            <div class="card mb-4 shadow-sm flex-fill">
              <img src="<?php echo "$series[cover]";?>" alt="" class="card-img-top">
              <div class="card-body">
                <h5 class="card-title"><?php echo "$series[title]";?></h5>
                <p class="card-text"><?php echo cut_text($series['story'],250)?></p>
              </div>
              <div class="card-footer d-flex justify-content-between align-items-center">
                <div class="btn-group position-static">
                  <a href="<?php echo "?p=details&id=$series[series_id]"?>" class="btn btn-sm btn-outline-secondary stretched-link">View</a>
                  <?php if($_SESSION['user_id'] == $series['user_id']):?>
                  <a href="<?php echo "?p=edit&id=$series[series_id]"?>" class="btn btn-sm btn-outline-secondary">Edit</a>
                  <?php endif;?>
                </div>
                <small class="text-muted"><?php echo time_elapsed_string($series['addtime'])?></small>
              </div>
            </div>
          </div>
          <?php endforeach;?>
          <?php else:?>
            <div class="col-12">
              <h6 class="text-center">There's no updated series.</h6>
            </div>
          <?php endif;?>
      </div>
    </div>
  </div>
<?php include "_footer.php"; ?>