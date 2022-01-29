<?php
require_once('../db.php');
if(!isset($_SESSION['user_status'])){
    header('location:../login.php');
}

$id= $_GET['service_item_id'];

$get_service_location_query = "SELECT image_location FROM service_item WHERE id=$id";
$from_db = mysqli_query($db_connect,$get_service_location_query);
$after_assoc = mysqli_fetch_assoc($from_db);

unlink("../".$after_assoc['image_location']);

$delete_query = "DELETE FROM service_item WHERE id=$id";
mysqli_query($db_connect,$delete_query);
header('location:service_item.php');
?> 