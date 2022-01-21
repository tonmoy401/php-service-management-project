<?php
require_once('../db.php');

$id= $_GET['fun_facts_id'];
$update_query = "UPDATE fun_facts SET active_status = 2 WHERE id=$id";
$update_query2 = "UPDATE fun_facts SET active_status = 1 WHERE id!=$id";

mysqli_query($db_connect,$update_query);
mysqli_query($db_connect,$update_query2);
header('location: fun_facts.php');
?>