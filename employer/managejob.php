<?php 
session_start();
include '../database_configure.php';
include 'signmodal_employer.php' ;

if(!isset($_SESSION['username'])){
    ?><script type='text/javascript'>alert('Please sign in first'); location.replace("http://workzen.com/employer/employerHome.php");</script><?php
}

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
.column-70 {
    width: 100%;
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
    <div class="backgroundbanner">
            <h1 class="bannertextstyle">Manage Your vacancy Annoucement</h1>
        </div>
        <div class="column column-70">
    <h2 class="psottitle">Update/Remove Form</h2>
      <div class="form-container">
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
        <form action="joblistformupdate.php?j_id=<?= $jid;?>" method="post">
          <label for="title">Title:</label>
          <textarea id="title" name="title" rows="1"  required><?= $title;?></textarea>

          <label for="location">Location:</label>
          <textarea id="location" name="location" rows="1"  required><?= $location;?></textarea>

          <label for="salary">Salary:</label>
          <input type="number" id="salary" name="salary" value=<?= $salary;?> required>

          <label for="Skill">Skills:</label>
          <textarea id="skill" name="skill" rows="4" required><?= $skill;?></textarea>
                    
          <label for="requirements">Requirements:</label>
          <textarea id="requirements" name="requirements" rows="4"  required><?php echo $requirements?></textarea>

          <label for="description">Description:</label>
          <textarea id="description" name="description" rows="6" required><?= $description;?> </textarea>

          <input type="submit" value="Submit">
        </form>
        <?php  } ?>
      </div>
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

    