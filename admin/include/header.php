<?php ob_start(); ?>
<?php session_start(); ?>
<?php
if (isset($_SESSION['user_id'])) {
  $user_id_though_session =  $_SESSION['user_id'];
}
else {
  header("Location: ../index.php");
}
 ?>
<?php include 'include/function.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title><?php get_application_name(); ?></title>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/mdb.min.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">
  <style>
    .map-container{
        overflow:hidden;
        padding-bottom:56.25%;
        position:relative;
        height:0;
        }
        .map-container iframe{
        left:0;
        top:0;
        height:100%;
        width:100%;
        position:absolute;
        }
  </style>
</head>

<body class="grey lighten-3">
  <header>
  <?php include 'top_navigation.php'; ?>
  <?php include 'side_navigation.php'; ?>
  </header>
