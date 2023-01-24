<nav class="navbar navbar-expand-lg navbar-dark bg-dark" style="    position: sticky;z-index:1;
    width: 100%;
    top: 0;">
    <div class="container-fluid">
        <a class="navbar-brand" href="#"><img src="imgg/logo13.png"
                style="height: 3rem; width: 5rem;    border-radius: 1rem;" alt=""></a>
        <a class="navbar-brand heading1" href="#">SRI-DATIA</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="admin_home.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="admin_log.php">Students Log</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="admin_students.php">Enrolled Students</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="manage_students.php">Manage Students</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="devices.php">Devices</a>
                </li>
                <li class="nav-item">
                    <?php  
                  if (isset($_SESSION['Admin-name'])) {
                    echo '<a class="nav-link">'.$_SESSION['Admin-name'].'</a>';
                  }
                  else{
                    header("location: login.php");
                    exit();
                  }
                ?>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="logout.php">Logout</a>
                </li>
            </ul>
        </div>
    </div>
</nav>