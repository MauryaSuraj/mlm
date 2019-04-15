<?php
$update_msg='';
if (isset($_SESSION['user_id'])) {
  $user_id_though_session =  $_SESSION['user_id'];
}
$query = "SELECT * FROM tbl_user WHERE user_generated_id = '{$user_id_though_session}'";
$get_user = mysqli_query($connection,$query);
if (!$get_user) {
  die("Query Failed .".mysqli_error($connection));
}
else {
  while ($row = mysqli_fetch_assoc($get_user)) {
    $user_pan_no = $row['user_pan_no'];
    $user_paytm_no = $row['user_paytm_no'];
    $user_google_pay_no = $row['user_google_pay_no'];
    $user_nominee_name = $row['user_nominee_name'];
    $user_nominee_relation = $row['user_nominee_relation'];
  }
}
if (isset($_POST['update_user_setting'])) {
  $pan_no = $_POST['pan_no'];
  $paytm_no = $_POST['paytm_no'];
  $google_pay_no = $_POST['google_pay_no'];
  $nominee_name = $_POST['nominee_name'];
  $nominee_relation = $_POST['nominee_relation'];

  $upload = $_FILES['profile_picture']['name'];
  $upload_temp = $_FILES['profile_picture']['tmp_name'];
  //move uploded file
  move_uploaded_file($upload_temp, "img/profile/$upload");

  //update here
  $query_up = "UPDATE tbl_user SET ";
  $query_up .= "user_pan_no = '{$pan_no}', ";
  $query_up .= "user_paytm_no = '{$paytm_no}', ";
  $query_up .= "user_google_pay_no = '{$google_pay_no}', ";
  $query_up .= "user_nominee_relation = '{$nominee_relation}', ";
  $query_up .= "userimage = '{$upload}', ";
  $query_up .= "user_nominee_name = '{$nominee_name}'  ";
  $query_up .= "WHERE user_generated_id = '{$user_id_though_session}' ";
  $update_user_query = mysqli_query($connection, $query_up);
  if (!$update_user_query) {
    die("Query Failed. ".mysqli_error($connection));
  }
  else{
    $update_msg = "<p class='alert alert-success animated fadeOut delay-3s'>User Updated</p>";
  }
}
 ?>
<main class="pt-5 mx-lg-5">
  <div class="container-fluid mt-5">
    <!-- Heading -->
    <div class="card mb-4 wow fadeIn">
      <!--Card content-->
      <div class="card-body d-sm-flex justify-content-between">
        <h4 class="mb-2 mb-sm-0 pt-1"><span>Update user setting</span></h4>
        <form class="d-flex justify-content-center">
          <input type="search" placeholder="Type your query" aria-label="Search" class="form-control">
          <button class="btn btn-primary btn-sm my-0 p" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </form>
      </div>
    </div>
    <div class="row wow fadeIn">
      <div class="col-md-9 mb-4">
        <div class="card">
          <div class="card-body">
            <form method="post" action="" enctype="multipart/form-data">
              <h3 class="h3">Payment Details</h3>
              <hr>
              <fieldset class="form-group">
                <label for="pan">Pan No</label>
                <input type="text" class="form-control" id="pan" placeholder="Pan no" value="<?php echo $user_pan_no; ?>" name="pan_no">
              </fieldset>
              <fieldset class="form-group">
                <label for="paytm_no">Paytm Number</label>
                <input type="text" class="form-control" id="paytm" placeholder="paytm" value="<?php echo $user_paytm_no; ?>" name="paytm_no">
              </fieldset>
              <fieldset class="form-group">
                <label for="google_pay">Google pay No</label>
                <input type="text" class="form-control" id="google_payno" placeholder="google pay no" value="<?php echo $user_google_pay_no; ?>" name="google_pay_no">
              </fieldset>
              <h4 class="h4">Mention your Nominee</h4>
              <hr>
              <fieldset class="form-group">
                <label for="Nominee">Nominee Name</label>
                <input type="text" class="form-control" id="Nominee" placeholder="Nominee" value="<?php echo $user_nominee_name; ?>" name="nominee_name">
              </fieldset>
              <fieldset class="form-group">
                <label for="Nominee_relation">Nominee Relation</label>
                <input type="text" class="form-control" id="Nominee_relation" placeholder="Nominee Relation" value="<?php echo $user_nominee_relation; ?>" name="nominee_relation">
              </fieldset>
              <fieldset class="form-group">
                <label for="Nominee_relation">User Profile Picture</label>
                <input type="file" class="form-control"  placeholder="profile picture"  name="profile_picture">
              </fieldset>
              <button type="submit" class="btn btn-primary" name="update_user_setting">Update</button>
              <?php echo $update_msg; ?>
            </form>
          </div>
        </div>
      </div>



    </div>



  </div>
</main>
