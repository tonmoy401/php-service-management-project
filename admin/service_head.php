<?php
    session_start();
    require_once('../header.php');
    require_once('../db.php');
    require_once('navbar.php');
    if(!isset($_SESSION['user_status'])){
        header('location:../login.php');
    }
     //get data from form
     $get_query = "SELECT * FROM service_heads";
     $from_db = mysqli_query($db_connect,$get_query);

?>
<section>
<div class="container">
    <div class="row mt-4">
        <div class="col-lg-3">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title text-capitalize">Service Heading add form</h5>
                </div>
                <div class="card-body">

                    <form action="service_head_post.php" method="post">
                            <div class="mb-3">
                                <label class="text-capitalize text-primary">Black Heading</label>
                                <input type="text" class="form-control" name="black_heading" required>
                            </div>
                            <div class="mb-3">
                                <label class="text-capitalize text-primary">Green Heading</label>
                                <input type="text" class="form-control" name="green_heading" required>
                            </div>
                            <div class="mb-3">
                                <label class="text-capitalize text-primary">Sub Heading</label>
                                <input type="text" class="form-control" name="service_sub_heading" required>
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary">Edit Heading</button>
                            </div>
                    </form>
                </div>
            </div>                
        </div>
        <div class="col-lg-9">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title text-capitalize">heading list</h5>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <th>SL</th>
                            <th>Black Heading</th>
                            <th>Green Heading</th>
                            <th>Sub Heading</th>
                            <th>Active Status</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            <?php
                              foreach($from_db as $key => $serhead):
                            ?>
                           <tr>
                               <td><?=$key+1?></td>
                               <td><?=$serhead['black_heading']?></td>
                               <td><?=$serhead['green_heading']?></td>
                               <td><?=$serhead['service_sub_heading']?></td>
                               <td>
                                   <?php
                                   if($serhead['active_status'] == 1):
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
                                   if($serhead['active_status'] == 2):
                                   ?>
                                    <a href="service_head_active.php?service_head_id=<?=$serhead['id']?>"
                                    class="btn btn-sm btn-primary">Make Active</a>
                                    <?php
                                     else:
                                   ?>
                                   <a href="service_head_deactive.php?service_head_id=<?=$serhead['id']?>"
                                    class="btn btn-sm btn-warning">Make De-Active</a>
                                    <?php
                                   endif
                                   ?> 
                               <td>
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                    <a href="service_head_edit.php?service_head_id=<?=$serhead['id']?>"
                                     class="btn btn-sm btn-info">Edit</a>

                                    <!-- <a href="service_head_delete.php?service_head_id=<?=$serhead['id']?>"
                                     class="btn btn-sm btn-danger">Delete</a> -->
                                     <button value="service_head_delete.php?service_head_id=<?=$serhead['id']?>" type="button" 
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
<?php if(isset($_SESSION['shead_success'])): ?>

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
  title: '<?=$_SESSION['shead_success']?>'
})


</script>
<?php endif ?>

<?php unset($_SESSION['shead_success']) ?>




<?php if(isset($_SESSION['shead_edit'])): ?>

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

<?php unset($_SESSION['shead_edit']) ?>