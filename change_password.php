<?php
if (isset($_SESSION['user_id'])) {
  $user_id_though_session =  $_SESSION['user_id'];
}
$ok = '';
$new_password = "";
$confirm_new_password = "";
$test = '';
$query = "SELECT * FROM tbl_user WHERE user_generated_id = '{$user_id_though_session}'";
$get_data = mysqli_query($connection, $query);
if (!$get_data) {
  die("Query Failed . ".mysqli_error($connection));
}
while ($row = mysqli_fetch_assoc($get_data)) {
  $user_first_name = $row['user_first_name'];
  $user_last_name = $row['user_last_name'];
  $user_level = $row['user_level'];
  $sponsor_id = $row['sponsor_id'];
  $sponsor_name = $row['sponsor_fullname'];
  $joiner_p1 = $row['joiner_p1'];
  $joiner_p2 = $row['joiner_p2'];
  $joiner_p3 = $row['joiner_p3'];
  $joiner_p4 = $row['joiner_p4'];
  $user_password = $row['user_password'];

}

    if (isset($_POST['check_password'])) {
      $old_password = $_POST['old_password'];
      if ($old_password && $user_password) {
        if ($old_password == $user_password) {
          $ok = "<p class='alert alert-danger animated fadeOut delay-2s'>Enter Correct Password</p>";
        }
      }
    }


    if (!$ok) {
      if (isset($_POST['new_submit_pass'])) {
          $new_password = $_POST['new_password'];
          $confirm_new_password = $_POST['confirm_new_password'];
          if ($new_password === $confirm_new_password) {
            //Check For the same password
            $query = "UPDATE tbl_user SET ";
            $query .= "user_password = '{$new_password}' ";
            $query .= "WHERE user_generated_id = {$user_id_though_session} ";
            $update_asset_query = mysqli_query($connection, $query);
            if (!$update_asset_query) {
              die("Query Failed. ".mysqli_error($connection));
            }
            else {
              $test = "<p class='alert alert-success animated fadeOut delay-5s'>You have Changed Your Password</p>";
            }
            //update old password if correct otherwise  stop and wait for new one
          }
          else {
            $test = "<p class='alert alert-danger animated fadeOut delay-5s'>Password  Must Be Same in Both field, Please Enter Correct Password</p>";
          }

      }
    }


 ?>

<!--Main layout-->
<main class="pt-5 mx-lg-5">
  <div class="container-fluid mt-5">
    <div class="card mb-4 wow fadeIn">
      <div class="card-body d-sm-flex justify-content-between">
        <h4 class="mb-2 mb-sm-0 pt-1">
          <span>User Name</span><span>/</span><span>Change Your Password</span>
        </h4>
        <form class="d-flex justify-content-center">
          <input type="search" placeholder="Type your query" aria-label="Search" class="form-control">
          <button class="btn btn-primary btn-sm my-0 p" type="submit"><i class="fas fa-search"></i>  </button>
        </form>
      </div>
    </div>
    <!-- Heading -->

    <!--Grid row-->
    <div class="row wow fadeIn">
      <!--Grid column-->
      <div class="col-md-9 mb-4">
        <!--Card-->
        <div class="card">
          <!--Card content-->
          <div class="card-body">
            <!-- Default form login -->
            <form class=" border border-primary p-5" method="post" action="">
              <span class="label label-default text-left">Enter Your Old Password</span>
                <input type="text" id="old_pass_copy" class="form-control mb-4" required placeholder="Enter Your Old Password" name="old_password">
                <button class="btn btn-info btn-block my-4" type="submit" name="check_password">Check For Password</button>
                  <?php if(!$ok){echo $ok;}  ?>
            </form>
          </div>

        </div>
        <!--/.Card-->
      </div>
      <!--Grid column-->
      <!--Grid column-->
      <div class="col-md-3 mb-4"></div>
    </div>
    <div class="row wow fadeIn">
      <!--Grid column-->
      <div class="col-md-9 mb-4">
        <!--Card-->
        <div class="card">
          <!--Card content-->
          <div class="card-body">
            <!-- Default form login -->
            <form class=" border border-primary p-5" method="post" action="">
              <span class="label label-default text-left">Enter Your New Password</span>
                <input type="text" id="newpass" class="form-control mb-4" placeholder="Enter Your New Password" name="new_password">
                 <span class="label label-default text-left">Confirm Your Old Password</span>
                <input type="text" id="confirmpass" class="form-control mb-4" placeholder="Confirm Password" name="confirm_new_password">
                <!-- Sign in button -->
                <button class="btn btn-info btn-block  my-4" <?php if(!($ok=='1')){echo "disabled";} ?> type="submit" name="new_submit_pass">Change Old Password</button>
                <?php if ($test) { echo $test; } ?>
            </form>
          </div>
        </div>
        <!--/.Card-->
      </div>
      <!--Grid column-->
      <!--Grid column-->
      <div class="col-md-3 mb-4"></div>
    </div>
  </div>
</main>
