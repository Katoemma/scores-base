<?php  
    include "connect.php";
    $qry = mysqli_query($con, "SELECT * FROM admin");
    if(mysqli_num_rows($qry) < 1){
        header("Location: signup.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <form method="post" action="login.php">
        <input type="email" name="email" placeholder="email">
        <input type="password" name="password" placeholder="password">
        <input type="submit" value="Login">
    </form>
</body>
</html>
