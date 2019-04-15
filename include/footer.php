<footer class="page-footer font-small indigo">
    <div class="container">
      <div class="row text-center d-flex justify-content-center pt-5 mb-3">
        <div class="col-md-2 mb-3">
          <h6 class="text-uppercase font-weight-bold">
            <a href="about.php">About us</a>
          </h6>
        </div>
        <div class="col-md-2 mb-3">
          <h6 class="text-uppercase font-weight-bold">
            <a href="plan.php">Business Plan</a>
          </h6>
        </div>
        <div class="col-md-2 mb-3">
          <h6 class="text-uppercase font-weight-bold">
            <a href="contact.php">Contact US</a>
          </h6>
        </div>
        <div class="col-md-2 mb-3">
          <h6 class="text-uppercase font-weight-bold">
            <a href="join.php">Join Us</a>
          </h6>
        </div>
        <div class="col-md-2 mb-3">
          <h6 class="text-uppercase font-weight-bold">
            <a href="login.php">Login</a>
          </h6>
        </div>
      </div>
      <hr class="rgba-white-light" style="margin: 0 15%;">
      <div class="row d-flex text-center justify-content-center mb-md-0 mb-4">
        <div class="col-md-8 col-12 mt-5">
          <!--<p style="line-height: 1.7rem">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>-->
        </div>
      </div>
      <hr class="clearfix d-md-none rgba-white-light" style="margin: 10% 15% 5%;">
      <div class="row pb-3">
        <div class="col-md-12">
          <div class="mb-5 flex-center">
            <a class="fb-ic">
              <i class="fab fa-facebook-f fa-lg white-text mr-4"> </i>
            </a>
            <a class="tw-ic">
              <i class="fab fa-twitter fa-lg white-text mr-4"> </i>
            </a>
            <a class="gplus-ic">
              <i class="fab fa-google-plus-g fa-lg white-text mr-4"> </i>
            </a>
            <a class="li-ic">
              <i class="fab fa-linkedin-in fa-lg white-text mr-4"> </i>
            </a>
            <a class="ins-ic">
              <i class="fab fa-instagram fa-lg white-text mr-4"> </i>
            </a>
          </div>
        </div>
      </div>
    </div>
    <div class="footer-copyright text-center py-3">© 2018 Copyright:
      <a href="helpfast4.com"> HELPFAST4</a>
    </div>
  </footer>
<script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
<script type="text/javascript" src="js/popper.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/mdb.min.js"></script>
<script type="text/javascript">
// $(document).ready(function(){
  $('#sponsorid').on('change',function(){
    var id = $('#sponsorid').val();
    if (id !='') {
      $.ajax({
        url:'fetch_sponsor_details.php',
        type:"POST",
        dataType:'JSON',
        data:{'id':id},
        success:function(data){
          $('#sponsorname').val(data.fullname);
          $('#hidden_id').val(data.user_id);
          if(data.fullname == 0){
              $('#spoerror').removeClass("d-none");
              $('#sbmbtn').addClass("d-none");
          }else{
              
              $('#sbmbtn').removeClass("d-none");
          }
        }
      });
    }
    else {
      alert("Please Enter Proper sponsor id");
    }
  });

// });
</script>
<script type="text/javascript">
  jquery.ajax({
    type:"POST",
    url:'include/function.php',
    dataType:'json',
    data:{functionname: 'search_sapce',arguments:[0]},
    success:function(obj,textstatus){
      if (!('error' in obj)) {
        $res = obj.result;
        console.log($res);
      }
      else {
        console.log(obj.error);
        
      }
    }
  });
</script>
</body>

</html>
