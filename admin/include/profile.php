<?php
if (isset($_SESSION['user_id'])) {
  $user_id_though_session =  $_SESSION['user_id'];
}
$query = "SELECT * FROM tbl_user WHERE user_generated_id = '{$user_id_though_session}'";
$get_data = mysqli_query($connection, $query);
if (!$get_data) {
  die("Query Failed . ".mysqli_error($connection));
}
while ($row = mysqli_fetch_assoc($get_data)) {
  $user_first_name = $row['user_first_name'];
  $user_last_name = $row['user_last_name'];
  $user_level = $row['user_level'];
  $referid = $row['refer_id'];
  $sponsor_id = $row['sponsor_id'];
  $sponsor_name = $row['sponsor_fullname'];
  $joiner_p1 = $row['joiner_p1'];
  $joiner_p2 = $row['joiner_p2'];
  $joiner_p3 = $row['joiner_p3'];
  $joiner_p4 = $row['joiner_p4'];
  $userimage = $row['userimage'];
  $user_mobile = $row['user_mobile'];
  $user_mail = $row['user_mail'];
  $user_dob = $row['user_dob'];
  $user_bank_name = $row['user_bank_name'];
  $user_account_number = $row['user_account_number'];
  $user_ifsc_code = $row['user_ifsc_code'];
  $user_pan_no = $row['user_pan_no'];
  $user_bank_branch = $row['user_bank_branch'];
  $user_paytm_no = $row['user_paytm_no'];
  $user_google_pay = $row['user_google_pay_no'];
  $user_join_time = $row['user_join_time'];
}
$query_refer = "SELECT * FROM tbl_user WHERE user_generated_id = '{$referid}'";
$get_data_refer = mysqli_query($connection, $query_refer);
if (!$get_data_refer) {
  die("Query Failed . ".mysqli_error($connection));
}
while ($row_refer = mysqli_fetch_assoc($get_data_refer)) {
  $user_first_name_refer = $row_refer['user_first_name'];
  $user_last_name_refer = $row_refer['user_last_name'];
  $user_level_refer = $row_refer['user_level'];

}
$query_help = "SELECT * FROM tbl_user WHERE user_generated_id = '{$sponsor_id}'";
$get_data_help = mysqli_query($connection, $query_help);
if (!$get_data_help) {
  die("Query Failed . ".mysqli_error($connection));
}
while ($row_help = mysqli_fetch_assoc($get_data_help)) {
  $user_first_name_help = $row_help['user_first_name'];
  $user_last_name_help = $row_help['user_last_name'];
  $user_level_help = $row_help['user_level'];

}
 ?>
