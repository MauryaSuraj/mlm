<?php include 'include/header.php'; ?>

<?php
                        if (isset($_GET['source'])) {
                            $source = $_GET['source'];
                        }else{
                            $source = '';
                        }
                        switch ($source) {
                           case 'profile':
                               include "include/profile.php";
                               break;
                               case 'money_trasaction':
                                   include "include/transaction.php";
                                   break;
                               case 'all_user':
                                   include "include/all_user_details.php";
                                   break;
                               case 'payment_perf':
                                   include "include/payment_perf.php";
                                   break;
                               case 'downline':
                                   include "include/dowline_member.php";
                                   break;
                                   case 'total':
                                       include "include/total_earning.php";
                                       break;
                               case 'update_setting':
                                   include "include/update_setting.php";
                                   break;
                            case 'change_password':
                                include "include/change_password.php";
                                break;
                            case 'generate_link':
                                include "include/generate_link.php";
                                break;
                            case 'recv_detail':
                                include "include/recv_detail.php";
                                break;
                            case 'sender_detail':
                                include "include/sender_detail.php";
                                break;
                                case 'payment_con':
                                    include "include/payment_con.php";
                                    break;
                                case 'upload':
                                    include "include/upload.php";
                                    break;
                            default:
                                include 'include/main.php';
                        }
                        ?>


<?php include 'include/footer.php'; ?>
