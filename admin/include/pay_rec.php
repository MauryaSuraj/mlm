<main class="pt-1 mx-lg-5">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-4">
        <div class="card mb-2 wow fadeIn">
          <div class="card-body d-sm-flex justify-content-between">
            <h6 class="mb-2 mb-sm-0 pt-1">
              <span>Please check all the details before confirming the payment,</span>
            </h6>
          </div>
        </div>
      </div>
<?php
if (isset($_SESSION['user_id'])) {
  $user_id_though_session =  $_SESSION['user_id'];
}
date_default_timezone_set('Asia/Kolkata');
$user_message='';
 $query = mysqli_query($connection, "SELECT * FROM tbl_user WHERE user_generated_id = '{$user_id_though_session}'");
 if (!$query) {
   die("Query Failed .".mysqli_error($connection));
 }
 while ($row = mysqli_fetch_assoc($query)) {
   $user_generated_id = $row['user_generated_id'];
   $sponsor_id = $row['sponsor_id'];
   $level = $row['user_level'];
   $user_paid = $row['user_paid'];
   $user_active = $row['user_active'];
   $joiner_p1 = $row['joiner_p1'];
   $joiner_p2 = $row['joiner_p2'];
   $joiner_p3 = $row['joiner_p3'];
   $joiner_p4 = $row['joiner_p4'];
   $refer_id = $row['refer_id'];
 }
 //check the level
?>
<div class="col-md-4">
  <div class="card mb-2 wow fadeIn bg-primary text-white">
    <div class="card-body d-sm-flex justify-content-between">
      <h4 class="mb-2 mb-sm-0 pt-1">
        <span>Your Details</span>
      </h4>
        <p class="">Your Id is : <strong><?php echo $user_generated_id; ?> </strong><br> Your Level is : <strong><?php echo $level; ?></strong>
        <?php if ($sponsor_id): ?>
        <br>  Your Sponsor id is : <strong><?php echo $sponsor_id; ?>
            <?php else: ?>
          <br>    You are Master
        <?php endif; ?>
      </strong></p>

    </div>
  </div>
</div>
<div class="col-md-4">
  <?php user_status($user_id_though_session) ?>
</div>
</div>
 <?php
 if ($sponsor_id) {
 if ($level == 0 && $user_paid =='1' && $user_active =='1' ) {
   include 'pay_rec_level_0.php';
 }
 elseif ($level == 1 && $user_active =='1' && $user_paid =='1') {
   include 'pay_rec_level_1.php';
 }
 elseif ($level == 2 && $user_active =='1' && $user_paid =='1') {
   include 'pay_rec_level_2.php';
 }
 elseif ($level == 3 && $user_active =='1' && $user_paid =='1') {
  include 'pay_rec_level_3.php';
 }elseif ($level == 4) {
   include 'pay_rec_level_4.php';
 }
}
 ?>
 <?php include 'pay_level_slip.php'; ?>
</div>
</main>
