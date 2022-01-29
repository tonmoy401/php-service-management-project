<?php
session_start();
 //error_reporting(0);
    require_once('../header.php');
    require_once('navbar.php');
    require_once('../db.php');
    if(!isset($_SESSION['user_status'])){
      header('location:../login.php');
    }
?>

<?php
$get_query = "SELECT email,phone,company,job,city,country FROM users";
$from_db =mysqli_query($db_connect,$get_query);
?>

<section>
  <div class="container">
    <div class="row">
      <div class="col-lg-10 m-auto">
          <div class="card mt-4">
            <div class="card-header">
                    <h1 class="card-title">All Users List</h1>
            </div>
                                  
               <table class="table table-striped table-hover">
                   <thead>
                      <tr>
                        <th scope="col">Email</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Company</th>
                        <th scope="col">Job</th>
                        <th scope="col">City</th>
                        <th scope="col">Country</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                        foreach($from_db AS $user){                      
                      ?>
                          <tr>
                            <td><?=$user['email']?></td>
                            <td><?=$user['phone']?></td>
                            <td><?=$user['company']?></td>
                            <td><?=$user['job']?></td>
                            <td><?=$user['city']?></td>
                            <td><?=$user['country']?></td>
                          </tr>
                      <?php
                        }                      
                      ?>
                    <tbody>
               </table>







          
          <div class="card-body">

                    
          </div>

        </div>
      </div>
    </div>
  </div>
</section>













<?php
    require_once('../footer.php');
?>

<?php if(isset($_SESSION['login_success'])): ?>
<script>

const Toast = Swal.mixin({
  toast: true,
  position: 'top-end',
  showConfirmButton: false,
  timer: 1600,
  timerProgressBar: true,
  didOpen: (toast) => {
    toast.addEventListener('mouseenter', Swal.stopTimer)
    toast.addEventListener('mouseleave', Swal.resumeTimer)
  }
})

Toast.fire({
  icon: 'success',
  title: '<?=$_SESSION['login_success']?>'
})

</script>

<?php endif ?>
<?php unset($_SESSION['login_success']) ?>