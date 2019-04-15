<?php include 'db.php'; ?>
<?php
if (isset($_SESSION['user_id'])) {
  $id_del =  $_SESSION['user_id'];
}
date_default_timezone_set('Asia/Kolkata');
 if (isset($_SESSION['user_id'])) {
    $user_id_though_session =  $_SESSION['user_id'];
  }
  function is_master($user_id_though_session){
      global $connection;
      $query = "SELECT * FROM tbl_user WHERE is_master ='1' ";
      $fire_query = mysqli_query($connection,$query);
      if(!$fire_query){
          die("Query Failed .".mysqli_error($connection));
      }else{
          while($row = mysqli_fetch_assoc($fire_query)){
              $user_db_id = $row['user_generated_id'];
          }
      }
     return $user_db_id;
  }
function get_application_name(){
  echo "HelpFast4";
}
function paid_active($id){
  global $connection;
  $query = "SELECT * FROM tbl_user WHERE user_generated_id = '{$id}' and user_paid = '0' and user_active = '0'";
    $query_fire = mysqli_query($connection , $query);
    $count = mysqli_num_rows($query_fire);
    return $count;
}
function user_profile_image($user_id_though_session){
  global $connection;
  $query = "SELECT * FROM tbl_user WHERE user_generated_id = '{$user_id_though_session}'";
  $get_data = mysqli_query($connection, $query);
  if (!$get_data) {
    die("Query Failed . ".mysqli_error($connection));
  }
  while ($row = mysqli_fetch_assoc($get_data)) {
    $userimage = $row['userimage'];
  }
  if ($userimage) {
    echo "img/profile/".$userimage;
  }else {
    echo "img/dummy.png";
  }
}

function sponsor_det($id){
  global $connection;
  $query_details = "SELECT * FROM tbl_user WHERE user_generated_id = '{$id}'";
  $query_details_fire = mysqli_query($connection,$query_details);
  if(!$query_details_fire){
    die("Query Failed .".mysqli_error($connection));
  }
  while ($row_detail = mysqli_fetch_assoc($query_details_fire)) {
    $user_name = $row_detail['user_first_name'] ." ".$row_detail['user_last_name'];
    $user_mobile = $row_detail['user_mobile'];
    $user_mail = $row_detail['user_mail'];
    $user_bank_name = $row_detail['user_bank_name'];
    $user_bank_account = $row_detail['user_account_number'];
    $user_ifsc_code = $row_detail['user_ifsc_code'];
    $user_bank_branch = $row_detail['user_bank_branch'];
  }

echo "<div class='col-md-6 mb-2'>";
    echo "<div class='card'>";
      echo "<div class='card-body'>";
      echo "<h5>Payment sender  Slip (Send the amount to following id)</h5>";
      echo "<hr class='admin_pay'>";
      echo "<div class='row'>";
        echo "<div class='col-md-12 bg-primary p-4 text-white'>";
          echo "<h5>Paid By :-   {$user_name} </h5>";
          echo "<hr>";
          echo "<p><i class='fas fa-phone mr-2'></i>Mobile No.   $user_mobile </p>";
          echo "<p><i class='fas fa-calendar-day mr-2'></i>User Mail Id. {$user_mail} </p>";
          echo "<p><i class='fas fa-university mr-2'></i>Acount No.  {$user_bank_account}  </p>";
          echo "<p><i class='fas fa-phone mr-2'></i>Bank Name  {$user_bank_name} </p>";
          echo "<p><i class='fas fa-university mr-2'></i>IFSC Code   {$user_ifsc_code} </p>";
          echo "<p><i class='fas fa-university mr-2'></i>Branch   {$user_bank_branch} </p>";
        echo "</div></div></div></div></div>";
}
function recv_detail ($id){
  global $connection;

  $query = "SELECT * FROM tbl_money_tran WHERE payer_id = '{$id}'";
  $query_fire = mysqli_query($connection,$query);
  if (!$query_fire) {
      die("Query Failed .".mysqli_error($connection));
  }
  while ($row = mysqli_fetch_assoc($query_fire)) {
    $money_trans_id = $row['money_tran_id'];
    $amount = $row['paid_amount'];
    $tran_type = $row['tran_type'];
    $receiver_id = $row['receiver_id'];
    $tran_time = $row['tran_time'];
    $money_send = $row['money_status_send'];
    $money_rec = $row['money_status_received'];
    if ($money_send && $money_rec) {
      $status_var = 'bg-success';
    }elseif ($money_send ==1 && $money_rec == 0) {
      $status_var = 'bg-danger';
    }else {
      $status_var = 'bg-primary';
    }

    $query_details = "SELECT * FROM tbl_user WHERE user_generated_id = '{$receiver_id}'";
    $query_details_fire = mysqli_query($connection,$query_details);
    if(!$query_details_fire){
      die("Query Failed .".mysqli_error($connection));
    }
    while ($row_detail = mysqli_fetch_assoc($query_details_fire)) {
      $user_name = $row_detail['user_first_name'] ." ".$row_detail['user_last_name'];
      $user_mobile = $row_detail['user_mobile'];
      $user_mail = $row_detail['user_mail'];
      $user_bank_name = $row_detail['user_bank_name'];
      $user_bank_account = $row_detail['user_account_number'];
      $user_level = $row_detail['user_level'];
      $user_ifsc_code = $row_detail['user_ifsc_code'];
      $user_bank_branch = $row_detail['user_bank_branch'];
      echo "<tr class='{$status_var}'>";
        echo "<th scope='row'>{$receiver_id}</th>";
        echo "<td>{$user_name}</td>";
        echo "<td>{$user_mobile}</td>";
        echo "<td>{$amount}</td>";
        echo "<td>{$user_level}</td>";
        echo "<td>{$tran_type}</td>";
        echo "<td>{$tran_time}</td>";
      echo "</tr>";
    }
  }
}

