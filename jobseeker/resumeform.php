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

                $education = $_REQUEST['education'];
                $experience = $_REQUEST['work'];
                $skill = $_REQUEST['skill'];

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
                
                  $insert ="INSERT INTO `seekerresume`(`FullName`, `EmailAddress`, `Contact`, `Country`, `Provience`, `City`, `Address`, `pdffile`, `image`, `Seeker_id`, `Education`, `Workexp`, `skill`) VALUES ('$Sname','$Semail','$Scontact','$Scountry','$Sproviend','$district','$address','$destinationfile2','$destinationfile','$user','$education','$experience','$skill')";


                  if($insert){
                    ?> <script>alert('Your CV has been Uploaded.');location.replace("http://workzen.com/jobseeker/jobseekerHome.php");</script> <?php }
                  
                $query = mysqli_query($conn,$insert);

                    
            }
    }
?>

