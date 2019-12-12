<?php if (!defined('APP_VERSION')) { exit; } ?>
<?php
    $errors = [];

    if(is_post()) {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $password_confirm = $_POST['password_confirm'];
        $terms = $_POST['terms'];

        if($username == null) {
            $errors['username'][] = 'Please choose a username.';
        }

        if($email == null) {
            $errors['email'][] = 'Email is required!';
        }
        else {
        // server side input type="email"
        $regex = '/^[^0-9][_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/';
            if (!preg_match($regex, $email)) {
                $errors['email'][] = 'This is not a valid e-mail address!';
            }
        }

        if($password == null) {
            $errors['password'][] = 'Password is required!';
        }
        else {
            $regex = '/(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$/';
            if (!preg_match($regex, $password)) {
                $errors['password'][] = 'This password is not strong enough!';
            }
            // $regex_length = '/^(?=^.{8,}$)*$/';
            // $regex_lowercase = '/^(?=.*[a-z])*$/';
            // $regex_uppercase = '/^(?=.*[A-Z])*$/';
            // $regex_number = '/^(?=.*\d)*$/';
            // if(!preg_match($regex_uppercase, $password)) {
            //     $errors['password'][] = 'Password must include one uppercase letter';
            // }
            // if (!preg_match($regex_length, $password)) {
            //     $errors['password'][] = 'Password\'s length must be between 8 and 16';
            // }
            // if(!preg_match($regex_lowercase, $password)) {
            //     $errors['password'][] = 'Password must include one lowercase letter';
            // }
            // if(!preg_match($regex_number, $password)) {
            //     $errors['password'][] = 'Password must include one number';
            // }
        }

        if($password_confirm == null){
            $errors['password_confirm'][] = 'Please fill in this field.';
        }
        else {
            if($password_confirm != $password) {
                $errors['password_confirm'][] = 'Passwords does not match!';
            }
        }

        if($terms != 'agree') {
            $errors['terms'][] = 'You must agree before submitting.';
        }

        if(count($errors) == 0) {
            $sql = $db->prepare("INSERT INTO users (username,email,password) VALUES (?,?,?)");
            $sql->bind_param('sss', $username, $email, password_hash("$password",PASSWORD_DEFAULT));
            if($sql->execute()) {
                $sql ->close();
                redirect();
            }
            else {
                $sql ->close();
                $errors['username'][] = 'Something went wrong.';
                $errors['email'][] = 'Sorry.';
                $errors['password'][] = ':D';
            }
        }
        //dd($errors);
        //TODO: validate
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign In</title>
 
    <link rel="stylesheet" href="<?php echo asset("/css/bootstrap.min.css");?>">
    <link rel="stylesheet" href="<?php echo asset("/css/login.css");?>">
</head>
<body class="text-center">
<form class="form-signin form-registration d-flex flex-column align-items-center" action="<?php echo page('registration'); ?>" method="POST" novalidate>
  <img class="mb-4" src="<?php echo asset("/images/television.svg");?>" alt="" width="72" height="72">
  <h1 class="h3 mb-3 font-weight-normal">Registration</h1>
  <div class="row">
    <div class="col-12 col-sm-6">
        <label class="font-weight-bold" for="inputUsername">Username</label>
        <input type="text" id="inputUsername" class="form-control rounded <?php echo is_invalid('username')?>" name="username" placeholder="Username" autofocus=""  value="<?php echo isset($username)?$username:'';?>">
        <?php echo html_errors('username')?>
    </div>
    <div class="col-12 col-sm-6">
        <label class="font-weight-bold mt-2 mt-sm-0" for="inputEmail">Email address</label>
        <input type="email" id="inputEmail" class="form-control rounded <?php echo is_invalid('email')?>" name="email" placeholder="Email address" autofocus=""  value="<?php echo isset($email)?$email:'';?>">
        <?php echo html_errors('email')?>
    </div>
    <div class="col-12 col-sm-6">
        <label class="font-weight-bold mt-2" for="inputPassword">Password<img class="ml-2" src="<?php echo asset("/images/info-circle-solid.svg");?>" height="20" alt="info" data-toggle="tooltip" data-placement="right" title="Password must include one uppercase letter, one lowercase letter, one number, and must be at least 8 characters long!"></label>
        <input type="password" id="inputPassword" class="form-control rounded <?php echo is_invalid('password')?>" name="password" placeholder="Password">
        <?php echo html_errors('password')?>
    </div>
    <div class="col-12 col-sm-6">
        <label class="font-weight-bold mt-2" for="inputPasswordConfirm">Password confirm</label>
        <input type="password" id="inputPasswordConfirm" class="form-control rounded <?php echo is_invalid('password_confirm')?>" name="password_confirm" placeholder="Password again...">
        <?php echo html_errors('password_confirm')?>
    </div>
    <div class="col-12 col-sm-6 offset-0 offset-sm-3 mt-3">
        <div class="custom-control custom-checkbox">
            <input type="hidden" name="terms" value="disagree">
            <input type="checkbox" class="custom-control-input <?php echo is_invalid('terms')?>" id="customCheck1" name="terms" value="agree">
            <label class="custom-control-label" for="customCheck1">I accept <a href="#">terms and conditions</a></label>
            <?php echo html_errors('terms')?>
        </div>
        <button class="btn btn-lg btn-dark btn-block mt-2" type="submit">Submit</button>
        <a href="?p=login">Already have an account? Log in!</a>
        <p class="mt-5 mb-3 text-muted">©mh0cft 2019</p>
    </div>
    </div>
</form>
<script src="<?php echo asset("/js/jquery-3.4.1.min.js");?>"></script>
<script src="<?php echo asset("/js/popper.min.js");?>"></script>
<script src="<?php echo asset("/js/bootstrap.min.js");?>"></script>
<script src="<?php echo asset("/js/main.js");?>"></script>
</body>
<html>