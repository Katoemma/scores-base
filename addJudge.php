<?php
    session_start();
    if(!isset($_SESSION['email'])){ // checking if there is a set session with an email value
        header("Location: index.php");
    }
    // including a connection file/script to the server and the database
    include "connect.php";
    // fetching data from the html form
    $fn = $_POST['fname'];
    $ln = $_POST['lname'];
    $em = $_POST['email'];
    //inserting data into the database
    mysqli_query($con, "INSERT INTO judge (fname, lname, email) VALUES('$fn','$ln','$em')") 
    or die("Failed to add Judge: ".mysqli_error($con));
    print "Judge info added !";
    header("location: createpass.php");
?>