<?php
    session_start();
    if(!isset($_SESSION['email'])){ // checking if there is a set session with an email value
        header("Location: index.php");
    }
    // including a connection file/script to the server and the database
    include "connect.php";
    //----------Create a password------------
    //fetch the id from the database
    $query = mysqli_query($con, "SELECT * FROM judge WHERE id IN(SELECT MAX(id) FROM judge)") or die("Failed to fetch id :".mysqli_error($con));
    $array = mysqli_fetch_array($query);
    $i = $array['id'];
    $f = $array['fname'];
    //concatenate the first name with the id
    $pass = $f.$i;
    //update the judge table in the db with the password value
    mysqli_query($con, "UPDATE judge SET password = '$pass' WHERE id = '$i'") 
    or die("Failed to create password: ".mysqli_error($con));

    print "Judge added Successfully!<br>Pass: ".$pass;
?>