function sender_detail ($id){
  global $connection;
  $query = "SELECT * FROM tbl_money_tran WHERE receiver_id = '{$id}'";
  $query_fire = mysqli_query($connection,$query);
  if (!$query_fire) {
      die("Query Failed .".mysqli_error($connection));
  }
  while ($row = mysqli_fetch_assoc($query_fire)) {
    $money_trans_id = $row['money_tran_id'];
    $amount = $row['paid_amount'];
    $tran_type = $row['tran_type'];
    $payer_id = $row['payer_id'];
    $tran_time = $row['tran_time'];
    $money_send = $row['money_status_send'];
    $money_rec = $row['money_status_received'];
    if ($money_send && $money_rec) {
      $status_var = 'bg-success';
    }elseif ($money_send ==1 && $money_rec == 0) {
      $status_var = 'bg-danger';
    }else {
      $status_var = 'bg-primary';
    }

    $query_details = "SELECT * FROM tbl_user WHERE user_generated_id = '{$payer_id}' ";
    $query_details_fire = mysqli_query($connection,$query_details);
    if(!$query_details_fire){
      die("Query Failed .".mysqli_error($connection));
    }
    while ($row_detail = mysqli_fetch_assoc($query_details_fire)) {
      $user_name = $row_detail['user_first_name'] ." ".$row_detail['user_last_name'];
      $user_mobile = $row_detail['user_mobile'];
      $user_mail = $row_detail['user_mail'];
      $user_bank_name = $row_detail['user_bank_name'];
      $user_bank_account = $row_detail['user_account_number'];
      $user_level = $row_detail['user_level'];
      $user_ifsc_code = $row_detail['user_ifsc_code'];
      $user_bank_branch = $row_detail['user_bank_branch'];

      echo "<tr class='{$status_var}'>";
        echo "<th scope='row'>{$payer_id}</th>";
        echo "<td>{$user_name}</td>";
        echo "<td>{$user_mobile}</td>";
        echo "<td>{$amount}</td>";
        echo "<td>{$user_level}</td>";
        echo "<td>{$tran_type}</td>";
        echo "<td>{$tran_time}</td>";
      echo "</tr>";
    }
  }
}
function pay_rec_spo ($id){
  global $connection;
  $query = "SELECT * FROM tbl_payment WHERE refer_id = '{$id}'";
  $query_fire = mysqli_query($connection,$query);
  if (!$query_fire) {
      die("Query Failed .".mysqli_error($connection));
  }
  while ($row = mysqli_fetch_assoc($query_fire)) {
    $paymant_id = $row['payment_id'];
    $user_id  = $row['user_id'];
    $payment_status = $row['payment_status'];
    $payment_document = $row['payment_document'];
    $sponsor_id = $row['sponsor_id'];
    $refer_id = $row['refer_id'];
    $sponsor_payment = $row['sponsor_payment'];
    $refral_payment = $row['refreral_payment'];
    $refral_document = $row['refreral_document'];
    $sponsor_payment_status = $row['sponsor_payment_status'];
    $referal_payment_status = $row['referal_payment_status'];
    $refral_payment_rec_status = $row['refral_payment_rec_status'];
    $sponsor_payment_rec_status	 =$row['sponsor_payment_rec_status'];
    if ($referal_payment_status && $refral_payment_rec_status) {
      $status = "Recieved";
      $status_var = "bg-success";
    }elseif ($referal_payment_status ==1 && $refral_payment_rec_status != 1) {
      $status = "PENDING";
      $status_var = "bg-danger";
    }else {
      $status = "Not Paid";
      $status_var = "bg-primary";
    }

    $query_details = "SELECT * FROM tbl_user WHERE user_generated_id = '{$user_id}'";
    $query_details_fire = mysqli_query($connection,$query_details);
    if(!$query_details_fire){
      die("Query Failed .".mysqli_error($connection));
    }
    while ($row_detail = mysqli_fetch_assoc($query_details_fire)) {
      $user_name = $row_detail['user_first_name'] ." ".$row_detail['user_last_name'];
      $user_mobile = $row_detail['user_mobile'];
      $user_mail = $row_detail['user_mail'];
      $user_bank_name = $row_detail['user_bank_name'];
      $user_bank_account = $row_detail['user_account_number'];
      $user_level = $row_detail['user_level'];
      $user_ifsc_code = $row_detail['user_ifsc_code'];
      $user_bank_branch = $row_detail['user_bank_branch'];

      echo "<tr class='{$status_var}'>";
        echo "<th scope='row'>{$user_id}</th>";
        echo "<td>{$user_name}</td>";
        echo "<td>{$user_mobile}</td>";
        echo "<td>{$refral_payment}</td>";
        echo "<td>{$user_level}</td>";
        echo "<td>{$status}</td>";
        echo "<td><img src='img/doc/$refral_document'  height='30px' width='40px'></td>";
      echo "</tr>";

    }

  }
}

function pay_rec ($id){
  global $connection;
  $query = "SELECT * FROM tbl_payment WHERE sponsor_id = '{$id}'";
  $query_fire = mysqli_query($connection,$query);
  if (!$query_fire) {
      die("Query Failed .".mysqli_error($connection));
  }
  while ($row = mysqli_fetch_assoc($query_fire)) {
    $paymant_id = $row['payment_id'];
    $user_id  = $row['user_id'];
    $payment_status = $row['payment_status'];
    $payment_document = $row['payment_document'];
    $sponsor_id = $row['sponsor_id'];
    $refer_id = $row['refer_id'];
    $sponsor_payment = $row['sponsor_payment'];
    $refral_payment = $row['refreral_payment'];
    $refral_document = $row['refreral_document'];
    $sponsor_payment_status = $row['sponsor_payment_status'];
    $referal_payment_status = $row['referal_payment_status'];
    $refral_payment_rec_status = $row['refral_payment_rec_status'];
    if ($referal_payment_status && $refral_payment_rec_status) {
      $status = "Recieved";
      $status_var = "bg-success";
    }elseif ($referal_payment_status =='1' && $refral_payment_rec_status ) {
      $status = "PENDING";
      $status_var = "bg-danger";
    }else {
      $status = 'Not Paid';
      $status_var = 'bg-primary';
    }

    $query_details = "SELECT * FROM tbl_user WHERE user_generated_id = '{$user_id}'";
    $query_details_fire = mysqli_query($connection,$query_details);
    if(!$query_details_fire){
      die("Query Failed .".mysqli_error($connection));
    }
    while ($row_detail = mysqli_fetch_assoc($query_details_fire)) {
      $user_name = $row_detail['user_first_name'] ." ".$row_detail['user_last_name'];
      $user_mobile = $row_detail['user_mobile'];
      $user_mail = $row_detail['user_mail'];
      $user_bank_name = $row_detail['user_bank_name'];
      $user_bank_account = $row_detail['user_account_number'];
      $user_level = $row_detail['user_level'];
      $user_ifsc_code = $row_detail['user_ifsc_code'];
      $user_bank_branch = $row_detail['user_bank_branch'];

      echo "<tr class='$status_var'>";
        echo "<th scope='row'>{$user_id}</th>";
        echo "<td>{$user_name}</td>";
        echo "<td>{$user_mobile}</td>";
        echo "<td>{$sponsor_payment}</td>";
        echo "<td>{$user_level}</td>";
        echo "<td>{$status}</td>";
        echo "<td><img src='img/doc/$payment_document'  height='30px' width='40px'></td>";
        echo "</tr>";

    }

  }
}

