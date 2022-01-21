<?php
 session_start();
 require_once('../db.php');
 
$id = $_POST['id']; 
$fun_facts_heading = $_POST['fun_facts_heading'];
$fun_facts_white_heading = $_POST['fun_facts_white_heading'];
$fun_facts_green_heading = $_POST['fun_facts_green_heading'];
$fun_facts_para_one = $_POST['fun_facts_para_one'];
$fun_facts_para_two = $_POST['fun_facts_para_two'];

$update_query="UPDATE fun_facts SET fun_facts_heading='$fun_facts_heading',
 fun_facts_white_heading='$fun_facts_white_heading', fun_facts_green_heading='$fun_facts_green_heading',
 fun_facts_para_one='$fun_facts_para_one', fun_facts_para_two='$fun_facts_para_two' WHERE id=$id";
 mysqli_query($db_connect,$update_query);

if($_FILES['fun_facts_bg_image']['name']){
    $uploaded_image_original_name = $_FILES['fun_facts_bg_image']['name'];
    $uploaded_image_original_size = $_FILES['fun_facts_bg_image']['size'];

    if($uploaded_image_original_size <= 2000000){
        $after_explode = explode('.',$uploaded_image_original_name);
        $image_extension = end($after_explode);
        $allow_extension = array('jpg','JPG','jpeg','JPEG','png','PNG');
          if(in_array($image_extension,$allow_extension)){

            $get_image_location_query = "SELECT image_location FROM fun_facts WHERE id= $id";
            $image_location_from_db = mysqli_query($db_connect,$get_image_location_query);
            $after_assoc_image_location = mysqli_fetch_assoc($image_location_from_db);

            unlink("../".$after_assoc_image_location['image_location']);
            
            // $id_from_db = mysqli_insert_id($db_connect);

             $image_new_name = $id . "." . $image_extension;
            
             $save_location = "../upload/fun_facts/". $image_new_name;
             move_uploaded_file($_FILES['fun_facts_bg_image']['tmp_name'],$save_location);
            
             $image_location = "upload/fun_facts/".$image_new_name;

             $update_image_query = "UPDATE fun_facts SET image_location='$image_location' WHERE id= $id";

             mysqli_query($db_connect,$update_image_query);
            
             header('location: fun_facts.php');
          }
          else{
            echo"not found";
          }
    }
    else{
        echo"your file is learge"; 
    }
}

header('location: fun_facts.php');

?> 