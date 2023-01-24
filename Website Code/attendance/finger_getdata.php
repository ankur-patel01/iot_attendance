<?php
//Connect to database
require 'connectDB.php';

if (isset($_POST['FingerID'])) {

    $fingerID = $_POST['FingerID'];

    $sql = "SELECT * FROM unusers WHERE fingerprint_id=?";
    $result = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($result, $sql)) {
        echo "SQL_Error_Select_finger";
        exit();
    } else {
        mysqli_stmt_bind_param($result, "s", $fingerID);
        mysqli_stmt_execute($result);
        $resultl = mysqli_stmt_get_result($result);
        if ($row = mysqli_fetch_assoc($resultl)) {
            //An existed fingerprint has been detected 
            if (!empty($row['name'])) {
                $Number = $row['enrollno'];
                $sql = "SELECT * FROM user_logs WHERE fingerprint_id=? AND finger_date=CURDATE() ";
                $result = mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($result, $sql)) {
                    echo "SQL_Error_Select_logs";
                    exit();
                } else {
                    mysqli_stmt_bind_param($result, "i", $fingerID);
                    mysqli_stmt_execute($result);
                    $resultl = mysqli_stmt_get_result($result);
                    //*****************************************************
                    //Login
                    if (!$row = mysqli_fetch_assoc($resultl)) {
                        $sql = "UPDATE `user_logs` SET `fingerprint_id` = ?, `finger_date` = CURRENT_DATE(), `finger_time` = CURRENT_TIME() WHERE `user_logs`.`enrollno` = ?;";
                        $result = mysqli_stmt_init($conn);
                        if (!mysqli_stmt_prepare($result, $sql)) {
                            echo "SQL_Error_Select_login1";
                            exit();
                        } else {
                            mysqli_stmt_bind_param($result, "ds", $fingerID, $Number);
                            mysqli_stmt_execute($result);

                            echo "login";
                            exit();
                        }
                    }
                    //*****************************************************

                    else {
                        exit();
                    }
                }
            }  
            





            
            
            
            
            
            
            else {

                exit();
            }
        } else {


            exit();
        }
    }
}

if (isset($_POST['Get_Fingerid'])) {

    if ($_POST['Get_Fingerid'] == "get_id") {
        $sql= "SELECT fingerprint_id FROM fusers WHERE add_fingerid=1 AND enrollno=''";
        $result = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($result, $sql)) {
            echo "SQL_Error_Select";
            exit();
        }
        else{
            mysqli_stmt_execute($result);
            $resultl = mysqli_stmt_get_result($result);
            if ($row = mysqli_fetch_assoc($resultl)) {
                echo "add-id".$row['fingerprint_id'];
                exit();
            }
            else{
                echo "Nothing";
                exit();
            }
        }
    }
    else{
        exit();
    }
}

if (!empty($_POST['confirm_id'])) {

    $fingerid = $_POST['confirm_id'];

    $sql="UPDATE fusers SET fingerprint_select=0 WHERE fingerprint_select=1";
    $result = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($result, $sql)) {
        echo "SQL_Error_Select";
        exit();
    }
    else{
        mysqli_stmt_execute($result);
        
        $sql="UPDATE fusers SET add_fingerid=0, fingerprint_select=1 WHERE fingerprint_id=?";
        $result = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($result, $sql)) {
            echo "SQL_Error_Select";
            exit();
        }
        else{
            mysqli_stmt_bind_param($result, "s", $fingerid);
            mysqli_stmt_execute($result);
            echo "Fingerprint has been added!";
            exit();
        }
    }  
}



if (isset($_POST['DeleteID'])) {

    if ($_POST['DeleteID'] == "check") {
        $sql = "SELECT fingerprint_id FROM unusers WHERE del_fingerid=1";
        $result = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($result, $sql)) {
            echo "SQL_Error_Select";
            exit();
        }
        else{
            mysqli_stmt_execute($result);
            $resultl = mysqli_stmt_get_result($result);
            if ($row = mysqli_fetch_assoc($resultl)) {
                
                echo "del-id".$row['fingerprint_id'];

                $sql = "DELETE FROM unusers WHERE del_fingerid=1";
                $result = mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($result, $sql)) {
                    echo "SQL_Error_delete";
                    exit();
                }
                else{
                    mysqli_stmt_execute($result);
                    exit();
                }
            }
            else{
                echo "nothing";
                exit();
            }
        }
    } else {
        exit();
    }
}
