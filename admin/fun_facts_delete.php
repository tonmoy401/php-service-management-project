<?php
require_once('../db.php');

$id= $_GET['fun_facts_id'];

$delete_query = "DELETE FROM fun_facts WHERE id=$id";
mysqli_query($db_connect,$delete_query);
header('location:fun_facts.php');
?>