<?php
    session_start();
    require_once('../db.php');

if($_POST['page_link'] == NULL || $_POST['social_icon'] == NULL){
    $_SESSION['social_err_msg'] = "All field required";
       header('location:social_media.php');
}else{
    $page_link = $_POST['page_link'];
    $social_icon = $_POST['social_icon'];

            $insert_query = "INSERT INTO social_medias (page_link,social_icon) 
            VALUES ('$page_link','$social_icon')";
            mysqli_query($db_connect,$insert_query);
             
            $_SESSION['social_success']= "social media added successfully";
            
            header('location:social_media.php');
}

    
