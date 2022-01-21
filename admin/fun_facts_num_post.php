<?php
    session_start();
    require_once('../db.php');

    $fun_facts_num = $_POST['fun_facts_num'];
    $fun_facts_title = $_POST['fun_facts_title'];

    $insert_query = "INSERT INTO fun_facts_number (fun_facts_num,fun_facts_title)
            VALUES ('$fun_facts_num','$fun_facts_title')";
            mysqli_query($db_connect,$insert_query);

            header('location:fun_facts_num.php');
?>