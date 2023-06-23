<?php  session_start();?><?php include 'database_configure.php'; ?>
<!DOCTYPE html>
<html>
    <head>
        <title>
            WorkZen | About us
        </title>
        <link rel="stylesheet" href="homepage_style.css">
    </head>
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
                <li> <a href="http://workzen.com/home.php" ><button>Home</button></a></li>      
                <li> <a href="about.php"><button class="active">About us</button></a></li>
                <li> <a href="contact.php"><button>Contact Us</button></a></li>
                <li> <a href="jobseeker/jobseekerHome.php"><button>I'm a job seeker</button></a></li>
                <li> <a href="employer/employerHome.php"><button>I'm a employer</button></a></li>
            </ul>
        </nav>

            <section id="main">
                <article id="main-col">
                    <h1 class="page-title" style="text-shadow:1px 1px white">About us</h1>
                    <div class="dark">
                        <p class="about-text">
                        At WorkZen, we understand that every job seeker is unique, with their own set of skills, experiences, and career aspirations. That's why we've created a platform that puts you in control of your job search. Our comprehensive job listings, advanced search filters, and personalized recommendations ensure that you can easily discover relevant job opportunities tailored specifically to your profile. With simplified application processes and resume optimization tools, we strive to make the application process seamless and help you stand out from the competition.
                        </p><br/>
                        <p class="about-text">
                        We are more than just a job portal. WorkZen is a supportive community where you can connect with like-minded professionals, seek advice, and gain insights from industry experts. We believe in the power of networking and continuous learning, which is why we provide networking features and professional development resources to support your career growth.
                        </p><br/>
                        <p class="about-text">
                        Our commitment to your success extends beyond the job search phase. We offer valuable job market insights and trends to keep you informed and empowered. Additionally, our dedicated support team is always ready to assist you, whether you have technical questions or need guidance during your job search journey.
                        </p>
                    </div>
                </article> 

                <aside id="sidebar">
                <h3 class="page-title" style="text-shadow:1px 1px white">What We Do?</h3>
                    <div class="dark">
                        
                        <p class="about-text">
                        For job seekers, we offer a user-friendly interface where they can search for job opportunities, personalize their profiles, and showcase their skills and experiences. Our advanced matching algorithms provide personalized job recommendations, helping them find the perfect fit for their career goals. We also provide resume optimization tools and resources to help job seekers create impressive resumes that stand out from the crowd.
                        </p><br/>
                        <p class="about-text">
                        For employers, WorkZen simplifies the recruitment process by offering smart candidate matching, streamlined communication tools, and collaborative hiring features. Our platform enables employers to attract top talent through branded job postings and company profiles, ensuring they find candidates who align with their company culture and values. Additionally, employers can leverage our advanced analytics and insights to make data-driven hiring decisions and continually optimize their recruitment strategies.
                        </p>
                    </div>
                </aside>
            </section>
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