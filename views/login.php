<?php if (!defined('APP_VERSION')) { exit; } ?>
<?php
    $errors = [];

    if(is_post()) {
        $email = $_POST['email'];
        $password = $_POST['password'];

        if($email == null) {
            $errors['email'][] = 'Email is required!';
            $errors['both'][] = 'Email is required!';
        }
        else {
        // server side input type="email"
        $regex = '/^[^0-9][_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/';
            if (!preg_match($regex, $email)) {
                $errors['email'][] = 'This is not a valid e-mail address!';
                $errors['both'][] = 'This is not a valid e-mail address!';
            }
        }

        if($password == null) {
            $errors['password'][] = 'Password is required!';
            $errors['both'][] = 'Password is required!';
        }

        if(count($errors) == 0) {
            $sql = $db->prepare("SELECT * FROM users WHERE email = ?");
            $sql->bind_param('s', $email);
            $sql->execute();
            $result = $sql->get_result();
            $user = $result->fetch_object();
            $sql ->close();

            // Verify user password and set $_SESSION
            if ( $user && password_verify( $password, $user->password ) ) {
                $_SESSION['user_id'] = $user->id;
                redirect();
            }
            else {
                $errors['email'][] = 'Invalid username/password!';
                $errors['password'][] = 'Invalid username/password!';
                $errors['both'][] = 'Invalid username/password!';
            }
        }
        //dd($errors);
        //TODO: validate
    }
?>

<?php
$hashed_pw = password_hash("Qwertz123",PASSWORD_DEFAULT);
$decrypted_pw = password_verify("sajt",$hashed_pw);
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
    <form class="form-signin" action="<?php echo page('login'); ?>" method="POST" novalidate>
    <?php echo html_errors_alert('both')?>
  <img class="mb-4" src="/docs/4.4/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
  <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
  <label for="inputEmail" class="sr-only">Email address</label>
  <input type="email" id="inputEmail" class="form-control <?php echo is_invalid('email')?>" name="email" placeholder="Email address" autofocus=""  value="<?php echo isset($email)?$email:'';?>">
  <label for="inputPassword" class="sr-only">Password</label>
  <input type="password" id="inputPassword" class="form-control <?php echo is_invalid('password')?>" name="password" placeholder="Password">
  <button class="btn btn-lg btn-primary btn-block mt-3" type="submit">Sign in</button>
  <a href="?p=registration">Don't have an account? Register!</a>
  <p class="mt-5 mb-3 text-muted">©mh0cft 2019</p>
</form>
<script src="<?php echo asset("/js/jquery-3.4.1.min.js");?>"></script>
<script src="<?php echo asset("/js/popper.min.js");?>"></script>
<script src="<?php echo asset("/js/bootstrap.min.js");?>"></script>
<script src="<?php echo asset("/js/main.js");?>"></script>
</body>
<html>