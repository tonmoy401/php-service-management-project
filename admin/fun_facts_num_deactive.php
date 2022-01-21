<?php
require_once('../db.php');

$id= $_GET['fun_facts_number_id'];
$update_query = "UPDATE fun_facts_number SET active_status = 2 WHERE id=$id";


mysqli_query($db_connect,$update_query);

header('location: fun_facts_num.php');
?>