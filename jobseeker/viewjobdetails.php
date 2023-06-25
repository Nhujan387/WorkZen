<?php 
session_start();
include '../database_configure.php';
include 'signmodal_seeker.php' ;

if(!isset($_SESSION['username'])){
    ?><script type='text/javascript'>alert('Please sign in first'); location.replace("http://workzen.com/jobseeker/joblist.php");</script><?php
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

.card-link {
  text-decoration: none;
}

.card {
  border: 1px solid #ccc;
  border-radius: 5px;
  padding: 5px;
  margin-bottom: 5px;
  margin-top: 5px;
}

.card-body {
  padding: 10px;
}

.designation, .posted-date {
  margin: 0;
  font-weight: bold;
}

.designation {
    color: black;
}

.posted-date {
  color: black;
}
.containeremp{
    display: flex;
    padding: 34px;
  }

  .column {
    padding: 10px;
  }

  .column-70 {
    width: 80%;
  }

  .column-30 {
    width: 20%;
  }
  .bannertextstyle12{
    text-align: center;
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
        <li> <a href="http://workzen.com/jobseeker/jobseekerHome.php" ><button>Seekers Hub</button></a></li>      
        <li> <a href="joblist.php"><button class="active">Find Job</button></a></li>
        <li> <a href="resumepage.php"><button >Resume Here</button></a></li>
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
           
<div class="containeremp">
    <div class="column column-70">
    <h1 class="bannertextstyle12">Full Job Description</h1>
        
        <div class="job-viewport-container">
        <div class="job-viewport">
            <?php
            include '../database_configure.php';
            $jid = $_GET['j_id'];
            $eid = $_GET['e_id'];
            $select = "SELECT j.job_id, j.title, j.location, j.salary, j.description,j.requirements, j.skills,j.date_posted, e.employer_id, e.Fullname_E FROM job_postings AS j JOIN employerlogin AS e ON j.employer_id = e.employer_id WHERE job_id =$jid"; 

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
                $company = $result['Fullname_E'];
                ?>
                <div class="job-card">
                <p><span style="font-weight:bold;">Post Title:</span> <?php echo $title; ?></p>
                <p><span style="font-weight:bold;">Requirements:</span> <?php echo $requirements; ?></p>
                <p><span style="font-weight:bold;">Skills:</span> <?php echo $skill; ?></p>
                <p><span style="font-weight:bold;">Description:</span><?php echo $description; ?></p>
                <p><span style="font-weight:bold;">Salary:</span> <?php echo $salary; ?></p>
                <p><span style="font-weight:bold;">Company:</span> <?php echo $company; ?></p>
                <p><span style="font-weight:bold;">Location:</span> <?php echo $location; ?></p>
                <p><span style="font-weight:bold;">Date Posted:</span> <?php echo $datePosted; ?></p>
                <div>
                <a href="apply.php?j_id=<?php echo $jid;?>&e_id=<?php echo $eid;?>"><button style="background-color:Green;color:white;font-size:22px;border-radius:5px;width:144px;">Apply</button></a>
                </div>
                </div>
                <?php
            }
            ?>
        </div>
</div>
    </div>
    <div class="column column-30">
        <h2 class="psottitle">Jobs You Applied For</h2>
        <p style="text-align:center;">Applied one's</p>
        <?php 
            include '../database_configure.php';
            $seekid= $_SESSION['username'];
            $select = "SELECT a.employer_id, a.application_id, j.title, a.Seeker_id, e.Fullname_E, a.status, j.job_id FROM application AS a JOIN job_postings AS j ON a.job_id = j.job_id JOIN employerlogin AS e ON j.employer_id = e.employer_id WHERE a.Seeker_id = $seekid and a.status = 'applied'";

            $runquery = mysqli_query($conn, $select);


                    while($result = mysqli_fetch_assoc($runquery)){
                    
                    ?>
                    <a href="editjobapplication.php?j_id=<?= $result['job_id'] ;?>&a_id=<?= $result['application_id']?>&e_id=<?= $result['employer_id']?>&s_id=<?= $result['Seeker_id']?>" class="card-link">
                        <div class="card">
                            <div class="card-body">
                            <p class="designation">Designation: <?= $result['title'];?></p>
                            <p class="posted-date">Company:<?= $result['Fullname_E'];?></p>
                            </div>
                        </div>
                    </a>
                    
                    <?php } ?>
            </div>
    
        
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