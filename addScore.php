<?php
    session_start(); //seesion_start() function has to always be the firt line to ensure that everything is protected
    if(!isset($_SESSION['email'])){ // checking if there is a set session with an email value
        header("Location: index.php");
    }
    else{
        include "connect.php";
        $e = $_SESSION['email'];
        $q = mysqli_query($con, 
            "SELECT id, fname, lname FROM judge WHERE email = '$e'"
        ) or die("Failed to fetch user data: ".mysqli_error($con)); // the or die() method is executed in case of an error
        $a = mysqli_fetch_array($q);
        $j_id = $a['id'];
    }
    $team = $_POST['team'];
    $rubric_item = $_POST['item'];
    $rubric_score = $_POST['score'];
    $table = $_POST['score-table'];

    mysqli_query($con, "INSERT INTO $table (team, rubric, judge, score) 
    VALUES('$team', '$rubric_item', '$j_id', '$rubric_score')") or die("Failed to add score: ".mysqli_error($con));
    print "Score added successfully!";
    header("location: judgeDashboard.php");
    
?>