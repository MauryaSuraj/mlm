<?php
if (isset($_SESSION['user_id'])) {
  $user_id_though_session =  $_SESSION['user_id'];
}
$l_query = "SELECT * FROM tbl_user WHERE user_generated_id = '{$user_id_though_session}'";
$level_query = mysqli_query($connection,$l_query);
if (!$level_query) {
  die("Query Failed .".mysqli_error($connection));
}
while ($l_row = mysqli_fetch_assoc($level_query)) {
  $l_user_level = $l_row['user_level'];
  $l_joiner_p1 = $l_row['joiner_p1'];
  $l_joiner_p2 = $l_row['joiner_p2'];
  $l_joiner_p3 = $l_row['joiner_p3'];
  $l_joiner_p4 = $l_row['joiner_p4'];
  $user_paid = $l_row['user_paid'];
  $user_active = $l_row['user_active'];
}
  ?>
