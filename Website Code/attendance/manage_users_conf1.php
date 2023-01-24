<?php
//Connect to database
require 'connectDB.php';

// select finger
if (isset($_GET['select'])) {

    $Finger_id = $_GET['Finger_id'];

    $sql = "SELECT fingerprint_select FROM fusers WHERE fingerprint_select=1";
    $result = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($result, $sql)) {
        echo "SQL_Error_Select";
        exit();
    } else {
        mysqli_stmt_execute($result);
        $resultl = mysqli_stmt_get_result($result);
        if ($row = mysqli_fetch_assoc($resultl)) {

            $sql = "UPDATE fusers SET fingerprint_select=0";
            $result = mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($result, $sql)) {
                echo "SQL_Error_Select";
                exit();
            } else {
                mysqli_stmt_execute($result);

                $sql = "UPDATE fusers SET fingerprint_select=1 WHERE fingerprint_id=?";
                $result = mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($result, $sql)) {
                    echo "SQL_Error_select_Fingerprint";
                    exit();
                } else {
                    mysqli_stmt_bind_param($result, "s", $Finger_id);
                    mysqli_stmt_execute($result);

                    echo "User Fingerprint selected";
                    exit();
                }
            }
        } else {
            $sql = "UPDATE fusers SET fingerprint_select=1 WHERE fingerprint_id=?";
            $result = mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($result, $sql)) {
                echo "SQL_Error_select_Fingerprint";
                exit();
            } else {
                mysqli_stmt_bind_param($result, "s", $Finger_id);
                mysqli_stmt_execute($result);

                echo "User Fingerprint selected";
                exit();
            }
        }
    }
}
if (isset($_POST['Add'])) {

    $Number = $_POST['number'];
    $finger = $_POST['fingerid'];


    if (!empty($Number)) {
        //check if there any user had already the  Number
        $sql = "SELECT enrollno FROM unusers WHERE fingerprint_id=?";
        $result = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($result, $sql)) {
            echo "SQL_Error";
            exit();
        } else {
            mysqli_stmt_bind_param($result, "i", $finger);
            mysqli_stmt_execute($result);
            $resultl = mysqli_stmt_get_result($result);
            if (!$row = mysqli_fetch_assoc($resultl)) {
                //update detailsss
                $sql = "UPDATE unusers SET fingerprint_id=?, finger_date=CURDATE(), finger_time=CURTIME() WHERE enrollno=?";
                $result = mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($result, $sql)) {
                    echo "SQL_Error_select_Fingerprint";
                    exit();
                } else {
                    mysqli_stmt_bind_param($result, "is", $finger, $Number);
                    mysqli_stmt_execute($result);
                    $sql = "DELETE FROM `fusers` WHERE `fusers`.`fingerprint_id` = ?";
                    $result = mysqli_stmt_init($conn);
                    if (!mysqli_stmt_prepare($result, $sql)) {
                        echo "SQL_Error_select_Fingerprint";
                        exit();
                    } else {
                        mysqli_stmt_bind_param($result, "i", $finger);
                        mysqli_stmt_execute($result);
                        exit();
                    }
                    echo "A new User has been added!";
                    exit();
                }
            } else {
                echo "The enrollment number is already taken!";
                exit();
            }
        }
    } else {
        echo "Empty Fields";
        exit();
    }
}


//Add user Fingerprint
if (isset($_POST['Add_fingerID'])) {

    $fingerid = $_POST['fingerid'];

    if ($fingerid == 0) {
        echo "Enter a Fingerprint ID!";
        exit();
    } else {
        if ($fingerid > 0 && $fingerid < 128) {
            $sql = "SELECT fingerprint_id FROM fusers WHERE fingerprint_id=?";
            $result = mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($result, $sql)) {
                echo "SQL_Error";
                exit();
            } else {
                mysqli_stmt_bind_param($result, "i", $fingerid);
                mysqli_stmt_execute($result);
                $resultl = mysqli_stmt_get_result($result);
                if (!$row = mysqli_fetch_assoc($resultl)) {

                    $sql = "SELECT add_fingerid FROM fusers WHERE add_fingerid=1";
                    $result = mysqli_stmt_init($conn);
                    if (!mysqli_stmt_prepare($result, $sql)) {
                        echo "SQL_Error";
                        exit();
                    } else {
                        mysqli_stmt_execute($result);
                        $resultl = mysqli_stmt_get_result($result);
                        if (!$row = mysqli_fetch_assoc($resultl)) {

                            //update details
                            $sql = "INSERT INTO fusers (fingerprint_id, add_fingerid) VALUES (?, 1)";
                            $result = mysqli_stmt_init($conn);
                            if (!mysqli_stmt_prepare($result, $sql)) {
                                echo "SQL_Error";
                                exit();
                            } else {
                                mysqli_stmt_bind_param($result, "i", $fingerid);
                                mysqli_stmt_execute($result);
                                echo "The ID is ready to get a new Fingerprint";
                                exit();
                            }
                        } else {
                            echo "You can't add more than one ID each time";
                        }
                    }
                } else {
                    echo "This ID is already exist!";
                    exit();
                }
            }
        } else {
            echo "The Fingerprint ID must be between 1 & 127";
            exit();
        }
    }
}


// delete user 
if (isset($_POST['delete'])) {
    $enrollno = $_POST['enrollno'];
    $sql = "SELECT * FROM unusers WHERE enrollno=?";
    $result = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($result, $sql)) {
        echo "SQL_Error_Select";
        exit();
    } else {
        mysqli_stmt_bind_param($result, "s", $enrollno);
        mysqli_stmt_execute($result);

        $resultl = mysqli_stmt_get_result($result);
        if ($row = mysqli_fetch_assoc($resultl)) {
            $sql = "UPDATE unusers SET del_fingerid=1 WHERE enrollno=?";
            $result = mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($result, $sql)) {
                echo "SQL_Error_delete";
                exit();
            } else {
                mysqli_stmt_bind_param($result, "s", $enrollno);
                mysqli_stmt_execute($result);
                echo "The User has been removed";
                exit();
            }
        } else {
            echo "Select a User to remove";
            exit();
        }
    }
}