function pay_done ($id){
  global $connection;
  $query = "SELECT * FROM tbl_payment WHERE user_id = '{$id}'";
  $query_fire = mysqli_query($connection,$query);
  if (!$query_fire) {
      die("Query Failed .".mysqli_error($connection));
  }
  while ($row = mysqli_fetch_assoc($query_fire)) {
    $paymant_id = $row['payment_id'];
    $payment_status = $row['payment_status'];
    $payment_document = $row['payment_document'];
    $sponsor_id = $row['sponsor_id'];
    $refer_id = $row['refer_id'];
    $sponsor_payment = $row['sponsor_payment'];
    $refral_payment = $row['refreral_payment'];
    $refral_document = $row['refreral_document'];
    $sponsor_payment_status = $row['sponsor_payment_status'];
    $referal_payment_status = $row['referal_payment_status'];
    $sponsor_payment_rec_status = $row['sponsor_payment_rec_status'];
    $refral_payment_rec_status = $row['refral_payment_rec_status'];
    if ($sponsor_payment_status && $sponsor_payment_rec_status) {
      $status = 'PAID';
      $status_var = 'bg-success';
    }elseif ($sponsor_payment_status == 1 && $sponsor_payment_rec_status !=1) {
      $status = 'PENDING';
      $status_var = 'bg-danger';
    }else {
      $status = 'Not Paid';
      $status_var = 'bg-primary';
    }

    if ($referal_payment_status && $refral_payment_rec_status) {
      $status_ref = 'PAID';
      $status_var_ref = 'bg-success';
    }elseif ($referal_payment_status ==1 && $refral_payment_rec_status != 1) {
      $status_ref = 'PENDING';
      $status_var_ref = 'bg-danger';
    }else {
      $status_ref = 'Not Paid';
      $status_var_ref = 'bg-primary';
    }


    $query_details = "SELECT * FROM tbl_user WHERE user_generated_id = '{$sponsor_id}'";
    $query_details_fire = mysqli_query($connection,$query_details);
    if(!$query_details_fire){
      die("Query Failed .".mysqli_error($connection));
    }
    while ($row_detail = mysqli_fetch_assoc($query_details_fire)) {
      $user_name = $row_detail['user_first_name'] ." ".$row_detail['user_last_name'];
      $user_mobile = $row_detail['user_mobile'];
      $user_mail = $row_detail['user_mail'];
      $user_bank_name = $row_detail['user_bank_name'];
      $user_bank_account = $row_detail['user_account_number'];
      $user_level = $row_detail['user_level'];
      $user_ifsc_code = $row_detail['user_ifsc_code'];
      $user_bank_branch = $row_detail['user_bank_branch'];

      echo "<tr class='{$status_var}'>";
        echo "<th scope='row'>{$sponsor_id}</th>";
        echo "<td>{$user_name}</td>";
        echo "<td>{$user_mobile}</td>";
        echo "<td>{$sponsor_payment}</td>";
        echo "<td>{$user_level}</td>";
        echo "<td> {$status} </td>";
        echo "<td><img src='img/doc/$payment_document'  height='30px' width='40px'></td>";
      echo "</tr>";

    }
    $query_details = "SELECT * FROM tbl_user WHERE user_generated_id = '{$refer_id}'";
    $query_details_fire = mysqli_query($connection,$query_details);
    if(!$query_details_fire){
      die("Query Failed .".mysqli_error($connection));
    }
    while ($row_detail = mysqli_fetch_assoc($query_details_fire)) {
      $user_name = $row_detail['user_first_name'] ." ".$row_detail['user_last_name'];
      $user_mobile = $row_detail['user_mobile'];
      $user_mail = $row_detail['user_mail'];
      $user_bank_name = $row_detail['user_bank_name'];
      $user_bank_account = $row_detail['user_account_number'];
      $user_level = $row_detail['user_level'];
      $user_ifsc_code = $row_detail['user_ifsc_code'];
      $user_bank_branch = $row_detail['user_bank_branch'];

      echo "<tr class='{$status_var_ref}'>";
        echo "<th scope='row'>{$refer_id}</th>";
        echo "<td>{$user_name}</td>";
        echo "<td>{$user_mobile}</td>";
        echo "<td>{$refral_payment}</td>";
        echo "<td>{$user_level}</td>";
        echo "<td>{$status_ref}</td>";
        echo "<td><img src='img/doc/$refral_document' height='30px' width='40px'></td>";
      echo "</tr>";

    }
  }
}
//if paid them return 1
//if not paid then return 0

 function payer_value_1000($id){
    global $connection;
    $rec_payment_status ='';
    $query = "SELECT * FROM tbl_money_tran WHERE payer_id = '{$id}' and paid_amount ='1000' and money_status_send = '1' and money_status_received = '1'";
    $fire_query = mysqli_query($connection,$query);
    if(!$fire_query){
        die("Query Failed .".mysqli_error($connection));
    }
    $count = mysqli_num_rows($fire_query);
    return $count;
}
 function payer_value_2000($id){
    global $connection;
    $rec_payment_status='';
    $query = "SELECT * FROM tbl_money_tran WHERE payer_id = '{$id}' and paid_amount ='2000' and money_status_send = '1' and money_status_received = '1'";
    $fire_query = mysqli_query($connection,$query);
    if(!$fire_query){
        die("Query Failed .".mysqli_error($connection));
    }
    $count = mysqli_num_rows($fire_query);
    return $count;
}
 function payer_value_5000($id){
    global $connection;
    $rec_payment_status='';
    $query = "SELECT * FROM tbl_money_tran WHERE payer_id = '{$id}' and paid_amount ='5000' and money_status_send = '1' and money_status_received = '1'";
    $fire_query = mysqli_query($connection,$query);
    if(!$fire_query){
        die("Query Failed .".mysqli_error($connection));
    }
    $count = mysqli_num_rows($fire_query);
    return $count;
}
 function payer_value_10000($id){
    global $connection;
    $rec_payment_status='';
    $query = "SELECT * FROM tbl_money_tran WHERE payer_id = '{$id}' and paid_amount ='10000' and money_status_send = '1' and money_status_received = '1'";
    $fire_query = mysqli_query($connection,$query);
    if(!$fire_query){
        die("Query Failed .".mysqli_error($connection));
    }
    $count = mysqli_num_rows($fire_query);
    return $count;
}
 function payer_value_20000($id){
    global $connection;
    $rec_payment_status='';
    $query = "SELECT * FROM tbl_money_tran WHERE payer_id = '{$id}' and paid_amount ='20000' and money_status_send = '1' and money_status_received = '1'";
    $fire_query = mysqli_query($connection,$query);
    if(!$fire_query){
        die("Query Failed .".mysqli_error($connection));
    }
    $count = mysqli_num_rows($fire_query);
    return $count;
}
 function payer_value_200000($id){
    global $connection;
    $rec_payment_status='';
    $query = "SELECT * FROM tbl_money_tran WHERE payer_id = '{$id}' and paid_amount ='200000' and money_status_send = '1' and money_status_received = '1'";
    $fire_query = mysqli_query($connection,$query);
    if(!$fire_query){
        die("Query Failed .".mysqli_error($connection));
    }
    $count = mysqli_num_rows($fire_query);
    return $count;
}
function payer_value_50000($id){
   global $connection;
   $rec_payment_status='';
   $query = "SELECT * FROM tbl_money_tran WHERE payer_id = '{$id}' and paid_amount ='50000' and money_status_send = '1' and money_status_received = '1'";
   $fire_query = mysqli_query($connection,$query);
   if(!$fire_query){
       die("Query Failed .".mysqli_error($connection));
   }
   $count = mysqli_num_rows($fire_query);
   return $count;
}
 function pay_spo_not ($id){
  global $connection;
//   echo $id;
  $query = "SELECT * FROM tbl_user WHERE  user_active != '1' && sponsor_id ='{$id}'";
  $query_fire = mysqli_query($connection,$query);
  if (!$query_fire) {
      die("Query Failed .".mysqli_error($connection));
  }
    while ($row_detail = mysqli_fetch_assoc($query_fire)) {
      $user_id = $row_detail['user_generated_id'];
      $user_name = $row_detail['user_first_name'] ." ".$row_detail['user_last_name'];
      $user_mobile = $row_detail['user_mobile'];
      $user_mail = $row_detail['user_mail'];
      $user_bank_name = $row_detail['user_bank_name'];
      $user_bank_account = $row_detail['user_account_number'];
      $user_level = $row_detail['user_level'];
      $user_ifsc_code = $row_detail['user_ifsc_code'];
      $user_bank_branch = $row_detail['user_bank_branch'];
      // $_SESSION['timer_id'] = $user_id;
      echo "<div class='col-md m-1 p-2 text-white bg-primary'>";
      echo "<div class='p-1'>";

        echo "<p>User id:-   {$user_id} <hr> </p>";
        echo "<p>User Name {$user_name}</p>";
        echo "<p>User Mobile No.  {$user_mobile}</p>";
        echo "<p>Amount To Recieve 2000</p>";
        echo "<p>User Level:-  {$user_level}</p>";
        echo "<p class='alert alert-warning'>PENDING</p>";
          // echo "<div id='response'></div>";
        echo "</div>";
      echo "</div>";

    }

  }
  function pay_ref_not ($id){
    global $connection;
    $query = "SELECT * FROM tbl_user WHERE refer_id = '{$id}' and user_paid !='1' ";
    $query_fire = mysqli_query($connection,$query);
    if (!$query_fire) {
        die("Query Failed .".mysqli_error($connection));
    }
      while ($row_detail = mysqli_fetch_assoc($query_fire)) {
        $user_id = $row_detail['user_generated_id'];
        $user_name = $row_detail['user_first_name'] ." ".$row_detail['user_last_name'];
        $user_mobile = $row_detail['user_mobile'];
        $user_mail = $row_detail['user_mail'];
        $user_bank_name = $row_detail['user_bank_name'];
        $user_bank_account = $row_detail['user_account_number'];
        $user_level = $row_detail['user_level'];
        $user_ifsc_code = $row_detail['user_ifsc_code'];
        $user_bank_branch = $row_detail['user_bank_branch'];
        // $_SESSION['timer_id'] = $user_id;
          echo "<div class='col-md m-1 p-2 text-white bg-primary'>";
         echo "<div class='p-1'>";

         echo "<p>User id:-   {$user_id} <hr></p>";
         echo "<p>User Name {$user_name}</p>";
         echo "<p>User Mobile No.  {$user_mobile}</p>";
         echo "<p>Amount To Recieve 500</p>";
         echo "<p>User Level:-  {$user_level}</p>";
         echo "<p class='alert alert-warning'>PENDING</p>";
         // echo "<div id='response'></div>";
         echo "</div>";
       echo "</div>";

      }
    }
    function payment_help_amount_reciept($id){
    global $connection;
    $query = "SELECT * FROM tbl_payment WHERE sponsor_id = '{$id}' and sponsor_payment_status = '1' and sponsor_payment_rec_status = '0'";
    $query_fire = mysqli_query($connection, $query);
    if(!$query_fire){ die("Query Failed .".mysqli_error($connection)); }
    else{
        while($row = mysqli_fetch_assoc($query_fire)){
            $user_id = $row['user_id'];

            //get the user details here who has paid 2000 help amount
            $user_query = "SELECT * FROM tbl_user WHERE user_generated_id ='{$user_id}'";
            $user_query_fire = mysqli_query($connection, $user_query);
            if(!$user_query_fire){
                die("Query Failed .".mysqli_error($connection));
            }else{
                while($user_row = mysqli_fetch_assoc($user_query_fire)){

                    echo "<div class='row wow fadeIn'>";
                      echo "<div class='col-md-12 mb-2'>";
                        echo "<div class='card'>";
                          echo "<div class='card-body'>";
                          echo "<h5>Payment Receiver Slip </h5>";
                            echo " <hr class='admin_pay'>";
                          echo "<div class='row'>";
                            echo "<div class='col-md-6 bg-primary p-4 text-white'>";
                              echo "<h5> {$user_row['user_first_name']} {$user_row['user_last_name']} </h5>";
                              echo "<hr>";
                              echo "<p><i class='fas fa-calendar-day mr-2'></i>   $user_row[join_time] </p>";
                            //   echo "<p><i class='far fa-clock mr-2'></i> 12:54 PM</p>";
                              echo "<p><i class='fas fa-phone mr-2'></i> $user_row[user_mobile] </p>";
                              echo "<p><i class='fas fa-university mr-2'></i>  $user_row[user_account_number] </p>";
                              echo "<p class='alert alert-success text-center'>2000/- Only</p>";
                                echo "</div>";
                            echo "<div class='col-md-6 bg-success p-4 text-white'>";
                              echo "<a href='index.php?source=payment_con&rec_type=sponsor&id={$row['user_id']}' class='btn btn-primary mx-auto'>Payment Recieved(Help)</a>";
                              echo "<h4>भुगतान पर्ची देखने के बाद पुष्टि करने के लिए कॉल करें</h4>";

                            echo "</div></div></div></div></div> </div>";
                }
            }
        }
    }
}

    function payment_sponsor_amount_reciept($id){
    global $connection;
    $query = "SELECT * FROM tbl_payment WHERE refer_id = '{$id}' and referal_payment_status = '1' and refral_payment_rec_status = '0'";
    $query_fire = mysqli_query($connection, $query);
    if(!$query_fire){ die("Query Failed .".mysqli_error($connection)); }
    else{
        while($row = mysqli_fetch_assoc($query_fire)){
            $user_id = $row['user_id'];

            //get the user details here who has paid 2000 help amount
            $user_query = "SELECT * FROM tbl_user WHERE user_generated_id ='{$user_id}'";
            $user_query_fire = mysqli_query($connection, $user_query);
            if(!$user_query_fire){
                die("Query Failed .".mysqli_error($connection));
            }else{
                while($user_row = mysqli_fetch_assoc($user_query_fire)){
                    // print_r($user_row);
                    echo "<div class='row wow fadeIn'>";
                      echo "<div class='col-md-12 mb-4'>";
                        echo "<div class='card'>";
                          echo "<div class='card-body'>";
                          echo "<h3>Payment Receiver Slip </h3>";
                            echo " <hr class='admin_pay'>";
                          echo "<div class='row'>";
                            echo "<div class='col-md-6 bg-primary p-4 text-white'>";
                              echo "<h5> {$user_row['user_first_name']} {$user_row['user_last_name']} </h5>";
                              echo "<hr>";
                              echo "<p><i class='fas fa-calendar-day mr-2'></i>   $user_row[join_time] </p>";
                            //   echo "<p><i class='far fa-clock mr-2'></i> 12:54 PM</p>";
                              echo "<p><i class='fas fa-phone mr-2'></i> $user_row[user_mobile] </p>";
                              echo "<p><i class='fas fa-university mr-2'></i>  $user_row[user_account_number] </p>";
                              echo "<p class='alert alert-success text-center'>500/- Only</p>";
                                echo "</div>";
                            echo "<div class='col-md-6 bg-success p-4 text-white'>";
                              echo "<a href='index.php?source=payment_con&rec_type=referal&id={$row['user_id']}' class='btn btn-primary mx-auto'>Payment Recieved(Sponsor)</a>";
                              echo "<h4>भुगतान पर्ची देखने के बाद पुष्टि करने के लिए कॉल करें</h4>";

                            echo "</div></div></div></div></div> </div>";
                }
            }
        }
    }
}

