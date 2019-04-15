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
  $user_password = $row['user_password'];
}

      if (isset($_POST['new_submit_pass'])) {
          $new_password = $_POST['new_password'];
          $confirm_new_password = $_POST['confirm_new_password'];
          if ($new_password === $confirm_new_password) {
            //Check For the same password
            $query = "UPDATE tbl_user SET ";
            $query .= "user_password = '{$new_password}' ";
            $query .= "WHERE user_generated_id = '{$user_id_though_session}' ";
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
 ?>

<!--Main layout-->
<main class="pt-5 mx-lg-5">
  <div class="container-fluid mt-5">
    <div class="card mb-4 wow fadeIn">
      <div class="card-body d-sm-flex justify-content-between">
        <h4 class="mb-2 mb-sm-0 pt-1">
          <span> <?php echo $user_id_though_session; ?> </span><span>/</span><span>Change Your Password</span>
        </h4>
        <form class="d-flex justify-content-center">
          <input type="search" placeholder="Type your query" aria-label="Search" class="form-control">
          <button class="btn btn-primary btn-sm my-0 p" type="submit"><i class="fas fa-search"></i>  </button>
        </form>
      </div>
    </div>
    <!-- Heading -->
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
                 <span class="label label-default text-left">Confirm Your Password</span>
                <input type="text" id="confirmpass" class="form-control mb-4" placeholder="Confirm Password" name="confirm_new_password">
                <!-- Sign in button -->
                <button class="btn btn-info btn-block  my-4" type="submit" name="new_submit_pass">Change Old Password</button>
                <?php echo $test; ?>
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
