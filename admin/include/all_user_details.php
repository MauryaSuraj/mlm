<main class="pt-5 mx-lg-5">
  <div class="container-fluid mt-5">
    <!-- Heading -->
    <div class="card mb-4 wow fadeIn">
      <div class="card-body d-sm-flex justify-content-between">
        <h4 class="mb-2 mb-sm-0 pt-1"><span>All User Details</span></h4>
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
        <table class="table table-hover table-responsive">
          <thead class="blue lighten-4">
            <tr>
              <th>User ID</th>
              <th>Name </th>
              <th>Mobile No .</th>
              <th>Place ID </th>
              <th>Referal ID</th>
              <th>User password</th>
              <th>User register date</th>
              <th>User Level</th>
              <th>status</th>
            </tr>
          </thead>
          <tbody>
<?php
  $query = "SELECT * FROM tbl_user where user_id != 1";
  $query_fire = mysqli_query($connection, $query);
  if (!$query_fire) {
    die("Query Failed . ".mysqli_error($connection));
  }
  $count = mysqli_num_rows($query_fire);
  if ($count > 0) {
    while ($row = mysqli_fetch_assoc($query_fire)) {
      $user_id = $row['user_generated_id'];
      $help_id = $row['sponsor_id'];
      $refer_id = $row['refer_id'];
      $user_password = $row['user_password'];
      $user_mobile = $row['user_mobile'];
      $user_status = $row['user_paid'];
      $user_reg_date = $row['reg_date'];
      $username = $row['user_first_name'] ." ".$row['user_last_name'];
      $user_level = $row['user_level'];
      echo "<tr class=''>";
        echo "<th scope='row'>{$user_id}</th>";
        echo "<td>{$username}</td>";
        echo "<td>{$user_mobile}</td>";
        if ($help_id != '0') {
          echo "<td>{$help_id}</td>";
        }else {
          echo "<td>User Blocked</td>";
        }
        if ($refer_id != '0') {
          echo "<td>{$refer_id}</td>";
        }else {
          echo "<td>User Blocked</td>";
        }
        echo "<td>{$user_password}</td>";
        echo "<td>{$user_reg_date}</td>";
        echo "<td>{$user_level}</td>";
          if ($user_status == 1) {
            echo "<td>Active</td>";
          }else {
            echo "<td>UNactive</td>";
          }
                echo "</tr>";
              }
            }else {
              echo "No Users found";
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
