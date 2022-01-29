<?php
require_once('../db.php');
if(!isset($_SESSION['user_status'])){
    header('location:../login.php');
}

$id= $_GET['service_head_id'];

$delete_query = "DELETE FROM service_heads WHERE id=$id";
mysqli_query($db_connect,$delete_query);
header('location:service_head.php');
?> 