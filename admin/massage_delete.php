<?php
require_once('../db.php');

$id= $_GET['massage_id'];
$delete_query = "DELETE FROM guest_massage WHERE id=$id";
mysqli_query($db_connect,$delete_query);
header('location:guest_massage.php');
?>