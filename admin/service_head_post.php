<?php
    session_start();
    require_once('../db.php');

    $black_heading = $_POST['black_heading'];
    $green_heading = $_POST['green_heading'];
    $service_sub_heading = $_POST['service_sub_heading'];

    $insert_query = "INSERT INTO service_heads (black_heading,green_heading,service_sub_heading) 
            VALUES ('$black_heading','$green_heading','$service_sub_heading')";
            mysqli_query($db_connect,$insert_query);
            $_SESSION['shead_success'] = "service head added successfully";
            header('location:service_head.php');
?>