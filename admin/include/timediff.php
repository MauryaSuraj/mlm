<?php
session_start();
date_default_timezone_set('Asia/Kolkata');
if (isset($_SESSION['user_id'])) {
  $id =  $_SESSION['user_id'];
}
if (isset($_SESSION['timer_id'])) {
  $id = $_SESSION['timer_id'];
}
 ?>
<?php include 'db.php';
$query = "SELECT * FROM tbl_user WHERE user_generated_id = '{$id}' and user_active != '1' and user_paid !='1'";
$query_fire = mysqli_query($connection, $query);
if (!$query_fire) {
    die("Query Failed .".mysqli_error($connection));
}
$count = mysqli_num_rows($query_fire);
if ($count > 0 ) {
  while ($row = mysqli_fetch_assoc($query_fire)) {
    $time = $row['join_time'];
    $sponsor = $row['sponsor_id'];
    $join_position = $row['position_value'];
  }
  $timestamp = strtotime($time) + 60*60*24;
   $now = date("H:i:s");
  $con_now = strtotime($now);
  if ($timestamp > $con_now) {
    $diff =  $timestamp - $con_now;
    echo gmdate("H:i:s",$diff);
  }
}
 ?>
<script type="text/javascript">
  window.location="time.php";
</script>
