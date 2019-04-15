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
        <h4 class="mb-2 mb-sm-0 pt-1"><span>User Generated Link</span></h4>
        <form class="d-flex justify-content-center">
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
      <div class="col-md-9 mb-4">
        <div class="card">
          <div class="card-body">
            <h3 class="h3 text-left">User Referal Link</h3>
            <div class="bg-danger p-5">

              <a href="http://helpfast4.com/join.php?reg_id=<?php echo $user_id_though_session; ?>" class="text-white">http://helpfast4.com/join.php?reg_id=<?php echo $user_id_though_session; ?></a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>
