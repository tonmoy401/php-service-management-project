<?php
require_once('../db.php');

$id= $_GET['service_item_id'];

$delete_query = "DELETE FROM service_item WHERE id=$id";
mysqli_query($db_connect,$delete_query);
header('location:service_item.php');
?>