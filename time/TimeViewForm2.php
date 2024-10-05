<?php
   //error_reporting(0);
   include_once '../connection.php';
   $con = connect();
   session_start();

   if(!isset($_SESSION["admin_username"]))
   {
   header("Location:../login.php");
   }
    #These are from timetable.php
    $timeID = $_GET['timeID'];
    $stud_id = $_SESSION['stud_id'];

    $sql="SELECT * FROM time_in_records WHERE timeID = '$timeID'";
    $con = connect(); 
    $result=mysqli_query($con,$sql);
    $row= mysqli_fetch_assoc($result);

    $timeID=$row['timeID'];
        $studnum=$row['studnum'];
        $type=$row['type'];
        $studname=$row['studname'];
        $daterec=$row['daterec'];
        $time=$row['time'];





?>


<!DOCTYPE html>
<html lang="en">
<head>
<title>Time Notify - AUABC </title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" type="text/css" href="css/timeform.css">
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,500;0,700;1,600&display=swap" rel="stylesheet">
  <link rel="icon" href ="../assets/logo_icon.png" type="image/x-icon"> <!-- Logo of Website -->
</head>

<body>
    
<div class="cont">
    
    <div class="row row_outer2">
        
        <form class="row g-3 row_inner" action="#" method="post">
            <div class="col-sm-2 text-center">
                <img class="icon" src="../assets/aulogo.png" alt="right">
                <img class="icon" src="../assets/logo_icon.png" alt="right">
            </div>
            <div class="col-sm-10">
                <h1>TIME NOTIFY MONITORING SYSTEM</h1>
                <h5>TIME RECORD VIEW FORM</h5> 
            </div>

            <div class="row">

            <div class="col-md-2 order-sm-1">
                    
                    </div>
    
                    <!--left-->
                    <div class="col-md-4 order-sm-2">
                        <div class="row-md-4">
                            <label for="timenum" class="form-label">Time Record ID No. :</label>
                            <input type="text" class="form-control" id="timenum" name="timenum" value="<?= $timeID ?>" disabled>
                        </div>
                        <div class="row-md-4">
                            <label for="studnum" class="form-label">Student Number:</label>
                            <input type="text" class="form-control" id="studnum" name="studnum" value="<?= $studnum ?>" disabled>
                        </div>
                        <div class="row-md-4">
                        <label for="studname" class="form-label">Name of Student:</label>
                        <input type="text" class="form-control" id="studname" name="studname" value="<?= $studname ?>" disabled>
                        </div>
                    </div>

                    <!--right-->
                    <div class="col-md-4 order-sm-3">
                        
                        <div class="row-md-4">
                            <label for="date" class="form-label">Date Record:</label>
                            <input type="text" class="form-control" id="date" name="date" value="<?= $daterec ?>" disabled>
                        </div>
                        
                        <div class="row-md-4">
                            <label for="guardian" class="form-label">Type:</label>
                            <input type="text" class="form-control" id="date" name="date" value="<?= $type ?>"<?= $guardianlist ?> disabled>
                        </div>
                        <div class="row-md-4">
                            <label for="timein" class="form-label">Time:</label >
                            <input type="text" class="form-control" id="timein" name="timein" value="<?= $time?>" disabled>
                        </div>
                    </div>
                    <div class="col-md-2 order-sm-4">
                        
                    </div>
            </div>

            <div class="row buttondiv">
                <div class="col-md-2 order-sm-1">
                </div>
                <div class="col-md-8 order-sm-3">
                    
                    <button type="submit" class="btn2"><a href="timetable.php?='<?echo $stud_id?>" class="a">VIEW TIME LIST</button></a>
                </div>
                <div class="col-md-2 order-sm-4">
                   </div>
            </div>

        </form>
        <br>

    </div>
</div>
   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
  </body>

</html>
