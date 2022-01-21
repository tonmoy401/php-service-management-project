<?php
 session_start();
 require_once('../db.php');
 
 $id = $_POST['id']; 
$black_heading = $_POST['black_heading'];
$green_heading = $_POST['green_heading'];
$service_sub_heading = $_POST['service_sub_heading'];

$update_query = "UPDATE service_heads SET black_heading='$black_heading',
 green_heading='$green_heading', service_sub_heading='$service_sub_heading' WHERE id=$id";
 mysqli_query($db_connect,$update_query);
 header('location:service_head.php');

 ?>