function user_status($id){
  global $connection;
  $query = "SELECT * FROM tbl_user WHERE user_generated_id = '{$id}'";
  $fire_query = mysqli_query($connection , $query);
  if (!$fire_query) {
    die("Query Failed . ".mysqli_error($connection));
  }else {
    while ($row = mysqli_fetch_assoc($fire_query)) {
      $user_paid = $row['user_paid'];
      $user_active = $row['user_active'];
    }
    if ($user_paid && $user_active ) {
      echo "<div class='row wow fadeIn'>";
      echo "<div class='col-md-12'>";
       echo "<div class='card '>";
        echo "<div class='card-body bg-success'>";
           echo "<h5>Your account status:- Active </h5>";
           echo "</div></div></div> </div></div>";
    }else {
      echo "<div class='row wow fadeIn'>";
      echo "<div class='col-md-12'>";
       echo "<div class='card'>";
        echo "<div class='card-body bg-danger'>";
           echo "<h5>Your account status :- Inactive </h5>";
           echo "</div></div></div> </div></div>";
    }
  }
}
function check_level_of_user($id){
  global $connection;
  $query = "SELECT * FROM tbl_user WHERE user_generated_id = '{$id}'";
  $query_fire = mysqli_query($connection, $query);
  if (!$query_fire) {
    die("Query Failed .".mysqli_error($connection));
  }
  while ($row = mysqli_fetch_assoc($query_fire)) {
    $user_level = $row['user_level'];
  }
  return $user_level;
}
function next_master($id){
  global $connection;
  $query = "SELECT * FROM tbl_user WHERE user_generated_id = '{$id}'";
  $query_fire = mysqli_query($connection, $query);
  if (!$query_fire) {
    die("Query Failed .".mysqli_error($connection));
  }
  while ($row = mysqli_fetch_assoc($query_fire)) {
    $user_id = $row['user_id'];
  }
  return $user_id + 1;
}

