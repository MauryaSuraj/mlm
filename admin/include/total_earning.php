<?php
if (isset($_SESSION['user_id'])) {
  $user_id_though_session =  $_SESSION['user_id'];
}?>
<main class="pt-5 mx-lg-5">
  <div class="container-fluid mt-5">
    <div class="card mb-4 wow fadeIn">
      <div class="card-body d-sm-flex justify-content-between">
        <h4 class="mb-2 mb-sm-0 pt-1">
          <span> Total Earning By your ID </span>
        </h4>
      </div>
    </div>
    <div class="card mb-4 wow fadeIn">
      <div class="card-body ">
        <div class="row text-left">
          <p class ='alert alert-primary p-3 m-1'>Joining Help amount recieve By You  <br><strong> <?php echo help_amount_of_2000($user_id_though_session); ?></strong> </p>
        </div>
        <div class="row">
          <p class ='alert alert-success p-3 m-1'>joiner Sponsor amount receive By you  <br> <strong> <?php echo ref_amount_of_500($user_id_though_session); ?></strong> </p>
        </div>
      <div class="row">
          <p class ='alert alert-danger p-3 m-1'>Level amount receive By You  <br><strong> <?php echo level_rec($user_id_though_session); ?></strong> </p>
      </div>
        <div class="row">
          <p class ='alert alert-warning p-3 m-1'>Level Amount paid By you  <br><strong> <?php echo level_sent($user_id_though_session); ?></strong> </p>
        </div>
        <h3 class="h3 text-center"> Your Total Income : <?php echo (help_amount_of_2000($user_id_though_session) + ref_amount_of_500($user_id_though_session) + level_rec($user_id_though_session)) - level_sent($user_id_though_session);  ?></h3>
      </div>
    </div>
  </div>
</main>
