<?php 
session_start();
include '../database_configure.php';
if(!isset($_SESSION['username'])){
include 'signmodal_seeker.php' ;

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="../homepage_style.css"/>
<title>WorkZen Seekers Hub</title>
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
        <li> <a href="http://workzen.com/jobseeker/jobseekerHome.php" ><button class="active">Seekers Hub</button></a></li>      
        <li> <a href="joblist.php"><button>Find Job</button></a></li>
        <li> <a href="resumepage.php"><button>Resume Here</button></a></li>
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
<div style="display: grid; grid-template-columns: 5% 90% 5%;  align-items: center; background-color: black; margin-bottom: 5px; ">
            <div><button style=" margin-left: 20px; border: none; font-size: xx-large; background-color: black; color: white;" onclick="plusDivs(-1)">&#10094;</button></div>
            
                <div style="width: 100%; ">
                    <img class="mySlides" src="../img/dt_48569988_jobsearch.jpg" style="width:100%; height:60vh">
                    <img class="mySlides" src="../img/sliderimg1.jpg" style="width:100% ; height:60vh">
                    <img class="mySlides" src="../img/job_search_portals.png" style="width:100%; height:60vh">
                    <img class="mySlides" src="../img/1573949707716.png" style="width:100%; height:60vh">
                </div>
            
            <div><button  style=" margin-left: 20px; border: none; font-size: xx-large; background-color: black; color: white;" onclick="plusDivs(1)">&#10095;</button></div>
        </div> 
<div class="Introduction">
        <div class="title">
            Welcome to WorkZen
        </div>
        <div class="description">
        <p>Discover Your Dream Job with WorkZen: Empowering Job Seekers in the Competitive Market

Are you tired of endlessly searching through job boards, submitting applications, and never hearing back? Look no further! WorkZen is the ultimate job portal designed specifically for job seekers like you. With its array of innovative features and user-friendly interface, WorkZen revolutionizes the way you search for and land your dream job.</p>
            <br/>
        <p>  With WorkZen, you have the power to take control of your career and discover exciting opportunities that align with your aspirations. Say goodbye to the frustration of traditional job searching and embrace the future of finding your dream job. Join WorkZen today and unlock a world of possibilities to propel your career forward!</p>
        </div>
        <div class="facilities">
            Why to start using WorkZen??
        </div>
        <div class="facilitiespoint">
            <ul>
                <li>
                Intelligent Job Matching
                </li>
                <li>
                Comprehensive Job Descriptions
                </li>
                <li>
                Simplified Application Process
                </li>
                <li>
                Personalized Recommendations
                </li>
                <li>
                Job Market Insights
                </li>
                <li>
                Supportive Community
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
    <script>
            var slideIndex = 1;
            showDivs(slideIndex);

            function plusDivs(n) {
            showDivs(slideIndex += n);
            }

            function showDivs(n) {
            var i;
            var x = document.getElementsByClassName("mySlides");
            if (n > x.length) {slideIndex = 1}
            if (n < 1) {slideIndex = x.length}
            for (i = 0; i < x.length; i++) {
                x[i].style.display = "none";  
            }
            x[slideIndex-1].style.display = "block";  
            }
</script>