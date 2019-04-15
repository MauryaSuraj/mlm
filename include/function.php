<?php include 'db.php'; ?>
<?php

function get_title(){
  echo "HelpFast4";
}

function last_inserted_id(){
  global $connection;
  $query = "SELECT * FROM tbl_user";
  $fire = mysqli_query($connection,$query);
  if (!$fire) {
    die("Query Failed .".mysqli_error($connection));
  }
  while ($row = mysqli_fetch_assoc($fire)) {
    $user_id = $row['user_id'];
  }
  return $user_id;
}
function search_sapce($id){
  global $connection;
  $last = last_inserted_id();
  //loop til last for searching
  if ($last >= $id) {
      $query = "SELECT * FROM tbl_user WHERE user_id = '{$id}'";
      $query_fire = mysqli_query($connection,$query);
      if (!$query_fire) {
        die("Query Failed .".mysqli_error($connection));
      }
      //count if count having value then do nothing else increase the value by one
      $count = mysqli_num_rows($query_fire);
      if ($count !== 0) {
        //having row with this id
        while ($row = mysqli_fetch_assoc($query_fire)) {
        $data[]   = $row['user_generated_id'];
        $data[]   = $row['joiner_p1'];
        $data[]   = $row['joiner_p2'];
        $data[]   = $row['joiner_p3'];
        $data[]   = $row['joiner_p4'];
          // echo json_encode($row);
          return $data;
        }
      }
  }
}

function check($num){
  $result = search_sapce($num);
  $user_id = $result['0'];
  $joiner_p1 = $result['1'];
  $joiner_p2 = $result['2'];
  $joiner_p3 = $result['3'];
  $joiner_p4 = $result['4'];

  if ($joiner_p1 === '0') {
    // echo "joiner one is empty <br> ";
    $data = ['h_id' => $user_id,
    'position' =>1
  ];
    return $data;
  }elseif ($joiner_p2 === '0') {
    // echo "joiner two is empty <br>";
    $data = array('h_id' => $user_id,'position'=>2 );
    return $data;
  }elseif ($joiner_p3 === '0') {
    // echo "joiner three is empty <br>";
  $data = array('h_id' => $user_id,'position'=>3 );
    return $data;
  }elseif ($joiner_p4 === '0') {
    // echo "joiner four is empty <br>";
    $data = array('h_id' => $user_id,'position'=>4 );
    return $data;
  }else {
   return 0;
  }
}

function increase_count($num){
$result = check($num);
if ($result =='0') {
  ++$num;
  return increase_count($num);
}else {
  return $result;
}
}

function inserted_number_id(){
  global $connection;
  $query = "SELECT * FROM tbl_user";
  $fire = mysqli_query($connection,$query);
  if (!$fire) {
    die("Query Failed .".mysqli_error($connection));
  }
  while ($row = mysqli_fetch_assoc($fire)) {
    $user_id = $row['user_id'];
  }
  return $user_id +1;
}
function is_user_true($id){
    global $connection;
    $query = "SELECT * FROM tbl_user WHERE user_generated_id = '$id' and user_paid = '1' and user_active = '1'";
    $query_fire = mysqli_query($connection, $query);
    $count = mysqli_num_rows($query_fire);
    return $count;
}

 ?>
