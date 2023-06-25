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
            <h1 class="bannertextstyle">Proper Resume leads to Greater Job </h1>
        </div>
        <div class="Sellorder" style="margin-top: 5px; margin-bottom:10px;">
            <div class=" subsell">
                <a href="viewcv.php?j_id=<?php echo $aid;?>"><button class="salestat">Manage/Update CV</button></a>
                <hr style="color: 3px aliceblue; width: 93%; margin: 0 auto; margin-top: 15px; margin-bottom: 10px;">
                <div class="tips">Some important things to remember when searching for a job.</div> <br/>
                <div class="tips2" >
                    <ol>
                        <li>Clearly define your goals</li>
                        <li>Research the job market</li>
                        <li>Build a professional network</li>
                        <li>Tailor your application materials</li>
                        <li>Utilize online job boards and platforms</li>
                        <li>Leverage company websites and career pages</li>
                        <li>Prepare for interviews</li>
                        <li>Be persistent and proactive</li>
                    </br></br>
                    <div class="tips">Provide genuine information about you, your skill, and qualification.</div>
                    </ol>
                </div>
            </div>
            <div class="subsell2" style="overflow-y: scroll; height: 94vh;">
                <form id="propinfo-form" method="POST" enctype="multipart/form-data" action="resumeform.php" >
                    <fieldset style="border: 1px solid black; width: 98%; padding:5px; margin: 0 auto; ">
                        <legend style="font-size: 20px; font-weight: bold; ">Create a Resume</legend>
                        
                       
                        <div class="subheads">Upload your photo</div>
                        <label class="info">Image:</label>
                        <input class="input"  type="file" id="file" name="file" accept="image/*"
                        onchange="document.getElementById('showimg').src=window.URL.createObjectURL(this.files[0]);" /> 
                        <span class="error-message" id="emt-img">Image cannot be empty.</span></br>

                        <img style="width:12%;height:15vh; border: 1px solid black; margin:2px;"  id="showimg"></p>
                        <div class="subheads">Contact Information</div>
                        <label class="info" >Full Name:</label>
                        <input type="text" name="fullname" id="fullname" >
                        <label class="info">E-mail Address:</label>
                        <input  type="text" name="email_s" id="email_s" > 
                        <label class="info">Contact no:</label>
                        <input  type="number" name="contact_s" id="contact_s">
                        
                        <div class="subheads">Current Location</div>
                        <label class="info">Country:</label>
                        <input type="text" name="country" id="country" >
                        <label class="info">Provience:</label>
                        <input  type="text" name="provience" id="provience"> 
                        <label class="info">District:</label>
                        <input  type="text" name="city" id="city"> <br/>
                        <label class="info">Address:</label>
                        <input  type="text" name="address" id="address"> 

                        <div class="subheads">Education qualification</div>
                        <textarea id="education" name="education" style="width:100%;height:18vh;" row="8" placeholder="Company A - designation (year-year),"></textarea><br/>

                        <div class="subheads">Skill</div>
                        <textarea id="skill" name="skill" style="width:100%;height:18vh;" row="8"></textarea><br/>

                        <div class="subheads">Work Experience</div>
                        <textarea id="work" name="work" style="width:100%;height:18vh;" row="8"></textarea><br/>

                        <div class="subheads">Upload files in PDF Format</div>
                        <input name="userfile" id="userfile" type="file" accept="application/pdf"/>
                        
                    </fieldset>
                            <input type="submit" value="Submit" class="submit"/>
                </form>
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
            function Validateformresume(){
                address = document.getElementById('currentaddress').value;
                phone = document.getElementById('phoneno').value;
                price = document.getElementById('price').value;
                image = document.getElementById('file').value;
                validate = true;

                if(address ==''){
                    document.getElementById('emt-address').style.display = 'block';
                    validate = false;
                }else{
                    document.getElementById('emt-address').style.display = 'none';
                }
                if(price ==''){
                    document.getElementById('emt-price').style.display = 'block';
                    validate = false;
                }else{
                    document.getElementById('emt-price').style.display = 'none';
                }
                if(phone ==''){
                    document.getElementById('emt-phone').style.display = 'block';
                    validate = false;
                }else{
                    document.getElementById('emt-phone').style.display = 'none';
                }

                if(image ==''){
                    document.getElementById('emt-img').style.display = 'block';
                    validate = false;
                }else{
                    document.getElementById('emt-img').style.display = 'none';
                }

                if(validate){
                    document.getElementById('propinfo-form').submit();
                }
            }
        </script>
    </body>
</html>