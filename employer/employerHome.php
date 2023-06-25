<?php 
session_start();
include '../database_configure.php';
if(!isset($_SESSION['username'])){
include 'signmodal_employer.php' ;

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="../homepage_style.css"/>
<title>WorkZen Employer Hub</title>
<script src="https://kit.fontawesome.com/a076d05399.js"></script>
</head>
<style>
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
        <li> <a href="http://workzen.com/employer/employerHome.php" ><button class="active">Employer Hub</button></a></li>      
        <li> <a href="listjob.php"><button>List Out Job</button></a></li>
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
<div class="backgroundemployee">
    
</div>
<div class="Introduction">
        <div class="title">
            Welcome to WorkZen
        </div>
        <div class="description">
        <p>Are you tired of sifting through countless resumes and struggling to find the right candidates for your company? Look no further! WorkZen is here to transform your hiring process and make it more efficient than ever before. As a cutting-edge job portal designed specifically for employers, WorkZen offers a range of innovative features that will streamline your recruitment efforts and help you find the perfect match for your organization. Join the ranks of forward-thinking employers who have already embraced WorkZen to revolutionize their hiring processes. Experience the power of intelligent candidate matching, streamlined communication, and data-driven decision-making.</p>
            <br/>
        <p>  WorkZen is redefining the job portal experience for employers, equipping you with the tools and features needed to streamline your hiring process, attract top talent, and build a successful team. Embrace the future of recruitment and unlock the potential of your workforce with WorkZen today! Sign up today and unlock a world of possibilities for your recruitment success!</p>
        </div>
        <div class="facilities">
            Why to start using WorkZen??
        </div>
        <div class="facilitiespoint">
            <ul>
                <li>
                Smart Candidate Matching
                </li>
                <li>
                Comprehensive Candidate Profiles
                </li>
                <li>
                Efficient Communication Tools
                </li>
                <li>
                Employer Branding Opportunities
                </li>
                <li>
                Advanced Analytics and Insights
                </li>
                <li>
                Collaborative Hiring
                </li>
                <li>
                Personalized Recommendations
                </li>
            </ul>
        </div>
        <div class="title">
                    Companies We've Worked With
                </div>
                <div>
                    <img src="../img/kthree-events.jpg" style="width: 20%;" /> 
                    <img src="../img/final-logo-om-sherpa-01.png" style="width: 20%;" />
                    <img src="../img/ak-fashion-wear.jpg" style="width: 20%;" />
                    <img src="../img/Kantipur.png" style="width: 20%;" />
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