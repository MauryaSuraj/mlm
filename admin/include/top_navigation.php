
<nav class="navbar fixed-top navbar-expand-lg navbar-light white scrolling-navbar">
  <div class="container-fluid">
    <!-- Brand -->
    <a class="navbar-brand waves-effect" href="index.php">
      <strong class="blue-text"><?php get_application_name(); ?></strong>
    </a>


    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>


    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <!-- Left -->
      <ul class="navbar-nav mr-auto">
        <li class="nav-item">
          <a class="nav-link waves-effect" href="index.php?source=total">Total Earning</a>
        </li>
        <li class="nav-item">
          <a class="nav-link waves-effect" href="index.php?source=downline">Downline Member</a>
        </li>
        <li class="nav-item">
          <a class="nav-link d-lg-none d-md-none waves-effect" href="index.php?source=profile">Profile</a>
        </li>
        <li class="nav-item">
          <a class="nav-link d-lg-none d-md-none waves-effect" href="index.php?source=update_setting">Update Setting</a>
        </li>
        <li class="nav-item">
          <a class="nav-link d-lg-none d-md-none waves-effect" href="include/logout.php">Logout</a>
        </li>

          <li class="nav-item ">
        <a href="index.php?source=main" class="nav-link waves-effect d-lg-none d-md-none waves-light"> <i class="fas fa-chart-pie mr-3"></i>Dashboard </a>
      </li>
         <li class="nav-item ">
        <a href="index.php?source=sender_detail" class="nav-link waves-effect d-lg-none d-md-none waves-light"><i class="far fa-eye mr-3"></i>Sender Details</a>
      </li>
    <li class="nav-item ">
        <a href="index.php?source=recv_detail" class="nav-link waves-effect d-lg-none d-md-none waves-light"><i class="fas fa-money-bill-alt mr-3"></i>Receiver Details</a>
      </li>
      <li class="nav-item ">
        <a href="index.php?source=generate_link" class="nav-link waves-effect d-lg-none d-md-none waves-light"><i class="fas fa-link mr-3"></i>Generate Link</a>
      </li>
      <li class="nav-item ">
        <a href="index.php?source=change_password" class="nav-link waves-effect d-lg-none d-md-none waves-light"> <i class="fas fa-key mr-3"></i>Change Password</a>
      </li>
      </ul>
      <!-- Right -->
      <ul class="navbar-nav ml-auto nav-flex-icons">
      <li class="nav-item">
        <a class="nav-link waves-effect waves-light">
          <i class="fab fa-google-plus-g"></i>
        </a>
      </li>

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-333" data-toggle="dropdown" aria-haspopup="true"
          aria-expanded="false">
         <img src="<?php user_profile_image($user_id_though_session); ?>" class="rounded-circle z-depth-0" alt="avatar image" height="35">
        </a>
        <div class="dropdown-menu dropdown-menu-right dropdown-default " aria-labelledby="navbarDropdownMenuLink-333">
          <a class="dropdown-item d-none d-lg-block d-xl-block" href="index.php?source=profile">Profile</a>
          <a class="dropdown-item d-none d-lg-block d-xl-block" href="index.php?source=update_setting">Update Setting</a>
          <a class="dropdown-item d-none d-lg-block d-xl-block" href="include/logout.php">Logout</a>
        </div>
      </li>

    </ul>
    </div>

  </div>
</nav>
