<?php
    session_start(); //seesion_start() function has to always be the firt line to ensure that everything is protected
    if(!isset($_SESSION['email'])){ // checking if there is a set session with an email value
        header("Location: index.php");
    }
    include "connect.php";

    $ri = $_POST['item'];
    $id = $_POST['description'];
    $rd = $_POST['division'];
    $rc = $_POST['category'];
    $is = $_POST['score'];

    if($rd == 'B')
        $table = "beginner";
    elseif($rd == 'J')
        $table = "junior";
    elseif($rd == 'S')
        $table = "senior";
    mysqli_query($con, "INSERT INTO $table (item, description, category, score) VALUES('$ri', '$id','$rc', '$is')") 
        or die("Failed to add Rubric Item: ".mysqli_error($con));
    
    header("Location: dashboard.php");
?>