function master_level (){
  global $connection;
  $query = "SELECT * FROM tbl_user WHERE is_master = '1'";
  $query_fire = mysqli_query($connection, $query);
  if (!$query_fire) {
    die("Query Failed . ".mysqli_error($connection));
  }else {
    while ($row = mysqli_fetch_assoc($query_fire)) {
      $user_generated = $row['user_generated_id'];
      $joiner_p1 = $row['joiner_p1'];
      $joiner_p2 = $row['joiner_p2'];
      $joiner_p3 = $row['joiner_p3'];
      $joiner_p4 = $row['joiner_p4'];
      $user_level = $row['user_level'];
      if ($joiner_p1 && $joiner_p2 && $joiner_p3 && $joiner_p4) {

if (check_level_of_user($joiner_p1) == 1 && check_level_of_user($joiner_p2) == 1 && check_level_of_user($joiner_p3) == 1 && check_level_of_user($joiner_p4) == 1) {
  $query_up = "UPDATE tbl_user SET ";
  $query_up .= "user_level = '2'  ";
  $query_up .= "WHERE user_generated_id = '{$user_generated}' ";
  $update_user_query = mysqli_query($connection, $query_up);
  if (!$update_user_query) {
    die("Query Failed. ".mysqli_error($connection));
  }
}elseif (check_level_of_user($joiner_p1) == 2 && check_level_of_user($joiner_p2) == 2 && check_level_of_user($joiner_p3) == 2 && check_level_of_user($joiner_p4) == 2) {
  $query_up = "UPDATE tbl_user SET ";
  $query_up .= "user_level = '3'  ";
  $query_up .= "WHERE user_generated_id = '{$user_generated}' ";
  $update_user_query = mysqli_query($connection, $query_up);
  if (!$update_user_query) {
    die("Query Failed. ".mysqli_error($connection));
  }
}elseif (check_level_of_user($joiner_p1) == 3 && check_level_of_user($joiner_p2) == 3 && check_level_of_user($joiner_p3) == 3 && check_level_of_user($joiner_p4) == 3) {
    $query_up = "UPDATE tbl_user SET ";
    $query_up .= "user_level = '4'  ";
    $query_up .= "WHERE user_generated_id = '{$user_generated}' ";
    $update_user_query = mysqli_query($connection, $query_up);
    if (!$update_user_query) {
      die("Query Failed. ".mysqli_error($connection));
    }
  }
  elseif (check_level_of_user($joiner_p1) == 4 && check_level_of_user($joiner_p2) == 4 && check_level_of_user($joiner_p3) == 4 && check_level_of_user($joiner_p4) == 4) {
      $query_up = "UPDATE tbl_user SET ";
      $query_up .= "user_level = '5',  ";
      $query_up .= "is_master = '0'  ";
      $query_up .= "WHERE user_generated_id = '{$user_generated}' ";
      $update_user_query = mysqli_query($connection, $query_up);
      if (!$update_user_query) {
        die("Query Failed. ".mysqli_error($connection));
      }
      $id_m = next_master($user_generated);
      $query_master = "UPDATE tbl_user SET ";
      $query_master .= "is_master = '1' ";
      $query_master .="WHERE user_id = '{$id_m}'";
      $update_master = mysqli_query($connection, $query_master);
      if (!$update_master) {
        die("Query Failed .".mysqli_error($connection));
      }
    }
      }else {
        //
        //No level up will happen
      }
    }
  }
}
master_level();
  function help_payment_con($id){
    global $connection;
    //check all sponsor details
    $query = "SELECT * FROM tbl_payment WHERE user_id = '{$id}' and sponsor_payment = '2000' and sponsor_payment_status = '1' and sponsor_payment_rec_status !='1'";
    $fire_query = mysqli_query($connection, $query);
    if (!$fire_query) {
      die("Query Failed .".mysqli_error($connection));
    }
    $count = mysqli_num_rows($fire_query);
    if ($count > 0) {
      while ($row = mysqli_fetch_assoc($fire_query)) {
        $help_id = $row['sponsor_id'];
        $help_amount = $row['sponsor_payment'];
        $help_document = $row['payment_document'];
      }
      echo "<div class='row wow fadeIn'>";
        echo "<div class='col-md-12'>";
          echo "<h2 class='h4'>Help amount Amount =  {$help_amount} </h2>";
        echo "</div>";
        echo "<div class='col-md-9 mb-4'>";
          echo "<div class='card'>";
          echo "<div class='card-body'>";
               if ($help_document)
                {echo "<img src='img/{$help_document}' alt='' class='img-fluid'>";}
               else
                {echo "<h1 class='h4 text-center mx-auto my-auto'>it seems user have not uploaded any proof</h1>";}

            echo "</div>";
          echo "</div></div>";
        echo "<div class='col-md-3 mb-2'>";
          echo "<div class='card'>";
            echo "<div class='card-body'>";
              echo "<form class='p-5' method='post' action=''>";
                echo "<button type='submit' name='confirm_payment' class='btn btn-success'>Confirm payment Reception</button>";
              echo "</form></div></div></div>  </div>";
    }
    else {
      //Not found that query
    }
    if (isset($_POST['confirm_payment'])) {
      $query_up = "UPDATE tbl_payment SET ";
      $query_up .= "sponsor_payment_rec_status = '1'  ";
      $query_up .= "WHERE user_id = '{$id}' ";
      $update_user_query = mysqli_query($connection, $query_up);
      if (!$update_user_query) {
        die("Query Failed. ".mysqli_error($connection));
      }
      else {
      echo    $user_added = "<h1 class='h4 text-center alert alert-success'>Help Payment Recieved Confirm</h1>";
      }
    }
    user_paid_con($id);
  }

  function sponsor_payment_con($id){
    global $connection;
    //check all sponsor details
    $query = "SELECT * FROM tbl_payment WHERE user_id = '{$id}' and refreral_payment = '500' and referal_payment_status = '1' and refral_payment_rec_status !='1'";
    $fire_query = mysqli_query($connection, $query);
    if (!$fire_query) {
      die("Query Failed .".mysqli_error($connection));
    }
    $count = mysqli_num_rows($fire_query);
    if ($count > 0) {
      while ($row = mysqli_fetch_assoc($fire_query)) {
        $refer_id = $row['refer_id'];
        $refreral_payment = $row['refreral_payment'];
        $refreral_document = $row['refreral_document'];
      }
      echo "<div class='row wow fadeIn'>";
        echo "<div class='col-md-12'>";
          echo "<h2 class='h4'>Help amount Amount =  {$refreral_payment} </h2>";
        echo "</div>";
        echo "<div class='col-md-9 mb-2'>";
          echo "<div class='card'>";
          echo "<div class='card-body'>";
               if ($refreral_document)
                {echo "<img src='img/{$refreral_document}' alt='' class='img-fluid'>";}
               else
              {  echo "<h1 class='h1 text-center mx-auto my-auto'>it seems user have not uploaded any proof</h1>";}

            echo "</div>";
          echo "</div></div>";
        echo "<div class='col-md-3 mb-2'>";
          echo "<div class='card'>";
            echo "<div class='card-body'>";
              echo "<form class='p-5' method='post' action=''>";
                echo "<button type='submit' name='confirm_payment' class='btn btn-success'>Confirm payment Reception</button>";
              echo "</form></div></div></div>  </div>";
    }
    else {
      //Not found that query
    }
    if (isset($_POST['confirm_payment'])) {
      $query_up = "UPDATE tbl_payment SET ";
      $query_up .= "refral_payment_rec_status = '1'  ";
      $query_up .= "WHERE user_id = '{$id}' ";
      $update_user_query = mysqli_query($connection, $query_up);
      if (!$update_user_query) {
        die("Query Failed. ".mysqli_error($connection));
      }
      else {
        echo  $user_added = "<h1 class='h1 text-center alert alert-success'>Sposor Payment Recieved Confirm</h1>";
      }
    }
    user_paid_con($id);
  }