<!--Main layout-->
<main class="pt-5 mx-lg-5">
  <div class="container-fluid mt-5">
    <div class="card mb-4 wow fadeIn">
      <!--Card content-->
      <div class="card-body d-sm-flex justify-content-between">
        <h4 class="mb-2 mb-sm-0 pt-1">
          <span>Profile</span>
          <span>/</span>
          <span><?php echo $user_first_name." ".$user_last_name; ?> </span>
        </h4>
        <form class="d-flex justify-content-center">
          <!-- Default input -->
          <input type="search" placeholder="Type your query" aria-label="Search" class="form-control">
          <button class="btn btn-primary btn-sm my-0 p" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </form>
      </div>
    </div>
    <div class="card mb-4 wow fadeIn">
      <!--Card content-->
      <div class="card-body d-sm-flex justify-content-between">
        <div class="row">
          <div class="col-md-4">
            <img src="img/profile/<?php echo $userimage; ?>" alt="" class="img-fluid">
          </div>
          <div class="col-md-8">
            <div class="row">
                      <div class='col-md'>
                          <h3 class='h3 text-primary'>Your Details </h3>
                          <hr>
                      <P>User Name : <strong> <?php echo $user_first_name." ".$user_last_name ; ?> <strong/></P>
                      <P>Mobile No : <strong> <?php echo $user_mobile ; ?> <strong/></P>
                      <P>Mail      : <strong> <?php echo $user_mail ; ?> <strong/></P>
                      </div>
                        <div class='col-md'>
                            <h3 class='h3 text-primary'>Your Bank Details </h3>
                            <hr>
                      <P>Bank Name : <strong> <?php echo $user_bank_name ; ?> <strong/></P>
                      <P>Account Number : <strong> <?php echo $user_account_number ; ?> <strong/></P>
                      <P>Branch : <strong> <?php echo $user_bank_branch ; ?> <strong/></P>
                      <P>IFSC code : <strong> <?php echo $user_ifsc_code ; ?> <strong/></P>
                        </div>
                        </div>
                        <div class='row'>
                      <div class='col-md'>
                          <h3>Your Level</h3>
                            <hr>
                            <br>
                          <h4>Level : <strong><?php echo $user_level; ?></strong> </h4>
                      </div>
            </div>
         <?php if ($sponsor_id): ?>
           <div class="row">
             <div class="col-md-12">
               <h3>Your Sponsor Details</h3>
               <hr>
             </div>
             <div class="col-md-6">
               <p class="text-justify">Help ID : <strong><?php echo $sponsor_id; ?></strong></p>
             </div>
             <div class="col-md-6">
               <p class="text-justify">Help User Name : <strong><?php echo $user_first_name_help ." ".$user_last_name_help; ?></strong></p>
             </div>
             <div class="col-md-6">
               <p class="text-justify">Sponsor ID : <strong><?php echo $referid; ?></strong></p>
             </div>
             <div class="col-md-6">
               <p class="text-justify">Sponsor User Name : <strong><?php echo $user_first_name_refer ." ".$user_last_name_refer; ?></strong></p>
             </div>
           </div>
         <?php endif; ?>

          </div>
        </div>
      </div>
    </div>

    <div class="card mb-4 wow fadeIn">
      <!--Card content-->
      <div class="card-body d-sm-flex justify-content-between">
        <div class="row">
          <div class="col-md-12">
            <h3>Member Added To Your Id</h3>
          </div>
          <div class="col-md-3">
            <?php
             if ($joiner_p1 !=='0') {
               $query = "SELECT * FROM tbl_user WHERE user_generated_id = '{$joiner_p1}' and user_active != '0' and user_paid != '0'";
               $get_data = mysqli_query($connection, $query);
               if (!$get_data) {
                 die("Query Failed . ".mysqli_error($connection));
               }
               while ($row = mysqli_fetch_assoc($get_data)) {
                 $user_first_name = $row['user_first_name'];
                 $user_last_name = $row['user_last_name'];
                 $user_level = $row['user_level'];
                 echo "<p class='bg-success p-5 text-white'>".$user_first_name." ".$user_last_name." <br> Level is " .$user_level." </p>";
               }
             }else{
               echo "<p class='bg-primary p-5 text-white'>No Id </p>";
             }
              ?>
          </div>
          <div class="col-md-3">
            <?php
             if ($joiner_p2 !=='0') {
               $query = "SELECT * FROM tbl_user WHERE user_generated_id = '{$joiner_p2}' and user_active != '0' and user_paid != '0'";
               $get_data = mysqli_query($connection, $query);
               if (!$get_data) {
                 die("Query Failed . ".mysqli_error($connection));
               }
               while ($row = mysqli_fetch_assoc($get_data)) {
                 $user_first_name = $row['user_first_name'];
                 $user_last_name = $row['user_last_name'];
                 $user_level = $row['user_level'];
                 echo "<p class='bg-success p-5 text-white'>".$user_first_name." ".$user_last_name." <br> Level is " .$user_level." </p>";
               }
             }else{
               echo "<p class='bg-primary p-5 text-white'>No Id </p>";
             }
              ?>
          </div>
          <div class="col-md-3">
            <?php
             if ($joiner_p3 !=='0') {
               $query = "SELECT * FROM tbl_user WHERE user_generated_id = '{$joiner_p3}' and user_active != '0' and user_paid != '0'";
               $get_data = mysqli_query($connection, $query);
               if (!$get_data) {
                 die("Query Failed . ".mysqli_error($connection));
               }
               while ($row = mysqli_fetch_assoc($get_data)) {
                 $user_first_name = $row['user_first_name'];
                 $user_last_name = $row['user_last_name'];
                 $user_level = $row['user_level'];
                 echo "<p class='bg-success p-5 text-white'>".$user_first_name." ".$user_last_name." <br> Level is " .$user_level." </p>";
               }
             }else{
               echo "<p class='bg-primary p-5 text-white'>No Id </p>";
             }
              ?>
          </div>
          <div class="col-md-3">
            <?php
             if ($joiner_p4 !=='0') {
               $query = "SELECT * FROM tbl_user WHERE user_generated_id = '{$joiner_p4}' and user_active != '0' and user_paid != '0'";
               $get_data = mysqli_query($connection, $query);
               if (!$get_data) {
                 die("Query Failed . ".mysqli_error($connection));
               }
               while ($row = mysqli_fetch_assoc($get_data)) {
                 $user_first_name = $row['user_first_name'];
                 $user_last_name = $row['user_last_name'];
                 $user_level = $row['user_level'];
                 echo "<p class='bg-success p-5 text-white'>".$user_first_name." ".$user_last_name." <br> Level is " .$user_level." </p>";
               }
             }
            else {
               echo "<p class='bg-primary p-5 text-white'>No Id </p>";
             }
              ?>
          </div>
        </div>

      </div>
    </div>
    <!-- Heading -->


  </div>
</main>
