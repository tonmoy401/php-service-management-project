<?php
    session_start();
    require_once('../header.php');
    require_once('../db.php');
    require_once('navbar.php');
    if(!isset($_SESSION['user_status'])){
        header('location:../login.php');
    }
     //get data from form
     $get_query = "SELECT * FROM fun_facts";
     $from_db = mysqli_query($db_connect,$get_query);
?>
<section>
<div class="container">
    <div class="row mt-4">
        <div class="col-lg-3">
            <div class="card">
                <div class="card-header bg-warning">
                    <h5 class="card-title text-capitalize">Fun Facts Update form</h5>
                </div>
                <div class="card-body">

                    <form action="fun_facts_post.php" method="post" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label class="text-capitalize text-primary">fun facts heading</label>
                                <input type="text" class="form-control" name="fun_facts_heading"  value="<?=(isset($_SESSION['heading_done'])) ? $_SESSION['heading_done'] : ''?>">

                                <?php if(isset($_SESSION['heading_err'])): ?>
                                <small class="text-danger"><?=$_SESSION['heading_err']?></small>
                                <?php unset($_SESSION['heading_err']) ?>
                                <?php endif ?>
                                  
                            </div>
                            <div class="mb-3">
                                <label class="text-capitalize text-primary">fun facts white heading</label>
                                <input type="text" class="form-control" name="fun_facts_white_heading" value="<?=(isset($_SESSION['white_heading_done'])) ? $_SESSION['white_heading_done'] : ''?>">

                                <?php if(isset($_SESSION['white_heading_err'])): ?>
                                <small class="text-danger"><?=$_SESSION['white_heading_err']?></small>
                                <?php unset($_SESSION['white_heading_err']) ?>
                                <?php endif ?>

                            </div>
                            <div class="mb-3">
                                <label class="text-capitalize text-primary">fun facts green heading </label>
                                <input type="text" class="form-control" name="fun_facts_green_heading" value="<?=(isset($_SESSION['green_heading_done'])) ? $_SESSION['green_heading_done'] : ''?>">

                                <?php if(isset($_SESSION['green_heading_err'])): ?>
                                <small class="text-danger"><?=$_SESSION['green_heading_err']?></small>
                                <?php unset($_SESSION['green_heading_err']) ?>
                                <?php endif ?>

                            </div>
                            <div class="mb-3">
                                <label class="text-capitalize text-primary">fun facts para one</label>
                                <input type="text" class="form-control" name="fun_facts_para_one" value="<?=(isset($_SESSION['para_one_done'])) ? $_SESSION['para_one_done'] : ''?>">

                                <?php if(isset($_SESSION['para_one_err'])): ?>
                                <small class="text-danger"><?=$_SESSION['para_one_err']?></small>
                                <?php unset($_SESSION['para_one_err']) ?>
                                <?php endif ?>

                            </div>
                            <div class="mb-3">
                                <label class="text-capitalize text-primary">fun facts para two</label>
                                <input type="text" class="form-control" name="fun_facts_para_two"value="<?=(isset($_SESSION['para_two_done'])) ? $_SESSION['para_two_done'] : ''?>">

                                <?php if(isset($_SESSION['para_two_err'])): ?>
                                <small class="text-danger"><?=$_SESSION['para_two_err']?></small>
                                <?php unset($_SESSION['para_two_err']) ?>
                                <?php endif ?>

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
        <div class="col-lg-9">
            <div class="card">
                <div class="card-header bg-warning">
                    <h5 class="card-title text-capitalize">fun facts list</h5>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <th>SL</th>
                            <th class="text-capitalize">fun facts heading</th>
                            <th class="text-capitalize">fun facts white heading</th>
                            <th class="text-capitalize">fun facts green heading </th>
                            <th class="text-capitalize">fun facts para one</th>
                            <th class="text-capitalize">fun facts para two</th>
                            <th class="text-capitalize">fun facts bg image</th>
                            <th class="text-capitalize">Active Status</th>
                            <th class="text-capitalize">Action</th>
                        </thead>
                        <tbody>
                            <?php
                              foreach($from_db as $key => $funfact):
                            ?>
                           <tr>
                               <td><?=$key+1?></td>

                               <td><?=$funfact['fun_facts_heading']?></td>
                               <td><?=$funfact['fun_facts_white_heading']?></td>
                               <td><?=$funfact['fun_facts_green_heading']?></td>
                               <td><?=$funfact['fun_facts_para_one']?></td>
                               <td><?=$funfact['fun_facts_para_two']?></td>
                               <td><img src="../<?=$funfact['image_location']?>" alt="" style="width:150px"></td>
                               <td>
                                   <?php
                                   if($funfact['active_status'] == 1):
                                   ?>
                                    <span class="badge badge-sm bg-success">Active</span>
                                    <?php
                                     else:
                                   ?>
                                   <span class="badge badge-sm bg-warning">De-Active</span>
                                    <?php
                                   endif
                                   ?>
                                </td>
                                    
                               <td>
                                  <div class="btn-group" role="group" aria-label="Basic example">
                                    <?php
                                   if($funfact['active_status'] == 2):
                                   ?>
                                    <a href="fun_facts_active.php?fun_facts_id=<?=$funfact['id']?>"
                                    class="btn btn-sm btn-primary">Make Active</a>
                                    <?php
                                     else:
                                   ?>
                                   <a href="fun_facts_deactive.php?fun_facts_id=<?=$funfact['id']?>"
                                    class="btn btn-sm btn-warning">Make De-Active</a>
                                    <?php
                                   endif
                                   ?> 
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                    <a href="fun_facts_edit.php?fun_facts_id=<?=$funfact['id']?>"
                                     class="btn btn-sm btn-info">Edit</a>

                                    <a href="fun_facts_delete.php?fun_facts_id=<?=$funfact['id']?>"
                                     class="btn btn-sm btn-danger">Delete</a>
                                    </div>
                                </td>
                           </tr>
                           <?php
                              endforeach
                            ?>
                        </tbody>
                    </table>

                </div>
            </div> 
                                                                   
        </div>
    </div>
</div>
</section>
   
<?php
 require_once('../footer.php');
?>