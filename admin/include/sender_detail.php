<!--Main layout-->
<main class="pt-5 mx-lg-5">
  <div class="container-fluid mt-5">
    <!-- Heading -->
    <div class="card mb-4 wow fadeIn">
      <!--Card content-->
      <div class="card-body d-sm-flex justify-content-between">
        <h4 class="mb-2 mb-sm-0 pt-1"><span>Sender Details (Money You have sended)</span></h4>
        <form class="d-flex justify-content-center">
          <!-- Default input -->
          <input type="search" placeholder="Type your query" aria-label="Search" class="form-control">
          <button class="btn btn-primary btn-sm my-0 p" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </form>
      </div>
    </div>
    <!-- Heading -->
    <!--Grid row-->
    <div class="row wow fadeIn">
      <!--Grid column-->
      <div class="col-md-12 mb-4">
        <!--Card-->
        <div class="card">
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
                  <th>Comment</th>
                  <th>Time</th>
                </tr>
              </thead>
              <tbody>
                  <?php   recv_detail ($user_id_though_session); ?>
              <?php   //sender_detail ($user_id_though_session); ?>
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
              <?php   pay_done($user_id_though_session); ?>
              </tbody>
            </table>
            <!-- Table  -->
          </div>

        </div>
        <!--/.Card-->

      </div>
      <!--Grid column-->
    </div>
    <!--Grid row-->
  </div>
</main>
