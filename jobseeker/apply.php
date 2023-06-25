<?php 
session_start();
include '../database_configure.php';

$jid = $_GET['j_id'];
$eid = $_GET['e_id'];
$sid = $_SESSION['username'];

$month = date('m');
$day = date('d');
$year = date('Y');

$today = $year . '-' . $month . '-' . $day;

$insert = "INSERT INTO `application`(`job_id`, `Seeker_id`, `employer_id`, `date_applied`, `status`) VALUES ('$jid','$sid','$eid','$today','applied')";

$query = mysqli_query($conn,$insert);


if($insert){
    ?> <script>alert('Job applied successful, a mail is ent to the company from our side on behalf of you.');location.replace("joblist.php");</script><?php
}

?>