<?php

    session_start();
    include '../database_configure.php';
    $jid = $_GET['j_id'];

    $delete = "UPDATE `job_postings` SET `status`='2' WHERE job_id = $jid";
    $query = mysqli_query($conn,$delete);

    if($delete){
        ?><script>alert('Vacancy deleted succesfully.');location.replace('http://workzen.com/employer/listjob.php');</script><?php
    }

?>