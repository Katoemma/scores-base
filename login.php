<?php
    session_start();
    //including a file that connects to the server and the database
    include "connect.php";

    //getting values from the HTML form
    $email = $_POST['email'];
    $pass = $_POST['password'];
    
    //fetching data from the db
    $query = mysqli_query($con, 
        "SELECT * FROM admin WHERE email = '$email' AND password = '$pass'"
    );
    $rows = mysqli_num_rows($query);
    if($rows == 1){
        $_SESSION['email'] = $email;
        header("location: dashboard.php");
    }
    else{

        $qry = mysqli_query($con, 
        "SELECT * FROM judge WHERE email = '$email' AND password = '$pass'"
        );
        $rws = mysqli_num_rows($qry);
        if($rws == 1){
            $_SESSION['email'] = $email;
            header("location: judgeDashboard.php");
        }
        else{
            header("location: index.php");
        }
    }
?>