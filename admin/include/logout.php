<?php ob_start(); ?>
<?php session_start(); ?>
<?php
$_SESSION['user_id'] = null;
header("Location: ../index.php");

 ?>
