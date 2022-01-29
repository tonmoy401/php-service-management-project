<?php
session_start();
require_once('db.php');


$email= $_POST['email'];
$password= md5($_POST['password']);


$checking_query = "SELECT COUNT(*) AS total_users FROM users WHERE email='$email' AND password='$password'";
$db_log_res= mysqli_query($db_connect,$checking_query);
$after_assoc= mysqli_fetch_assoc($db_log_res);

if($after_assoc['total_users'] == 1){
    $_SESSION['email'] = $email;
    $_SESSION['user_status'] = 'yes';
    $_SESSION['login_success'] = "Login successfully";
    header('location:admin/dashboard.php');
}
else{
    $_SESSION['error_msg'] = "Your email or Password is wrong or register";
    header('location:login_1.php');
}













?>