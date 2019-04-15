<?php include 'include/db.php'; ?>
<?php
if (isset($_POST['id'])) {
  $query = "SELECT * FROM tbl_user WHERE user_generated_id = '{$_POST['id']}' and user_paid != '0' and user_active !='0'";
  $query_fire = mysqli_query($connection,$query);
  $count = mysqli_num_rows($query_fire);
  if (!$query_fire) {
    die("Query Failed .".mysqli_error($connection));
    // show msg that there is no id here
  }else {
    while ($row = mysqli_fetch_assoc($query_fire)) {
      $data['fullname'] = $row['user_first_name']." ".$row['user_last_name'];
      $data['user_id'] = $row['user_id'];
    }
    if($count == 0)
    {
         $data['fullname'] ='0';
    }
    echo json_encode($data);
  }
}
 ?>
