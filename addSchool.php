<?php
    session_start();
    if(!isset($_SESSION['email'])){ // checking if there is a set session with an email value
        header("Location: index.php");
    }
    // including a connection file/script to the server and the database
    include "connect.php";
    // fetching data from the html form
    $s = $_POST['sname'];
    $d = $_POST['district'];
    $r = $_POST['region'];
    //inserting data into the database
    mysqli_query($con, "INSERT INTO school (name, district, region) VALUES('$s','$d','$r')") 
    or die("Failed to add School: ".mysqli_error($con));
    print "School info added !";
    header("location: dashboard.php");
?>