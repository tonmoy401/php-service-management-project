<?php
 session_start();
 require_once('../db.php');
 
 $id = $_POST['id']; 
$page_link = $_POST['page_link'];
$social_icon = $_POST['social_icon'];

$update_query = "UPDATE social_medias SET page_link='$page_link',
 social_icon='$social_icon' WHERE id=$id";
 mysqli_query($db_connect,$update_query);
 $_SESSION['social_edit']= "social media edited successfully";
 
 header('location:social_media.php');

 ?>