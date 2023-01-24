<?php
//Connect to database
require 'connectDB.php';
date_default_timezone_set('Asia/Kolkata');
$d = date("Y-m-d");
$t = date("H:i:s");

if (isset($_GET['card_uid']) && isset($_GET['device_token'])) {
    
    $card_uid = $_GET['card_uid'];
    $device_uid = $_GET['device_token'];

    $sql = "SELECT * FROM devices WHERE device_uid=?";
    $result = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($result, $sql)) {
        echo "SQL_Error_Select_device";
        exit();
    }
    else{
        mysqli_stmt_bind_param($result, "s", $device_uid);
        mysqli_stmt_execute($result);
        $resultl = mysqli_stmt_get_result($result);
        if ($row = mysqli_fetch_assoc($resultl)){
            $device_mode = $row['device_mode'];
            $device_dep = $row['device_dep'];
            if ($device_mode == 1) {
                $sql = "SELECT * FROM unusers WHERE card_uid=?";
                $result = mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($result, $sql)) {
                    echo "SQL_Error_Select_card";
                    exit();
                }
                else{
                    mysqli_stmt_bind_param($result, "s", $card_uid);
                    mysqli_stmt_execute($result);
                    $resultl = mysqli_stmt_get_result($result);
                    if ($row = mysqli_fetch_assoc($resultl)){
                        //*****************************************************
                        //An existed Card has been detected 
                        
                            if ($row['device_uid'] == $device_uid || $row['device_uid'] == 0){
                                $Uname = $row['name'];
                                $Number = $row['enrollno'];
                                $branch=$row['branch'];
                                $year=$row['year'];
                                $email=$row['email'];
                                $sql = "SELECT * FROM user_logs WHERE card_uid=? AND checkindate=?";
                                $result = mysqli_stmt_init($conn);
                                if (!mysqli_stmt_prepare($result, $sql)) {
                                    echo "SQL_Error_Select_logs";
                                    exit();
                                }
                                else{
                                    mysqli_stmt_bind_param($result, "ss", $card_uid, $d);
                                    mysqli_stmt_execute($result);
                                    $resultl = mysqli_stmt_get_result($result);
                                    //*****************************************************
                                    //Login
                                    if (!$row = mysqli_fetch_assoc($resultl)){

                                        // $sql = "INSERT INTO user_logs (name,enrollno, card_uid, device_uid, device_dep, checkindate, timein,email,branch,year) VALUES (? ,?, ?, ?, ?, ?, ?, ?,?,?,?)";
                                        $sql="INSERT INTO `user_logs` (`id`, `name`, `enrollno`, `card_uid`, `device_uid`, `device_dep`, `checkindate`, `timein`, `email`, `branch`, `year`, `fingerprint_id`, `finger_date`, `finger_time`, `del_fingerid`) VALUES (NULL, ?, ?, ?, ?, ?, CURRENT_DATE(), CURRENT_TIME(), ?, ?, ?, '', '', '', '')";
                                        $result = mysqli_stmt_init($conn);
                                        if (!mysqli_stmt_prepare($result, $sql)) {
                                            echo "SQL_Error_Select_login1";
                                            exit();
                                        }
                                        else{
                                            mysqli_stmt_bind_param($result, "ssssssss", $Uname, $Number, $card_uid, $device_uid, $device_dep, $email,$branch,$year);
                                            mysqli_stmt_execute($result);
                                            echo "login".$Uname;
                                            exit();
                                        }
                                    }
                                    //*****************************************************
                                    //available attend
                                    else{
                                        exit();
                                    }
                                }
                            }
                            else {
                                echo "Not Allowed!";
                                exit();
                            }
                        
                    }
                    else{
                        echo "Not found!";
                        exit();
                    }
                }
            }
            else if ($device_mode == 0) {
                //New Card has been added
                $sql = "SELECT * FROM unusers WHERE card_uid=?";
                $result = mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($result, $sql)) {
                    echo "SQL_Error_Select_card";
                    exit();
                }
                else{
                    mysqli_stmt_bind_param($result, "s", $card_uid);
                    mysqli_stmt_execute($result);
                    $resultl = mysqli_stmt_get_result($result);
                    //The Card is available
                    if ($row = mysqli_fetch_assoc($resultl)){
                        $sql = "SELECT card_select FROM unusers WHERE card_select=1";
                        $result = mysqli_stmt_init($conn);
                        if (!mysqli_stmt_prepare($result, $sql)) {
                            echo "SQL_Error_Select";
                            exit();
                        }
                        else{
                            mysqli_stmt_execute($result);
                            $resultl = mysqli_stmt_get_result($result);
                            
                            if ($row = mysqli_fetch_assoc($resultl)) {
                                $sql="UPDATE unusers SET card_select=0";
                                $result = mysqli_stmt_init($conn);
                                if (!mysqli_stmt_prepare($result, $sql)) {
                                    echo "SQL_Error_insert";
                                    exit();
                                }
                                else{
                                    mysqli_stmt_execute($result);

                                    $sql="UPDATE unusers SET card_select=1 WHERE card_uid=?";
                                    $result = mysqli_stmt_init($conn);
                                    if (!mysqli_stmt_prepare($result, $sql)) {
                                        echo "SQL_Error_insert_An_available_card";
                                        exit();
                                    }
                                    else{
                                        mysqli_stmt_bind_param($result, "s", $card_uid);
                                        mysqli_stmt_execute($result);

                                        echo "available";
                                        exit();
                                    }
                                }
                            }
                            else{
                                $sql="UPDATE users SET card_select=1 WHERE card_uid=?";
                                $result = mysqli_stmt_init($conn);
                                if (!mysqli_stmt_prepare($result, $sql)) {
                                    echo "SQL_Error_insert_An_available_card";
                                    exit();
                                }
                                else{
                                    mysqli_stmt_bind_param($result, "s", $card_uid);
                                    mysqli_stmt_execute($result);

                                    echo "available";
                                    exit();
                                }
                            }
                        }
                    }
                    //The Card is new
                    else{
                        $sql="UPDATE unusers SET card_select=0";
                        $result = mysqli_stmt_init($conn);
                        if (!mysqli_stmt_prepare($result, $sql)) {
                            echo "SQL_Error_insert";
                            exit();
                        }
                        else{
                            mysqli_stmt_execute($result);
                           $sql=" INSERT INTO `new_users` (`id`, `card_uid`, `card_select`, `device_uid`, `device_dap`, `user_date`, `add_card`) VALUES (NULL, ?, '1', ?, 'BTECH', CURRENT_DATE(), '0');";
                            // $sql = "INSERT INTO new_users (card_uid, card_select, device_uid, device_dep, user_date) VALUES (?, 1, ?, ?, CURDATE())";
                            $result = mysqli_stmt_init($conn);
                            if (!mysqli_stmt_prepare($result, $sql)) {
                                echo "SQL_Error_Select_add";
                                exit();
                            }
                            else{
                                mysqli_stmt_bind_param($result, "ss", $card_uid, $device_uid );
                                mysqli_stmt_execute($result);

                                echo "succesful";
                                exit();
                            }
                        }
                    }
                }    
            }
        }
        else{
            echo "Invalid Device!";
            exit();
        }
    }          
}
?>