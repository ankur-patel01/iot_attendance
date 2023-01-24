<?php
//Connect to database
require 'connectDB.php';

//Add user
if (isset($_POST['Add'])) {

    $user_id = $_POST['user_id'];
    $Uname = $_POST['name'];
    $Ucard = $_POST['card_uid'];
    $Udate = $_POST['user_date'];
    $Number = $_POST['enrollno'];
    $Email = $_POST['email'];
    $Branch = $_POST['branch'];
    $Year = $_POST['year'];


    if (!empty($Uname) && !empty($Number) && !empty($Email)) {
        //check if there any user had already the Serial Number
        $sql = "SELECT enrollno FROM unusers WHERE enrollno=? AND card_uid=?";
        $result = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($result, $sql)) {
            echo "SQL_Error";
            exit();
        } else {
            mysqli_stmt_bind_param($result, "ss", $Number, $Ucard);
            mysqli_stmt_execute($result);
            $resultl = mysqli_stmt_get_result($result);
            if (!$row = mysqli_fetch_assoc($resultl)) {

                $sql = "INSERT INTO `unusers` (`id`, `name`, `enrollno`, `email`, `card_uid`, `card_select`, `user_date`, `device_uid`, `device_dep`, `add_card`, `branch`, `year`) VALUES (NULL, ?, ?, ?, ?, '0', CURRENT_DATE(), 'f1ef76a8aaa150d0', 'BTECH', '0', ?, ?);";
                // $sql="UPDATE users SET username=?, serialnumber=?, gender=?, email=?, user_date=CURDATE(), device_uid=?, device_dep=?, add_card=1 WHERE id=?";
                $result = mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($result, $sql)) {
                    echo "SQL_Error_select_card";
                    exit();
                } else {
                    mysqli_stmt_bind_param($result, "ssssss", $Uname, $Number, $Email, $Ucard, $Branch, $Year);
                    mysqli_stmt_execute($result);
                    echo 1;
                    $sql1 = "DELETE FROM `new_users` WHERE `new_users`.`card_uid` = ?";
                    $result1 = mysqli_stmt_init($conn);
                    if (!mysqli_stmt_prepare($result1, $sql1)) {
                        echo "SQL_Error_select_card";
                        exit();
                    } else {
                        mysqli_stmt_bind_param($result1, "s", $Ucard);
                        mysqli_stmt_execute($result1);
                        echo 1;
                        exit();
                    }
                    exit();
                }
            } else {
                echo "The enroll number is already filled!";
                exit();
            }
        }
    } else {
        echo "Empty Fields";
        exit();
    }
}
// Update an existance user 
if (isset($_POST['Update'])) {


    $user_id = $_POST['user_id'];
    $Uname = $_POST['name'];
    $Number = $_POST['enrollno'];
    $Email = $_POST['email'];
    $dev_uid = $_POST['dev_uid'];
    $Branch = $_POST['branch'];
    $Year = $_POST['year'];

    //check if there any selected user
    $sql = "SELECT add_card FROM unusers WHERE id=?";
    $result = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($result, $sql)) {
        echo "SQL_Error";
        exit();
    } else {
        mysqli_stmt_bind_param($result, "i", $user_id);
        mysqli_stmt_execute($result);
        $resultl = mysqli_stmt_get_result($result);
        if ($row = mysqli_fetch_assoc($resultl)) {

            if ($row['add_card'] == 0) {
                echo "First, You need to add the User!";
                exit();
            } else {
                if (empty($Uname) && empty($Number) && empty($Email)) {
                    echo "Empty Fields";
                    exit();
                } else {
                    //check if there any user had already the Serial Number
                    $sql = "SELECT card_uid FROM unusers WHERE card_uid=? AND enrollno=?";
                    $result = mysqli_stmt_init($conn);
                    if (!mysqli_stmt_prepare($result, $sql)) {
                        echo "SQL_Error";
                        exit();
                    } else {
                        mysqli_stmt_bind_param($result, "ss", $Ucard, $enrollno);
                        mysqli_stmt_execute($result);
                        $resultl = mysqli_stmt_get_result($result);
                        if (!$row = mysqli_fetch_assoc($resultl)) {
                            $sql = "SELECT device_dep FROM devices WHERE device_uid=?";
                            $result = mysqli_stmt_init($conn);
                            if (!mysqli_stmt_prepare($result, $sql)) {
                                echo "SQL_Error";
                                exit();
                            } else {
                                mysqli_stmt_bind_param($result, "s", $dev_uid);
                                mysqli_stmt_execute($result);
                                $resultl = mysqli_stmt_get_result($result);
                                if ($row = mysqli_fetch_assoc($resultl)) {
                                    $dev_name = $row['device_dep'];
                                } else {
                                    $dev_name = "All";
                                }
                            }

                            if (!empty($Uname) && !empty($Email)) {
                                $sql = "INSERT INTO `unusers` (`id`, `name`, `enrollno`, `email`, `card_uid`, `card_select`, `user_date`, `device_uid`, `device_dep`, `add_card`, `branch`, `year`) VALUES (NULL, ?, ?, ?, ?, '0', CURRENT_DATE(), 'f1ef76a8aaa150d0', 'BTECH', '0', ?, ?);";
                                $result = mysqli_stmt_init($conn);
                                if (!mysqli_stmt_prepare($result, $sql)) {
                                    echo "SQL_Error_select_Card";
                                    exit();
                                } else {
                                    mysqli_stmt_bind_param($result, "ssssss", $Uname, $Number, $Email, $card_uid, $Branch, $Year);
                                    mysqli_stmt_execute($result);

                                    echo 1;
                                    exit();
                                }
                            }
                        } else {
                            echo "The enroll number is already used!";
                            exit();
                        }
                    }
                }
            }
        } else {
            echo "There's no selected User to be updated!";
            exit();
        }
    }
}
// select CARD
if (isset($_GET['select'])) {

    $card_uid = $_GET['card_uid'];

    $sql = "SELECT * FROM new_users WHERE card_uid=?";
    $result = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($result, $sql)) {
        echo "SQL_Error_Select";
        exit();
    } else {
        mysqli_stmt_bind_param($result, "s", $card_uid);
        mysqli_stmt_execute($result);
        $resultl = mysqli_stmt_get_result($result);

        header('Content-Type: application/json');
        $data = array();
        if ($row = mysqli_fetch_assoc($resultl)) {
            foreach ($resultl as $row) {
                $data[] = $row;
            }
        }
        $resultl->close();
        $conn->close();
        print json_encode($data);
    }
}
// delete user 
if (isset($_POST['delete'])) {

    
    $user_id = $_POST['user_id'];

    if (empty($user_id)) {
        echo "There no selected user to remove";
        exit();
    } else {
        $sql = "DELETE FROM unusers WHERE id=?";
        $result = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($result, $sql)) {
            echo "SQL_Error_delete";
            exit();
        } else {
            mysqli_stmt_bind_param($result, "i", $user_id);
            mysqli_stmt_execute($result);
            echo 1;
            exit();
        }
    }
}


