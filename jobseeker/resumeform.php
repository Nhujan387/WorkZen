<?php
    session_start();
    include '../database_configure.php';

    if(!isset($_SESSION['username'])){
    ?><script type='text/javascript'>alert('Signin before submitting form'); location.replace("http://workzen.com/jobseeker/resumepage.php");</script><?php
    }else{
            if($_POST){
               
                $Sname = $_REQUEST['fullname'];
                $Semail = $_REQUEST['email_s'];
                $Scontact = (int)$_REQUEST['contact_s'];

                $Scountry = $_REQUEST['country'];
                $Sproviend  = $_REQUEST['provience'];
                $district = $_REQUEST['city'];
                $address = $_REQUEST['address'];

                $Schoolname = $_REQUEST['school'];
                $gpaSchool = (float) $_REQUEST['gpaSchool'];
                $schooldate = $_REQUEST['schooldate'];

                $college = $_REQUEST['college'];
                $gpacolz = (float)$_REQUEST['gpacolz'];
                $colzdate = $_REQUEST['colzdate'];

                $collegeBach= $_REQUEST['collegeBach'];
                $gpaBach = (float)$_REQUEST['gpaBach'];
                $bachdate = $_REQUEST['bachdate'];

                $pre_Company= $_REQUEST['pre_Company'];
                $position = $_REQUEST['position'];
                $sdate = $_REQUEST['sdate'];
                $edate = $_REQUEST['edate'];

                $pre_Company2= $_REQUEST['pre_Company2'];
                $position2 = $_REQUEST['position2'];
                $sdate2 = $_REQUEST['sdate2'];
                $edate2 = $_REQUEST['edate2'];

                $pre_Company3= $_REQUEST['pre_Company3'];
                $position3 = $_REQUEST['position3'];
                $sdate3 = $_REQUEST['sdate3'];
                $edate3 = $_REQUEST['edate3'];

                $userfile = $_FILES['userfile'];

                $filename2 = $userfile['name'];
                $fileerror2 = $userfile['error'];
                $filetmp2 = $userfile['tmp_name'];

                $fileext2 = explode('.',$filename2);
                $filecheck2 = strtolower(end($fileext2));
                $fileextstored2 = array('pdf');

                if(in_array($filecheck2,$fileextstored2)){
                    $destinationfile2 = '../img/'.$filename2;
                    move_uploaded_file($filetmp2,$destinationfile2);
                }


                $user = $_SESSION['username'];
                
                $files = $_FILES['file'];
                $filename = $files['name'];
                $fileerror = $files['error'];
                $filetmp = $files['tmp_name'];

                $fileext = explode('.',$filename);
                $filecheck = strtolower(end($fileext));
                $fileextstored = array('png','jpg','jpeg','JPG');

                if(in_array($filecheck,$fileextstored)){
                    $destinationfile = '../img/'.$filename;
                    move_uploaded_file($filetmp,$destinationfile);
                }
                
                  $insert ="INSERT INTO `seekerresume`(`FullName`, `EmailAddress`, `Contact`, `Country`, `Provience`, `City`, `Address`, `SchoolName`, `SchoolGPA`, `Schoolddate`, `ColzName`, `ColzGPA`, `Colzdate`, `bachName`, `bachGPA`, `bachdate`, `PrevComp_1`, `position_1`, `startdate_1`, `enddate_1`, `PrevComp_2`, `position_2`, `startdate_2`, `enddate_2`, `PrevComp_3`, `position_3`, `startdate_3`, `enddate_3`, `pdffile`, `image`, `Seeker_id`) VALUES ('$Sname','$Semail','$Scontact','$Scountry','$Sproviend','$district','$address','$Schoolname','$gpaSchool','$schooldate','$college','$gpacolz','$colzdate','$collegeBach','$gpaBach','$bachdate','$pre_Company','$position','$sdate','$edate','$pre_Company2','$position2','$sdate2','$edate2','$pre_Company3','$position3','$sdate3','$edate3','$destinationfile2','$destinationfile','$user')";

                  if($insert){
                    ?> <script>alert('Your CV has been Uploaded.');location.replace("http://workzen.com/jobseeker/jobseekerHome.php");</script><?php
                }
                $query = mysqli_query($conn,$insert);
                    
            }
    }
?>