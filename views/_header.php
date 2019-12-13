<?php if (!defined('APP_VERSION')) { exit; } ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>TV Series</title>
 
    <link rel="stylesheet" href="<?php echo asset("/css/bootstrap.min.css");?>">
    <link rel="stylesheet" href="<?php echo asset("/css/style.css");?>">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css"
        integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU"
        crossorigin="anonymous">
</head>
<body>
<header>
  <div class="bg-dark collapse" id="navbarHeader">
    <div class="container">
      <div class="row">
        <div class="col-sm-8 col-md-7 py-4">
          <h4 class="text-white">About</h4>
          <p class="text-muted">Add some information about the album below, the author, or any other background context. Make it a few sentences long so folks can pick up some informative tidbits. Then, link them off to some social networking sites or contact information.</p>
        </div>
        <div class="col-sm-4 offset-md-1 py-4">
          <h4 class="text-white">Menu</h4>
          <ul class="list-unstyled">
            <li><a href="#" class="text-white">Follow on Twitter</a></li>
            <li><a href="#" class="text-white">Like on Facebook</a></li>
            <li><a href="?logout=1" class="text-white">Log out</a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <div class="navbar navbar-dark bg-dark shadow-sm flex-column">
    <div class="container d-flex justify-content-between z-index-1 flex-column flex-sm-row">
      <a href="?p=home" class="navbar-brand d-flex align-items-center flex-column flex-sm-row m-0">
        <img src="<?php echo asset("/images/television.svg");?>" alt="TV Series" height="80">
        <h1 class="ml-0 ml-sm-4 mt-2 mb-0"><strong>TV Series</strong></h1>
      </a>
      <button class="navbar-toggler collapsed mt-3 mt-sm-0" type="button" data-toggle="collapse" data-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
    </div>
    <div class="skewd bg-dark"></div>
  </div>
</header>
<main role="main">
    <!-- End of Header -->