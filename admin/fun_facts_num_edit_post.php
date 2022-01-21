<?php
 session_start();
 require_once('../db.php');
 
 $id = $_POST['id']; 
$fun_facts_num = $_POST['fun_facts_num'];
$fun_facts_title = $_POST['fun_facts_title'];

$update_query = "UPDATE fun_facts_number SET fun_facts_num='$fun_facts_num',
 fun_facts_title='$fun_facts_title' WHERE id=$id";
 mysqli_query($db_connect,$update_query);
 header('location:fun_facts_num.php');

 ?>