<?php

$spo_query = "SELECT * FROM tbl_user WHERE user_generated_id = '{$sponsor_id}'";
$spo_q_fir = mysqli_query($connection,$spo_query);
if (!$spo_q_fir) {
  die("Query Failed . ".mysqli_error($connection));
}
while ($row_spo = mysqli_fetch_assoc($spo_q_fir)) {
  $position_value = $row_spo['position_value'];
  $postition_1 = $row_spo['joiner_p1'];
  $postition_2 = $row_spo['joiner_p2'];
  $postition_3 = $row_spo['joiner_p3'];
  $postition_4 = $row_spo['joiner_p4'];
}
//check the position here
if ($postition_1 === $payer_id || $postition_2 === $payer_id || $postition_3 ===$payer_id || $postition_4 === $payer_id ) {
  $user_added = "<h1 class='h1 text-center alert alert-primary'>User already added to sponsor ID ".$sponsor_id."</h1>";

}else {
  if ($position_value == '1') {
    $query_p = "UPDATE tbl_user SET ";
    $query_p .= "joiner_p1 = '{$payer_id}'  ";
    $query_p .= "WHERE user_generated_id = '{$sponsor_id}' ";
    $update_user_p_query = mysqli_query($connection, $query_p);
    if (!$update_user_p_query) {
      die("Query Failed. ".mysqli_error($connection));
    }else {
      $user_added = "<h1 class='h1 text-center alert alert-success'>User added successfully to the sponsor ID  ".$sponsor_id."</h1>";

    }
  }elseif ($position_value =='2') {
    $query_p = "UPDATE tbl_user SET ";
    $query_p .= "joiner_p2 = '{$payer_id}'  ";
    $query_p .= "WHERE user_generated_id = '{$sponsor_id}' ";
    $update_user_p_query = mysqli_query($connection, $query_p);
    if (!$update_user_p_query) {
      die("Query Failed. ".mysqli_error($connection));
    }else {
      $user_added = "<h1 class='h1 text-center alert alert-success'>User added successfully to the sponsor ID  ".$sponsor_id."</h1>";

    }
  }elseif ($position_value =='3') {
    $query_p = "UPDATE tbl_user SET ";
    $query_p .= "joiner_p3 = '{$payer_id}'  ";
    $query_p .= "WHERE user_generated_id = '{$sponsor_id}' ";
    $update_user_p_query = mysqli_query($connection, $query_p);
    if (!$update_user_p_query) {
      die("Query Failed. ".mysqli_error($connection));
    }else {
      $user_added = "<h1 class='h1 text-center alert alert-success'>User added successfully to the sponsor ID  ".$sponsor_id."</h1>";

    }
  }
  elseif ($position_value == '4') {
    $query_p = "UPDATE tbl_user SET ";
    $query_p .= "joiner_p4 = '{$payer_id}'  ";
    $query_p .= "WHERE user_generated_id = '{$sponsor_id}' ";
    $update_user_p_query = mysqli_query($connection, $query_p);
    if (!$update_user_p_query) {
      die("Query Failed. ".mysqli_error($connection));
    }else {
      $user_added = "<h1 class='h1 text-center alert alert-success'>User added successfully to the sponsor ID  ".$sponsor_id."</h1>";

    }
  }else {
    $user_added = "<h1 class='h1 text-center alert alert-danger'>User can't be added at ".$sponsor_id."</h1>";

  }

}

 ?>
