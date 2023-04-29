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
    <title>Judge Dashboard</title>
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
        <label for="">Select division to enter a team score</label>
        <form method="post" action="judgeDashboard.php">
        <select name="division" id="" required>
                <option value="">Select Division</option>
                <option value="B">Beginner</option>
                <option value="J">Junior</option>
                <option value="S">Senior</option>
            </select>
            <input type="submit" name="confirm" value="Confirm">
        </form>
        <?php
            if(isset($_POST['confirm'])){
                $div = $_POST['division'];
                if($div == 'B')
                    $rubric = 'beginner';
                elseif($div == 'J')
                    $rubric = 'junior';
                elseif($div == 'S')
                    $rubric = 'senior';
                $score_table = $rubric."_scores";
                ?>
                <form method="post" action="judgeDashboard.php">
                    <select name="item" id="" required>
                        <option value="">Select Rubric Item</option>
                        <?php
                            $qy = mysqli_query($con, "SELECT * FROM $rubric");
                            while($ay = mysqli_fetch_array($qy)){
                                $r_id = $ay['id'];
                                $desc = $ay['description'];
                                ?>
                                <option value="<?php print $r_id;?>"><?php print $desc;?></option>
                                <?php
                            }
                        ?>
                    </select>
                    <input type="number" name="score" placeholder="Score" required>
                    <input type="submit" name="subScore" value="Submit">
                </form>
                <?php
            }
            if(isset($_POST['subScore'])){
                $rubric_item = $_POST['item'];
                $rubric_score = $_POST['score'];
                mysqli_query($con, "INSERT INTO $score_table (rubric, judge, score) 
                VALUES('$rubric_item', '$j_id', '$rubric_score')") or die("Failed to add score: ".mysqli_error($con));
                print "Score added successfully!";
            }
        ?>
    </div>
</body>
</html>