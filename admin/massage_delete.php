<?php
require_once('../db.php');
if(!isset($_SESSION['user_status'])){
    header('location:../login.php');
}

$id= $_GET['massage_id'];
$delete_query = "DELETE FROM guest_massage WHERE id=$id";
mysqli_query($db_connect,$delete_query);
header('location:guest_massage.php');
?> 