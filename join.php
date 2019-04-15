<?php include 'include/header.php'; ?>
<?php include 'include/navigation.php'; ?>
<?php ob_start(); ?>
<?php
$sponsor='';
$user_msg='';
$error1='';

if (isset($_GET['reg_id'])) {
  $sponsor =  $_GET['reg_id'];
}

date_default_timezone_set('Asia/Kolkata');
$date_a = date("Y-m-d");
$time = date("H:i:s");
$one = '1';
$two = '1';
$three ='1';
$four = '1';
if (isset($_POST['submit'])) {
  $sponsorid = $_POST['sponsorid'];
  $sponsorname = $_POST['sponsorname'];
  $bankname = $_POST['bankname'];
  $accountnumber = $_POST['accountnumber'];
  $branchname = $_POST['branchname'];
  $ifsccode = $_POST['ifsccode'];
  $firstname = $_POST['firstname'];
  $lastname = $_POST['lastname'];
  $useremail = $_POST['useremail'];
  $mobile_no = $_POST['mobile_no'];
  // $password = $_POST['password'];
  $panNo = $_POST['panNo'];
  $paytmno = $_POST['paytmno'];
  $googlepayno = $_POST['googlepayno'];

//mysqli_real_escape_string
$sponsorid = mysqli_real_escape_string($connection,$sponsorid);
$sponsorname = mysqli_real_escape_string($connection,$sponsorname);
$bankname = mysqli_real_escape_string($connection,$bankname);
$accountnumber = mysqli_real_escape_string($connection,$accountnumber);
$branchname = mysqli_real_escape_string($connection,$branchname);
$ifsccode = mysqli_real_escape_string($connection,$ifsccode);
$firstname = mysqli_real_escape_string($connection,$firstname);
$lastname = mysqli_real_escape_string($connection,$lastname);
$useremail = mysqli_real_escape_string($connection,$useremail);
$mobile_no = mysqli_real_escape_string($connection,$mobile_no);
$panNo = mysqli_real_escape_string($connection,$panNo);
$paytmno = mysqli_real_escape_string($connection,$paytmno);
$googlepayno = mysqli_real_escape_string($connection,$googlepayno);

//check for the sponsor id and refreral id
$v = increase_count(1);
$position_id = $v['h_id'];
$position_value = $v['position'];
$referal_id='';
if ($position_id == $sponsorid) {
  $referal_id = $position_id;
}else {
  $referal_id = $sponsorid;
  $sponsorid = $position_id;
}

$text = "0";
$dob ="12345";
$pincode = "0001";
$firstChar = substr($firstname , 0, 1);
$lastchar = substr($lastname, 0, 1);

$firstChar_last = substr($firstname, -1);
$lastchar_last = substr($lastname, -1);

  // String of all alphanumeric character
$str_result = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
  // generate user id
 $firstChar  = strtoupper($firstChar);
 $lastchar  = strtoupper($lastchar);
 $number =  inserted_number_id();
 $add =  $number;
 $generatedUserId = $firstChar.$firstChar_last.$lastchar.$lastchar_last.$add;
  // generate user pass word
 $generatedUserPassowrd = substr(sha1(time().$useremail), 0, 5);
//check for the user presence
$query_user = "SELECT * FROM tbl_user WHERE user_mail = '{$useremail}'";
$query_fire_user = mysqli_query($connection,$query_user);
$count_user = mysqli_num_rows($query_fire_user);
if ($count_user>0) {
  $error1 = "User already Exist";
}
else {
  //Insert user here
  if(is_user_true($sponsorid) !== 0){
      $query = "INSERT INTO tbl_user (user_generated_id, sponsor_id,	sponsor_fullname, user_first_name, user_last_name, user_mobile, user_mail, user_dob, user_pincode, user_state, user_city, user_address, user_bank_name, user_account_number, user_ifsc_code, user_bank_branch, user_pan_no, user_paytm_no, user_google_pay_no, joiner_p1, joiner_p2, joiner_p3, joiner_p4, user_level, user_password, user_nominee_name, user_nominee_relation, user_joining_fee, user_paid, user_active,	user_generated_link, user_progress,reg_date,userimage,refer_id,position_value,join_time) VALUES('{$generatedUserId}','{$position_id}','{$sponsorname}','{$firstname}','{$lastname}','{$mobile_no}','{$useremail}','{$dob}','{$text}','{$text}','{$text}','{$text}','{$bankname}','{$accountnumber}','{$ifsccode}','{$branchname}','{$text}','{$text}','{$text}','{$one}','{$two}','{$three}','{$four}','{$text}','{$generatedUserPassowrd}','{$text}','{$text}','{$text}','{$text}','{$text}','{$text}','{$text}','{$date_a}','{$text}','{$referal_id}','{$position_value}','{$time}')";
  $insert_query = mysqli_query($connection,$query);
  if (!$insert_query) {
    die("Query Failed . ".mysqli_error($connection));
    $error1 = "<p class='alert alert-danger animated fadeOut delay-5s'> Error in submission </p>";
  }
  else {
      //update query here
      $position_id = $v['h_id'];
$position_value = $v['position'];

if($position_value == 1){
    $query_up = "UPDATE tbl_user SET ";
    $query_up .= "joiner_p1 = '{$generatedUserId}' ";
    $query_up .= "WHERE user_generated_id = '{$position_id}' ";
    $update_user_query = mysqli_query($connection, $query_up);
    if (!$update_user_query) {
      die("Query Failed. ".mysqli_error($connection));
    }else {
      header('Location: thankyou.php?check_mail='.$useremail);
    }
}elseif($position_value == 2){
    $query_up = "UPDATE tbl_user SET ";
    $query_up .= "joiner_p2 = '{$generatedUserId}' ";
    $query_up .= "WHERE user_generated_id = '{$position_id}' ";
    $update_user_query = mysqli_query($connection, $query_up);
    if (!$update_user_query) {
      die("Query Failed. ".mysqli_error($connection));
    }else {
      header('Location: thankyou.php?check_mail='.$useremail);
    }
}elseif($position_value == 3){
    $query_up = "UPDATE tbl_user SET ";
    $query_up .= "joiner_p3 = '{$generatedUserId}' ";
    $query_up .= "WHERE user_generated_id = '{$position_id}' ";
    $update_user_query = mysqli_query($connection, $query_up);
    if (!$update_user_query) {
      die("Query Failed. ".mysqli_error($connection));
    }else {
      header('Location: thankyou.php?check_mail='.$useremail);
    }
}elseif($position_value == 4){
    $query_up = "UPDATE tbl_user SET ";
    $query_up .= "joiner_p4 = '{$generatedUserId}' ";
    $query_up .= "WHERE user_generated_id = '{$position_id}' ";
    $update_user_query = mysqli_query($connection, $query_up);
    if (!$update_user_query) {
      die("Query Failed. ".mysqli_error($connection));
    }else {
      header('Location: thankyou.php?check_mail='.$useremail);
    }
}else{
    $user_msg = "<p class='alert alert-danger'>Please contact to Master Of the system</p>";
}
  }
  }else{
      $error1 = "<p class='alert alert-danger p-1 animated fadeOut delay-5s'> Please Enter correct Details !!!!</p>";
  }
}
}
 ?>

