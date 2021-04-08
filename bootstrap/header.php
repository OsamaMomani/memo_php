
<?php 
session_start() ;
if ( $_SESSION['user']  == '' ) {
  header('Location: /login.php', true, 301);
  exit();
}
require_once('db.php') ?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="./assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="./assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Online Memo 
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">

  <!-- CSS Files -->
  <link href="./assets/css/bootstrap.min.css" rel="stylesheet" />
  <link href="./assets/css/paper-dashboard.css?v=2.0.1" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="./assets/demo/demo.css" rel="stylesheet" />
</head>

<body class="">
  <div class="wrapper ">
    <div class="sidebar" data-color="white" data-active-color="danger">
      <div class="logo">
        <a href="https://www.creative-tim.com" class="simple-text logo-mini">
           <div class="logo-image-small">
            <img src="./assets/img/favicon.png">
          </div> 
           <p>CT</p> 
        </a>
        <a href="./index.php" class="simple-text logo-normal">
          Online Memo
        </a>
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li <?php  if (basename($_SERVER['PHP_SELF']) == "index.php" )  echo "class=\"active \" " ?> >
            <a href="./index.php">
              <i class="nc-icon nc-paper"></i>
              <p>My Memo</p>
            </a>
          </li>
          <li <?php  if (basename($_SERVER['PHP_SELF']) == "important.php" )  echo "class=\"active \" " ?> >
            <a href="./important.php">
              <i class="nc-icon nc-bookmark-2"></i>
              <p>Important Memo</p>
            </a>
          </li>
          <li  <?php  if (basename($_SERVER['PHP_SELF']) == "archive.php" )  echo "class=\"active \" " ?>  >
            <a href="./archive.php">
              <i class="nc-icon nc-box"></i>
              <p>Archived Memo</p>
            </a>
          </li>
        </ul>
      </div>
    </div>


    <div class="main-panel" style="min-height: 100vh;">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-absolute fixed-top navbar-transparent">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <div class="navbar-toggle">
              <button type="button" class="navbar-toggler">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </button>
            </div>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
          </button>
          <p class="lead"> Welcome <b> <?= $_SESSION['user'] ?> </b>!</p>
          <div class="collapse navbar-collapse justify-content-end" id="navigation">
            <form>
              <div class="input-group no-border">
                <input type="text" value="" class="form-control" placeholder="Search...">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <i class="nc-icon nc-zoom-split"></i>
                  </div>
                </div>
              </div>
            </form>
            <ul class="navbar-nav">
              <li class="nav-item btn-rotate dropdown">
                <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="nc-icon nc-bell-55"></i>
                  <p>
                    <span class="d-lg-none d-md-block">Notifications</span>
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="#">noti 1</a>
                </div>
              </li>
            </ul>
            <form action="login.php" method="post">  
              <input type="hidden" name="logout" value="1">
              <button class="btn btn-lnk " type="submit">Logout</button>
            </form>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->
      <div class="content">
        <div class="row">
          <div class="col-md-12">

