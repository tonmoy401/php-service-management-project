<?php
    session_start();
    require_once('../header.php');
    require_once('../db.php');
    require_once('navbar.php');
    if(!isset($_SESSION['user_status'])){
        header('location:../login.php');
    }
     //get data from form
    $get_query = "SELECT * FROM banners";
    $from_db = mysqli_query($db_connect,$get_query);
?>

<section>
<div class="container">
    <div class="row mt-4">
        <div class="col-lg-3">
            <div class="card">
                <div class="card-header bg-warning">
                    <h5 class="card-title text-capitalize">banner add form</h5>
                </div>
                <div class="card-body">
                                                       
                                                       
                                                        <?php
                                                            if(isset($_SESSION['img_sub_success_msg'])){
                                                        ?>
                                                            <div class="alert alert-success" role="alert">
                                                            <?php
                                                               echo $_SESSION['img_sub_success_msg'];
                                                               unset($_SESSION['img_sub_success_msg']);
                                                            ?>
                                                            </div>
                                                            <?php 
                                                                }
                                                         ?>
                                                         <?php
                                                            if(isset($_SESSION['img_sub_err_msg'])){
                                                        ?>
                                                            <div class="alert alert-danger" role="alert">
                                                            <?php
                                                               echo $_SESSION['img_sub_err_msg'];
                                                               unset($_SESSION['img_sub_err_msg']);
                                                            ?>
                                                            </div>
                                                            <?php 
                                                                }
                                                         ?>


                    <form action="banner_post.php" method="post" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label class="text-capitalize text-primary">banner title</label>
                                <input type="text" class="form-control" name="banner_title">
                            </div>
                            <div class="mb-3">
                                <label class="text-capitalize text-primary">banner sub title</label>
                                <input type="text" class="form-control" name="banner_sub_title">
                            </div>
                            <div class="mb-3">
                                <label class="text-capitalize text-primary">banner detail</label>
                                <input type="text" class="form-control" name="banner_detail">
                            </div>
                            <div class="mb-3">
                                <label class="text-capitalize text-primary">banner image</label>
                                <input type="file" class="form-control" name="banner_image">
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary">Add Banner</button>
                            </div>
                    </form>
                </div>
            </div>                
        </div>
        <div class="col-lg-9">
            <div class="card">
                <div class="card-header bg-warning">
                    <h5 class="card-title text-capitalize">banner list</h5>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <th>SL</th>
                            <th>Banner Title</th>
                            <th>Banner Sub Title</th>
                            <th>Banner Detail</th>
                            <th>Banner Image</th>
                            <th>Active Status</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            <?php
                              foreach($from_db AS $key => $banner):
                            ?>
                           <tr>
                               <td><?=$key+1?></td>
                               <td><?=$banner['banner_title']?></td>
                               <td><?=$banner['banner_sub_title']?></td>
                               <td><?=$banner['banner_detail']?></td>
                               <td>
                                   <img src="../<?=$banner['image_location']?>" style="width:100px;">
                                </td>
                               <td>
                                   <?php
                                   if($banner['active_status'] == 1):
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
                                   if($banner['active_status'] == 2):
                                   ?>
                                    <a href="banner_active.php?banner_id=<?=$banner['id']?>"
                                    class="btn btn-sm btn-primary">Make Active</a>
                                    <?php
                                     else:
                                   ?>
                                   <a href="banner_deactive.php?banner_id=<?=$banner['id']?>"
                                    class="btn btn-sm btn-warning">Make De-Active</a>
                                    <?php
                                   endif
                                   ?> 
                                    <a href="banner_edit.php?banner_id=<?=$banner['id']?>" class="btn btn-sm btn-info">Edit</a>
                                    <a href="banner_delete.php?banner_id=<?=$banner['id']?>" class="btn btn-sm btn-danger">Delete</a>
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