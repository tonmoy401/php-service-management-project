<?php
require_once('../db.php');

$id= $_GET['social_id'];
$update_query = "UPDATE social_medias SET active_status = 2 WHERE id=$id";


mysqli_query($db_connect,$update_query);

header('location: social_media.php');
?>