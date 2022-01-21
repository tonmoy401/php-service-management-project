<?php
require_once('../db.php');

$id= $_GET['banner_id'];

$get_banner_location_query = "SELECT image_location FROM banners WHERE id=$id";
$from_db = mysqli_query($db_connect,$get_banner_location_query);
$after_assoc = mysqli_fetch_assoc($from_db);

unlink("../".$after_assoc['image_location']);

$delete_query = "DELETE FROM banners WHERE id=$id";
mysqli_query($db_connect,$delete_query);
header('location:banner.php');
?>