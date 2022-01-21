<?php
session_start();
    require_once('../header.php');
    require_once('navbar.php');
    require_once('../db.php');
    if(!isset($_SESSION['user_status'])){
      header('location:../login.php');
    }


$get_query = "SELECT * FROM guest_massage";
$from_db = mysqli_query($db_connect,$get_query);
?>

<section>
  <div class="container">
    <div class="row">
      <div class="col-lg-12 m-auto">
          <div class="card mt-4">
            <div class="card-header">
                    <h1 class="card-title">Guest Massages</h1>
            </div>
                                  
               <table class="table table-striped table-hover">
                   <thead>
                      <tr>
                        <th scope="col">guest name</th>
                        <th scope="col">guest email</th>
                        <th scope="col">guest phone</th>
                        <th scope="col">guest text</th>
                        <th scope="col">action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                        foreach($from_db AS $massages){                      
                      ?>
                          <tr class="<?php
                               if($massages['read_status']== 2){
                                   echo "bg-primary";
                               }else{
                                echo "text-dark";
                               }
                          ?>
                          ">
                            <td><?=$massages['guest_name']?></td>
                            <td><?=$massages['guest_email']?></td>
                            <td><?=$massages['guest_phone']?></td>
                            <td><?=$massages['guest_text']?></td>
                            <td>
                                <?php
                                   if($massages['read_status']== 2):
                                ?>
                                    <a href="massage_status.php?massage_id=<?=$massages['id']?>" class="btn btn-sm btn-warning">mark as read</a>
                                  <?php
                                   else:
                                  ?>
                                    <a href="massage_delete.php?massage_id=<?=$massages['id']?>" class="btn btn-sm btn-danger">delete</a>
                                <?php
                                  endif
                                ?>
                            </td>
                          </tr>
                      <?php
                        }                      
                      ?>
                    <tbody>
               </table>      
          <div class="card-body">                
          </div>

        </div>
      </div>
    </div>
  </div>
</section>





<?php

require_once('../footer.php');

?>
