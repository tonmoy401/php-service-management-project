<?php
    session_start();
    require_once('../header.php');
    require_once('../db.php');
    require_once('navbar.php');
    if(!isset($_SESSION['user_status'])){
        header('location:../login.php');
    }
     //get data from form
     $id= $_GET['fun_facts_id'];
    $get_query = "SELECT * FROM fun_facts WHERE id=$id";
    $fun_facts_from_db = mysqli_query($db_connect,$get_query);
    $after_assoc = mysqli_fetch_assoc($fun_facts_from_db);
?>

<section>
    <div class="container">
        <div class="row">
            <div class="col-lg-6 m-auto">
            <div class="card mt-4">
                <div class="card-header bg-info">
                    <h5 class="card-title text-capitalize">fun facts Edit Form</h5>
                </div>
                    <div class="card-body">
                    <form action="fun_facts_edit_post.php" method="post" enctype="multipart/form-data">
                            <div class="mb-3">
                                <input type="hidden" class="form-control" name="id" value="<?=$after_assoc['id']?>">
                            </div>
                            <div class="mb-3">
                                <label class="text-capitalize text-primary">fun facts heading</label>
                                <input type="text" class="form-control" name="fun_facts_heading"
                                value="<?=$after_assoc['fun_facts_heading']?>" required>
                            </div>
                            <div class="mb-3">
                                <label class="text-capitalize text-primary">fun facts white heading</label>
                                <input type="text" class="form-control" name="fun_facts_white_heading"
                                value="<?=$after_assoc['fun_facts_white_heading']?>" required>
                            </div>
                            <div class="mb-3">
                                <label class="text-capitalize text-primary">fun facts green heading </label>
                                <input type="text" class="form-control" name="fun_facts_green_heading"
                                value="<?=$after_assoc['fun_facts_green_heading']?>" required>
                            </div>
                            <div class="mb-3">
                                <label class="text-capitalize text-primary">fun facts para one</label>
                                <input type="text" class="form-control" name="fun_facts_para_one"
                                value="<?=$after_assoc['fun_facts_para_one']?>" required>
                            </div>
                            <div class="mb-3">
                                <label class="text-capitalize text-primary">fun facts para two</label>
                                <input type="text" class="form-control" name="fun_facts_para_two"
                                value="<?=$after_assoc['fun_facts_para_two']?>" required>
                            </div>
                           
                            <div class="mb-3">
                                <label class="text-capitalize text-primary">fun facts bg image</label>
                                <input type="file" class="form-control" name="fun_facts_bg_image">
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary">Fun Facts Update</button>
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