function user_paid_con($id){
  global $connection;
  $query = "SELECT * FROM tbl_payment WHERE user_id ='{$id}' and sponsor_payment_rec_status = '1' and refral_payment_rec_status ='1'";
  $query_fire = mysqli_query($connection, $query);
  if (!$query_fire) {
    die("Query Failed .".mysqli_error($connection));
  }
  $count = mysqli_num_rows($query_fire);
  if ($count > 0) {
    // update to paid
    $query_up = "UPDATE tbl_payment SET ";
    $query_up .= "payment_status = 'paid'  ";
    $query_up .= "WHERE user_id = '{$id}' ";
    $update_user_query = mysqli_query($connection, $query_up);
    if (!$update_user_query) {
      die("Query Failed. ".mysqli_error($connection));
    }else {
    }
    $query_up = "UPDATE tbl_user SET ";
    $query_up .= "user_paid = '1',  ";
    $query_up .= "user_active = '1',  ";
    $query_up .= "joiner_p1 = '0'  ";
    $query_up .= "WHERE user_generated_id = '{$id}' ";
    $update_user_query = mysqli_query($connection, $query_up);
    if (!$update_user_query) {
      die("Query Failed. ".mysqli_error($connection));
    }else {
      echo "<h2 class='alert alert-primary animated fadeOut delay-5s'> You will get one ID added to your account </h2>";
    }
  }
}
function timer_msg($id){
global $connection;
$time='';
$query = "SELECT * FROM tbl_user WHERE user_generated_id = '{$id}' and user_active !='1'";
$query_fire = mysqli_query($connection,$query);
if (!$query_fire) {
  die("Query Failed .".mysqli_error($connection));
}
while ($row = mysqli_fetch_assoc($query_fire)) {
  $time = $row['join_time'];
}
if ($time) {
  echo "<h2 class='alert alert-primary h4 p-3'>ID generated at {$time} , After 24 hours your ID will be deactive   <div id='response'></div></h2>";
}
}
function dowline_member($id){
  global $connection;
  $query = "SELECT * FROM tbl_user WHERE user_generated_id = '{$id}'";
  $query_fire = mysqli_query($connection, $query);
  if (!$query_fire) {
      die("Query Fire . ".mysqli_error($connection));
  }
  while ($row = mysqli_fetch_assoc($query_fire)) {
      $joiner_p1 = $row['joiner_p1'];
      $joiner_p2 = $row['joiner_p2'];
      $joiner_p3 = $row['joiner_p3'];
      $joiner_p4 = $row['joiner_p4'];
      // echo $joiner_p1."<br>".$joiner_p2."<br>".$joiner_p3."<br>".$joiner_p4;

      if ($joiner_p1 && $joiner_p2 && $joiner_p3 && $joiner_p4) {
        echo "<div class='text-center'><h1 class='alert alert-success'>{$id}</h1></div>";
        echo "<div class='card mb-4 wow fadeIn'> <div class='card-body d-sm-flex justify-content-between'>";
        echo "<div class='row'>";
        // echo user_details($joiner_p1) ."<br>". user_details($joiner_p2)."<br>".user_details($joiner_p3)."<br>".user_details($joiner_p4);
        echo "<div class='col-md p-2'>".user_details($joiner_p1)."</div>";
        echo "<div class='col-md p-2'>".user_details($joiner_p2)."</div>";
        echo "<div class='col-md p-2'>".user_details($joiner_p3)."</div>";
        echo "<div class='col-md p-2'>".user_details($joiner_p4)."</div>";
        echo "</div></div> </div>";
      }
      if ($joiner_p1) {
        dowline_member($joiner_p1);
      }
      if ($joiner_p2) {
        dowline_member($joiner_p2);
      }
      if ($joiner_p3) {
        dowline_member($joiner_p3);
      }
      if ($joiner_p4) {
        dowline_member($joiner_p4);
      }
  }
}
function user_details($id){
  global $connection;
  $query = "SELECT * FROM tbl_user WHERE user_generated_id = '{$id}'";
  $query_fire = mysqli_query($connection, $query);
  if (!$query_fire) {
      die("Query Fire . ".mysqli_error($connection));
  }
  while ($row = mysqli_fetch_assoc($query_fire)) {
    $user_name = $row['user_first_name']." ".$row['user_last_name'];
    $user_mobile_number = $row['user_mobile'];
    $user_generated_id = $row['user_generated_id'];
    $sponsor_id = $row['sponsor_id'];
    $sponsor_name = $row['sponsor_fullname'];
    echo "<p class='alert alert-primary p-3'>User Name = ".$user_name."<br>Mobile No.".$user_mobile_number."<br>  User ID  ".$user_generated_id."<br>  Sponsor ID ".$sponsor_id."<br>  sponsor name  ".$sponsor_name."</p>";
  }
}
function help_amount_of_2000($id){
    global $connection;
    $sum = 0;
    $query = "SELECT * FROM tbl_payment WHERE sponsor_id = '{$id}' and sponsor_payment = '2000' and sponsor_payment_rec_status = '1'";
    $query_fire = mysqli_query($connection ,$query);
    if (!$query_fire) {
        die("Query Failed .".mysqli_error($connection));
    }
    while ($row = mysqli_fetch_assoc($query_fire)) {
      $sum  += $row['sponsor_payment'];

    }
    return $sum;
}


