<!--Main layout-->
<?php
if (isset($_SESSION['user_id'])) {
  $user_id_though_session =  $_SESSION['user_id'];
}
 ?>
<main class="pt-5 mx-lg-5">
  <div class="container-fluid mt-5">
    <!-- Heading -->
    <div class="card mb-4 wow fadeIn">
      <div class="card-body d-sm-flex justify-content-between">
        <h4 class="mb-2 mb-sm-0 pt-1"><span>Money Receiver Details (Money you have Recieved)</span></h4>
        <form class="d-flex justify-content-center">
          <!-- Default input -->
          <input type="search" placeholder="Type your query" aria-label="Search" class="form-control">
          <button class="btn btn-primary btn-sm my-0 p" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </form>
      </div>
    </div>
    <!--Grid row-->
    <div class="row wow fadeIn">
      <div class="col-md-12 mb-4">
        <div class="card">
          <div class="card-body">
            <table class="table table-hover table-responsive">
              <thead class="blue lighten-4">
                <tr>
                  <th>#</th>
                  <th>Name </th>
                  <th>Mobile No .</th>
                  <th>Amount </th>
                  <th>Level</th>
                  <th>Comment</th>
                  <th>Time</th>
                </tr>
              </thead>
              <tbody>
                  <?php   sender_detail ($user_id_though_session); ?>

              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
        <div class="row wow fadeIn">
      <!--Grid column-->
      <div class="col-md-12 mb-4">
        <!--Card-->
        <div class="card">
            <div class='card-header'>
                <h2>Help Amount Recieved By You</h2>
            </div>
          <!--Card content-->
          <div class="card-body">
            <!-- Table  -->
            <table class="table table-hover table-responsive">
              <thead class="blue lighten-4">
                <tr>
                  <th>#</th>
                  <th>Name </th>
                  <th>Mobile No .</th>
                  <th>Amount </th>
                  <th>Level</th>
                  <th>Status </th>
                  <th>Document</th>
                </tr>
              </thead>
              <tbody>
              <?php   pay_rec($user_id_though_session); ?>
              </tbody>
            </table>
            <!-- Table  -->
          </div>

        </div>
        <!--/.Card-->

      </div>
      <!--Grid column-->
    </div>
        <div class="row wow fadeIn">
      <!--Grid column-->
      <div class="col-md-12 mb-4">
        <!--Card-->
        <div class="card">
            <div class='card-header'>
                <h2>Sponsor Amount Recieved By You</h2>
            </div>
          <!--Card content-->
          <div class="card-body">
            <!-- Table  -->
            <table class="table table-hover table-responsive">
              <thead class="blue lighten-4">
                <tr>
                  <th>#</th>
                  <th>Name </th>
                  <th>Mobile No .</th>
                  <th>Amount </th>
                  <th>Level</th>
                  <th>Status </th>
                  <th>Document</th>
                </tr>
              </thead>
              <tbody>
              <?php   pay_rec_spo($user_id_though_session); ?>
              </tbody>
            </table>
            <!-- Table  -->
          </div>

        </div>
        <!--/.Card-->

      </div>
      <!--Grid column-->
    </div>


     <div class="row wow fadeIn">
      <!--Grid column-->
      <div class="col-md-12 mb-4">
        <!--Card-->
        <div class="card">
            <div class='card-header'>
                <h2>Expecting payment From them</h2>
            </div>
          <!--Card content-->
          <div class="card-body">
            <!-- Table  -->
            <div class='row my-1'>
                <div class='col-md-12'><h5>Expecting Help Payment From These</h5></div>
                <?php   pay_spo_not($user_id_though_session); ?>
            </div>
            <hr>
            <div class='row my-1'>
                <div class='col-md-12'><h5>Expecting Sponsor Payment From These</h5></div>
                <?php   pay_ref_not ($user_id_though_session); ?>
            </div>

          </div>

        </div>
        <!--/.Card-->

      </div>
      <!--Grid column-->
    </div>

  </div>
</main>
