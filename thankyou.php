<?php include 'include/header.php'; ?>
<?php include 'include/navigation.php'; ?>
<header>
<?php
$get_pass='';
$msg = '';
if (isset($_SESSION['msg2'])) {
  $msg = $_SESSION['msg2'];
}
  if (isset($_GET['check_mail'])) {
  $get_pass =  $_GET['check_mail'];

  }
  else {
    header('Location: register.php');
  }

  $query = "SELECT * FROM tbl_user WHERE user_mail = '{$get_pass}'";
  $query_pass = mysqli_query($connection,$query);
  if (!$query_pass) {
    die("Query Failed . ".mysqli_error($connection));
  }
  while ($row = mysqli_fetch_assoc($query_pass)) {
    $user_id = $row['user_generated_id'];
    $user_pass = $row['user_password'];
    $user_first_name = $row['user_first_name'];
    $user_last_name = $row['user_last_name'];
  }
  ?>
     <div id="home" class="view jarallax" data-jarallax='{"speed": 0.2}' max-height="700px" style="background-image: linear-gradient(to left,  #f5af19e6, #f12711), url('img/lgnbg.jpeg'); background-repeat: no-repeat; background-size: cover; background-position: center center;">
         <div class="mask  rgba-black-slight">
             <div class="container h-100 d-flex justify-content-center align-items-center">
                 <div class="row smooth-scroll">
                     <div class="col-md-12 text-center white-text">
                         <div class="wow fadeInDown" data-wow-delay="0.2s">
                            <div class="card">
                              <h5 class="card-header info-color white-text text-center py-4">
                                <strong>Here Your login details</strong>
                              </h5>
                              <p class="text-dark alert alert-danger">
                                put it to safe place, this is token to login in to the system
                              </p>
                              <div class="card-body px-lg-5 pt-0 py-5 text-dark">
                                <div class="row">
                                  <div class="col-md-12">
                                    <p>User Name : <strong><?php echo $user_first_name." ".$user_last_name; ?></strong></p>
                                  </div>
                                  <div class="col-md-12 ">
                                    <p>user Id : <strong><?php echo $user_id; ?></strong></p>
                                  </div>
                                  <div class="col-md-12">
                                    <p>user password : <strong><?php echo $user_pass; ?></strong></p>
                                  </div>
                                  <a href="login.php" class="btn btn-primary">LogIn To the system</a>
                                </div>
                              </div>
                            </div>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>

 </header>
 <!--/Navigation & Intro-->

<?php include 'include/footer.php';   ?>
