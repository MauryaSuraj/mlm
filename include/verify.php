<?php ob_start(); ?>
<?php session_start(); ?>
<?php include 'db.php'; ?>

<?php
if (isset($_POST['submit'])) {

      $result = mysqli_query($connection,"SELECT * FROM otp_verification WHERE otp='" . $_POST["user_otp"] . "' AND is_expired!=1 AND NOW() <= DATE_ADD(create_at, INTERVAL 24 HOUR)");
      while ($row = mysqli_fetch_assoc($result)) {
        $mail_id = $row['mail_id'];
      }
      $count = mysqli_num_rows($result);
      if (!empty($count)) {
        $result = mysqli_query($connection,"UPDATE otp_verification SET is_expired = 1 WHERE otp = '" . $_POST["user_otp"] . "'");
        $success = 2;
        //sucess
        //get id of email
        $query_mail = "SELECT * FROM tbl_registered_user WHERE reg_email = '{$mail_id}'";
        $query_fire = mysqli_query($connection,$query_mail);
        while ($row_id = mysqli_fetch_assoc($query_fire)) {
            $verified_id = $row_id['reg_id'];
        }
        $error_message = "<p class='alert alert-success animated fadeOut delay-2s'>  OTP Verified! </p>";
        $_SESSION['otp_reg']  = $error_message;
        header('Location: ../join.php?id='.$verified_id);
      }
      else {
        $success = 1;
        $error_message = "<p class='alert alert-danger animated fadeOut delay-2s'> Invalid OTP! </p>";
        $_SESSION['otp_reg']  = $error_message;
        header('Location: ../verify_otp.php');
      }
}
 ?>
