<?php
require_once('../db.php');

$id= $_GET['service_item_id'];
$update_query = "UPDATE service_item SET active_status = 1 WHERE id=$id";


mysqli_query($db_connect,$update_query);

header('location: service_item.php');
?>