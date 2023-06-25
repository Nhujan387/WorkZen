<?php
    session_start();  
    if(!isset($_SESSION["Adname"]))
    {
    header("location:index.php");
    }

    include '../database_configure.php' ;
    include 'logout.php' ;
    

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style src="adminstyle.css"></style>
    <title>Residence:Dash</title>
</head>
<body>
    <div>
        <div class="navforadmin" style="border-top:none;border:1px solid black; margin-top: 2px;">
                <a class="navstyle navactive" href="dash.php">Dashboard</a>
                <a class="navstyle" href="viewproperty.php">View Job List</a>
            
        </div>
        <div class="dashed">
            <div class="dashcard" style="margin-top:20px;">
            <?php
    
                $fetch= "SELECT COUNT(*) as totalseeker from seekerlogin";
                $query= mysqli_query($conn,$fetch);
                $result= mysqli_fetch_assoc($query);
            
            ?>
            <h2 style="margin:2px;text-decoration:underline;">Total Job Seekers</h2>
                <div class="dashinfo">
                    <?php echo $result['totalseeker']?>
                </div>
            </div>

            <div class="dashcard" style="margin-top:20px;">
            <?php
    
                $fetchsale= "SELECT COUNT(*) as emp from employerlogin";
                $querysale= mysqli_query($conn,$fetchsale);
                $resultsale= mysqli_fetch_assoc($querysale);

            ?>
                <h2 style="margin:2px;text-decoration:underline;">Total Employers</h2>
                <div class="dashinfo">
                    <?php echo $resultsale['emp']?>
                </div>
            </div>
            <div class="dashcard" style="margin-top:20px;">
            <?php
    
                $fetchhouse= "SELECT COUNT(*) as joblist FROM job_postings";
                $queryhouse= mysqli_query($conn,$fetchhouse);
                $resulthouse= mysqli_fetch_assoc($queryhouse);

            ?>
                <h2 style="margin:2px;text-decoration:underline;">Total Job Listed</h2>
                <div class="dashinfo">
                    <?php echo $resulthouse['joblist']?>
                </div>
            </div>
            <div class="dashcard" style="margin-top:20px;">
            <?php
    
                $fetchland= "SELECT COUNT(*) as aplica FROM application";
                $queryland= mysqli_query($conn,$fetchland);
                $resultland= mysqli_fetch_assoc($queryland);

            ?>
                <h2 style="margin:2px;text-decoration:underline;">Total Job Applied</h2>
                <div class="dashinfo">
                    <?php echo $resultland['aplica']?>
                </div>
            </div>
            
            
        </div>
    </div>
</body>
</html>