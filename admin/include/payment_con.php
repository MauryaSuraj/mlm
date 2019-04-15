<?php
if (isset($_GET['id'])) {
  $payer_id =  $_GET['id'];
}
if (isset($_GET['rec_type'])) {
  $rec_type = $_GET['rec_type'];
}
if (isset($_POST['cancel_payment'])) {
  $user_added = "<h1 class='h4 text-center alert alert-danger'>You have cancel the confirmation of the user.  </h1>";
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
     <?php if ($rec_type === 'referal'): ?>
       <?php sponsor_payment_con($payer_id); ?>
     <?php endif; ?>
     <?php if ($rec_type === 'sponsor'): ?>
       <?php help_payment_con($payer_id);
       include 'pay_rec_level_0.php';
        ?>
     <?php endif; ?>
   </div>
 </main>
