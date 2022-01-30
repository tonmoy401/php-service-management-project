<?php
    session_start();
    require_once('../db.php');
    $fun_facts_heading = $_POST['fun_facts_heading'];
    $fun_facts_white_heading = $_POST['fun_facts_white_heading'];
    $fun_facts_green_heading = $_POST['fun_facts_green_heading'];
    $fun_facts_para_one = $_POST['fun_facts_para_one'];
    $fun_facts_para_two = $_POST['fun_facts_para_two'];
    
    $flag = true;

     if(!$fun_facts_heading){
       $_SESSION['heading_err'] = "heading is requered!";
       $flag = false;
     }else{
      $_SESSION['heading_done'] = $fun_facts_heading;
     }

     if(!$fun_facts_white_heading){
      $_SESSION['white_heading_err'] = "white heading is requered!";
      $flag = false;
    }else{
     $_SESSION['white_heading_done'] = $fun_facts_white_heading;
    }

    if(!$fun_facts_green_heading){
      $_SESSION['green_heading_err'] = "green heading is requered!";
      $flag = false;
    }else{
     $_SESSION['green_heading_done'] = $fun_facts_green_heading;
    }

    if(!$fun_facts_para_one){
      $_SESSION['para_one_err'] = "para one is requered!";
      $flag = false;
    }else{
     $_SESSION['para_one_done'] = $fun_facts_para_one;
    }

    if(!$fun_facts_para_two){
      $_SESSION['para_two_err'] = "heading is requered!";
      $flag = false;
    }else{
     $_SESSION['para_two_done'] = $fun_facts_para_two;
    }

    if($flag){
      $insert_query = "INSERT INTO fun_facts (fun_facts_heading,fun_facts_white_heading,fun_facts_green_heading,
            fun_facts_para_one, fun_facts_para_two, image_location) 
            VALUES ('$fun_facts_heading','$fun_facts_white_heading','$fun_facts_green_heading','$fun_facts_para_one',
            '$fun_facts_para_two','primary_location')";
            mysqli_query($db_connect,$insert_query);

            unset($_SESSION['heading_done']);
            unset($_SESSION['white_heading_done']);
            unset($_SESSION['green_heading_done']);
            unset($_SESSION['para_one_done']);
            unset($_SESSION['para_two_done']);

            $_SESSION['funs_success'] = "Fun fucts added successfully";
            header('location:fun_facts.php');

    }
//print_r($_FILES['banner_image']);
    $uploaded_image_original_name = $_FILES['fun_facts_bg_image']['name'];
    $uploaded_image_original_size = $_FILES['fun_facts_bg_image']['size'];
    
    if($uploaded_image_original_size <= 2000000){
        $after_explode = explode('.', $uploaded_image_original_name);
        $image_extension = end($after_explode);
        $allow_extension = array('jpg','JPG','jpeg','JPEG','png','PNG');
          if(in_array($image_extension,$allow_extension)){

            $id_from_db = mysqli_insert_id($db_connect);

            $image_new_name = $id_from_db . "." . $image_extension;
            
            $save_location = "../upload/fun_facts/". $image_new_name;
            move_uploaded_file($_FILES['fun_facts_bg_image']['tmp_name'],$save_location);
            
            $image_location = "upload/fun_facts/".$image_new_name;

            $update_query = "UPDATE fun_facts SET image_location='$image_location' WHERE id=$id_from_db";

            mysqli_query($db_connect,$update_query);
            //$_SESSION['img_sub_success_msg'] = "banner updated successfully";
            header('location:fun_facts.php');
          }
          else{
            //$_SESSION['img_sub_err_msg'] = "your image must be in jpg , jpeg , png format";
            header('location:fun_facts.php');
          }
    }
    else{
        //$_SESSION['img_sub_err_msg'] = "your file is too big ! more than 2mb";
        header('location:fun_facts.php');
    }





   





?>