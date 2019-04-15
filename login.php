<?php include 'include/header.php'; ?>
<?php include 'include/navigation.php'; ?>
<header>
<?php
$msg = '';
if (isset($_SESSION['msg2'])) {
  $msg = $_SESSION['msg2'];
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
                                <strong>Sign in</strong>
                              </h5>
                              <div class="card-body px-lg-5 pt-0">
                                <form class="text-center" style="color: #757575;" method="post" action="include/login.php">
                                  <p class="alert alert-danger my-3 animated fadeOut delay-2s"><?php echo $msg; ?></p>
                                  <div class="md-form">
                                    <input type="text" id="mal" class="form-control" name="user_name" autocomplete="none" required>
                                    <label for="materialLoginFormEmail">User ID</label>
                                  </div>
                                  <div class="md-form">
                                    <input type="password" id="password" class="form-control" name="password" autocomplete="none" required>
                                    <label for="materialLoginFormPassword">Password</label>
                                  </div>
                                  <div class="d-flex justify-content-around">
                                    <div>
                                      <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="remember">
                                        <label class="form-check-label" for="materialLoginFormRemember">Remember me  </label>
                                      </div>
                                    </div>
                                    <div>
                                      <a href="#">Forgot password?</a>
                                    </div>
                                  </div>
                                  <button class="btn btn-outline-info btn-rounded btn-block my-4 waves-effect z-depth-2" type="submit" name="submit">Sign in</button>
                                  <p>Not a member?  <a href="join.php">Register</a> </p>
                                  <p>or sign in with:</p>
                                  <a type="button" class="btn-floating btn-fb btn-sm">
                                    <i class="fab fa-facebook-f"></i>
                                  </a>
                                  <a type="button" class="btn-floating btn-tw btn-sm">
                                    <i class="fab fa-twitter"></i>
                                  </a>
                                  <a type="button" class="btn-floating btn-li btn-sm">
                                    <i class="fab fa-linkedin-in"></i>
                                  </a>
                                  <a type="button" class="btn-floating btn-git btn-sm">
                                    <i class="fab fa-github"></i>
                                  </a>
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
