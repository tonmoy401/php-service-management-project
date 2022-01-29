<?php
require_once('../db.php');
if(!isset($_SESSION['user_status'])){
    header('location:../login.php');
}

$id= $_GET['social_id'];

$delete_query = "DELETE FROM social_medias WHERE id=$id";
mysqli_query($db_connect,$delete_query);
header('location:social_media.php');
?> 