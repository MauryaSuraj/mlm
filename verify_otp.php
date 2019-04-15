<?php include 'include/header.php'; ?>
<?php include 'include/navigation.php'; ?>
<header>
<?php
$msg = '';
if (isset($_SESSION['data_sent'])) {
  $msg = $_SESSION['data_sent'];
  if ($msg !=='1') {
    header("Location: register.php");
  }
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
                                <strong>Please Check You Email Id We have sent you OTP!</strong>
                              </h5>
                              <div class="card-body px-lg-5 pt-0">
                                <form class="text-center" style="color: #757575;" method="post" action="include/verify.php">
                                  <div class="md-form">
                                    <input type="text" id="mal" class="form-control" name="user_otp" autocomplete="none" required>
                                    <label for="username">Enter OTP</label>
                                  </div>
                                  <button class="btn btn-outline-info btn-rounded btn-block my-4 waves-effect z-depth-2" type="submit" name="submit">Verify</button>
                                  <?php echo $msg; ?>
                                </form>
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

<?php include 'include/footer.php'; ?>
