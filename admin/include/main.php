<?php include 'include/main_file.php'; ?>
 <main class="pt-5 mx-lg-5">
   <div class="container-fluid mt-5">
     <?php timer_msg($user_id_though_session); ?>
     <?php if (paid_active($user_id_though_session)): ?>
     <?php user_status($user_id_though_session); ?>
     <?php user_block($user_id_though_session); ?>
    <?php endif; ?>
    <?php include 'include/main_file_2.php'; ?>
<?php
$master='';
if(is_master($user_id_though_session) == $user_id_though_session){
    $master = 1;
}else{
    $master = 0;
}
?>
<?php if($master == 0){ ?>
<?php if ($user_type === 'sender' && $status_sp=='unpaid' || $status_rf =='unpaid'): ?>
  <div class="row wow fadeIn">
    <div class="col-md-12 mb-4">
      <div class="card">
        <div class="card-body">
        <h3 class="h5">Payment Sender Slip </h3>
        <hr class="admin_pay">
        <div class="row">
          <?php if ($status_rf == 'unpaid'): ?>
            <div class="col-md m-1">
              <div class="row">
                <div class="col-md-12  bg-danger p-2">
                  <h3 class="text-center h6">Pay Sponsor Amount</h3>
                  <h2 class='h5'>कृपया भुगतान करने से पहले दिए गए नंबर पर कॉल करें</h2>
                </div>
                <div class="col-md-6 bg-primary p-4 text-white">
                  <h5><?php echo $r_user_first_name." ".$r_user_last_name ." ".$refer_id;  ?></h5>
                  <hr>
                  <p><i class="fas fa-calendar-day mr-2"></i> <?php echo $time_reg; ?></p>
                  <p><i class="far fa-clock mr-2"></i> <?php echo $join_time; ?> </p>
                  <p><i class="fas fa-phone mr-2"></i> <?php echo $r_user_moblie ?></p>
                  <p class="alert alert-success text-center">500/- Only</p>
                </div>
                <div class="col-md-6 bg-success p-4 text-white">
                  <h5>Bank Details</h5>
                  <hr>
                  <p><i class="fas fa-university mr-2"></i>  <?php echo $r_user_bank_name; ?></p>
                  <p><i class="fas fa-user-circle mr-2"></i>  <?php echo $r_user_account_number; ?></p>
                  <p><i class="fas fa-shield-alt mr-2"></i>   <?php echo $r_user_ifsc_code ?></p>
                  <p><i class="fas fa-map-marker-alt mr-2"></i>  <?php echo $r_user_bank_branch ?></p>
                  <a href="index.php?source=upload&type=referal&refer_id=<?php echo $refer_id; ?>" class="btn btn-primary">Pay</a>

                </div>
              </div>
            </div>
          <?php endif; ?>
          <?php if ($status_sp == 'unpaid'): ?>
            <div class="col-md m-1">
              <div class="row">
                <div class="col-md-12 bg-danger p-2">
                  <h3 class="text-center h6">Pay Help Amount</h3>
                  <h2 class='h5'>कृपया भुगतान करने से पहले दिए गए नंबर पर कॉल करें</h2>
                </div>
                <div class="col-md-6 bg-primary p-4 text-white">
                  <h5><?php echo $s_user_first_name." ".$s_user_last_name; ?></h5>
                  <hr>
                  <p><i class="fas fa-calendar-day mr-2"></i> <?php echo $time_reg; ?></p>
                  <p><i class="far fa-clock mr-2"></i><?php echo $join_time; ?></p>
                  <p><i class="fas fa-phone mr-2"></i> <?php echo $s_user_moblie ?></p>
                  <p class="alert alert-success text-center">2000/- Only</p>
                </div>
                <div class="col-md-6 bg-success p-4 text-white">
                  <h5>Bank Details</h5>
                  <hr>
                  <p><i class="fas fa-university mr-2"></i>  <?php echo $s_user_bank_name; ?></p>
                  <p><i class="fas fa-user-circle mr-2"></i>  <?php echo $s_user_account_number; ?></p>
                  <p><i class="fas fa-shield-alt mr-2"></i>   <?php echo $s_user_ifsc_code ?></p>
                  <p><i class="fas fa-map-marker-alt mr-2"></i>  <?php echo $s_user_bank_branch ?></p>
                  <a href="index.php?source=upload&type=sponsor&sponsor_id=<?php echo $sponsor_id; ?>" class="btn btn-primary">Pay</a>
                </div>
              </div>
            </div>
          <?php endif; ?>
        </div>
        </div>
      </div>
    </div>
  </div>
<?php endif; } ?>
  </div>
</main>
<?php if($user_paid == 1 && $user_active == 1): ?>
<?php include 'pay_rec.php'; ?>
<?php endif; ?>
