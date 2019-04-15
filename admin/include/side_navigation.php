<!-- Sidebar -->
<div class="sidebar-fixed position-fixed">
  <a class="logo-wrapper waves-effect">
    <img src="../img/logo.png" class="img-fluid" alt="">
  </a>
  <?php
  $active1=''; $active2=''; $active3=''; $active4=''; $active5=''; $active6='';$active7=''; $active8='';
                          if (isset($_GET['source'])) {
                              $source = $_GET['source'];
                          }else{
                              $source = '';
                          }
                          switch ($source) {
                              case 'trasn_history':
                                   $active1=''; $active2=''; $active3=''; $active4=''; $active5=''; $active6=''; $active7=''; $active='active';
                                break;
                            case 'total':
                                   $active1=''; $active2=''; $active3=''; $active4=''; $active5=''; $active6=''; $active7='active';
                                break;
                             case 'profile':
                                    $active1='active'; $active2=''; $active3=''; $active4=''; $active5=''; $active6='';$active7='';
                                 break;
                              case 'change_password':
                                  $active1=''; $active2='active'; $active3=''; $active4=''; $active5=''; $active6='';$active7='';
                                  break;
                              case 'generate_link':
                                  $active1=''; $active2=''; $active3='active'; $active4=''; $active5=''; $active6='';$active7='';
                                  break;
                              case 'recv_detail':
                                  $active1=''; $active2=''; $active3=''; $active4='active'; $active5=''; $active6='';$active7='';
                                  break;
                              case 'sender_detail':
                                  $active1=''; $active2=''; $active3=''; $active4=''; $active5='active'; $active6='';$active7='';
                                  break;
                              default:
                                  $active1=''; $active2=''; $active3=''; $active4=''; $active5=''; $active6='active';$active7='';
                          }
                          ?>

  <div class="list-group list-group-flush">
    <a href="index.php?source=main" class="list-group-item <?php echo $active6; ?> list-group-item-action waves-effect"> <i class="fas fa-chart-pie mr-3"></i>Dashboard </a>
    <a href="index.php?source=profile" class="list-group-item <?php echo $active1; ?> list-group-item-action waves-effect"> <i class="fas fa-user mr-3"></i>My Profile</a>
    <a href="index.php?source=total" class="list-group-item <?php echo $active7; ?> list-group-item-action waves-effect"> <i class="fas fa-chart-pie mr-3"></i>Total Earning </a>
    <a href="index.php?source=change_password" class="list-group-item <?php echo $active2; ?> list-group-item-action waves-effect"> <i class="fas fa-key mr-3"></i>Change Password</a>
    <a href="index.php?source=generate_link" class="list-group-item <?php echo $active3; ?> list-group-item-action waves-effect"><i class="fas fa-link mr-3"></i>Generate Link</a>
    <a href="index.php?source=recv_detail" class="list-group-item <?php echo $active4; ?> list-group-item-action waves-effect"><i class="fas fa-money-bill-alt mr-3"></i>Receiver Details</a>
    <a href="index.php?source=sender_detail" class="list-group-item <?php echo $active5; ?> list-group-item-action waves-effect"><i class="far fa-eye mr-3"></i>Sender Details</a>
    <?php
    if (!empty(is_master_check($user_id_though_session))) {
  ?>
   <a href='index.php?source=all_user' class='list-group-item list-group-item-action waves-effect'><i class='far fa-eye mr-3'></i>All User Details</a>
   <a href="index.php?source=money_trasaction" class="list-group-item list-group-item-action waves-effect"><i class="fas fa-money-bill-alt mr-3"></i>All Money transaction</a>
   <?php
}
     ?>
    <a href="include/logout.php" class="list-group-item list-group-item-action  waves-effect"><i class="fas fa-sign-out-alt mr-3"></i> Logout</a>
  </div>
</div>
<!-- Sidebar -->
