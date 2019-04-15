<?php
        $query_l2 = "SELECT * FROM tbl_money_tran WHERE payer_id ='{$user_generated_id}'  and paid_amount ='200000' money_status_send = 1 and money_status_received =1";
        $query_fire_l2 = mysqli_query($connection,$query_l2);
        if (!$query_fire_l2) {
          die("Query Failed .".mysqli_error($connection));
        }
        $count  = mysqli_num_rows($query_fire_l2);
          if ($count == 1) {
             if ($sponsor_id) {
               ?>
                   <?php if(empty(payer_value_50000($user_generated_id))) {    ?>
             <div class="row wow fadeIn">
                     <?php sponsor_det($refer_id); ?>
               <div class="col-md-6 mb-4">
                 <div class="card">
                   <div class="card-body">
                   <h3>Upload the Payment Proof <?php echo $user_id_though_session; ?></h3>
                   <hr class="admin_pay">
                   <div class="row">
                     <div class="col-md-12  p-4">
                       <form method="post" enctype="multipart/form-data" action="">
                         <fieldset class="form-group">
                           <label for="exampleInputFile">File input</label>
                           <input type="file" class="form-control-file" name="upload" required>
                         </fieldset>
                         <button type="submit" class="btn btn-primary" name="upload_doc10">Submit</button>
                       </form>
                     </div>
                   </div>
                   </div>
                 </div>
               </div>
             </div>
             <?php
           }
             if (isset($_POST['upload_doc10'])) {
               $upload = $_FILES['upload']['name'];
                 $upload_temp = $_FILES['upload']['tmp_name'];
                 //move uploded file/////////uploaded
                 move_uploaded_file($upload_temp, "img/doc/$upload");
                 $desc_a = "{$user_generated_id} have paid {$refer_id} 50,000 thousand sponsor payment";

               $time_a= date("Y-m-d h:i:sa");
               $trans_a_query = "INSERT INTO tbl_money_tran (payer_id,  receiver_id, paid_amount, recieved_amount, tran_time, money_status_send, money_status_received, tran_type,proof_upload) VALUES ('{$user_generated_id}','{$refer_id}','50000','0','{$time_a}','1','0','{$desc_a}','{$upload}') ";
               $trans_query_a_fire = mysqli_query($connection, $trans_a_query);
               if (!$trans_query_a_fire) {
                 die("Query Failed .".mysqli_error($connection));
               }else {
                 echo "<p class='alert alert-success'>You have uploaded the document</p>";
               }
             }
           }
          }

   ?>
   <div class="card mb-4 wow fadeIn bg-primary text-white">
     <div class="card-body d-sm-flex justify-content-between">
    <h4 class="mb-2 mb-sm-0 pt-1">
      <span>यह समय आपकी आईडी को रिटायर करने का है.</span>
    </h4>
    <h2> New ID will be the master id. </h2>
    </div>
    </div>
