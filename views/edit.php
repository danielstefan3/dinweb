<?php if (!defined('APP_VERSION')) { exit; } ?>
<?php
    $errors = [];
    if(is_post()) {
        print_r($_POST);
        $id = $_POST['id'];
        $title = $_POST['title'];
        $release_year = $_POST['release_year'];
        $story = $_POST['story'];
        $description = $_POST['description'];

        $cover_error = $_FILES['cover']['error'];
        $cover_type = $_FILES['cover']['type'];
        $cover_name = $_FILES['cover']['name'];

        if($title == null) {
            $errors['title'][] = 'Title is required';
        }
        
        if($release_year == null) {
            $errors['release_year'][] = 'Release year is required';
        } else {
            if(!is_numeric($release_year)) {
                $errors['release_year'][] = 'Release year must be a number';
            }
            if($release_year <= 1900) {
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

        // if($cover_error != null) {
        //     if($cover_error == '4') {
        //         $errors['cover'][] = 'You must upload a cover picture.';
        //     }
        // }

        if($cover_error != '4') {
            if($cover_type != 'image/jpeg' && $cover_type != 'image/png'){
                $errors['cover'][] = 'You must upload an image (jpeg,jpg,png).';
            }
        }
        if(count($errors) == 0) {
            $sql = $db->prepare("UPDATE series SET title = ?,story = ?,release_year = ?,description = ? WHERE series_id = ?");
            $sql->bind_param('ssisi', $title, $story, $release_year, $description, $id);
            $sql->execute();
            $sql->close();
            
            if(isset($_FILES['cover'])) {
                uploadImageFile("./data/","cover",$id);
            }
            redirect('details', ['id' => $id, 'success' => 1]);
            exit;
        }
        //dd($errors);
        //TODO: validate
    }
?>
<?php
    include "_header.php";
    if(isset($_GET['id'])):
    $series = get_series_by_id($_GET['id']);
?>
<div class="container">
    <h1>Edit series</h1>
    <form enctype="multipart/form-data" class="row" action="<?php echo page('edit'); ?>" method="POST" novalidate>
        <input type="hidden" name="id" value="<?php echo $series['series_id'];?>">
        <div class="form-group col-12 col-md-6">
            <label for="title">Title</label>
            <input type="text" class="form-control <?php echo is_invalid('title')?>" name="title" value="<?php echo $series['title'];?>">
            <?php echo html_errors('title')?>
        </div>
        <div class="form-group col-12 col-md-6">
            <label for="release_year">Release year</label>
            <input type="text" class="form-control <?php echo is_invalid('release_year')?>" name="release_year" value="<?php echo $series['release_year'];?>">
            <?php echo html_errors('release_year')?>
        </div>
        <div class="form-group col-12 col-md-6">
            <label for="story">Story</label>
            <textarea class="form-control <?php echo is_invalid('story')?>" name="story" rows="5"><?php echo $series['story'];?></textarea>
            <?php echo html_errors('story')?>
        </div>
        <div class="form-group col-12 col-md-6">
            <label for="description">Description</label>
            <textarea class="form-control <?php echo is_invalid('description')?>" name="description" rows="5"><?php echo $series['description'];?></textarea>
            <?php echo html_errors('description')?>
        </div>
        <div class="form-group col-6 upload-wrapper">	
            <div>
                <label for="cover">Upload cover</label>
            </div>
            <input type="file" name="cover" id="file" class="inputfile inputfile-2 form-control <?php echo is_invalid('cover')?>">
            <label for="file" class=" mb-0">
                <i class="fa fa-upload mr-3" data-original-title="" title=""></i>
                <span>Choose file</span>
            </label>
            <?php echo html_errors('cover')?>
        </div>
        <div class="form-group col-6 d-flex align-items-end justify-content-end">
            <button class="btn btn-primary" type="submit">Update</button>
        </div>
    </form>
</div>
<?php else: redirect();?>
<?php endif;?>
<?php include "_footer.php";?>