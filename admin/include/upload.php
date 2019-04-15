<?php
$mag ='';
if (isset($_GET['type'])) {
  $type = $_GET['type'];
  if ($type == 'sponsor') {
    // sponsor
    if (isset($_GET['sponsor_id'])) {
      $sponsor_id = $_GET['sponsor_id'];
    }
  }elseif ($type == 'referal') {
    // refral   ------get refral id here
    if (isset($_GET['refer_id'])) {
      $refral_id = $_GET['refer_id'];
    }
  }
  else {
    header("Location: index.php");
  }
}
else {
  header("Location: index.php");
}
if (isset($_SESSION['user_id'])) {
  $user_id_though_session =  $_SESSION['user_id'];
}

if (isset($_POST['submit'])) {
    $check_user = "SELECT * FROM tbl_payment WHERE user_id = '{$user_id_though_session}'";
    $check_fire = mysqli_query($connection,$check_user);
    $count = mysqli_num_rows($check_fire);
    if ($count > 0) {
      while ($row = mysqli_fetch_assoc($check_fire)) {
        $payment_status  = $row['payment_status'];
        $sponsor_payment_status = $row['sponsor_payment_status'];
        $referal_payment_status = $row['referal_payment_status'];
      }
      if ($payment_status !== 'paid') {
        if($sponsor_payment_status=='1' && $referal_payment_status =='1'){
          // $query_up = "UPDATE tbl_payment SET ";
          // $query_up .= "payment_status = 'paid'  ";
          // $query_up .= "WHERE user_id = '{$user_id_though_session}' ";
          // $update_user_query = mysqli_query($connection, $query_up);
          // if (!$update_user_query) {
          //   die("Query Failed. ".mysqli_error($connection));
          // }else {
          //   $mag = "<p class='alert alert-danger animated fadeOut delay-5s'>You have already uploaded file please call you sponsor to confirm the payment.</p>";
          // }
        }
        elseif ($sponsor_payment_status=='1' && $referal_payment_status =='0') {
          //refral amount here
          $upload = $_FILES['upload']['name'];
          $upload_temp = $_FILES['upload']['tmp_name'];
          //move uploded file
          move_uploaded_file($upload_temp, "img/$upload");
          $query_up = "UPDATE tbl_payment SET ";
          $query_up .= "refer_id = '{$refral_id}', ";
          $query_up .= "refreral_payment = '500', ";
          $query_up .= "payment_status = 'paid',  ";
          $query_up .= "referal_payment_status = '1', ";
          $query_up .= "refreral_document = '{$upload}'  ";
          $query_up .= "WHERE user_id = '{$user_id_though_session}' ";
          $update_user_query = mysqli_query($connection, $query_up);
          if (!$update_user_query) {
            die("Query Failed. ".mysqli_error($connection));
          }
          else {
            $mag = "<p class='alert alert-danger animated fadeOut delay-5s'>You have paid refal amount now call the user to confirm that.</p>";
          }
        }
        elseif ($sponsor_payment_status=='0' && $referal_payment_status =='1') {
          $upload = $_FILES['upload']['name'];
          $upload_temp = $_FILES['upload']['tmp_name'];
          //move uploded file
          move_uploaded_file($upload_temp, "img/$upload");
          $query_up = "UPDATE tbl_payment SET ";
          $query_up .= "sponsor_id = '{$sponsor_id}', ";
          $query_up .= "sponsor_payment = '2000', ";
          $query_up .= "payment_status = 'paid',  ";
          $query_up .= "sponsor_payment_status = '1', ";
          $query_up .= "payment_document = '{$upload}'  ";
          $query_up .= "WHERE user_id = '{$user_id_though_session}' ";
          $update_user_query = mysqli_query($connection, $query_up);
          if (!$update_user_query) {
            die("Query Failed. ".mysqli_error($connection));
          }
          else{
              $mag = "<p class='alert alert-danger animated fadeOut delay-5s'>You have paid sponsor amount now call the user to confirm that.</p>";
          }
        }
        }
      }
      else {
        //check for the type of the payment
        if ($type == 'sponsor') {
          $upload = $_FILES['upload']['name'];
          $upload_temp = $_FILES['upload']['tmp_name'];
          //move uploded file
          move_uploaded_file($upload_temp, "img/$upload");
          $query = "INSERT INTO tbl_payment (user_id, payment_status, payment_document,  sponsor_id, refer_id, sponsor_payment, refreral_payment, refreral_document, sponsor_payment_status, referal_payment_status) VALUES ('{$user_id_though_session}','unpaid','{$upload}','{$sponsor_id}','0','2000','0','0','1','0')";
          $upload_query = mysqli_query($connection, $query);
          if (!$upload_query) {
            die("Query Failed . ".mysqli_error($connection));
          }
          else {
            $mag = "<p class='alert alert-success animated fadeOut delay-2s'>You have paid for the sponsor now pay for the refral as well to join and then call user</p>";
          }
        }elseif ($type == 'referal') {
          $upload = $_FILES['upload']['name'];
          $upload_temp = $_FILES['upload']['tmp_name'];
          //move uploded file
          move_uploaded_file($upload_temp, "img/$upload");
          $query = "INSERT INTO tbl_payment (user_id, payment_status, payment_document,  sponsor_id, refer_id, sponsor_payment, refreral_payment, refreral_document, sponsor_payment_status, referal_payment_status) VALUES ('{$user_id_though_session}','unpaid','0','0','{$refral_id}','0','500','{$upload}','0','1')";
          $upload_query = mysqli_query($connection, $query);
          if (!$upload_query) {
            die("Query Failed . ".mysqli_error($connection));
          }
          else {
            $mag = "<p class='alert alert-success animated fadeOut delay-2s'>You have paid for the referal now pay for the sponsor as well to join and then call user </p>";
          }
        }
      }
    }
 ?>
<main class="pt-5 mx-lg-5">
  <div class="container-fluid mt-5">
    <!-- Heading -->
    <div class="card mb-4 wow fadeIn">
      <!--Card content-->
      <div class="card-body d-sm-flex justify-content-between">
        <h4 class="mb-2 mb-sm-0 pt-1">
          <a href="#">Home Page </a>
          <span>/</span>
          <span>Dashboard</span>
        </h4>
        <form class="d-flex justify-content-center" method="post" enctype="multipart/form-data" action="include/upload.php">
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
          <h3>Upload the Payment Proof <?php echo $user_id_though_session; ?></h3>
          <hr class="admin_pay">
          <div class="row">
            <div class="col-md-6  p-4">
              <form method="post" enctype="multipart/form-data" action="">
                <fieldset class="form-group">
                  <label for="exampleInputFile">File input</label>
                  <input type="file" class="form-control-file" name="upload" required>
                </fieldset>
                <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                <?php echo $mag; ?>
              </form>
            </div>
          </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>
