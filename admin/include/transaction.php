<main class="pt-5 mx-lg-5">
  <div class="container-fluid mt-5">
    <!-- Heading -->
    <div class="card mb-4 wow fadeIn">
      <div class="card-body d-sm-flex justify-content-between">
        <h4 class="mb-2 mb-sm-0 pt-1"><span>All transaction Details</span></h4>
        <form class="d-flex justify-content-center">
          <!-- Default input -->
          <input type="search" placeholder="Type your query" aria-label="Search" class="form-control">
          <button class="btn btn-primary btn-sm my-0 p" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </form>
      </div>
    </div>
<div class="row wow fadeIn">
  <div class="col-md-12 mb-4">
    <div class="card">
      <div class="card-body">
        <table class="table table-hover">
          <thead class="blue lighten-4">
            <tr>
              <th>#</th>
              <th>Payer ID</th>
              <th>Receiver ID </th>
              <th>Amount</th>
              <th>status</th>
              <th>Time</th>
            </tr>
          </thead>
          <tbody>
<?php
  $query = "SELECT * FROM tbl_money_tran";
  $query_fire = mysqli_query($connection, $query);
  if (!$query_fire) {
    die("Query Failed . ".mysqli_error($connection));
  }
  $count = mysqli_num_rows($query_fire);
  if ($count > 0) {
    while ($row = mysqli_fetch_assoc($query_fire)) {
      $money_tran_id = $row['money_tran_id'];
      $payer_id = $row['payer_id'];
      $receiver_id = $row['receiver_id'];
      $paid_amount = $row['paid_amount'];
      $money_status_send = $row['money_status_send'];
      $money_status_received = $row['money_status_received'];
      $tran_time = $row['tran_time'];
      echo "<tr class=''>";
        echo "<th scope='row'>{$money_tran_id}</th>";
        echo "<td>{$payer_id}</td>";
        echo "<td>{$receiver_id}</td>";
        echo "<td>{$paid_amount}</td>";

if ($money_status_received && $money_status_send) {
  echo "<td>PAID</td>";
}elseif ($money_status_received != 1 && $money_status_send == 1) {
  echo "<td>PENDING</td>";
}else {
  echo "<td>Not PAid</td>";
}



        echo "<td>{$tran_time}</td>";
            }
          }
 ?>
</tbody>
</table>
</div>
</div>
</div>
</div>

</div>
</main>
