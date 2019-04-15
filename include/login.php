<?php ob_start(); ?>
<?php session_start(); ?>
<?php include 'db.php'; ?>
<?php
if (isset($_POST['submit'])) {
  $user_id = $_POST['user_name'];
  $password = $_POST['password'];

  $query = "SELECT * FROM tbl_user WHERE user_generated_id = '{$user_id}'";
  $login_query = mysqli_query($connection,$query);
  $count_login = mysqli_num_rows($login_query);
  if ($count_login>0) {
    // echo "User presented";
    //get user details here
    while ($row = mysqli_fetch_assoc($login_query)) {
      $db_user_id = $row['user_generated_id'];
      $db_user_pass = $row['user_password'];
    }
    if ($db_user_id) {
      if ($db_user_id === $user_id && $db_user_pass === $password) {
        // $value = "correct credential, login confirm";
         $_SESSION['user_id'] = $db_user_id;
        //Pass login value
        header("Location: ../admin/index.php");
      }
      else {
        //credential not correct
        $value = "Please Enter correct user name or password";
        $_SESSION['msg2'] = $value;
         header("Location: ../login.php");
      }
    }
    else {
      //not presented id
      $value = "You are not part of the system or you provided wrong id";
      $_SESSION['msg2'] = $value;
       header("Location: ../login.php");
    }
  }
  else {
    //message, you are not authorised user
    $value = "User not there";
    $_SESSION['msg2'] = $value;
     header("Location: ../login.php");
    //
  }
}


 ?>
