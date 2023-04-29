<?php
    session_start(); //seesion_start() function has to always be the firt line to ensure that everything is protected
    if(!isset($_SESSION['email'])){ // checking if there is a set session with an email value
        header("Location: index.php");
    }
    else{
        include "connect.php";
        $e = $_SESSION['email'];
        $q = mysqli_query($con, 
            "SELECT fname, lname FROM admin WHERE email = '$e'"
        ) or die("Failed to fetch user data: ".mysqli_error($con)); // the or die() method is executed in case of an error
        $a = mysqli_fetch_array($q);
        $fn = $a['fname'];
        $ln = $a['lname'];
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <!--introduction-->
    <header class="bg-white w-full h-24 flex  justify-between p-6 border-b-4 border-greener ">
        <img src="images/logo-girls.png" alt="technovation girls">
        <h1 class="text-3xl text-greener font-bold">Technovation pitch Event 2023</h1>
        
        <!--profile dropdown-->
        <div class="relative inline-block group">
            <div class="flex items-center gap-2">
                <img src="images/Assets/account icon.png" class="w-12" alt="icon">
                <h1 class="text-xl cursor-pointer"><?php print $fn." ".$ln;?></h1> 
                <img src="images/Assets/expand more.png" class="w-12" alt="icon">
            </div>

            <!--dropdown content-->
            <div class="hidden absolute group-hover:block p-4 bg-lightBlue border-2 border-blue rounded w-full">
                <div class="flex flex-col gap-4">
                    <h1 class="text-xl">Do you want to Logout?</h1>
                    <a href="logout.php" class="w-full"><button class="bg-greener px-8 py-2 text-white font-bold w-full border-2 border-greener rounded">Logout</button></a>
                </div>
            </div>
        </div>
    </header>
    <div>
        <label for="">Add Judge</label>
        <form method="post" action="addJudge.php">
            <input type="text" name="fname" placeholder="First Name" required>
            <input type="text" name="lname" placeholder="Last Name" required>
            <input type="email" name="email" placeholder="Email" required>
            <input type="submit" value="Add Judge">
        </form>
        <label for="">Add School</label>
        <form method="post" action="addSchool.php">
            <input type="text" name="sname" placeholder="School Name" required>
            <input type="text" name="district" placeholder="District" required>
            <select name="region" id="" required>
                <option value="Central Region">Central Region</option>
                <option value="Western Region">Western Region</option>
                <option value="Northern Region">Northern Region</option>
                <option value="Eastern Region">Eastern Region</option>
            </select>
            <input type="submit" value="Add School">
        </form>
        <label for="">Add Team</label>
        <form method="post" action="addTeam.php">
            <input type="text" name="tname" placeholder="Team Name" required>
            <select name="division" id="" required>
                <option value="">Select Division</option>
                <option value="B">Beginner</option>
                <option value="J">Junior</option>
                <option value="S">Senior</option>
            </select>
            <select name="school" id="" required>
                <option value="">Select School</option>
                <?php
                    $qy = mysqli_query($con, "SELECT * FROM school");
                    while($ay = mysqli_fetch_array($qy)){
                        $si = $ay['id'];
                        $s = $ay['name'];
                        $d = $ay['district'];
                        ?>
                        <option value="<?php print $si;?>"><?php print $s." | ".$d;?></option>
                        <?php
                    }
                ?>
            </select>
            <input type="submit" value="Add Team">
        </form>
    </div>
</body>
</html>