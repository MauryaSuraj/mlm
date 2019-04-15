<?php
$query_l3 = "SELECT * FROM tbl_money_tran WHERE receiver_id ='{$user_generated_id}' and recieved_amount ='20000'";
$query_fire_l3 = mysqli_query($connection,$query_l3);
if (!$query_fire_l3) {
  die("Query Failed .".mysqli_error($connection));
}
$count_l3 = mysqli_num_rows($query_fire_l3);
if ($count_l3 == 1) {
  if ($sponsor_id) {
    ?>
    <?php if(empty(payer_value_10000($user_generated_id))) { ?>
      <?php echo "<h2 class='alert alert-danger h5 animated pulse infinite'> Pay 10,000 to your sponsor </strong></h2>"; ?>
    <div class="row wow fadeIn">
      <?php pay_200000_amount($refer_id); ?>
      <div class="col-md-6 mb-4">
        <div class="card">
          <div class="card-body">
          <h3>Upload the Payment Proof <?php echo $user_id_though_session; ?></h3>
          <hr class="admin_pay">
          <div class="row">
            <div class="col-md-12  p-4">
              <form method="post" enctype="multipart/form-data" action="">
                <fieldset class="form-group">
                  <label for="exampleInputFile">File input</label>
                  <input type="file" class="form-control-file" name="upload" required>
                </fieldset>
                <button type="submit" class="btn btn-primary" name="upload_doc5">Submit</button>
              </form>
            </div>
          </div>
          </div>
        </div>
      </div>
    </div>
    <?php } ?>
    <?php
  }
  if (isset($_POST['upload_doc5'])) {
    $upload = $_FILES['upload']['name'];
      $upload_temp = $_FILES['upload']['tmp_name'];
      //move uploded file/////////uploaded
      move_uploaded_file($upload_temp, "img/doc/$upload");
      $desc_a = "{$user_generated_id} have paid {$refer_id} 10,000 thousand sponsor payment";

    $time_a= date("Y-m-d h:i:sa");
    $trans_a_query = "INSERT INTO tbl_money_tran (payer_id,  receiver_id, paid_amount, recieved_amount, tran_time, money_status_send, money_status_received, tran_type,proof_upload) VALUES ('{$user_generated_id}','{$refer_id}','10000','0','{$time_a}','1','0','{$desc_a}','{$upload}') ";
    $trans_query_a_fire = mysqli_query($connection, $trans_a_query);
    if (!$trans_query_a_fire) {
      die("Query Failed .".mysqli_error($connection));
    }else {
      echo "<p class='alert alert-success'>You have uploaded the document</p>";
    }
  }
  $query_l3 = "SELECT * FROM tbl_money_tran WHERE payer_id ='{$user_generated_id}' and paid_amount ='10000'";
  $query_fire_l3 = mysqli_query($connection,$query_l3);
  if (!$query_fire_l3) {
    die("Query Failed .".mysqli_error($connection));
  }
  while ($row_ab = mysqli_fetch_assoc($query_fire_l3)) {
    $money_paid = $row_ab['money_status_send'];
    $money_recieved = $row_ab['money_status_received'];
    $paid_amount = $row_ab['paid_amount'];
  }
  if ($money_paid =='1' && $money_recieved =='1' && $paid_amount =='10000') {
    //update here for further payment recieve
    $query_l2 = "SELECT * FROM tbl_money_tran WHERE payer_id ='{$user_generated_id}'  and paid_amount ='10000'";
    $query_fire_l2 = mysqli_query($connection,$query_l2);
    if (!$query_fire_l2) {
      die("Query Failed .".mysqli_error($connection));
    }
    while ($row = mysqli_fetch_assoc($query_fire_l2)) {
      $block_is = $row['money_tran_id'];
    }
    //update here block
    $query_up = "UPDATE tbl_money_tran SET ";
    $query_up .= "can_recieve = '1'  ";
    $query_up .= "WHERE money_tran_id = '{$block_is}' ";
    $query_fire_2 = mysqli_query($connection,$query_up);

  }
  else {
    $query_l2 = "SELECT * FROM tbl_money_tran WHERE payer_id ='{$user_generated_id}' and receiver_id ='{$sponsor_id}' and paid_amount ='10000'";
    $query_fire_l2 = mysqli_query($connection,$query_l2);
    if (!$query_fire_l2) {
      die("Query Failed .".mysqli_error($connection));
    }
    while ($row = mysqli_fetch_assoc($query_fire_l2)) {
      $block_is = $row['money_tran_id'];
    }
    //update here block
    $query_up = "UPDATE tbl_money_tran SET ";
    $query_up .= "can_recieve = '1'  ";
    $query_up .= "WHERE money_tran_id = '{$block_is}' ";
    $query_fire_2 = mysqli_query($connection,$query_up);
  }
}
elseif ($count_l3 == 11) {
  if ($sponsor_id) {
    ?>
    <?php if(empty(payer_value_200000($user_generated_id))) { ?>
      <?php echo  "<h2 class='alert alert-danger h5 animated pulse infinite'>Pay 200,000 to your upper level. </strong></h2>"; ?>
    <div class="row wow fadeIn">
      <?php $resss =  pay_200000_amount(0); ?>
      <?php sponsor_det($resss); ?>
    <div class="col-md-6 mb-4">
      <div class="card">
        <div class="card-body">
        <h3>Upload the Payment Proof <?php echo $user_id_though_session; ?></h3>
        <hr class="admin_pay">
        <div class="row">
          <div class="col-md-12  p-4">
            <form method="post" enctype="multipart/form-data" action="">
              <fieldset class="form-group">
                <label for="exampleInputFile">File input</label>
                <input type="file" class="form-control-file" name="upload" required>
              </fieldset>
              <button type="submit" class="btn btn-primary" name="upload_doc6">Submit</button>
            </form>
          </div>
        </div>
        </div>
      </div>
    </div>
  </div>
  <?php } ?>
    <?php
  }
  if (isset($_POST['upload_doc6'])) {
    $upload = $_FILES['upload']['name'];
      $upload_temp = $_FILES['upload']['tmp_name'];
      //move uploded file/////////uploaded
      move_uploaded_file($upload_temp, "img/doc/$upload");
    $desc_a = "{$resss} have paid 200,000 amount to {$user_generated_id}";
    $time_a= date("Y-m-d h:i:sa");
    $trans_a_query = "INSERT INTO tbl_money_tran (payer_id,  receiver_id, paid_amount, recieved_amount, tran_time, money_status_send, money_status_received, tran_type,proof_upload) VALUES ('{$user_generated_id}','{$resss}','200000','0','{$time_a}','1','0','{$desc_a}','{$upload}') ";
    $trans_query_a_fire = mysqli_query($connection, $trans_a_query);
    if (!$trans_query_a_fire) {
      die("Query Failed .".mysqli_error($connection));
    }else {
      echo "<p class='alert alert-sucess'>Document Uploaded successfully.</p>";
    }
  }
}
if($count_l3 == 16) {
  //update to next level
  $query_up = "UPDATE tbl_user SET ";
  $query_up .= "user_level = '4'  ";
  $query_up .= "WHERE user_generated_id = '{$user_generated_id}' ";
  $update_user_query = mysqli_query($connection, $query_up);
  if (!$update_user_query) {
    die("Query Failed. ".mysqli_error($connection));
  }else {
    echo "<p class='alert alert-success'>You are upgreded to level 3.</p>";
  }
}




 ?>
