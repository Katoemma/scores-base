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
        <form method="post" action="insert.php" class="flex flex-col gap-12 w-1/4  p-6 border-4 border-greener rounded-xl self-center">
            <input type="text" class="p-4 rounded" name="fn" placeholder="First Name" required>
            <input type="text" class="p-4 rounded" name="ln" placeholder="Last Name" required>
            <input type="email" class="p-4 rounded" name="email" placeholder="Email" required>
            <input type="password" class="p-4 rounded" name="password" id="pass" placeholder="Password" required>
            <input type="password" class="p-4 rounded" name="cfmpass" id="conf-pass" placeholder="Confirm password" oninput="confirmPass()" required>
            
            <button type="submit" id="signbtn" class="p-4 bg-greener rounded text-white text-xl font-bold cursor-not-allowed" disabled>Sign Up</button>
        </form>
    </div>

    <script>
        function confirmPass(){
            let pass = document.getElementById("pass").value;
            let cfrpass = document.getElementById("conf-pass").value;
            let btn = document.getElementById("signbtn");

            if (pass != cfrpass){
                btn.disabled = true;
                btn.style.cursor = "not-allowed";
                btn.style.backgroundColor = "#ccffcc";
            }
            else{
                btn.disabled = false;
                btn.style.cursor = "pointer";
                btn.style.backgroundColor = "#009900";
               
            }
        }

    </script>
</body>
</html>
