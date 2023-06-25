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
<style>
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
</style>
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
<div class="backgroundbanner">
            <h1 class="bannertextstyle">Application received.</h1>
    </div>

        <div class="forsale" style="height: 55vh;">
            
            <div class="subsellerhouse">
                <?php 
                    $select ="SELECT s.Fullname_S, s.Email_S, j.title, j.description, j.location, j.date_posted, r.sk_id, r.FullName, r.EmailAddress, r.Contact, r.Country, r.Provience, r.City, r.Address, r.Education, r.Workexp, r.skill, a.status, s.Seeker_id FROM seekerlogin AS s JOIN application AS a ON s.Seeker_id = a.Seeker_id JOIN job_postings AS j ON a.job_id = j.job_id JOIN seekerresume AS r ON s.Seeker_id = r.Seeker_id WHERE a.employer_id = 5 and a.status='applied'";

                    $query = mysqli_query($conn,$select);

                    while($result = mysqli_fetch_assoc($query)){
                ?>
                    <a href="viewresume.php?j_id=<?php echo $result['Seeker_id'] ?>" class="card-link">
                        <div class="card">
                            <div class="card-body">
                            <p class="designation">For the post: <?= $result['title'] ?></p>
                            <p class="posted-date">Posted Date:<?= $result['date_posted'] ?></p>
                            <p class="designation">Candidate Name: <?= $result['Fullname_S'] ?></p>
                            <p class="posted-date">Skills: <?= $result['skill']?></p>
                            </div>
                        </div>
                    </a>
                    
                    <?php } ?>
            </div>
        </div>
        <hr style="color: 3px aliceblue; width: 93%; margin: 0 auto; margin-top: 5px; margin-bottom: 10px;">
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