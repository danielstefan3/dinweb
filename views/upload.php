<?php if (!defined('APP_VERSION')) { exit; } ?>
<?php
    $errors = [];

    if(is_post()) {
        $title = $_POST['title'];
        $artist = $_POST['artist'];
        $year = $_POST['year'];
        $description = $_POST['description'];

        if($title == null) {
            $errors['title'][] = 'Title is required';
        }

        if($artist == null) {
            $errors['artist'][] = 'Artist is required';
        }

        if($year == null) {
            $errors['year'][] = 'Year is required';
        } else {
            if(!is_numeric($year)) {
                $errors['year'][] = 'Year must be a number';
            }
            if($year <= 1900) {
                $errors['year'][] = 'Year must be higher then 1900';
            }
        }

        if($description == null) {
            $errors['description'][] = 'Description is required';
        } else {
            if(strlen($description) < 50) {
                $errors['description'][] = 'Description have to be at least 50 characters long';
            }
        }

        if(count($errors) == 0) {
            $sql = $db->prepare("INSERT INTO albums (title,artist,year,description) VALUES (?,?,?,?)");
            $sql->bind_param('ssis', $title, $artist, $year, $description);
            $sql->execute();
            $sql->close();

            $new_id = $db->insert_id;

            redirect('details', ['id' => $new_id, 'success' => 1]);
        }
        //dd($errors);
        //TODO: validate
    }
?>
<?php include "_header.php";?>
<div class="page page-upload">
    <h1>Upload</h1>
    <form action="<?php echo page('upload'); ?>" method="POST">
        <div class="form-group<?php echo isset($errors['title'])?' has-error':'';?>">
            <label for="title">Album title</label>
            <input type="text" class="form-input" name="title" value="<?php echo isset($title)?$title:'';?>">
            <?php echo html_errors('title')?>
        </div>
        <div class="form-group<?php echo isset($errors['artist'])?' has-error':'';?>">
            <label for="artist">Artist</label>
            <input type="text" class="form-input" name="artist" value="<?php echo isset($artist)?$artist:'';?>">
            <?php echo html_errors('artist')?>
        </div>
        <div class="form-group<?php echo isset($errors['year'])?' has-error':'';?>">
            <label for="year">Year</label>
            <input type="number" class="form-input" name="year" value="<?php echo isset($year)?$year:'';?>">
            <?php echo html_errors('year')?>
        </div>
        <div class="form-group<?php echo isset($errors['description'])?' has-error':'';?>">
            <label for="description">Description</label>
            <textarea class="form-input" name="description" rows="5"><?php echo isset($description)?$description:'';?></textarea>
            <?php echo html_errors('description')?>
        </div>
        <div class="form-group">
            <button class="btn" type="submit">Create</button>
        </div>
    </form>
</div>
<?php include "_footer.php";?>