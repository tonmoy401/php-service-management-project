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
                <div class="card-header">
                    <h5 class="card-title text-capitalize">banner add form</h5>
                </div>
                <div class="card-body">
                                                    
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
                <div class="card-header">
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
                                    <button value="banner_delete.php?banner_id=<?=$banner['id']?>" type="button" 
                                    class="del-btn btn btn-sm btn-danger">Delete</button>
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


<script>

  $('.del-btn').click(function(){
    var link= $(this).val();
          Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'question',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
      }).then((result) => {
        if (result.isConfirmed) {
          window.location.href = link
        }
      })
  }); 

</script>
<?php if(isset($_SESSION['banner_success'])): ?>

<script>

const Toast = Swal.mixin({
  toast: true,
  position: 'top-end',
  showConfirmButton: false,
  timer: 1400,
  timerProgressBar: true,
  didOpen: (toast) => {
    toast.addEventListener('mouseenter', Swal.stopTimer)
    toast.addEventListener('mouseleave', Swal.resumeTimer)
  }
})

Toast.fire({
  icon: 'success',
  title: '<?=$_SESSION['banner_success']?>'
})


</script>
<?php endif ?>

<?php unset($_SESSION['banner_success']) ?>




<?php if(isset($_SESSION['banner_edit'])): ?>

<script>

Swal.fire({
  position: 'top-end',
  icon: 'success',
  title: 'Your work has been saved',
  showConfirmButton: false,
  timer: 1500
})

</script>
<?php endif ?>

<?php unset($_SESSION['banner_edit']) ?>


