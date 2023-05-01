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
    <title>Teams</title>
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
    <main class="flex">
        <!--side bar-->
        <div class="fixed left-0 top-0 flex flex-col justify-between w-96 border-grayish pt-12 h-screen bg-greener">
            <h1 class="text-2xl font-black text-white p-2">Admin Dashboard</h1>
            <!--buttons container-->
            <nav class="flex flex-col w-full ">
                <hr class="bg-white">
                <a href="dashboard.php" class="flex gap-4 text-center w-full text-xl font-black text-white p-3 hover:bg-blue">
                    <img src="images/Assets/dashborad.png" class="w-8" alt=""> Dashboard
                </a>
                <hr class="bg-white">
                <a href="#" class="flex gap-4 w-full text-white  text-xl font-black bg-greener p-3 bg-blue">
                    <img src="images/Assets/teams.png" class="w-8"  alt=""> Teams
                </a>
                <hr class="bg-white">
                <a href="dashboard.schools.php" class="flex gap-4 w-full text-white  text-xl font-black bg-greener p-3 hover:bg-blue">
                    <img src="images/Assets/schools.png" class="w-8" alt=""> Schools
                </a>
                <hr class="bg-white">
                <a href="dashboard.judges.php" class="flex gap-4 w-full text-white text-xl font-black bg-greener p-3 hover:bg-blue">
                    <img src="images/Assets/judges.png" class="w-8" alt=""> Judges
                </a>
                <hr class="bg-white">
                <a href="dashboard.rubrics.php" class="flex gap-4 w-full text-white text-xl font-black bg-greener p-3 hover:bg-blue">
                    <img src="images/Assets/outline.png" class="w-8" alt=""> Rubrics
                </a>
                <hr class="bg-white">
            </nav>
            
            <img src="images/op.png" alt="">
            <p class="text-lg font-bold">Copyrights &copy;Oysters and pearls</p>
        </div>

        <!--main content-->
        <div class="flex justify-between w-full h-screen ml-96 p-6 bg-grayish">
            <!--teams and judges tables -->
            <div class="flex flex-col gap-4">
                <!--Teams container(table)-->
                <table class="table-auto border-2 border-grayish bg-white rounded-2xl">
                    <tr class="bg-blue p-2 w-full rounded">
                        <th class="text-xl font-bold">ID</th>
                        <th class="text-xl font-bold">Team Name</th>
                        <th class="text-xl font-bold">Division</th>
                        <th class="text-xl font-bold">School</th>
                        <th class="text-xl font-bold">District</th>
                        <th class="text-xl font-bold">Region</th>
                    <tr>
                    <tbody>
                    <?php
                        $t_qry = mysqli_query($con, "SELECT * FROM team") or die("failed to fetch teams: ".mysqli_error($con));
                        while($t_ary = mysqli_fetch_array($t_qry)){
                            $id = $t_ary['id'];
                            $tn = $t_ary['name'];
                            $td = $t_ary['division'];
                            if($td == 'B')
                                $division = "Beginner";
                            elseif($td == 'J')
                                $division = "Junior";
                            elseif($td == 'S')
                                $division = "Senior";
                            $ts = $t_ary['school'];
                            $s_qry = mysqli_query($con, "SELECT * FROM school WHERE id = '$ts'");
                            $s_ary = mysqli_fetch_array($s_qry);
                            $sn = $s_ary['name'];
                            $sd = $s_ary['district'];
                            $sr = $s_ary['region'];
                            ?>
                            <tr>
                                <td class="text-lg"><?php print $id;?></td>
                                <td class="text-lg"><?php print $tn;?></td>
                                <td class="text-lg"><?php print $division;?></td>
                                <td class="text-lg"><?php print $sn;?></td>
                                <td class="text-lg"><?php print $sd;?></td>
                                <td class="text-lg"><?php print $sr;?></td>
                            </tr>
                            <?php
                        }
                    ?>                        
                    </tbody>
                    
                </table>

                <!-- Judges table -->
                <table class=" border-2 border-grayish rounded-xl">
                    <tr class="bg-reddish p-4 rounded-xl text-white">
                        <th class="text-xl font-bold">ID</th>
                        <th class="text-xl font-bold">Name</th>
                        <th class="text-xl font-bold">email</th>
                        <th class="text-xl font-bold">Password</th>
                    <tr>

                    <tbody>
                        <tr>
                            <td class="text-lg">01</td>
                            <td class="text-lg">Kato Emmanuel</td>
                            <td class="text-lg">Kato@test.org</td>
                            <td class="text-lg">**********</td>
                        </tr>
                        <tr>
                            <td class="text-lg">02</td>
                            <td class="text-lg">Kato Emmanuel</td>
                            <td class="text-lg">Kato@test.org</td>
                            <td class="text-lg">**********</td>
                        </tr>
                        <tr>
                            <td class="text-lg">03</td>
                            <td class="text-lg">Kato Emmanuel</td>
                            <td class="text-lg">Kato@test.org</td>
                            <td class="text-lg">**********</td>
                        </tr>
                        <tr>
                            <td class="text-lg">04</td>
                            <td class="text-lg">Kato Emmanuel</td>
                            <td class="text-lg">Kato@test.org</td>
                            <td class="text-lg">**********</td>
                        </tr>
                    </tbody>
                </table>

            </div>
            <!--Team auto score positioning-->
            <div class="flex flex-col">
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
                <h1 class="text-2xl font-bold">Auto Score Grading</h1>
                <table class="table-auto border-2 border-grayish bg-white rounded-2xl">
                    <tr class="bg-blue p-2 w-full rounded">
                        <th class="text-xl font-bold">Team</th>
                        <th class="text-xl font-bold">Division</th>
                        <th class="text-xl font-bold">pitch</th>
                        <th class="text-xl font-bold">District</th>
                        <th class="text-xl font-bold">Region</th>
                    <tr>
                    <tbody>
                        <tr>
                            <td class="text-lg">The curious</td>
                            <td class="text-lg">Junior</td>
                            <td class="text-lg">Oaks of Righteousness</td>
                            <td class="text-lg">Kiryandongo</td>
                            <td class="text-lg">Western Region</td>
                        </tr>

                        <tr>
                            <td class="text-lg">The curious</td>
                            <td class="text-lg">Junior</td>
                            <td class="text-lg">Oaks of Righteousness</td>
                            <td class="text-lg">Kiryandongo</td>
                            <td class="text-lg">Western Region</td>
                        </tr>

                        <tr>
                            <td class="text-lg">The curious</td>
                            <td class="text-lg">Junior</td>
                            <td class="text-lg">Oaks of Righteousness</td>
                            <td class="text-lg">Kiryandongo</td>
                            <td class="text-lg">Western Region</td>
                        </tr>
                        <tr>
                            <td class="text-lg">The curious</td>
                            <td class="text-lg">Junior</td>
                            <td class="text-lg">Oaks of Righteousness</td>
                            <td class="text-lg">Kiryandongo</td>
                            <td class="text-lg">Western Region</td>
                        </tr>
                        <tr>
                            <td class="text-lg">The curious</td>
                            <td class="text-lg">Junior</td>
                            <td class="text-lg">Oaks of Righteousness</td>
                            <td class="text-lg">Kiryandongo</td>
                            <td class="text-lg">Western Region</td>
                        </tr>
                    </tbody>
                    
                </table>
            </div>
        </div>
    </main>
</body>
</html>