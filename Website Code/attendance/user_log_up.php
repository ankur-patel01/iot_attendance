<!-- <table class="table table-info table-striped">
  <tbody> -->
<?php

session_start();
//Connect to database
require 'connectDB.php';

if (isset($_POST['log_date'])) {
  if ($_POST['date_sel'] != 0) {
    $_SESSION['seldate'] = $_POST['date_sel'];
    $_SESSION['yrsel'] = $_POST['yr_sel'];
    $_SESSION['brsel'] = $_POST['br_sel'];
    
  } else {
    $_SESSION['seldate'] = date("Y-m-d");
  }
}

if ($_POST['select_date'] == 1) {
  $_SESSION['seldate'] = date("Y-m-d");
} else if ($_POST['select_date'] == 0) {
  $seldate = $_SESSION['seldate'];
  $yrsel = $_SESSION['yrsel'];
  $brsel = $_SESSION['brsel'];
}





if ($brsel == "0" and $yrsel == "0") {
  $sql = "SELECT * FROM user_logs WHERE checkindate='$seldate' ORDER BY timein DESC";
} else if ($brsel == "0") {
  $sql = "SELECT * FROM user_logs WHERE year='$yrsel' AND checkindate='$seldate' ORDER BY timein DESC;";
} else if ($yrsel == "0") {
  $sql = "SELECT * FROM user_logs WHERE branch='$brsel' AND checkindate='$seldate' ORDER BY timein DESC;";
} else {
  $sql = "SELECT * FROM user_logs WHERE year='$yrsel' AND branch='$brsel' AND checkindate='$seldate' ORDER BY timein DESC;";
}
$result = mysqli_stmt_init($conn);
if (!mysqli_stmt_prepare($result, $sql)) {
  echo '<p class="error">SQL Error</p>';
} else {
  mysqli_stmt_execute($result);
  $resultl = mysqli_stmt_get_result($result);
  if (mysqli_num_rows($resultl) > 0) {
    $ctr = 0;

    while ($row = mysqli_fetch_assoc($resultl)) {
?>
      <tr>
        <th scope="row"><?php $ctr++;
                        echo $ctr; ?></th>
        <td><?php echo $row['enrollno']; ?></td>
        <td><?php echo $row['name']; ?></td>
        <td><?php echo $row['fingerprint_id']; ?></td>
        <td><?php echo $row['branch']; ?></td>
        <td><?php echo $row['year']; ?></td>
        <td><?php echo $row['finger_time']; ?></td>
        <td><?php echo $row['checkindate']; ?></td>
      </tr>
<?php
    }
  }
}
?>
<!-- </tbody>
</table> -->