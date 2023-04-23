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
    <!--introduction-->
    <header class="bg-white w-full h-24 flex  justify-between p-6 border-b-4 border-greener ">
        <img src="images/logo-girls.png" alt="technovation girls">
        <h1 class="text-3xl text-greener font-bold">Technovation pitch Event 2023</h1>
        <img src="images/op.png" class="" alt="o & p logo">
    </header>

    <!-- the form container-->
    <div class="flex flex-col w-full h-screen bg-blue p-12">
        <form method="post" action="login.php" class="flex flex-col gap-12 w-1/4  p-6 border-4 border-greener rounded-xl self-center">
            <input type="email" class="p-4 rounded" name="email" placeholder="email" required>
            <input type="password" class="p-4 rounded" name="password" placeholder="password" required>
            
            <button type="submit" class="p-4 bg-greener rounded text-white text-xl font-bold" >Login</button>
        </form>
    </div>
</body>
</html>
