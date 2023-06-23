<?php 
 session_start();
    include 'database_configure.php';
    session_destroy();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="homepage_style.css"/>
        <title>WorkZen</title>
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
                <li> <a href="http://workzen.com/home.php" ><button class="active">Home</button></a></li>      
                <li> <a href="about.php"><button>About us</button></a></li>
                <li> <a href="contact.php"><button>Contact Us</button></a></li>
                <li> <a href="jobseeker/jobseekerHome.php"><button>I'm a job seeker</button></a></li>
                <li> <a href="employer/employerHome.php"><button>I'm a employer</button></a></li>
            </ul>
        </nav>
        <div class="background">
            
        </div>
        
        <div class="qoute">
            <p class="qoutedesign">
                "Gratitude can transform common days into thanksgivings, turn routine jobs into joy, and change ordinary opportunities in blessings."
            </p>
            <p class="qoutedesign">
            William Arthur Ward
            </p>
        </div>
        <div class="catagory">
            <div class="buy">
                <img class="buyimg" src="img/for buy.jpg" />
                <div style="height:21vh;">
                    <p class="catagoryfont">
                        <b>Find me a job</b>
                    </p>
                    <p class="subfont">
                        “Empowering job seekers to find their perfect fit and make their career aspirations a reality.”
                    </p>
                </div>
                <a href="/jobseeker/jobseekerHome.php"><button class="catagorybutton">Search</button></a>
            </div>
            
            <div class="buy">
                <img class="buyimg" src="img/for sale.jpg" />
                <div style="height:21vh;">
                    <p class="catagoryfont">
                        <b>Find me a employee</b>
                    </p>
                    <p class="subfont">
                        “Empower your organization with the right talent to drive innovation and achieve excellence.”
                    </p>
                </div>
                <a href="/employer/employerHome.php"><button class="catagorybutton">Search</button></a>
            </div>  
        </div>
        
        <hr style="color: 3px aliceblue; width: 93%; margin: 0 auto; margin-top: 15px; margin-bottom: 10px;"> 
        <div class=" abtus">
        Discover endless career opportunities and connect with top employers through our innovative job portal, where you can find the perfect job that matches your skills, experience, and aspirations. Explore a wide range of industries, apply with a single click, and embark on your path to professional success today! Unlock your potential with our cutting-edge job portal, where job seekers and employers converge to create meaningful connections. <br/>
        </div>
        <hr style="color: 3px aliceblue; width: 93%; margin: 0 auto; margin-top: 15px; margin-bottom: 10px;"> 
        <div class="footer">
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
                        <img src="img/logo.png" style="padding-top:10px; width: 50%;">
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
            <div >
                <img src="img/bootom1.jpg" height="200vh" width="100%">
            </div>
        </div>
    </body>
</html>