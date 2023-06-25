<?php 
session_start();
include '../database_configure.php';

$jid = $_GET['j_id'];
$eid = $_GET['e_id'];
$sid = $_SESSION['username'];
$aid = $_GET['a_id'];

echo $aid;
$month = date('m');
$day = date('d');
$year = date('Y');

$today = $year . '-' . $month . '-' . $day;

$insert = "UPDATE `application` SET `status`='none' WHERE application_id = $aid";

$query = mysqli_query($conn,$insert);


if($insert){
    ?> <script>alert('Job deapplied.');location.replace("joblist.php");</script><?php
}

?>