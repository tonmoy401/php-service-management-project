<?php
   session_start();
  require_once('../header.php');
  require_once('navbar.php');
  require_once('../db.php');
  if(!isset($_SESSION['user_status'])){
    header('location:../login.php');
  }

$login_email= $_SESSION['email']; 
$get_query = "SELECT first_name,last_name,phone,company,job,street,city,state,zip,country FROM users 
            WHERE email='$login_email'";
$db_result = mysqli_query($db_connect,$get_query);
$after_assoc = mysqli_fetch_assoc($db_result);           
?>

<section>
  <div class="container">
    <div class="row">
      <div class="col-lg-8 m-auto">
          <div class="card mt-4">
            <div class="card-header">
                    <h3 class="card-title bg-warning d-flex justify-content-between">Profile Information<a href="profile_edit.php" 
                    class="bg-info text-dark">Edit</a></h3>
            </div> 
                <div class="card-body">
                                                        <?php
                                                            if(isset($_SESSION['sub_success_msg'])){
                                                        ?>
                                                            <div class="alert alert-success" role="alert">
                                                            <?php
                                                               echo $_SESSION['sub_success_msg'];
                                                               unset($_SESSION['sub_success_msg']);
                                                            ?>
                                                            </div>
                                                        <?php 
                                                                }
                                                        ?>
                    <p><span class="text-primary me-2">Fast Name:</span><?=$after_assoc['first_name']?></p>
                    <p><span class="text-primary me-2">Last Name:</span><?=$after_assoc['last_name']?></p>
                    <p><span class="text-primary me-2">Phone:</span><?=$after_assoc['phone']?></p>
                    <p><span class="text-primary me-2">Company:</span><?=$after_assoc['company']?></p>
                    <p><span class="text-primary me-2">Job:</span><?=$after_assoc['job']?></p>
                    <p><span class="text-primary me-2">Street:</span><?=$after_assoc['street']?></p>
                    <p><span class="text-primary me-2">City:</span><?=$after_assoc['city']?></p>
                    <p><span class="text-primary me-2">State:</span><?=$after_assoc['state']?></p>
                    <p><span class="text-primary me-2">Zip:</span><?=$after_assoc['zip']?></p>
                    <p><span class="text-primary me-2">Country:</span><?=$after_assoc['country']?></p>                      
                </div>
        </div>
      </div>
    </div>
  </div>
</section>




<?php
  require_once('../footer.php');
?>