if (isset($_POST['Add_fingerID'])) {

    $fingerid = $_POST['fingerid'];
    $enrollno = $_POST['enrollno'];

    if ($fingerid == 0) {
        echo "Enter a Fingerprint ID!";
        exit();
    } else {
        if ($fingerid > 0 && $fingerid < 128) {
            
                $sql = "SELECT fingerprint_id FROM unusers WHERE fingerprint_id=? or enrollno=?";
                $result = mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($result, $sql)) {
                    echo "SQL_Error";
                    exit();
                } else {
                    mysqli_stmt_bind_param($result, "i", $fingerid);
                    mysqli_stmt_execute($result);
                    $resultl = mysqli_stmt_get_result($result);
                    if (!$row = mysqli_fetch_assoc($resultl)) {

                        $sql = "UPDATE `unusers` SET `fingerprint_id` = ?, `finger_date` = CURRENT_DATE(), `finger_time` = CURRENT_TIME() WHERE `unusers`.`enrollno` = ?;";
                        $result = mysqli_stmt_init($conn);
                        if (!mysqli_stmt_prepare($result, $sql)) {
                            echo "SQL_Error";
                            exit();
                        } else {
                            mysqli_stmt_bind_param($result, "ds", $fingerid,$enrollno);
                            mysqli_stmt_execute($result);
                            if (!$row = mysqli_fetch_assoc($resultl)) {
                                echo "Invalid";
                            }
                            exit();
                        }
                    } else {
                        echo "This ID or user already exists!";
                        exit();
                    }
                }
            
        } else {
            echo "The Fingerprint ID must be between 1 & 127";
            exit();
        }
    }
}
