<?php
session_start();
require_once('../db.php');

$guest_Name = $_POST['guest_name'];
$guest_email = $_POST['guest_email'];
$guest_phone = $_POST['guest_phone'];
$guest_text = $_POST['guest_text'];

//insert_query
$insert_query = "INSERT INTO  guest_massage (guest_name,guest_email,guest_phone,guest_text) VALUES('$guest_Name',
                '$guest_email','$guest_phone','$guest_text')";

mysqli_query($db_connect,$insert_query);
$_SESSION['submit_success_msg'] = "massage submitted Successfully";
header('location:../index.php');


 

?>