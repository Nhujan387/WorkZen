<?php
     session_start();
     include 'signmodal_seeker.php';
     include '../database_configure.php';
    
     $currentPage = 0;
     $searchlimit = 3;
 
     if(isset($_GET['page'])){
         if($_GET['page']<=0 || !is_numeric($_GET['page'])){
             $currentPage = 0;
         }else{
         $currentPage = ($_GET['page']-1)*$searchlimit;
         }
     }


    $fetch = "SELECT * FROM `job_postings`";
    $queryfetch = mysqli_query($conn,$fetch);

    $totalResult = mysqli_num_rows($queryfetch);
    if($totalResult>0){
        
        /* if data count is not less than 0 */
        $pagination = ceil($totalResult / $searchlimit);

        /* kati ota pagination links banauney bhanera  */
        $sql="SELECT * FROM `job_postings` LIMIT  $currentPage,$searchlimit";
        $result0 = mysqli_query($conn,$sql);

    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Workzen | JOBs</title>
        <link rel="stylesheet" href="../homepage_style.css"/>
        <link rel="stylesheet" href="resumestyle.css"/>
        <script src="https://kit.fontawesome.com/a076d05399.js"></script>
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
        <li> <a href="joblist.php"><button class="active">Find Job</button></a></li>
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
<div class="backgroundresume">
            <h1 class="bannertextstyle">Find Your Choice of Job Here</h1>
        </div>
        <div class="forsale">
            <div class="typeofproperty" style="margin-top:10px">
                <div class="house">
                    All JOB LISTS
                </div>
                    <div class="search-box">
                        <form method="GET">
                            <input type="text" name="location" placeholder="Search by location" />
                            <button type="submit"><i class="fa fa-search"></i></button>
                        </form>
                    </div>
            </div>
            <hr style="color: 3px aliceblue; width: 90%; margin: 0 auto; margin-top: 1px; margin-bottom: 8px;"> 
            <div class="subsellerhouse">
                <?php 
                if($_GET){
                    $location = $_REQUEST['location'];

                 

                $fetch = "SELECT j.job_id, j.title, j.location, j.salary, e.employer_id, e.Fullname_E FROM job_postings AS j JOIN employerlogin AS e ON j.employer_id = e.employer_id where j.location= '$location'";
                 $queryfetch = mysqli_query($conn,$fetch);
                 $datacheck = mysqli_num_rows($queryfetch);

                 if($datacheck>0){

                while($result = mysqli_fetch_assoc($queryfetch)){
                ?>
                    <a href="viewjobdetails.php?j_id=<?= $result['job_id'];?>&e_id=<?= $result['employer_id']; ?>" class="salecard2" style="display: block; margin-top: 5px; text-decoration: none; color: #000;">
                    <div>
                        <div style="margin-bottom: 10px;">
                        <p style="font-weight: bold; text-align: left; text-decoration:underline;">Designation</p>
                        <p style="margin-left: 20px; text-align: left;"><?php echo $result['title']; ?></p>
                        </div>
                        <div style="margin-bottom: 10px;">
                        <p style="font-weight: bold; text-align: left;text-decoration:underline;">Company:</p>
                        <p style="margin-left: 20px; text-align: left;"><?php echo $result['Fullname_E']; ?></p>
                        </div>
                        <div style="margin-bottom: 10px;">
                        <p style="font-weight: bold; text-align: left;text-decoration:underline;">Salary:</p>
                        <p style="margin-left: 20px; text-align: left;"><?php echo $result['salary']; ?></p>
                        </div>
                        <div style="margin-bottom: 10px;">
                        <p style="font-weight: bold; text-align: left;text-decoration:underline;">Location:</p>
                        <p style="margin-left: 20px; text-align: left;"><?php echo $result['location']; ?></p>
                        </div>
                        
                    </div>
                    </a>
                <?php } }else{
                        ?>
                        <div class="emtmsg">
                            <h2>No property listed for that location.</h2>
                        </div>
                        <?php
                    } 
                
                    
                    }else{ 
                   
                   $fetch = "SELECT j.job_id, j.title, j.location, j.salary, j.status, e.employer_id, e.Fullname_E FROM job_postings AS j JOIN employerlogin AS e ON j.employer_id = e.employer_id where j.status=1";
                    $queryfetch = mysqli_query($conn,$fetch);

                    while($result = mysqli_fetch_assoc($queryfetch)){
                    
                    ?>
                    <a href="viewjobdetails.php?j_id=<?= $result['job_id'];?>&e_id=<?= $result['employer_id']; ?>" class="salecard2" style="display: block; margin-top: 5px; text-decoration: none; color: #000;">
                    <div>
                        <div style="margin-bottom: 10px;">
                        <p style="font-weight: bold; text-align: left; text-decoration:underline; color:white;">Designation</p>
                        <p style="margin-left: 20px; text-align: left;color:white;"><?php echo $result['title']; ?></p>
                        </div>
                        <div style="margin-bottom: 10px;">
                        <p style="font-weight: bold; text-align: left;text-decoration:underline;color:white;">Company:</p>
                        <p style="margin-left: 20px; text-align: left;color:white;"><?php echo $result['Fullname_E']; ?></p>
                        </div>
                        <div style="margin-bottom: 10px;">
                        <p style="font-weight: bold; text-align: left;text-decoration:underline;color:white;">Salary:</p>
                        <p style="margin-left: 20px; text-align: left;color:white;"><?php echo $result['salary']; ?></p>
                        </div>
                        <div style="margin-bottom: 10px;">
                        <p style="font-weight: bold; text-align: left;text-decoration:underline;color:white;">Location:</p>
                        <p style="margin-left: 20px; text-align: left;color:white;"><?php echo $result['location']; ?></p>
                        </div>
                        
                    </div>
                    </a>
                    
                    <?php }} ?>
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
        </div>
    </body>
</html>