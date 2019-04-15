<?php
$rec_user_id='';
$status='';
$check_user = "SELECT * FROM tbl_payment WHERE user_id = '{$user_id_though_session}'";
$check_fire = mysqli_query($connection,$check_user);
$count = mysqli_num_rows($check_fire);
if ($count > 0) {
  while ($row = mysqli_fetch_assoc($check_fire)) {
    $payment_status  = $row['payment_status'];
    $sponsor_payment_status = $row['sponsor_payment_status'];
    $referal_payment_status = $row['referal_payment_status'];
  }
        if ($payment_status !== 'paid') {
            if($sponsor_payment_status == 1){
                $status_sp = 'paid';
            }else{
                $status_sp = 'unpaid';
            }
            if($referal_payment_status ==1){
                $status_rf = 'paid';
            }else{
                $status_rf = 'unpaid';
            }
        }
        else {
          $status_sp = 'paid'; $status_rf = 'paid';
        }
}
else {
  $status_rf = 'unpaid'; $status_sp = 'unpaid';
}

$user_type = '';
$query = "SELECT * FROM tbl_user WHERE user_generated_id = '{$user_id_though_session}'";
$get_detail_here = mysqli_query($connection, $query);
if (!$get_detail_here) {
    die("Query Failed . ".mysqli_error($connection));
}
while ($row = mysqli_fetch_assoc($get_detail_here)) {
  $sponsor_id = $row['sponsor_id'];
  $sponsor_name = $row['sponsor_fullname'];
  $user_paid = $row['user_paid'];
  $user_active = $row['user_active'];
  $refer_id = $row['refer_id'];
  $join_time = $row['join_time'];
  $time_reg = $row['reg_date'];
}
if ($user_paid ==='0' && $user_active ==='0') {
  $user_type = 'sender';
  $s_query = "SELECT * FROM tbl_user WHERE user_generated_id ='{$sponsor_id}'";
  $fetch_s_query = mysqli_query($connection,$s_query);
  if (!$fetch_s_query) {
      die("Query Failed . ".mysqli_error($connection));
  }
  while ($sponsor_row = mysqli_fetch_assoc($fetch_s_query)) {
    $s_user_first_name = $sponsor_row['user_first_name'];
    $s_user_last_name = $sponsor_row['user_last_name'];
    $s_user_moblie = $sponsor_row['user_mobile'];
    $s_user_mail = $sponsor_row['user_mail'];
    $s_user_bank_name = $sponsor_row['user_bank_name'];
    $s_user_account_number = $sponsor_row['user_account_number'];
    $s_user_ifsc_code = $sponsor_row['user_ifsc_code'];
    $s_user_bank_branch = $sponsor_row['user_bank_branch'];
    $reg_date = $sponsor_row['reg_date'];
    $s_join_time = $sponsor_row['join_time'];
  }
  if ($refer_id == $sponsor_id) {
    $r_query = "SELECT * FROM tbl_user WHERE user_generated_id ='{$refer_id}'";
    $fetch_r_query = mysqli_query($connection,$r_query);
    if (!$fetch_r_query) {
        die("Query Failed . ".mysqli_error($connection));
    }
    while ($refral_row = mysqli_fetch_assoc($fetch_r_query)) {
      $r_user_first_name = $refral_row['user_first_name'];
      $r_user_last_name = $refral_row['user_last_name'];
      $r_user_moblie = $refral_row['user_mobile'];
      $r_user_mail = $refral_row['user_mail'];
      $r_user_bank_name = $refral_row['user_bank_name'];
      $r_user_account_number = $refral_row['user_account_number'];
      $r_user_ifsc_code = $refral_row['user_ifsc_code'];
      $r_user_bank_branch = $refral_row['user_bank_branch'];
      $r_reg_date = $refral_row['reg_date'];
      $r_join_time = $refral_row['join_time'];

  }}elseif ($refer_id !== $sponsor_id) {
    $r_query = "SELECT * FROM tbl_user WHERE user_generated_id ='{$refer_id}'";
    $fetch_r_query = mysqli_query($connection,$r_query);
    if (!$fetch_r_query) {
        die("Query Failed . ".mysqli_error($connection));
    }
    while ($refral_row = mysqli_fetch_assoc($fetch_r_query)) {
      $r_user_first_name = $refral_row['user_first_name'];
      $r_user_last_name = $refral_row['user_last_name'];
      $r_user_moblie = $refral_row['user_mobile'];
      $r_user_mail = $refral_row['user_mail'];
      $r_user_bank_name = $refral_row['user_bank_name'];
      $r_user_account_number = $refral_row['user_account_number'];
      $r_user_ifsc_code = $refral_row['user_ifsc_code'];
      $r_user_bank_branch = $refral_row['user_bank_branch'];
      $r_reg_date = $refral_row['reg_date'];
    }
  }
}
else if($user_paid !=='0' && $user_active !=='0'){
  $user_type = 'reciver';
$rectype_query = "SELECT * FROM tbl_payment";
$rectype_fire_query = mysqli_query($connection,$rectype_query);
$count = mysqli_num_rows($rectype_fire_query);
if ($count>0) {
  while ($rectype_row = mysqli_fetch_assoc($rectype_fire_query)) {
    $rec_user_id = $rectype_row['user_id'];
    $rec_sponsor_id = $rectype_row['sponsor_id'];
    $rec_referal_id = $rectype_row['refer_id'];
  }
}
  $u_query = "SELECT * FROM tbl_user WHERE user_generated_id = '{$rec_user_id}'";
  $f_query = mysqli_query($connection,$u_query);
  if (!$f_query) {
    die("Query Failed .".mysqli_error($connection));
  }
  while ($pay_user = mysqli_fetch_assoc($f_query)) {
    //   print_r($pay_user);
    $pay_user_paid = $pay_user['user_paid'];
    $pay_user_active = $pay_user['user_active'];
    $pay_user_id = $pay_user['user_generated_id'];
    $pay_user_first_name = $pay_user['user_first_name'];
    $pay_user_last_name = $pay_user['user_last_name'];
    $pay_user_phone = $pay_user['user_mobile'];
    $pay_user_account_number = $pay_user['user_account_number'];
    $pay_user_date = $pay_user['reg_date'];
    if ($rec_sponsor_id || $rec_referal_id === $user_id_though_session && $pay_user_paid === '0' && $pay_user_active === '0') {
        $status_spo='';
        $status_ref='';
        if($rec_sponsor_id == $user_id_though_session){
            $query_spo_sta = "SELECT * FROM tbl_payment WHERE sponsor_id ='{$rec_user_id}'";
            $fire = mysqli_query($connection, $query_spo_sta);
            if(!$fire){
                die("Query Failed .".mysqli_error($connection));
            }else{
                while($row_rec_s = mysqli_fetch_assoc($fire)){
                    $status_spo = $row_rec_s['sponsor_payment_rec_status'];
                }
            }
        }elseif($rec_referal_id === $user_id_though_session){
             $query_spo_sta = "SELECT * FROM tbl_payment WHERE refer_id ='{$user_id_though_session}'";
            $fire = mysqli_query($connection, $query_spo_sta);
            if(!$fire){
                die("Query Failed .".mysqli_error($connection));
            }else{
                while($row_rec_s = mysqli_fetch_assoc($fire)){
                    $status_ref = $row_rec_s['refral_payment_rec_status'];
                }
            }
        }else{
            $query_spo_sta = "SELECT * FROM tbl_payment WHERE sponsor_id || refer_id ='{$user_id_though_session}'";
            $fire = mysqli_query($connection, $query_spo_sta);
            if(!$fire){
                die("Query Failed .".mysqli_error($connection));
            }else{
                while($row_rec_s = mysqli_fetch_assoc($fire)){
                    $status_ref = $row_rec_s['refral_payment_rec_status'];
                    $status_spo = $row_rec_s['sponsor_payment_rec_status'];
                }
            }
        }
      ?>
      <?php if ($user_type === 'reciver'): ?>
        <?php payment_help_amount_reciept($user_id_though_session); ?>
      <?php endif; ?>
      <?php if ($user_type === 'reciver'): ?>
        <?php payment_sponsor_amount_reciept($user_id_though_session); ?>
      <?php endif; ?>
      <?php
    }
  }
}
 ?>
