<?php
require_once('../db.php');

$id= $_GET['massage_id'];
$update_query = "UPDATE guest_massage SET read_status=1 WHERE id=$id";
mysqli_query($db_connect,$update_query);
header('location:guest_massage.php');
?>