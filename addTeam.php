<?php
    session_start();
    if(!isset($_SESSION['email'])){ // checking if there is a set session with an email value
        header("Location: index.php");
    }
    // including a connection file/script to the server and the database
    include "connect.php";
    // fetching data from the html form
    $t = $_POST['tname'];
    $d = $_POST['division'];
    $s = $_POST['school'];
    //inserting data into the database
    mysqli_query($con, "INSERT INTO team (name, division, school) VALUES('$t','$d','$s')") 
    or die("Failed to add Team: ".mysqli_error($con));
    print "Team info added !";
    header("location: dashboard.php");
?>