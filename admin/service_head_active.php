<?php
require_once('../db.php');

$id= $_GET['service_head_id'];
$update_query = "UPDATE service_heads SET active_status = 1 WHERE id=$id";
$update_query2 = "UPDATE service_heads SET active_status = 2 WHERE id!=$id";

mysqli_query($db_connect,$update_query);
mysqli_query($db_connect,$update_query2);

header('location: service_head.php');
?>