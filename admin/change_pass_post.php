<?php
  session_start();
  require_once('../db.php');

  $login_email= $_SESSION['email'];
   if($_POST['old_pass'] == NULL || $_POST['new_pass'] == NULL || $_POST['confirm_pass'] == NULL){
        $_SESSION['pass_chang_err_msg'] = "All feilds are required!";
        header('location:change_pass.php');
   }
   else{
        if(strlen($_POST['old_pass']) > 5 && strlen($_POST['new_pass']) > 5 && strlen($_POST['confirm_pass'])> 5){
            //password rules;
            $password=$_POST['new_pass'];

            $pass_cap=preg_match('@[A-Z]@',$password);
            $pass_small=preg_match('@[a-z]@',$password);
            $pass_num=preg_match('@[0-9]@',$password);
            $pattern='/[\'\/~`\!@#\$%\^&\*\(\)_\-\+=\{\}\[\]\|;:"\<\>,\.\?\\\]/';
            $pass_char=preg_match($pattern,$password);
            if($pass_cap == 1 && $pass_small == 1 && $pass_num==1 && $pass_char == 1){
                if($_POST['new_pass'] == $_POST['confirm_pass']){

                            if($_POST['new_pass'] != $_POST['old_pass']){
                            $encripted_old_pass = md5($_POST['old_pass']);

                            $checking_query = "SELECT COUNT(*) AS total_users FROM users WHERE email='$login_email' AND
                                password='$encripted_old_pass'";
                                $db_result= mysqli_query($db_connect,$checking_query);
                                $after_assoc=mysqli_fetch_assoc($db_result);

                                        if($after_assoc['total_users'] == 1){

                                            $encripted_new_pass = md5($_POST['new_pass']);
                                            $update_query = "UPDATE users SET password='$encripted_new_pass' WHERE email='$login_email'";

                                                    mysqli_query($db_connect,$update_query);
                                                    $_SESSION['pass_chang_success_msg'] = "Your password changed Successfully";
                                                    header('location:change_pass.php');
                                        }
                                        else{
                                            $_SESSION['pass_chang_err_msg'] = "Old password did not match";
                                            header('location:change_pass.php');
                                        }    
                            }
                            else{
                                $_SESSION['pass_chang_err_msg'] = "you entered same password";
                                header('location:change_pass.php');
                            }
                }            
                else{
                    $_SESSION['pass_chang_err_msg'] = "Confirm password is not match";
                    header('location:change_pass.php');
                }
            }
            else{
                $_SESSION['pass_chang_err_msg'] = "password must be contain 1 captial & small letter,number & special-char";
                header('location:change_pass.php');
            }
        }
        else{
            $_SESSION['pass_chang_err_msg'] = "All feilds are must contain 6 chars!";
            header('location:change_pass.php');
        }
   
}








 ?>
