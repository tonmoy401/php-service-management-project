<?php
session_start();
require_once('header.php');
if(isset($_SESSION['user_status'])){
    header('location:admin/dashboard.php');
  }
?>
     
     <form action="form-submit1.php" method="POST">
    <div class="container" style="width: 700px">
        <div class="card" >
        <h2 class="card-header text-left bg-info d-flex justify-content-between">
            &nbsp;&nbsp;Registration <a href="login.php" class="text-dark">LOGIN</a></h2>
            <div class="card-body">
                                                        <?php
                                                              if(isset($_SESSION['error_massage'])){
                                                            ?>
                                                        <div class="alert alert-danger" role="alert">
                                                            <?php
                                                               echo $_SESSION['error_massage'];
                                                               unset($_SESSION['error_massage']);
                                                            ?>
                                                            </div>
                                                            <?php 
                                                            }
                                                            ?>
                                                            <?php
                                                            if(isset($_SESSION['success_massage'])){
                                                            ?>
                                                            <div class="alert alert-success" role="alert">
                                                            <?php
                                                              echo $_SESSION['success_massage'];
                                                               unset($_SESSION['success_massage']);
                                                            ?>
                                                            </div>
                                                            <?php 
                                                                }
                                                         ?>
                                                          <?php
                                                            if(isset($_SESSION['already_registered_massage'])){
                                                            ?>
                                                            <div class="alert alert-danger" role="alert">
                                                            <?php
                                                              echo $_SESSION['already_registered_massage'];
                                                               unset($_SESSION['already_registered_massage']);
                                                            ?>
                                                            </div>
                                                            <?php 
                                                                }
                                                         ?>
                <div class="row">
                    <div class="col-sm-12 col-md-6">
                        <label for="exampleInputText1" class="form-label">first_name</label>
                        <input type="text"  name="first_name" class="form-control" required>
                    </div>

                    <div class="col-sm-12 col-md-6">
                        <label for="exampleInputText11" class="form-label">last_name</label>
                        <input type="text"  name="last_name" class="form-control"required>
                    </div>
                </div>
                    <br>
                      
                    <label for="exampleInputEmail1" class="form-label">email</label>
                    <input type="text" name="email" class="form-control"required>

                    <br>
                <div class="row">
                    <div class="col-sm-12 col-md-6">
                        <label for="exampleInputText1" class="form-label">Phone</label>
                        <input type="number"  name="phone" class="form-control"required>
                    </div>

                    <div class="col-sm-12 col-md-6">
                       
                        <label for="exampleInputText11" class="form-label">Password</label>
                        <input type="password"  name="password" class="form-control"required>
                    </div>
                </div>
                        <br>
                                    <div class="row">
                                        <div class="col-sm-12 col-md-6">
                                            <label for="exampleInputText1" class="form-label">Company Name</label>
                                            <input type="text"  name="company" class="form-control">
                                        </div>

                                        <div class="col-sm-12 col-md-6">
                                            <label for="exampleInputText11" class="form-label">Job Title</label>
                                            <input type="text"  name="job" class="form-control">
                                        </div>
                                    </div>
                                    <br>

                                    <label for="exampleInputEmail1" class="form-label">Street 1</label>
                                    <input type="text" name="street" class="form-control"required>

                                    <br>
                                    <div class="row">   
                                        <div class="col-sm-12 col-md-6">
                                            <label for="exampleInputText1" class="form-label">City</label>
                                            <input type="text"  name="city" class="form-control"required>
                                        </div>

                                        <div class="col-sm-12 col-md-6">
                                            <label for="exampleInputText11" class="form-label"required>State</label>
                                            <input type="text"  name="state" class="form-control">
                                        </div>
                                    </div>

                                    <br>
                                    <div class="row">   
                                        <div class="col-sm-12 col-md-6">
                                            <label for="exampleInputText1" class="form-label">ZIP/Postal Code</label>
                                            <input type="number"  name="zip" class="form-control"required>
                                        </div>

                                        <div class="col-sm-12 col-md-6">
                                            <label for="exampleInputText11" class="form-label">Country/Region</label>
                                            <input type="text"  name="country" class="form-control"required>
                                        </div>
                                    </div>
                                    <br>
                                    <input type="checkbox" name="checkbox"required>Agree with our terms and condition
                                    <br><br>
                                    <button type="submit" class="btn btn-success align-center">Register</button>







    </div>
        </div>
            </div>
    </form>





<?php

require_once('footer.php');

?>



    

   