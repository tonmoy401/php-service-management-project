<?php
   session_start();
  require_once('../header.php');
  require_once('navbar.php');
  require_once('../db.php');
  if(!isset($_SESSION['user_status'])){
    header('location:../login.php');
  }
?>

<section>
  <div class="container">
    <div class="row">
      <div class="col-lg-5 m-auto">
          <div class="card mt-4">
            <div class="card-header">
                    <h3 class="card-title d-flex justify-content-between">Password Change Form</h3>
            </div> 
                <div class="card-body">
                                                        <?php
                                                            if(isset($_SESSION['pass_chang_err_msg'])){
                                                        ?>
                                                            <div class="alert alert-danger" role="alert">
                                                            <?php
                                                               echo $_SESSION['pass_chang_err_msg'];
                                                               unset($_SESSION['pass_chang_err_msg']);
                                                            ?>
                                                            </div>
                                                            <?php 
                                                                }
                                                         ?>

                                                          <?php
                                                            if(isset($_SESSION['pass_chang_success_msg'])){
                                                        ?>
                                                            <div class="alert alert-success" role="alert">
                                                            <?php
                                                               echo $_SESSION['pass_chang_success_msg'];
                                                               unset($_SESSION['pass_chang_success_msg']);
                                                            ?>
                                                            </div>
                                                            <?php 
                                                                }
                                                         ?>
                    <form action="change_pass_post.php" method="post">
                                <label for="exampleInputText1" class="form-label">Old Password</label>
                                <input type="password"  name="old_pass" class="form-control">
                            
                            
                                <label for="exampleInputText1" class="form-label">New Password</label>
                                <input type="password"  name="new_pass" class="form-control">
                            
                            
                                <label for="exampleInputText1" class="form-label">Confirm Password</label>
                                <input type="password"  name="confirm_pass" class="form-control">
                                <br>
                                <button type="submit" class="btn btn-warning align-center">Change password</button>
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