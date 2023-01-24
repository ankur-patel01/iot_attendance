<?php
//Connect to database
require 'connectDB.php';

$output = '';

if (isset($_POST["To_Excel"])) {

    if (empty($_POST['date_sel'])) {

        $Log_date = date("Y-m-d");
    } else if (!empty($_POST['date_sel'])) {

        $seldate  = $_POST['date_sel'];
        $yrsel    = $_POST['yr_sel'];
        $brsel    = $_POST['br_sel'];
    }
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
                    <td>' . $row['checkindate'] . '</td>
                </tr>';
        }
        $output .= '</table>';
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment; filename=User_Log' . $seldate . '.xls');

        echo $output;
        exit();
    } else {
        header("location: staff_logs.php");
        exit();
    }
?>