function ref_amount_of_500($id){
    global $connection;
    $sum=0;
    $query = "SELECT * FROM tbl_payment WHERE refer_id = '{$id}' and refreral_payment = '500' and refral_payment_rec_status = '1'";
    $query_fire = mysqli_query($connection ,$query);
    if (!$query_fire) {
        die("Query Failed .".mysqli_error($connection));
    }
    while ($row = mysqli_fetch_assoc($query_fire)) {
      if (is_numeric($row['refreral_payment'])) {
        $sum+=$row['refreral_payment'];
      }else {
        // echo "Nothing";
      }

    }
    return $sum;
}
function level_rec ($id){
  global $connection;
  $sum=0;
  $query = "SELECT * FROM tbl_money_tran WHERE receiver_id = '{$id}' and money_status_received = '1'";
  $query_fire = mysqli_query($connection,$query);
  if (!$query_fire) {
      die("Query failed . ".mysqli_error($connection));
  }
  while ($row = mysqli_fetch_assoc($query_fire)) {
      $sum += $row['recieved_amount'];
  }
  return $sum;
}
function level_sent ($id){
  global $connection;
  $sum=0;
  $query = "SELECT * FROM tbl_money_tran WHERE payer_id = '{$id}' and money_status_send = '1'";
  $query_fire = mysqli_query($connection,$query);
  if (!$query_fire) {
      die("Query failed . ".mysqli_error($connection));
  }
  while ($row = mysqli_fetch_assoc($query_fire)) {
      $sum += $row['paid_amount'];
  }
  return $sum;
}
//////////////////////////////////////////////////////////////////5000 thousand payment here ///////////////////////////////////////////////////
function pay_5000_amount($num){
global $connection;
$user_generated_id ='';
$user_query = mysqli_query($connection, "SELECT * FROM tbl_user WHERE user_id ='{$num}'");
if (!$user_query) {
  die("Query Failed .".mysqli_error($connection));
}
while ($user_row = mysqli_fetch_assoc($user_query)) {
  $user_generated_id = $user_row['user_generated_id'];
  //now check in tbl_payment_table
}
if ($user_generated_id) {
  $money_check = mysqli_query($connection, "SELECT * FROM tbl_money_tran WHERE receiver_id = '{$user_generated_id}' and recieved_amount = 5000");
  if (!$money_check) {
    die("Query Failed . ".mysqli_error($connection));
  }
  $count_of_20000 = mysqli_num_rows($money_check);
  if ($count_of_20000 == 0) {
  }else {
    if ($count_of_20000 > 0 && $count_of_20000 <= 7) {
    }else {
      ++$num;
    return  pay_5000_amount($num);
    }
  }
}else {
  ++$num;
  return  pay_5000_amount($num);
}
$num++;
return $user_generated_id;
}


/////////////////////////////////////////////////////////////////5000 payment end here ////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////20000 payement start here ///////////////////////////////////////////////////
function pay_20000_amount($num){
global $connection;
echo "USER ID NUMBER :- ".$num."<br>";
$user_generated_id ='';

$user_query = mysqli_query($connection, "SELECT * FROM tbl_user WHERE user_id ='{$num}'");
if (!$user_query) {
  die("Query Failed .".mysqli_error($connection));
}
while ($user_row = mysqli_fetch_assoc($user_query)) {
  $user_generated_id = $user_row['user_generated_id'];
  //now check in tbl_payment_table
}
if ($user_generated_id) {
  $money_check = mysqli_query($connection, "SELECT * FROM tbl_money_tran WHERE receiver_id = '{$user_generated_id}' and recieved_amount = 20000");
  if (!$money_check) {
    die("Query Failed . ".mysqli_error($connection));
  }
  $count_of_20000 = mysqli_num_rows($money_check);
  if ($count_of_20000 == 0) {
  }else {
    if ($count_of_20000 > 0 && $count_of_20000 <= 15) {
    }else {
      ++$num;
    return  pay_20000_amount($num);
    }
  }
}else {
  ++$num;
  return  pay_20000_amount($num);
}
$num++;
return $user_generated_id;
}

/////////////////////////////////////////////////////////////////20000 payment end here //////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////// 200000 payment start here /////////////////////////////////////////////////
function pay_200000_amount($num){
global $connection;
echo "USER ID NUMBER :- ".$num."<br>";
$user_generated_id ='';

$user_query = mysqli_query($connection, "SELECT * FROM tbl_user WHERE user_id ='{$num}'");
if (!$user_query) {
  die("Query Failed .".mysqli_error($connection));
}
while ($user_row = mysqli_fetch_assoc($user_query)) {
  $user_generated_id = $user_row['user_generated_id'];
  //now check in tbl_payment_table
}
if ($user_generated_id) {
  $money_check = mysqli_query($connection, "SELECT * FROM tbl_money_tran WHERE receiver_id = '{$user_generated_id}' and recieved_amount = 200000");
  if (!$money_check) {
    die("Query Failed . ".mysqli_error($connection));
  }
  $count_of_20000 = mysqli_num_rows($money_check);
  if ($count_of_20000 == 0) {
  }else {
    if ($count_of_20000 > 0 && $count_of_20000 <= 31) {
    }else {
      ++$num;
    return  pay_200000_amount($num);
    }
  }
}else {
  ++$num;
  return  pay_200000_amount($num);
}
$num++;
return $user_generated_id;
}

