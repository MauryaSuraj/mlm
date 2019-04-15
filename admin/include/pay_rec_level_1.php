<?php
$s_query = mysqli_query($connection,"SELECT * FROM tbl_payment WHERE sponsor_id = '{$user_generated_id}' and sponsor_payment = 2000 and sponsor_payment_rec_status = '1'");
if (!$s_query) {
   die("Query Failed .".mysqli_error($connection));
}
$count = mysqli_num_rows($s_query);
if ($count == 1) {
  echo $user_message = "<h2 class='alert h5 alert-danger animated fadeOut delay-5s'>One User have Paid you </h2>";
      ?>
      <?php if(empty(payer_value_1000($user_generated_id))) { ?>
        <?php echo $user_message = "<h2 class='alert h5 alert-danger animated pulse infinite'>To add More Member To your Down The line please pay 1000 Level Sposnsor Amount</h2>"; ?>
      <div class="row wow fadeIn">
        <?php sponsor_det($refer_id); ?>
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
                  <button type="submit" class="btn btn-primary" name="upload_doc1">Submit</button>
                </form>
              </div>
            </div>
            </div>
          </div>
        </div>
      </div>
      <?php } ?>
      <?php
      if (isset($_POST['upload_doc1'])) {
        $upload = $_FILES['upload']['name'];
        $upload_temp = $_FILES['upload']['tmp_name'];
        move_uploaded_file($upload_temp, "img/doc/$upload");
        $desc = "{$user_generated_id} have paid {$refer_id} 1 thousand sponsor payment";
        $time= date("Y-m-d h:i:sa");
        $trans_query = "INSERT INTO tbl_money_tran (payer_id,  receiver_id, paid_amount, recieved_amount, tran_time, money_status_send, money_status_received, tran_type,proof_upload) VALUES ('{$user_generated_id}','{$refer_id}','1000','0','{$time}','1','0','{$desc}','{$upload}') ";
        $trans_query_fire = mysqli_query($connection, $trans_query);
        if (!$trans_query_fire) {
          die("Query Failed .".mysqli_error($connection));
        }else {
          echo "<p class='alert alert-primary animated fadeOut'> You have uploaded successfully </p>";
        }
      }

                $query = mysqli_query($connection, "SELECT * FROM tbl_money_tran WHERE payer_id = '{$user_generated_id}' and money_status_send = '1' and money_status_received = '1' and paid_amount = '1000'");
                if (!$query) {
                  die("Query Failed. ".mysqli_error($connection));
                }
                else {
                  $count12 = mysqli_num_rows($query);
                  if ($count12 > 0) {
                    if ($joiner_p2 == 1 && $joiner_p3 == 1) {
                      $query_up = "UPDATE tbl_user SET ";
                      $query_up .= "joiner_p2 = '0',  ";
                      $query_up .= "joiner_p3 = '0'  ";
                      $query_up .= "WHERE user_generated_id = '{$user_generated_id}' ";
                      $update_user_query = mysqli_query($connection, $query_up);
                      if (!$update_user_query) {
                        die("Query Failed. ".mysqli_error($connection));
                      }else {
                        echo "<p class='alert alert-primary animated fadeOut delay-5s '> You have Unlock You Positions Now you can Add more Member To your ID </p>";
                      }
                    }
                  }
                }
}
if ($count == 3 ) {
  ?>
  <?php if(empty(payer_value_5000($user_generated_id))) { ?>
  <?php $res = pay_5000_amount(0); ?>
    <?php echo "<h1 class='alert h5 alert-danger'>Pay 5000 Level Help Amount To your Upper Level {$res} </h1>"; ?>
  <div class="row wow fadeIn">
    <?php sponsor_det($res); ?>
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
              <button type="submit" class="btn btn-primary" name="upload_doc2">Submit</button>
            </form>
          </div>
        </div>
        </div>
      </div>
    </div>
  </div>
<?php } }?>
  <?php
  if (isset($_POST['upload_doc2'])) {
    $upload = $_FILES['upload']['name'];
    $upload_temp = $_FILES['upload']['tmp_name'];
    //move uploded file/////////uploaded
    move_uploaded_file($upload_temp, "img/doc/$upload");
    $desc_a = "{$user_generated_id} have paid {$res} 5 thousand help amount";
    $time_a= date("Y-m-d h:i:sa");
    $trans_a_query = "INSERT INTO tbl_money_tran (payer_id,  receiver_id, paid_amount, recieved_amount, tran_time, money_status_send, money_status_received, tran_type,proof_upload) VALUES ('{$user_generated_id}','{$res}','5000','0','{$time_a}','1','0','{$desc_a}','{$upload}') ";
    $trans_query_a_fire = mysqli_query($connection, $trans_a_query);
    if (!$trans_query_a_fire) {
      die("Query Failed .".mysqli_error($connection));
    }else {
      echo "<p class='alert alert-primary p-2'>You have uploaded the document. </p>";
    }
  }
  $query1 = mysqli_query($connection, "SELECT * FROM tbl_money_tran WHERE payer_id = '{$user_generated_id}' and money_status_send = '1' and money_status_received = '1' and paid_amount = '5000'");
  if (!$query1) {
    die("Query Failed. ".mysqli_error($connection));
  }else {
    $count1 = mysqli_num_rows($query1);
     if ($count1 > 0) {
       if ($joiner_p4 == 1) {
         $query_up = "UPDATE tbl_user SET ";
         $query_up .= "joiner_p4 = '0'  ";
         $query_up .= "WHERE user_generated_id = '{$user_generated_id}' ";
         $update_user_query = mysqli_query($connection, $query_up);
         if (!$update_user_query) {
           die("Query Failed. ".mysqli_error($connection));
         }else {
           echo "<p alert alert-primary>Now You can Add one More ID</p>";
         }
       }
     }
  }
if ($count == 4) {
  $query_up = "UPDATE tbl_user SET ";
  $query_up .= "user_level = '2'  ";
  $query_up .= "WHERE user_generated_id = '{$user_generated_id}' ";
  $update_user_query = mysqli_query($connection, $query_up);
  if (!$update_user_query) {
    die("Query Failed. ".mysqli_error($connection));
  }else {
    echo "<p class='alert alert-success'>You are Level Up here .</p>";
  }
}
 ?>
