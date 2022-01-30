<?php
    session_start();
    require_once('../header.php');
    require_once('../db.php');
    require_once('navbar.php');
    if(!isset($_SESSION['user_status'])){
        header('location:../login.php');
    }
     //get data from form
     $id= $_GET['fun_facts_number_id'];

     $get_query = "SELECT * FROM fun_facts_number WHERE id = $id";
     $from_db = mysqli_query($db_connect,$get_query);
     $after_assoc = mysqli_fetch_assoc($from_db);
     $_SESSION['fun_edit'] = "yes";

?>

<section>
<div class="container">
    <div class="row mt-4">
        <div class="col-lg-6 m-auto">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title text-capitalize">fun facts number edit form</h5>
                </div>
                <div class="card-body">

                    <form action="fun_facts_num_edit_post.php" method="post">
                            <div class="mb-3">
                                <input type="hidden" class="form-control" name="id" value="<?=$after_assoc['id']?>">
                                <label class="text-capitalize text-primary">fun facts number</label>
                                <input type="text" class="form-control" name="fun_facts_num" 
                                value="<?=$after_assoc['fun_facts_num']?>"required>
                            </div>
                            <div class="mb-3">
                                <label class="text-capitalize text-primary">fun facts title</label>
                                <input type="text" class="form-control" name="fun_facts_title" 
                                value="<?=$after_assoc['fun_facts_title']?>"required>
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary">Update fun facts number</button>
                            </div>
                    </form>
                </div>
            </div>                
        </div>


<?php
  require_once('../footer.php');
?>