<?php
    session_start();
    require_once('../header.php');
    require_once('../db.php');
    require_once('navbar.php');
    if(!isset($_SESSION['user_status'])){
        header('location:../login.php');
    }
     //get data from form
     $id= $_GET['service_item_id'];

     $get_query = "SELECT * FROM service_item WHERE id = $id";
     $from_db = mysqli_query($db_connect,$get_query);
     $after_assoc = mysqli_fetch_assoc($from_db);

?>


<section>
<div class="container">
    <div class="row mt-4">
       <div class="col-lg-6 m-auto">
            <div class="card">
                <div class="card-header bg-warning">
                    <h5 class="card-title text-capitalize">Service Item Edit form</h5>
                </div>
                <div class="card-body">

                    <form action="service_item_edit_post.php" method="post" enctype="multipart/form-data">
                    <input type="hidden" class="form-control" name="id"
                                value="<?=$after_assoc['id']?>" required>
                            <div class="mb-3">
                                <label class="text-capitalize text-primary">Service Item Heading Edit</label>
                                <input type="text" class="form-control" name="service_item_heading"
                                value="<?=$after_assoc['service_item_heading']?>" required>
                            </div>
                            <div class="mb-3">
                                <label class="text-capitalize text-primary">Service Item Detail Edit</label>
                                <input type="text" class="form-control" name="service_item_detail" required
                                value="<?=$after_assoc['service_item_detail']?>">
                                
                            </div>
                            <div class="mb-3">
                                <label class="text-capitalize text-primary">Service Item Image Edit</label>
                                <input type="file" class="form-control" name="service_image">
                            </div>
                            <div class="mb-3">
                            <img src="../<?=$after_assoc['image_location']?>" style="width:150px;">
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary">Edit Service Item</button>
                            </div>
                    </form>
                </div>
            </div>                
        </div>
    </div>                
</div>

<?php
 require_once('../footer.php');
?>