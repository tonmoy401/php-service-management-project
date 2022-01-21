<?php
session_start();
require_once('db.php');
//information from form

$first_name=filter_var($_POST['first_name'],FILTER_SANITIZE_STRING);
$last_name=filter_var($_POST['last_name'],FILTER_SANITIZE_STRING);
$email=filter_var($_POST['email'],FILTER_SANITIZE_EMAIL);
$phone=filter_var($_POST['phone'],FILTER_SANITIZE_STRING);
$password=$_POST['password'];
$company=filter_var($_POST['company'],FILTER_SANITIZE_STRING);
$job=filter_var($_POST['job'],FILTER_SANITIZE_STRING);
$street=filter_var($_POST['street'],FILTER_SANITIZE_STRING);
$city=filter_var($_POST['city'],FILTER_SANITIZE_STRING);
$state=filter_var($_POST['state'],FILTER_SANITIZE_STRING);
$zip=$_POST['zip'];
$country=filter_var($_POST['country'],FILTER_SANITIZE_STRING);


$validate_email=filter_var($email,FILTER_VALIDATE_EMAIL);

//password rules;


$pass_cap=preg_match('@[A-Z]@',$password);
$pass_small=preg_match('@[a-z]@',$password);
$pass_num=preg_match('@[0-9]@',$password);
$pattern='/[\'\/~`\!@#\$%\^&\*\(\)_\-\+=\{\}\[\]\|;:"\<\>,\.\?\\\]/';
$pass_char=preg_match($pattern,$password);




if($validate_email){
    if(strlen($password) > 5 && $pass_cap == 1 && $pass_small ==1 && $pass_num==1 && $pass_char == 1){

        $encript_pass = md5($password);
        $checking_query= "SELECT COUNT(*) AS total_users FROM users WHERE email ='$validate_email'";
        $db_result = mysqli_query($db_connect,$checking_query);
        $after_assoc = mysqli_fetch_assoc($db_result);
        

         if($after_assoc['total_users'] == 0){

                    //insert query
                $insert_query="INSERT INTO users(first_name,last_name,email,phone,password,company,job,street,city,
                state,zip,country)
                VALUES('$first_name','$last_name','$email','$phone','$encript_pass','$company','$job','$street','$city',
                '$state','$zip','$country')";

                mysqli_query($db_connect,$insert_query);

                $_SESSION['success_massage'] = "Thanks for your feedback.We will contact you soon";
                header('location:form.php');
         }
         else{
            $_SESSION['already_registered_massage'] = "already registered";
            header('location:form.php');
          }           
    }
    else{
        $_SESSION['error_massage'] = "password must be 6 chars and contain 1 captial , 1 small , 1 number & 1 special char";
        header('location:form.php');
    }
}
else{
    $_SESSION['error_massage'] = "input a valid email";
    header('location:form.php');
}



























?>