<?php
session_start();
if (isset($_SESSION['Admin-name']))  {
  header("location: admin_home.php");
}
else if (isset($_SESSION['Staff-name'])) {
    header("location: staff_home.php");
}
else {
    header("location: login.php");
}
?>