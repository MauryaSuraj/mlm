<?php ob_start(); ?>
<?php session_start(); ?>
<?php include 'db.php'; ?>
<?php

require '../src/PHPMailerAutoload.php';
if (isset($_POST['submit'])) {
  $user_name = $_POST['user_name'];
  $user_email = $_POST['user_email'];
  $user_phone = $_POST['user_phone'];
//check for existing user mail ID
$check_mail = "SELECT * FROM tbl_registered_user WHERE reg_email ='{$user_email}'";
$check_query = mysqli_query($connection,$check_mail);
if (!$check_query) {
  die("Query Failed . ".mysqli_error($connection));
}
$count = mysqli_num_rows($check_query);
if ($count > 0) {
  $msgerror = "<p class='alert alert-danger animated fadeOut delay-2s'>E-mail Id Already registered </p>";
  $_SESSION['reg_msg'] = $msgerror;
  header("Location: ../register.php");
}
else {
  $otp = rand(100000,999999);
//sent mail though here
// $mail = new PHPMailer;
//
// //setting for the server or sending mail
// $mail->isSMTP();
// $mail->Host = 'smtp.gmail.com';
// $mail->SMTPAuth = true;
// $mail->Username = 'sapiencesuraj@gmail.com';
// $mail->Password = 'surajmaurya450@gmail.com';
// $mail->SMTPSecure = 'tls';
// $mail->Port = 587;
//
// $mail->SetFrom('Helpfast4@gmail.com','Verification OTP ');
// $mail->addAddress($user_email);
//
// //message body
//
// $mail->Subject = 'OTP One time verification Code Helpfast4';
// $mail->Body = '<h2>OTP : '.$otp.' </h2>';
// $mail->AltBody = '123345';

if (!mail("$user_email","OTP Verification",$otp)) {
    $msgerror = "<p class='alert alert-danger animated fadeOut delay-2s'>Message could not be sent</p>";
    $_SESSION['reg_msg'] = $msgerror;
    header("Location: ../register.php");
}
else {

  $date = date("Y-m-d H:i:s");
  header("Location: ../register.php");
  $query = "INSERT INTO tbl_registered_user (reg_email,reg_username,reg_phone_no) VALUES ('{$user_email}','{$user_name}','{$user_phone}')";

  $otp_insert = "INSERT INTO otp_verification (otp, is_expired, create_at, mail_id) VALUES('{$otp}','0','{$date}','{$user_email}')";
  $insert_otp = mysqli_query($connection,$otp_insert);

  $insert_query = mysqli_query($connection,$query);
  if (!$insert_query) {
      die("Query Failed . ".mysqli_error($connection));
  }
  else {
    $msgsuc = "<p class='alert alert-success animated fadeOut delay-2s'>Message has sent</p>";
    $_SESSION['reg_msg'] = $msgsuc;
    $_SESSION['data_sent'] = '1';
    header('Location: ../verify_otp.php');
  }

}
}
}
 ?>
