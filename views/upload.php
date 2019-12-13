<?php if (!defined('APP_VERSION')) { exit; } ?>
<?php
    $errors = [];

    if(is_post()) {
        $title = $_POST['title'];
        $release_year = $_POST['release_year'];
        $story = $_POST['story'];
        $description = $_POST['description'];

        if($title == null) {
            $errors['title'][] = 'Title is required';
        }

        
        if($release_year == null) {
            $errors['release_year'][] = 'Release year is required';
        } else {
            if(!is_numeric($year)) {
                $errors['release_year'][] = 'Release year must be a number';
            }
            if($year <= 1900) {
                $errors['release_year'][] = 'Release year must be higher then 1900';
            }
        }

        if($story == null) {
            $errors['story'][] = 'Story is required';
        } else {
            if(strlen($story) < 50) {
                $errors['story'][] = 'Story have to be at least 50 characters long';
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
<div class="container">
    <h1>Upload series</h1>
    <form class="row" action="<?php echo page('upload'); ?>" method="POST" novalidate>
        <div class="form-group col-12 col-md-6">
            <label for="title">Title</label>
            <input type="text" class="form-control <?php echo is_invalid('title')?>" name="title" value="<?php echo isset($title)?$title:'';?>">
            <?php echo html_errors('title')?>
        </div>
        <div class="form-group col-12 col-md-6">
            <label for="release_year">Release year</label>
            <input type="text" class="form-control" name="release_year" value="<?php echo isset($release_year)?$release_year:'';?>">
            <?php echo html_errors('release_year')?>
        </div>
        <div class="form-group col-12 col-md-6">
            <label for="story">Story</label>
            <textarea class="form-control" name="story" rows="5"><?php echo isset($story)?$story:'';?></textarea>
            <?php echo html_errors('story')?>
        </div>
        <div class="form-group col-12 col-md-6">
            <label for="description">Description</label>
            <textarea class="form-control" name="description" rows="5"><?php echo isset($description)?$description:'';?></textarea>
            <?php echo html_errors('description')?>
        </div>
        <div class="form-group col-6 upload-wrapper">	
            <div>
                <label for="image">Upload cover</label>
            </div>
            <input type="file" name="image" id="file" class="inputfile inputfile-2">
            <label for="file" class=" mb-0">
                <i class="fa fa-upload mr-3" data-original-title="" title=""></i>
                <span>Choose file</span>
            </label>
        </div>
        <div class="form-group col-6 d-flex align-items-end justify-content-end">
            <button class="btn btn-primary" type="submit">Create</button>
        </div>
    </form>
</div>
<?php include "_footer.php";?>