<?php //include 'include/db.php'; ?>
<?php include 'include/function.php'; ?>
<?php ob_start(); ?>
<?php session_start(); ?>

<?php
date_default_timezone_set('Asia/Kolkata');
$time= date("Y-m-d h:i:sa");
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
  $address = $_POST['address'];
  $state = $_POST['state'];
  $city = $_POST['city'];

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
$address = mysqli_real_escape_string($connection,$address);
$state = mysqli_real_escape_string($connection,$state);
$city = mysqli_real_escape_string($connection,$city);

//check for the sponsor id and refreral id
$v = increase_count(1);
$position_id = $v['h_id'];
$position_value = $v['position'];
// if ($position_value =='1') {
//   $one = '1';
//   $two = '0';
//   $three = '0';
//   $four = '0';
// }elseif ($position_value == '2') {
//   $one = '0';
//   $two = '1';
//   $three = '0';
//   $four = '0';
// }elseif ($position_value == '3') {
//   $one = '0';
//   $two = '0';
//   $three = '1';
//   $four = '0';
// }elseif ($position_value == '4') {
//   $one = '0';
//   $two = '0';
//   $three = '0';
//   $four = '1';
// }else {
//     $one = '0';
//     $two = '0';
//     $three = '0';
//     $four = '0';
// }
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
  // String of all alphanumeric character
$str_result = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
  // generate user id
 $generatedUserId = $firstChar.$lastchar.substr(str_shuffle($str_result), 0, 5);
  // generate user pass word
 $generatedUserPassowrd = substr(sha1(time().$useremail), 0, 5);

//check for the user presence
$query_user = "SELECT * FROM tbl_user WHERE user_mail = '{$useremail}'";
$query_fire_user = mysqli_query($connection,$query_user);
$count_user = mysqli_num_rows($query_fire_user);
if ($count_user>0) {
  $userexist = "User already Exist";
  $_SESSION['it_it'] = $userexist;
  header("Location: join.php");
}
else {
  //Insert user here
  $query = "INSERT INTO tbl_user (user_generated_id, sponsor_id,	sponsor_fullname, user_first_name, user_last_name, user_mobile, user_mail, user_dob, user_pincode, user_state, user_city, user_address, user_bank_name, user_account_number, user_ifsc_code, user_bank_branch, user_pan_no, user_paytm_no, user_google_pay_no, joiner_p1, joiner_p2, joiner_p3, joiner_p4, user_level, user_password, user_nominee_name, user_nominee_relation, user_joining_fee, user_paid, user_active,	user_generated_link, user_progress,reg_date,userimage,refer_id,position_value,join_time) VALUES('{$generatedUserId}','{$sponsorid}','{$sponsorname}','{$firstname}','{$lastname}','{$mobile_no}','{$useremail}','{$dob}','{$pincode}','{$state}','{$city}','{$address}','{$bankname}','{$accountnumber}','{$ifsccode}','{$branchname}','{$text}','{$text}','{$text}','{$one}','{$two}','{$three}','{$four}','{$text}','{$generatedUserPassowrd}','{$text}','{$text}','{$text}','{$text}','{$text}','{$text}','{$text}','{$time}','{$text}','{$referal_id}','{$position_value}','{$time}')";
  $insert_query = mysqli_query($connection,$query);
  if (!$insert_query) {
    die("Query Failed . ".mysqli_error($connection));
    $error = 'Error in submission';
    $_SESSION['it_it'] = $error;
    header("Location: join.php");
  }
  else {
    header('Location: thankyou.php?check_mail='.$useremail);
  }
}


}


 ?>
