<?php

$query_up = "UPDATE tbl_user SET ";
$query_up .= "user_level = '1'  ";
$query_up .= "WHERE user_generated_id = '{$user_generated_id}' ";
$update_user_query = mysqli_query($connection, $query_up);
if (!$update_user_query) {
  die("Query Failed. ".mysqli_error($connection));
}
$user_message = "Your are level Up Now";

 ?>
