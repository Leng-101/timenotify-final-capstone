<?php
    error_reporting(0);
    include_once '../connection.php';
    $con = connect();
    session_start();


    if(!isset($_SESSION["admin_username"]))
    {
    header("Location:../login.php");
    }

    // $studnum=$_GET['studnum']; 
    $var = $_SESSION['studnum']; 

    $search = "SELECT * FROM students WHERE studnum='$var'";

        $result=mysqli_query($con, $search);
        $row= mysqli_fetch_assoc($result);

            $studnum=$row['studnum'];
            $stud_id=$row['stud_id']; 

            $picture=$row['picture'];
            $img_src = "picture/".$picture;
            $typeTime = "in";

            $lastname=$row['lastname'];
            $middlename=$row['middlename'];
            $firstname=$row['firstname']; 
            
            $studentname = $lastname.", ".$firstname." ".$middlename;
            
            $g_email=$row['g_email'];
            
            date_default_timezone_set('Asia/Manila');
            $timestamp = time();
            $timein = date("h:i:s A", $timestamp);

            $mydate=getdate(date("U"));
            $daterec = "$mydate[weekday], $mydate[month] $mydate[mday], $mydate[year]";

            if(empty($stud_id) || empty($var)|| empty($studentname) || empty($studentname)) 
            {
                echo "
                <script>
                alert('Student record cannot be found. Please check the record if it exists.')
                </script>";
            }
        
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Time Notify - AUABC </title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" type="text/css" href="css/timeform1.css">
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,500;0,700;1,600&display=swap" rel="stylesheet">
  <link rel="icon" href ="../assets/logo_icon.png" type="image/x-icon"> <!-- Logo of Website -->

  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/webrtc-adapter/3.3.3/adapter.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.1.10/vue.min.js"></script>
  <script type="text/javascript" src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>
  
  <script src="clock.js"></script>

</head>

<body onload="startTime()">
    
<div class="cont">
    
    <div class="row row_outer">
        
        <form class="row g-3 row_inner" action="send_in.php" method="post">
            <div class="col-sm-2 text-center">
                <img class="icon" src="../assets/aulogo.png" alt="right">
                <img class="icon" src="../assets/logo_icon.png" alt="right">
            </div>
            <div class="col-sm-7">
                <h1>TIME NOTIFY SYSTEM</h1>
                <h5>TIME IN CONFIMATION FORM</h5> 
            </div>
            <div class="col-sm-3 text-center clockdate-wrapper">
                <div class="clockdate-wrapper">
					<b><h2><div id="clock" class="clock"></div></h2>
					<div id="date"><?php echo date('l, F j, Y'); ?></div></b>
				</div>
            </div>

            <div class="row">
                
                <div class="col-md-5 order-sm-1"> <br>
                    <div class="col-md-4 order-sm-1">
                        <h5><center> SCAN QR ID <center> </h5>
                           <video id="preview" width="480px" autoplay class="camera"></video>
                        <center>
                    </div>
                </div>

                <!--left-->
                <div class="col-md-4 order-sm-2">
                    <div class="row-md-4" hidden>
                        <label for="timenum" class="form-label">Record No. :</label>
                        <input type="text" class="form-control" id="timenum" name="timenum" disabled>
                    </div>
                    <div class="row-md-4">
                        <label for="stud_id" class="form-label">Student Number:</label>
                        <input type="text" class="form-control" id="studnum" name="studnum"  value="<?php echo $var; ?>" disabled >
                       <!-- <button type="submit" name="search" class="btn1">Search</button>-->
                    
                    </div>
                    
                    <div class="row-md-4"> <br>
                        <center> <img src="<?php echo "../students/picture/".$row['picture'];?>" style="width:250px; height:250px; border:1px gray solid;"> <center>
                    </div>
                </div>
                
                <!--right-->
                <div class="col-md-3 order-sm-3">
                    
                    <div class="row-md-4">
                        <label for="studname" class="form-label">Name:</label>
                        <input type="text" class="form-control" id="studname" name="studname" value="<?php echo $studentname; ?>" disabled>
                    </div>
                    <div class="row-md-4">
                        <label for="stud_id" class="form-label">Type:</label>
                        <input type="text" class="form-control" id="stud_id" name="stud_id" value="<?php echo $typeTime; ?>" disabled>
                    </div>
                    
                    <div class="row-md-4">
                        <label for="date" class="form-label"> Date Record:</label>
                        <input type="text" class="form-control" id="daterec" name="daterec" value="<?php echo date('l, F j, Y'); ?>" disabled>
                    </div>

                    <div class="row-md-4" hidden>
                        <label for="date" class="form-label">Guardian Email:</label>
                        <input type="text" class="form-control" id="g_email" name="g_email" value="<?= $g_email; ?>" disabled>
                    </div>


                    <div class="row-md-4">
                        <label for="timein" class="form-label">Time in:</label>
                        <input type="text" class="form-control" id="timein" name="timein" placeholder="time now" disabled>
                    </div>

                </div>
            
            </div>

            <!--view time out/update delete-->
            <div class="row buttondiv">
                <div class="col-md-2 order-sm-1"></div>
                <div class="col-md-4 order-sm-2">
                    <button type="submit" name="confirmtoadd" class="btn1">CONFIRM TO ADD</button>
                </div>
                <div class="col-md-4 order-sm-3">
                    <button type="submit" name="back" class="btn1"><a href="TimeInAddForm.php" class="a">DECLINE </a></button>
                </div>
                <div class="col-md-2 order-sm-4"></div>
            </div>

        </form>
        <br>

    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
  </body>

</html>
