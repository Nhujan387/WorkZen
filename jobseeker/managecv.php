<?php 
    session_start();
    include 'signmodal_seeker.php';
    include '../database_configure.php';
    if(!isset($_SESSION['username'])){
        ?><script type='text/javascript'>alert('Please sign in first'); location.replace("http://workzen.com/jobseeker/jobseekerHome.php");</script><?php
        }
        $aid = $_SESSION['username'];
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
        <div class="backgroundresume">
            <h1 class="bannertextstyle">Update Your Resume</h1>
        </div>
        
        <?php
        include '../database_configure.php';
        $id = $_GET['sk_id'];
        $select = "SELECT `sk_id`, `FullName`, `EmailAddress`, `Contact`, `Country`, `Provience`, `City`, `Address`, `pdffile`, `image`, `Seeker_id`, `Education`, `Workexp`, `skill` FROM `seekerresume` WHERE sk_id = $id";
        $query = mysqli_query($conn,$select);

        while ($result = mysqli_fetch_assoc($query)) {
            $name= $result['FullName'];
            $Semail = $result['EmailAddress'];
            $Scontact = $result['Contact'];

            $Scountry = $result['Country'];
            $Sproviend  = $result['Provience'];
            $district = $result['City'];
            $address = $result['Address'];

            $education = $result['Education'];
            $experience = $result['Workexp'];
            $skill = $result['skill'];

        ?>
        <form id="propinfo-form" method="POST" enctype="multipart/form-data" action="updateresumeform.php?sk_id=<?php echo $id ;?>" >
                    <fieldset style="border: 1px solid black; width: 98%; padding:5px; margin: 0 auto; ">
                        <legend style="font-size: 20px; font-weight: bold; ">Update a Resume</legend>
                        
                       
                        <div class="subheads">Upload your photo</div>
                        <label class="info">Image:</label>
                        <input class="input"  type="file" id="file" name="file" accept="image/*" 
                        onchange="document.getElementById('showimg').src=window.URL.createObjectURL(this.files[0]);" required/> 
                        <span class="error-message" id="emt-img">Image cannot be empty.</span></br>

                        <img style="width:12%;height:15vh; border: 1px solid black; margin:2px;"  id="showimg"></p>
                        <div class="subheads">Contact Information</div>
                        <label class="info" >Full Name:</label>
                        <input type="text" name="fullname" id="fullname" value="<?php echo $name;?>">
                        <label class="info">E-mail Address:</label>
                        <input  type="text" name="email_s" id="email_s" value="<?php echo $Semail;?>"> 
                        <label class="info">Contact no:</label>
                        <input  type="number" name="contact_s" id="contact_s" value="<?php echo $Scontact;?>">
                        
                        <div class="subheads">Current Location</div>
                        <label class="info">Country:</label>
                        <input type="text" name="country" id="country" value="<?php echo $Scountry;?>">
                        <label class="info">Provience:</label>
                        <input  type="text" name="provience" id="provience" value="<?php echo $Sproviend;?>"> 
                        <label class="info">District:</label>
                        <input  type="text" name="city" id="city" value="<?php echo $district;?>"> <br/>
                        <label class="info">Address:</label>
                        <input  type="text" name="address" id="address" value="<?php echo $address;?>"> 

                        <div class="subheads">Education qualification</div>
                        <textarea id="education" name="education" style="width:100%;height:18vh;" row="8" placeholder="Company A - designation (year-year)," ><?php echo $education;?></textarea><br/>

                        <div class="subheads">Skill</div>
                        <textarea id="skill" name="skill" style="width:100%;height:18vh;" row="8" ><?php echo $skill;?></textarea><br/>

                        <div class="subheads">Work Experience</div>
                        <textarea id="work" name="work" style="width:100%;height:18vh;" row="8" ><?php echo $experience;?></textarea><br/>

                        <div class="subheads">Upload files in PDF Format</div>
                        <input name="userfile" id="userfile" type="file" accept="application/pdf" required/>
                        
                    </fieldset>
                            <input type="submit" value="Update" class="submit"/>
                </form>
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