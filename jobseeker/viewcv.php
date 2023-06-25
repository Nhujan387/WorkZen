<?php 
    session_start();
    include 'signmodal_seeker.php';
    include '../database_configure.php';
    if(!isset($_SESSION['username'])){
        ?><script type='text/javascript'>alert('Please sign in first'); location.replace("http://workzen.com/jobseeker/jobseekerHome.php");</script><?php
        }

?>
<?php 

    $month = date('m');
    $day = date('d');
    $year = date('Y');

    $today = $year . '-' . $month . '-' . $day;
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>WorkZen | Resume Page</title>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../homepage_style.css"/>
        <link rel="stylesheet" href="resumestyle.css"/>
        <style>
            .parent{
                background-color: #f2f2f2;
                font-family: Arial, sans-serif;
                margin: 0;
                padding: 20px;
                }

                .container {
                background-color: #fff;
                border-radius: 5px;
                box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
                margin: 0 auto;
                padding: 40px;
                width: 80%;
                height: auto;
                }

                .profile-img {
                border-radius: 50%;
                height: 150px;
                margin-bottom: 20px;
                width: 150px;
                }

                .name {
                color: #333;
                font-size: 24px;
                font-weight: bold;
                margin-bottom: 10px;
                }

                .title1 {
                color: #666;
                font-size: 26px;
                font-weight: bold;
                margin-bottom: 10px;
                text-align: center;
                }

                .section {
                margin-bottom: 30px;
                }

                .section h2 {
                color: #333;
                font-size: 20px;
                font-weight: bold;
                margin-bottom: 10px;
                }

                .section p {
                color: #666;
                font-size: 16px;
                margin-bottom: 5px;
                }

                .skills {
                display: flex;
                flex-wrap: wrap;
                }

                .skill {
                background-color: #f2f2f2;
                border-radius: 4px;
                color: #333;
                font-size: 14px;
                margin-right: 10px;
                margin-bottom: 10px;
                padding: 5px 10px;
                }
        </style>
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
        <li> <a href="http://workzen.com/jobseeker/jobseekerHome.php" ><button>Seekers Hub</button></a></li>      
        <li> <a href="joblist.php"><button>Find Job</button></a></li>
        <li> <a href="resumepage.php"><button class="active">Resume Here</button></a></li>
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
        <?php 
            include '../database_configure.php';
            $id = $_SESSION['username'];
            $select = "SELECT * FROM `seekerresume` where Seeker_id = $id  ";

            $runquery = mysqli_query($conn, $select);


                    while($result = mysqli_fetch_assoc($runquery)){
                    
                    ?>
        <div class="parent">
            <div class="container">
                <img src="../img/<?= $result['image'];?>" alt="Profile Picture" class="profile-img">
                <h1 class="name">Name: <?= $result['FullName'];?></h1>
                <h1 class="name">Email: <?= $result['EmailAddress'];?></h1>
                <h1 class="name">Contact no: <?= $result['Contact'];?></h1>

                <div class="section">
                <h2>Address</h2>
                <p><?= $result['Country'];?>, <?= $result['Provience'];?>, <?= $result['City'];?>, <?= $result['Address'];?></p>
                </div>

                <div class="section">
                <h2>Experience</h2>
                <p><?= $result['Workexp'];?></p>
                </div>

                <div class="section">
                <h2>Skills</h2>
                <div class="skills">
                    <span class="skill"><?= $result['skill'];?></span>
                </div>
                </div>

                <div class="section">
                <h2>Education</h2>
                <p><?= $result['Education'];?></p>
                </div>

                <div class="cv-file">
                <p>Attached File: <a href="../img/<?= $result['pdffile'];?>" target="_blank">Click here to open.</a></p>
                </div>
            </div>
            <div style="text-align: center;margin-top:10px;">
                <a href="managecv.php?sk_id=<?php echo $result['sk_id'];?>">
                    <button style="background-color: blue; color: white; font-size: 22px; border-radius: 5px; width: 144px;">
                    Update CV
                    </button>
                </a>
            </div>
            </div>
        <?php } ?>
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