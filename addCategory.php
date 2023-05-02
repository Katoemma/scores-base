<?php
    session_start(); //seesion_start() function has to always be the firt line to ensure that everything is protected
    if(!isset($_SESSION['email'])){ // checking if there is a set session with an email value
        header("Location: index.php");
    }
    include "connect.php";

    $cn = $_POST['cname'];
    $cd = $_POST['description'];

    mysqli_query($con, "INSERT INTO category (name, description) VALUES('$cn', '$cd')") 
    or die("Failed to add Category: ".mysqli_error($con));
    header("Location: dashboard.rubrics.php");
?>