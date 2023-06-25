<?php 
session_start();
include '../database_configure.php';
include 'signmodal_employer.php' ;

if(!isset($_SESSION['username'])){
    ?><script type='text/javascript'>alert('Please sign in first'); location.replace("http://workzen.com/employer/employerHome.php");</script><?php
}
$id = $_SESSION['username'];



    
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="../homepage_style.css"/>
<link rel="stylesheet" href="employerstyle.css"/>
<title>WorkZen Employer Hub</title>
<script src="https://kit.fontawesome.com/a076d05399.js"></script>
</head>
<style>
.job-viewport-container {
  display: flex;
  justify-content: center;
  margin:10px;
}

.job-viewport {
  max-width: 800px;
  border:1px solid black;
  border-radius: 5px;
}

.job-card {
  border-radius: 5px;
  padding: 10px;
  margin-bottom: 20px;
  width: 100%;
  box-sizing: border-box;
  word-wrap: break-word;
}

.job-card h3 {
  margin-top: 0;
}

.job-card p {
  margin-bottom: 5px;
  font-size: 22px;;
}
.bannertextstyle1{
    color: black;
    font-size: 50px;
    text-align: center;
    padding-top: 30px;
    text-decoration: underline;
}

</style>
    <body>
    <nav>
        <div > 
        <a href="http://workzen.com/home.php" > <img src="../img/logo.png" alt="LOGO"></a>
        </div>
        <input type="checkbox" id="menu">
        <label for="menu" class="menu-button">
            <i class="fas fa-bars"></i>
        </label>
        <ul>
            <li> <a href="http://workzen.com/employer/employerHome.php" ><button >Employer Hub</button></a></li>      
            <li> <a href="listjob.php" ><button class="active">List Out Job</button></a></li>
            <li> <a href="checkapplication.php"><button>Check Application</button></a></li>
            <?php 
                if(!isset($_SESSION['username'])){?>
                <li> <a><button onclick="document.getElementById('signdiv').style.display='block'">Sign in</button></a></li>
                <?php }?>
                <?php 
                if(isset($_SESSION['username'])){?>
                <li> <a href="http://workzen.com/logout.php"><button>Log out</button></a></li>
            <?php }?>
        </ul>
    </nav>
            <h1 class="bannertextstyle1">Check your Vacancy Annoucement</h1>
        
        <div class="job-viewport-container">
        <div class="job-viewport">
            <?php
            include '../database_configure.php';
            $jid = $_GET['j_id'];
            $select = "SELECT * FROM `job_postings` WHERE job_id =$jid;";

            $runquery = mysqli_query($conn, $select);

            while ($result = mysqli_fetch_assoc($runquery)) {
                $title = $result['title'];
                $employer = $result['employer_id'];
                $description = $result['description'];
                $requirements = $result['requirements'];
                $location = $result['location'];
                $salary = $result['salary'];
                $skill = $result['skills'];
                $datePosted = $result['date_posted'];
                ?>
                <div class="job-card">
                <p><span style="font-weight:bold;">Post Title:</span> <?php echo $title; ?></p>
                <p><span style="font-weight:bold;">Requirements:</span> <?php echo $requirements; ?></p>
                <p><span style="font-weight:bold;">Skills:</span> <?php echo $skill; ?></p>
                <p><span style="font-weight:bold;">Description:</span><?php echo $description; ?></p>
                <p><span style="font-weight:bold;">Location:</span> <?php echo $location; ?></p>
                <p><span style="font-weight:bold;">Salary:</span> <?php echo $salary; ?></p>
                <p><span style="font-weight:bold;">Date Posted:</span> <?php echo $datePosted; ?></p>
                <div>
                <a href="delete.php?j_id=<?php echo $jid;?>"><button style="background-color:red;color:white;font-size:22px;border-radius:5px;width:144px;">Remove</button></a>
                <a href="managejob.php?j_id=<?php echo $jid;?>"><button style="background-color:blue;color:white;font-size:22px;border-radius:5px;width:144px;">Edit</button></a>
                </div>
                </div>
                <?php
            }
            ?>
        </div>
</div>
        <hr style="color: 3px aliceblue; width: 93%; margin: 0 auto; margin-top: 15px; margin-bottom: 10px;">
    <div class="subfooter">
        <div class="thirdfooter" >
            <p style="font-size: larger;">
            <b><u>Contact</u></b>
            </p> <br/>
            <p style="margin-bottom: 3px;">
            +9771234567890
            </p>
            <p style="margin-bottom: 3px;">
                42233445
            </p>
            <p style="margin-bottom: 3px;">
                workzen@gmail.com
            </p>
        </div>
        <div class="thirdfooter">
                <img src="../img/logo.png" style="padding-top:10px; width: 50%;">
        </div>
        <div class="thirdfooter" >
            <p style="font-size: larger;">
                <b><u>Why WorkZen?</u></b>
            </p> <br/>
            <p style="margin-bottom: 3px;">
                Easy job search
            </p>
            <p style="margin-bottom: 3px;">
            Simple and easy to use
            </p>
            <p style="margin-bottom: 3px;">
            Good employer and jobseeker relation 
            </p>
        </div>
    </div>
    <footer>
        <p>WorkZen, Copyright &copy; 2023</p>
    </footer>