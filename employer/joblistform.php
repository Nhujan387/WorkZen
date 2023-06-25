<?php
session_start();
include '../database_configure.php';
$id = $_SESSION['username'];
    
    $month = date('m');
    $day = date('d');
    $year = date('Y');

    $today = $year . '-' . $month . '-' . $day;

    if($_POST){
    
        $title = $_REQUEST['title'];
        $location = $_REQUEST['location'];
        $Salary = $_REQUEST['salary'];
        $requirement = $_REQUEST['requirements'];
        $description = $_REQUEST['description'];
        $skill = $_REQUEST['skill'];
        $status = 1;


        $insert = "INSERT INTO `job_postings`(`employer_id`, `title`, `description`, `requirements`, `location`, `salary`, `date_posted`,`skills`,`status`) VALUES ('$id','$title','$description','$requirement','$location','$Salary','$today','$skill','$status')";

        if($insert){
            ?> <script>alert('Job listed successful');location.replace("listjob.php");</script><?php
        }
        $query = mysqli_query($conn,$insert);
    }

?>