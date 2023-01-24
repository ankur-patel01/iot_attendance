<?php
//Connect to database
require 'connectDB.php';

$output = '';

if (isset($_POST["To_Excel"])) {
    $_SESSION['yrsel'] = $_POST['yr_sel'];
    $_SESSION['brsel'] = $_POST['br_sel'];
  }
  $yrrsel = $_SESSION['yrsel'];
  $brrsel = $_SESSION['brsel'];
  
if ($brrsel == "0" and $yrrsel == "0") {
  $sql = "SELECT * FROM unusers ORDER BY `name`;";
} else if ($brrsel == "0") {
  $sql = "SELECT * FROM unusers WHERE year='$yrrsel' ORDER BY `name`";
} else if ($yrrsel == "0") {
  $sql = "SELECT * FROM unusers WHERE branch='$brrsel' ORDER BY `name`";
} else {
  $sql = "SELECT * FROM unusers WHERE year='$yrrsel' AND branch='$brrsel' ORDER BY `name`";
}
    $result = mysqli_query($conn, $sql);
    $ctr=0;
    if ($result->num_rows > 0) {
        $output .= '
                    <table class="table table-bordered">  
                            <tr>
                                <th>S.No</th>
                                <th>Enrollment No</th>
                                <th>Name</th>
                                <th>Finger ID</th>
                                <th>Branch</th>
                                <th>Year</th>
                                <th>Time</th>
                                <th>Date</th>
                            </tr>';

        while ($row = $result->fetch_assoc()) {
            $ctr++;
            $output .= '
                  <tr>
                    <td>' . $ctr . '</td>
                    <td>' . $row['enrollno'] . '</td>
                    <td>' . $row['name'] . '</td>
                    <td>' . $row['fingerprint_id'] . '</td>
                    <td>' . $row['branch'] . '</td>
                    <td>' . $row['year'] . '</td>
                    <td>' . $row['finger_time'] . '</td>
                    <td>' . $row['user_date'] . '</td>
                </tr>';
        }
        $output .= '</table>';
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment; filename=enrollstd'.$yrsel.'(' . $brsel . ').xls');

        echo $output;
        exit();
    } else {
        header("location: admin_students.php");
        exit();
    }
?>