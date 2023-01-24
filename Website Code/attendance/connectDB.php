<?php
    $servername="localhost";
    $username="root";
    $password="";
    $dbname="sri_attendance";

    $conn=mysqli_connect($servername,$username,$password,$dbname);

    if($conn->connect_error){
        die("Sorry for the Inconvinience! Connection Failed!!!" . $conn->connect_error);
    } 
?>