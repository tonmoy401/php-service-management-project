<?php
    session_start();
    require_once('../header.php');
    require_once('../db.php');
    require_once('navbar.php');
    if(!isset($_SESSION['user_status'])){
        header('location:../login.php');
    }
     //get data from form
     $id= $_GET['service_head_id'];

     $get_query = "SELECT * FROM service_heads WHERE id = $id";
     $from_db = mysqli_query($db_connect,$get_query);
     $after_assoc = mysqli_fetch_assoc($from_db);

?>

<section>
<div class="container">
    <div class="row mt-4">
        <div class="col-lg-6 m-auto">
            <div class="card">
                <div class="card-header bg-warning">
                    <h5 class="card-title text-capitalize">Service Heading add form</h5>
                </div>
                <div class="card-body">

                    <form action="service_head_edit_post.php" method="post">
                            <div class="mb-3">
                                <input type="hidden" class="form-control" name="id" value="<?=$after_assoc['id']?>">
                                <label class="text-capitalize text-primary">Black Heading</label>
                                <input type="text" class="form-control" name="black_heading" 
                                value="<?=$after_assoc['black_heading']?>"required>
                            </div>
                            <div class="mb-3">
                                <label class="text-capitalize text-primary">Green Heading</label>
                                <input type="text" class="form-control" name="green_heading" 
                                value="<?=$after_assoc['green_heading']?>"required>
                            </div>
                            <div class="mb-3">
                                <label class="text-capitalize text-primary">Sub Heading</label>
                                <input type="text" class="form-control" name="service_sub_heading"
                                 value="<?=$after_assoc['service_sub_heading']?>" required>
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary">Update Heading</button>
                            </div>
                    </form>
                </div>
            </div>                
        </div>


<?php
  require_once('../footer.php');
?>