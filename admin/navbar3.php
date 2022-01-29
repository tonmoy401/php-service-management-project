<nav class="navbar navbar-expand-lg navbar-light bg-primary">
  <div class="container">
    <a class="navbar-brand text-white" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
      <li class="nav-item">
          <a class="nav-link active text-dark" aria-current="page" href="dashboard.php">dashboard</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active text-dark" aria-current="page" href="../index.php">visit website</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle text-dark" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          frontend
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="guest_massage.php">
            <?php
               require_once('../db.php');
               $get_massage_notification_query="SELECT COUNT(*) AS message_noti FROM guest_massage WHERE read_status=2";
               $from_db = mysqli_query($db_connect,$get_massage_notification_query);
               $after_assoc = mysqli_fetch_assoc($from_db);
              ?>
            guest massage<span class="badge bg-warning"><?=$after_assoc['message_noti']?></span></a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="banner.php">banner upload</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="service_head.php">Change Service Heading</a></li>
            <li><a class="dropdown-item" href="service_item.php">Service Item Upload</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="fun_facts.php">Fun Facts update</a></li>
            <li><a class="dropdown-item" href="fun_facts_num.php">Fun Facts Number update</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="social_media.php">Social Media</a></li>
          </ul>
        </li>
      </ul>
                    <div class="dropdown">
                <a class="btn btn-primary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                <?=$_SESSION['email']?>
                </a>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                <li><a class="dropdown-item" href="profile.php">Profile</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="change_pass.php">Password Change</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item text-danger" href="../logout.php">Logout</a></li>
                </ul>
              </div>
    </div>
  </div>
</nav> 
