<?php
    session_start(); //seesion_start() function has to always be the firt line to ensure that everything is protected
    if(!isset($_SESSION['email'])){ // checking if there is a set session with an email value
        header("Location: index.php");
    }
    include "connect.php";
    $f = $_POST['fn'];
    $l = $_POST['ln'];
    $e = $_POST['email'];
    $p = $_POST['password'];
    mysqli_query($con, "INSERT INTO admin(fname, lname, email, password) VALUES('$f', '$l', '$e', '$p')")
        or die("Failed to add user data: ".mysqli_error($con));
    header("Location: index.php");
?>