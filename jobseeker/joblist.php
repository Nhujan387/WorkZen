<?php
     session_start();
     include 'signmodal_seeker.php';
     include '../database_configure.php';
    
     $currentPage = 0;
     $searchlimit = 6;
 
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
        <div class="forsale">
            <div class="typeofproperty" style="margin-top:10px">
                <div class="house">
                    All JOB LISTS
                </div>
                    <div class="search-box">
                        <form method="GET">
                            <input type="text" name="location" placeholder="Search Location By District" />
                            <button type="submit"><i class="fa fa-search"></i></button>
                        </form>
                    </div>
            </div>
            <hr style="color: 3px aliceblue; width: 90%; margin: 0 auto; margin-top: 1px; margin-bottom: 8px;"> 
            <div class="subsellerhouse">
                <?php 
                if($_GET){
                    $location = $_REQUEST['location'];

                 /*$fetch = "SELECT s.s_id, s.property_type, s.Postdate, s.province, s.district, s.address, s.ropani, s.aana, s.paisa, s.dam,
                 s.bedroom_number, s.toilet_number, s.floor, s.amount, s.current_address, s.phone, s.image, s.user_id, s.status , u.name 
                FROM `sale` as s inner join user as u on s.user_id=u.user_id WHERE property_type='house' AND status='0' AND district='$location' ORDER BY `Postdate` DESC ";*/

                $fetch = "SELECT * FROM `job_postings`";
                 $queryfetch = mysqli_query($conn,$fetch);
                 $datacheck = mysqli_num_rows($queryfetch);

                 if($datacheck>0){

                while($result = mysqli_fetch_assoc($queryfetch)){
                ?>
                    <div class="salecard" style="margin-top:5px;">
                        <p style="font-weight:bold;text-align:center;font-size: 22px;">Location at <?php echo $result['description'];?></p>
                        <p style="margin-left:20px;font-weight:bold;text-align:center;">Floor:<?php echo $result['requirements'];?></p>
                        <p style="margin-left:20px;font-weight:bold;text-align:center;">Land:<?php echo $result['location'];?></p>
                        <p style="margin-left:20px;font-weight:bold;text-align:center;margin-top:15px;">Salary:<?php echo $result['salary'];?></p>
                        <a href="viewproperty.php?s_id=<?php echo $result['s_id']; ?>&user_id=<?php echo $result['user_id'];?>&name=<?php echo $result['name'];?>"><button class="view">view</button></a>
                        </p>
                    </div>
                <?php } }else{
                        ?>
                        <div class="emtmsg">
                            <h2>No property listed for that location.</h2>
                        </div>
                        <?php
                    } 
                
                    
                    }else{ 
                   /* $fetch = "SELECT s.s_id, s.property_type, s.Postdate, s.province, s.district, s.address, s.ropani, s.aana, s.paisa, s.dam,
                    s.bedroom_number, s.toilet_number, s.floor, s.amount, s.current_address, s.phone, s.image, s.user_id, s.status , u.name 
                   FROM `sale` as s inner join user as u on s.user_id=u.user_id WHERE property_type='house' AND status='0' ORDER BY `Postdate` DESC";*/
                   $fetch = "SELECT * FROM `job_postings`";
                    $queryfetch = mysqli_query($conn,$fetch);

                    while($result = mysqli_fetch_assoc($queryfetch)){
                    
                    ?>
                    <div class="salecard" style="margin-top:5px;">
                        <p style="font-weight:bold;text-align:center;font-size: 22px;">Location at <?php echo $result['description'];?></p>
                        <p style="margin-left:20px;font-weight:bold;text-align:center;">Floor:<?php echo $result['requirements'];?></p>
                        <p style="margin-left:20px;font-weight:bold;text-align:center;">Land:<?php echo $result['location'];?></p>
                        <p style="margin-left:20px;font-weight:bold;text-align:center;margin-top:15px;">Salary:<?php echo $result['salary'];?></p>
                        <a href="viewproperty.php"><button class="view">view</button></a>
                        </p>
                    </div><?php }} ?>
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