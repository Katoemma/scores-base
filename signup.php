<?php  
    include "connect.php";
    $qry = mysqli_query($con, "SELECT * FROM admin");
    if(mysqli_num_rows($qry) > 1){
        header("Location: index.php");
    } 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<body>
    <form method="post" action="insert.php">
        <input type="text" name="fn" placeholder="First Name">
        <input type="text" name="ln" placeholder="Last Name">
        <input type="email" name="email" placeholder="Email">
        <input type="password" name="password" placeholder="Password">
        <input type="password" placeholder="Confirm password">
        <input type="submit" value="Sign up">
    </form>
</body>
</html>
