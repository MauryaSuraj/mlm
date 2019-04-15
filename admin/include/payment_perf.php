<?php
if (isset($_GET['id'])) {
  $payer_id =  $_GET['id'];
}
if (isset($_GET['paid_amount'])) {
  $amount = $_GET['paid_amount'];
}
if (isset($_GET['tblid'])) {
  $idtbl = $_GET['tblid'];
}
$mes='';
$payment_document ='';
  $query = "SELECT * FROM tbl_money_tran WHERE payer_id = '{$payer_id}' and paid_amount ='{$amount}'";
  $query_fire = mysqli_query($connection,$query);
  if (!$query_fire) {
    die("Query Failed .".mysqli_error($connection));
  }
  while ($row = mysqli_fetch_assoc($query_fire)) {
    $money_trans_id = $row['money_tran_id'];
    $payer_id = $row['payer_id'];
    $recei_id = $row['receiver_id'];
    $paid_amount = $row['paid_amount'];
    $recieved_amount = $row['recieved_amount'];
    $tran_time = $row['tran_time'];
    $money_status_send = $row['money_status_send'];
    $money_status_received = $row['money_status_received'];
    $tran_type = $row['tran_type'];
    $proof_upload = $row['proof_upload'];
}
 ?>
 <?php
if (isset($_POST['confirm_payment'])) {
$query_up = "UPDATE tbl_money_tran SET ";
$query_up .= "recieved_amount = '{$amount}',  ";
$query_up .= "money_status_received = '1',  ";
$query_up .= "can_recieve = '1'  ";
$query_up .= "WHERE money_tran_id = '{$idtbl}' ";
$update_user_query = mysqli_query($connection, $query_up);
if (!$update_user_query) {
  die("Query Failed. ".mysqli_error($connection));
}else {
  $mes = "<h1 class='h1 text-center alert alert-success'>You have confirmed </h1>";
}
}
if (isset($_POST['cancel_payment'])) {
  $mes = "<h1 class='h1 text-center alert alert-danger'>You have cancel the confirmation of the user. </h1>";
}
   ?>
 <main class="pt-5 mx-lg-5">
   <div class="container-fluid mt-5">
     <div class="card mb-4 wow fadeIn">
       <div class="card-body d-sm-flex justify-content-between">
         <h4 class="mb-2 mb-sm-0 pt-1">
           <span>Check the details of sender to verify,</span>
         </h4>
         <p>"if You are satisfied with payment proof then <strong>CONFIRM THE PAYMENT</strong>"</p>
       </div>
     </div>
    <div class="row wow fadeIn">
      <div class="col-md-12">
        <h2 class="h2">Paid Amount = <?php echo $paid_amount; ?></h2>
      </div>
      <div class="col-md-9 mb-4">
        <div class="card">
          <div class="card-body">
              <?php if ($proof_upload): ?>
                <img src="img/doc/<?php echo $proof_upload; ?>" alt="" class="img-fluid">
                <?php else: ?>
                  <h1 class="h1 text-center mx-auto my-auto">it seems user have not uploaded any proof</h1>
              <?php endif; ?>
          </div>
        </div>
        <?php echo $mes; ?>
      </div>
      <div class="col-md-3 mb-4">
        <div class="card">
          <div class="card-body">
            <form class="p-5" method="post" action="">
              <button type="submit" name="confirm_payment" class="btn btn-success">Confirm payment Reception</button>
            </form>
          </div>
        </div>
      </div>
    </div>
   </div>
 </main>
