
  <!--Footer-->
  <footer class="page-footer text-center font-small primary-color-dark darken-2 mt-4 wow fadeIn">
    <hr class="my-4">
    <!-- Social icons -->
    <div class="pb-4">
      <a href="#" target="_blank">
        <i class="fab fa-facebook-f mr-3"></i>
      </a>
d
      <a href="#" target="_blank">
        <i class="fab fa-twitter mr-3"></i>
      </a>

      <a href="#" target="_blank">
        <i class="fab fa-youtube mr-3"></i>
      </a>

      <a href="#" target="_blank">
        <i class="fab fa-google-plus mr-3"></i>
      </a>

    </div>
    <div class="footer-copyright py-3">
      © 2018 Copyright:
      <a href="help4fast4.com" target="_blank"> HelpFast4.com </a>
    </div>
  </footer>
  <script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
  <script type="text/javascript" src="js/popper.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
  <script type="text/javascript" src="js/mdb.min.js"></script>
  <script type="text/javascript">
    new WOW().init();
  </script>
  <script type="text/javascript">
    setInterval(function()
  {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.open("GET","include/timediff.php",false);
    xmlhttp.send(null);
    document.getElementById("response").innerHTML = xmlhttp.responseText;
  },1000);
  </script>
</body>

</html>
