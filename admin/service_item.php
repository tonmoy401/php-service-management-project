<?php
    session_start();
    require_once('../header.php');
    require_once('../db.php');
    require_once('navbar.php');
    if(!isset($_SESSION['user_status'])){
        header('location:../login.php');
    }
     //get data from form
     $get_query = "SELECT * FROM service_item";
     $from_db = mysqli_query($db_connect,$get_query);
     
?>
<section>
<div class="container">
    <div class="row mt-4">
        <div class="col-lg-3">
            <div class="card">
                <div class="card-header bg-warning">
                    <h5 class="card-title text-capitalize">Service Item add form</h5>
                </div>
                <div class="card-body">

                    <form action="service_item_post.php" method="post" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label class="text-capitalize text-primary">Service Item Heading</label>
                                <input type="text" class="form-control" name="service_item_heading" required>
                            </div>
                            <div class="mb-3">
                                <label class="text-capitalize text-primary">Service Item Detail</label>
                                <input type="text" class="form-control" name="service_item_detail" required>
                            </div>
                            <div class="mb-3">
                                <label class="text-capitalize text-primary">Service Item Image</label>
                                <input type="file" class="form-control" name="service_image" required>
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary">Add Service Item</button>
                            </div>
                    </form>
                </div>
            </div>                
        </div>
        <div class="col-lg-9">
            <div class="card">
                <div class="card-header bg-warning">
                    <h5 class="card-title text-capitalize">Service Item list</h5>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <th>SL</th>
                            <th>Service Item Heading</th>
                            <th>Service Item Detail</th>
                            <th>Service Item Image</th>
                            <th>Active Status</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            <?php
                              foreach($from_db as $key => $seritem):
                            ?>
                           <tr>
                               <td><?=$key+1?></td>

                               <td><?=$seritem['service_item_heading']?></td>
                               <td><?=$seritem['service_item_detail']?></td>
                               <td><img src="../<?=$seritem['image_location']?>" alt="" style="width:150px"></td>
                               <td>
                                   <?php
                                   if($seritem['active_status'] == 1):
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
                                   if($seritem['active_status'] == 2):
                                   ?>
                                    <a href="service_item_active.php?service_item_id=<?=$seritem['id']?>"
                                    class="btn btn-sm btn-primary">Make Active</a>
                                    <?php
                                     else:
                                   ?>
                                   <a href="service_item_deactive.php?service_item_id=<?=$seritem['id']?>"
                                    class="btn btn-sm btn-warning">Make De-Active</a>
                                    <?php
                                   endif
                                   ?> 
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                    <a href="service_item_edit.php?service_item_id=<?=$seritem['id']?>"
                                     class="btn btn-sm btn-info">Edit</a>

                                    <a href="service_item_delete.php?service_item_id=<?=$seritem['id']?>"
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