///////////////////////////////////////////////////////////////// 200000 payemt end here ////////////////////////////////////////////////////
function user_block($id){
  global $connection;
  $query = "SELECT * FROM tbl_user WHERE user_generated_id = '{$id}' and user_active != '1' and user_paid !='1'";
  $query_fire = mysqli_query($connection, $query);
  if (!$query_fire) {
      die("Query Failed .".mysqli_error($connection));
  }
  $count = mysqli_num_rows($query_fire);
  if ($count > 0 ) {
    while ($row = mysqli_fetch_assoc($query_fire)) {
      $time = $row['join_time'];
   $reg_date = $row['reg_date'];
      $sponsor = $row['sponsor_id'];
      $join_position = $row['position_value'];
    }
  $now_date = date('Y-m-d');
   $timestamp = strtotime($time) + 60*60*24;
    $che =  strftime('%H:%M:%S', $timestamp);
   //current time
    $now = date("h:i:s");
   $con_now = strtotime($now);
  if ($now_date > $reg_date) {
    echo "True";
    if ($join_position == 1) {
      $query = "UPDATE tbl_user SET joiner_p1 = '0' WHERE user_generated_id = '{$sponsor}'";
      $query_fire = mysqli_query($connection , $query);
      if (!$query_fire) {
        die("Query Failed .".mysqli_error($connection));
      }
    }elseif ($join_position == 2) {
        $query = "UPDATE tbl_user SET joiner_p2 = '0' WHERE user_generated_id = '{$sponsor}'";
        $query_fire = mysqli_query($connection , $query);
        if (!$query_fire) {
          die("Query Failed .".mysqli_error($connection));
        }
      }
      elseif ($join_position == 3) {
          $query = "UPDATE tbl_user SET joiner_p3 = '0' WHERE user_generated_id = '{$sponsor}'";
          $query_fire = mysqli_query($connection , $query);
          if (!$query_fire) {
            die("Query Failed .".mysqli_error($connection));
          }
        }
        elseif ($join_position == 4) {
            $query = "UPDATE tbl_user SET joiner_p4 = '0' WHERE user_generated_id = '{$sponsor}'";
            $query_fire = mysqli_query($connection , $query);
            if (!$query_fire) {
              die("Query Failed .".mysqli_error($connection));
            }
          }
          $empty_query = "UPDATE tbl_user SET sponsor_id = '0' , refer_id = '0' WHERE user_generated_id = '$id'";
          $fire_empty_query = mysqli_query($connection , $empty_query);
          if ($fire_empty_query) {
            die("Query Failed .".mysqli_error($connection));
          }else {
            echo "<h1 class='alert alert-primary p-3'>You are No more Part Of the system .</h1>";
          }
  }

  }
}
function is_master_check($user_id_though_session){
    global $connection;
    $query = "SELECT * FROM tbl_user WHERE user_generated_id ='{$user_id_though_session}' ";
    $fire_query = mysqli_query($connection,$query);
    if(!$fire_query){
        die("Query Failed .".mysqli_error($connection));
    }else{
        while($row = mysqli_fetch_assoc($fire_query)){
            $is_master_id = $row['is_master'];
        }
    }
   return $is_master_id;
}
function get_slip_level($id){
  global $connection;
  $receiver_id='';
  $query = "SELECT * FROM tbl_money_tran WHERE receiver_id = '{$id}' and money_status_send = 1 and money_status_received = 0";
  $query_fire = mysqli_query($connection, $query);
  if (!$query_fire) {
    die("Query Failed ".mysqli_error($connection));
  }
  $count = mysqli_num_rows($query_fire);
  if ($count>0) {
    while ($row = mysqli_fetch_assoc($query_fire)) {
      $paid_amount = $row['paid_amount'];
      $payer_id = $row['payer_id'];
      $tran_time = $row['tran_time'];
      $receiver_id = $row['receiver_id'];
      $money_trans_id = $row['money_tran_id'];
      $query_details = "SELECT * FROM tbl_user WHERE user_generated_id = '{$payer_id}'";
      $query_details_fire = mysqli_query($connection,$query_details);
      if(!$query_details_fire){
       die("Query Failed .".mysqli_error($connection));
     }else {
       while ($user_row = mysqli_fetch_assoc($query_details_fire)) {
          $user_name = $user_row['user_first_name'] ." ".$user_row['user_last_name'];
          $user_mobile = $user_row['user_mobile'];
          $user_mail = $user_row['user_mail'];
          $user_bank_name = $user_row['user_bank_name'];
          $user_bank_account = $user_row['user_account_number'];
          $user_ifsc_code = $user_row['user_ifsc_code'];
          $user_bank_branch = $user_row['user_bank_branch'];
          ?>
          <div class="row wow fadeIn">
                <div class="col-md-12 mb-4">
                  <div class="card">
                    <div class="card-body">
                    <h5>Payment Receiver Slip ( आपको जो राशि प्राप्त हुई है )</h5>
                    <hr class="admin_pay">
                    <div class="row">
                      <div class="col-md-6 bg-primary p-4 text-white">
                        <h5>Paid By :-  <?php echo $user_name; ?> </h5>
                        <hr>
                        <p><i class="fas fa-calendar-day mr-2"></i>Time : <?php echo $tran_time; ?></p>
                        <p><i class="fas fa-phone mr-2"></i>Mobile No. <?php echo $user_mobile;  ?></p>
                        <p><i class="fas fa-calendar-day mr-2"></i>User Mail Id. <?php echo $user_mail; ?></p>
                        <p><i class="fas fa-university mr-2"></i>Acount No.  <?php echo $user_bank_account; ?></p>
                        <p><i class="fas fa-phone mr-2"></i>Bank Name <?php echo $user_bank_name;  ?></p>
                        <p><i class="fas fa-university mr-2"></i>IFSC Code  <?php echo $user_ifsc_code; ?></p>
                        <p><i class="fas fa-university mr-2"></i>Branch  <?php echo $user_bank_branch; ?></p>
                        <p class="alert alert-success text-center"><?php echo $paid_amount ?>/- Only</p>
                      </div>
                      <div class="col-md-6 bg-success p-4 text-white">
                        <a href="index.php?source=payment_perf&id=<?php echo $payer_id; ?>&paid_amount=<?php echo $paid_amount; ?>&tblid=<?php echo $money_trans_id; ?>" class="btn btn-primary mx-auto">Payment Recieved</a>
                      <h4>भुगतान पर्ची देखने के बाद पुष्टि करने के लिए कॉल करें</h4>
                      </div>
                    </div>
                    </div>
                  </div>
                </div>
              </div>
          <?php
       }
     }
    }
  }
  return $receiver_id;
}







 ?>
