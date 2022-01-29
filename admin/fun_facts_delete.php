<?php
require_once('../db.php');
if(!isset($_SESSION['user_status'])){
    header('location:../login.php');
}

$id= $_GET['fun_facts_id'];

$get_query = "SELECT image_location FROM fun_facts WHERE id=$id";
$from_db = mysqli_query($db_connect,$get_query);
$after_assoc = mysqli_fetch_assoc($from_db);

unlink("../".$after_assoc['image_location']);

$delete_query = "DELETE FROM fun_facts WHERE id=$id";
mysqli_query($db_connect,$delete_query);
header('location:fun_facts.php');
?> 