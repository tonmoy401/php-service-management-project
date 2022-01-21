<?php
   session_start();
  require_once('../header.php');
  require_once('navbar.php');
  require_once('../db.php');
  if(!isset($_SESSION['user_status'])){
    header('location:../login.php');
  }

$login_email= $_SESSION['email']; 
$get_query = "SELECT first_name,last_name,email,phone,company,job,street,city,state,zip,country FROM users 
            WHERE email='$login_email'";
$db_result = mysqli_query($db_connect,$get_query);
$after_assoc = mysqli_fetch_assoc($db_result);         
?>

<section>
  <div class="container">
    <div class="row">
      <div class="col-lg-8 m-auto">
          <div class="card mt-4">
            <div class="card-header bg-warning">
                    <h3 class="card-title bg-warning d-flex justify-content-between">Edit Information</h3>
            </div> 
                <div class="card-body">
                                                        <?php
                                                            if(isset($_SESSION['sub_err_msg'])){
                                                        ?>
                                                            <div class="alert alert-danger" role="alert">
                                                            <?php
                                                               echo $_SESSION['sub_err_msg'];
                                                               unset($_SESSION['sub_err_msg']);
                                                            ?>
                                                            </div>
                                                            <?php 
                                                                }
                                                         ?>
                    
                <form action="profile_edit_post.php" method="post">
                    
                        <div class="row">
                            <div class="col-sm-12 col-md-6">
                                <label for="exampleInputText1" class="form-label">first_name</label>
                                <input type="text"  name="first_name" class="form-control" value="<?=$after_assoc['first_name']?>">
                            </div>

                            <div class="col-sm-12 col-md-6">
                                <label for="exampleInputText11" class="form-label">last_name</label>
                                <input type="text"  name="last_name" class="form-control" value="<?=$after_assoc['last_name']?>">
                            </div>
                        </div>
                            <br>
                            
                                <label for="exampleInputText1" class="form-label">Phone</label>
                                <input type="hidden"  name="email" class="form-control" value="<?=$after_assoc['email']?>">
                                <input type="number"  name="phone" class="form-control" value="<?=$after_assoc['phone']?>">
                                
                                <br>
                                            <div class="row">
                                                <div class="col-sm-12 col-md-6">
                                                    <label for="exampleInputText1" class="form-label">Company Name</label>
                                                    <input type="text"  name="company" class="form-control" value="<?=$after_assoc['company']?>">
                                                </div>

                                                <div class="col-sm-12 col-md-6">
                                                    <label for="exampleInputText11" class="form-label">Job Title</label>
                                                    <input type="text"  name="job" class="form-control" value="<?=$after_assoc['job']?>">
                                                </div>
                                            </div>
                                            <br>

                                            <label for="exampleInputEmail1" class="form-label">Street 1</label>
                                            <input type="text" name="street" class="form-control" value="<?=$after_assoc['street']?>">

                                            <br>
                                            <div class="row">   
                                                <div class="col-sm-12 col-md-6">
                                                    <label for="exampleInputText1" class="form-label">City</label>
                                                    <input type="text"  name="city" class="form-control" value="<?=$after_assoc['city']?>">
                                                </div>

                                                <div class="col-sm-12 col-md-6">
                                                    <label for="exampleInputText11" class="form-label">State</label>
                                                    <input type="text"  name="state" class="form-control" value="<?=$after_assoc['state']?>">
                                                </div>
                                            </div>

                                            <br>
                                            <div class="row">   
                                                <div class="col-sm-12 col-md-6">
                                                    <label for="exampleInputText1" class="form-label">ZIP/Postal Code</label>
                                                    <input type="number"  name="zip" class="form-control" value="<?=$after_assoc['zip']?>">
                                                </div>

                                                <div class="col-sm-12 col-md-6">
                                                    <label for="exampleInputText11" class="form-label">Country/Region</label>
                                                    <input type="text"  name="country" class="form-control" value="<?=$after_assoc['country']?>">
                                                </div>
                                            </div>
                                            <br>
                                            <button type="submit" class="btn btn-success align-center">Update</button>
                </form>                        







                

                </div>
        </div>
      </div>
    </div>
  </div>
</section>




<?php
  require_once('../footer.php');
?>