<?php
    session_start();
    require_once('../header.php');
    require_once('../db.php');
    require_once('navbar.php');
    if(!isset($_SESSION['user_status'])){
        header('location:../login.php');
    }
     //get data from form
     $id= $_GET['banner_id'];
    $get_query = "SELECT * FROM banners WHERE id = $id";
    $banner_from_db = mysqli_query($db_connect,$get_query);
    $after_assoc = mysqli_fetch_assoc($banner_from_db);
    $_SESSION['banner_edit'] = "yes";
?>

<section>
    <div class="container">
        <div class="row">
            <div class="col-lg-6 m-auto">
            <div class="card mt-4">
                <div class="card-header bg-info">
                    <h5 class="card-title text-capitalize">banner Edit Form</h5>
                </div>
                    <div class="card-body">
            <form action="banner_edit_post.php" method="post" enctype="multipart/form-data">
                            <input type="hidden" class="form-control" name="id" 
                                value="<?=$after_assoc['id']?>">
                            <div class="mb-3">
                                <label class="text-capitalize text-primary">edit banner title</label>
                                <input type="text" class="form-control" name="banner_title" 
                                value="<?=$after_assoc['banner_title']?>">
                            </div>
                            <div class="mb-3">
                                <label class="text-capitalize text-primary">edit banner sub title</label>
                                <input type="text" class="form-control" name="banner_sub_title" 
                                value="<?=$after_assoc['banner_sub_title']?>">
                            </div>
                            <div class="mb-3">
                                <label class="text-capitalize text-primary">edit banner detail</label>
                                <input type="text" class="form-control" name="banner_detail" 
                                value="<?=$after_assoc['banner_detail']?>">
                            </div>
                            <div class="mb-3">
                                <label class="text-capitalize text-primary">update banner image</label>
                                <input type="file" class="form-control" name="banner_image">
                            </div>
                            <div class="mb-3">
                            <img src="../<?=$after_assoc['image_location']?>" style="width:150px;">
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary">Update Banner</button>
                            </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
 require_once('../footer.php');
?>

<script>
 
</script>