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
    //chech is judge already exists before creating an new one
    $jqry = mysqli_query($con, "SELECT * FROM judge WHERE email = '$em'") or die("Failed to get Judge:".mysqli_error($con));
    if(mysqli_num_rows($jqry) < 1){
        //inserting data into the database
        mysqli_query($con, "INSERT INTO judge (fname, lname, email) VALUES('$fn','$ln','$em')") 
        or die("Failed to add Judge: ".mysqli_error($con));
        print "Judge info added !";
        header("location: createpass.php");
    }
    else{
        //header("location: dashboard.php");
        ?><script>
            alert('Judge already registered!');
            window.location.replace('dashboard.judges.php');
        </script>
        <?php
    }
    
?>