<main style="background:#8a2be2; padding-top:10rem; padding-bottom:10rem;">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="card" style="margin-bottom:5rem;">
            <h5 class="card-header info-color white-text text-center py-4"><strong>Join HelpFast4</strong> </h5>
            <!--Card content-->
            <div class="card-body px-lg-5 pt-0">
                <!-- Form -->
                <form class="text-center" style="color: #757575;" method="post" action="" enctype="multipart/form-data">
                  <h5 class="h5 text-left my-1">Sponsor Details</h5>
                  <hr>
                  <!-- sponsor -->
                  <input type="hidden" name="" id="hidden_id" name="hidden_id" value="">
                  <div class="form-row">
                      <div class="col">
                          <!-- First name -->
                          <div class="md-form">
                              <input type="text" id="sponsorid" class="form-control" required name="sponsorid" required value="<?php echo $sponsor; ?>">
                              <label for="sponsorid">Sponsor ID</label>
                              <p class='alert alert-danger animated fadeOut delay-5s d-none' id='spoerror'>Sponsor id is not valid</p>
                          </div>
                      </div>
                      <div class="col">
                          <!-- Last name -->
                          <div class="md-form">
                              <input type="text" id="sponsorname" class="form-control" readonly required name="sponsorname">
                              <label for="sponsorname">Sponsor Name</label>
                          </div>
                      </div>
                  </div>

                  <!-- end sponsor  -->
                  <!-- Bannk Details -->
                  <h5 class="h5 text-left my-1">Bank Details</h5>
                  <hr>
                  <!-- sponsor -->
                  <div class="form-row">
                      <div class="col">

                          <div class="md-form">
                              <input type="text" id="bankname" class="form-control" required name="bankname">
                              <label for="bankname">Bank Name</label>
                          </div>
                      </div>
                      <div class="col">

                          <div class="md-form">
                              <input type="text" id="accountnumber" class="form-control" required name="accountnumber">
                              <label for="accountnumber">Account Number</label>
                          </div>
                      </div>
                      <div class="col">

                          <div class="md-form">
                              <input type="text" id="branchname" class="form-control" required name="branchname">
                              <label for="branchname">Branch Name</label>
                          </div>
                      </div>
                      <div class="col">

                          <div class="md-form">
                              <input type="text" id="ifsccode" class="form-control" required name="ifsccode">
                              <label for="ifsccode">IFSC Code</label>
                          </div>
                      </div>
                  </div>
                  <!-- End bank Details -->
                  <!-- presonal Details -->
                  <h5 class="h5 text-left my-1">Personal Details</h5>
                    <div class="form-row">
                        <div class="col">
                            <!-- First name -->
                            <div class="md-form">
                                <input type="text"  class="form-control" required name="firstname">
                                <label for="RegisterFormFirstName">First name</label>
                            </div>
                        </div>
                        <div class="col">
                            <!-- Last name -->
                            <div class="md-form">
                                <input type="text"  class="form-control" required name="lastname">
                                <label for="RegisterFormLastName">Last name</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col">
                            <!-- First name -->
                            <div class="md-form">
                              <input type="email" class="form-control" required name="useremail"  value="">
                              <label for="materialRegisterFormEmail">E-mail</label>
                            </div>
                        </div>
                        <div class="col">
                            <!-- Last name -->
                            <div class="md-form">
                                <input type="tel"  id="mobile" class="form-control"  required name="mobile_no" value="">
                                <label for="phonenumber">Mobile No.</label>
                                <p id="phn" class="alert alert-danger d-none">Not a valid Phone Number.</p>
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-outline-info btn-rounded btn-block my-4 waves-effect z-depth-0" type="submit" id='sbmbtn' name="submit">Sign in</button>
                    <?php echo $error1;
                    echo $user_msg;
                    ?>
                    <p>By clicking
                        <em>Sign up</em> you agree to our
                        <a href="terms_condition.php" target="_blank">terms of service</a>
                </form>
                <!-- Form -->
            </div>
        </div>
      </div>
    </div>
  </div>
</main>

<?php include 'include/footer.php'; ?>
