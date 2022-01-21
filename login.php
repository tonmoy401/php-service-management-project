<?php
session_start();
require_once('header.php');
if(isset($_SESSION['user_status'])){
    header('location:admin/dashboard.php');
  }
?>

<form action="login_post.php" method="POST">
    <div class="container mt-5" style="width: 600px">
        <div class="card" >
        <h2 class="card-header text-left d-flex justify-content-between bg-warning">
            &nbsp;&nbsp;LOGIN<a href="form.php" class="text-dark">Register</a></h2>
            <div class="card-body">
                <?php
                 if(isset($_SESSION['error_msg'])){
                ?>
                  <div class="alert alert-danger" role="alert">
                    <?php
                    echo $_SESSION['error_msg'];
                    unset($_SESSION['error_msg']);
                    ?>
                 </div>
                <?php
                 }
                ?>
                    <div>
                        <label for="exampleInputText1" class="form-label">Email</label>
                        <input type="text"  name="email" class="form-control" >
                    </div>

                    <div >
                        <label for="exampleInputText11" class="form-label">Password</label>
                        <input type="password"  name="password" class="form-control">
                    </div>
                        <br>
                    <button type="submit" class="btn btn-success align-center">Login</button>


            </div>
        <div>
    <div>
</form>            




<?php

require_once('footer.php');

?>
