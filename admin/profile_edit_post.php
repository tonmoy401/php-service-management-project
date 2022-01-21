<?php
  session_start();
  require_once('../db.php');
if($_POST['first_name'] == NULL || $_POST['last_name'] == NULL || $_POST['phone'] == NULL || $_POST['company'] == NULL ||
 $_POST['job'] == NULL || $_POST['street'] == NULL || $_POST['city'] == NULL || $_POST['state'] == NULL || $_POST['zip'] == NULL || $_POST['country']== NULL ){
       $_SESSION['sub_err_msg'] = "All field required" ;
       header('location:profile_edit.php');
 }else{
  $user_name =$_POST['first_name'];
  $last_name =$_POST['last_name'];
  $phone =$_POST['phone'];
  $company =$_POST['company'];
  $job =$_POST['job'];
  $street =$_POST['street'];
  $city =$_POST['city'];
  $state =$_POST['state'];
  $zip =$_POST['zip'];
  $country =$_POST['country'];
  $email =$_POST['email'];

  $update_query = "UPDATE users SET first_name='$user_name',last_name='$last_name',phone='$phone',company='$company',
  job='$job',street='$street',city='$city',state='$state',zip='$zip',country='$country' WHERE email='$email'";

  mysqli_query($db_connect,$update_query);
  $_SESSION['sub_success_msg'] = "Profile updated successfully";
  header('location:profile.php');
 }







?>