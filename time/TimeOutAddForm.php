<?php
    error_reporting(0);
    include_once '../connection.php';
    $con = connect();
    session_start();

    if(!isset($_SESSION["admin_username"]))
    {
    header("Location:../login.php");
    }
    
 #From TimeIn table

    $daterec = $_POST['daterec'];
    
    date_default_timezone_set('Asia/Manila');

    $mydate=getdate(date("U"));
    $daterec = "$mydate[weekday], $mydate[month] $mydate[mday], $mydate[year]";


    // $stud_id=$_GET['stud_id'];// to get from url
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
        
        <form class="row g-3 row_inner" action="" method="get">
            <div class="col-sm-2 text-center">
                <img class="icon" src="../assets/aulogo.png" alt="right">
                <img class="icon" src="../assets/logo_icon.png" alt="right">
            </div>
            <div class="col-sm-7">
                <h1>TIME NOTIFY SYSTEM</h1>
                <h5>TIME OUT FORM</h5> 
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

<script>
      let scanner = new Instascan.Scanner({ video: document.getElementById('preview')});
      scanner.addListener('scan', function (content) {
        console.log(content);
      });
        Instascan.Camera.getCameras().then(function(cameras){
          if(cameras.length > 0) {
            scanner.start(cameras[0]);
          } else{
            alert('No camera found');
          }
        }).catch(function(e) {
          console.error(e);
        });
        scanner.addListener('scan', function(c)
        {
         
         //Store the value of the studnum using var 
          var studentnumber = document.getElementById('studnum').value=c;
            
          //trials
          document.getElementById('tonext').value=c;
          document.getElementById('submit_add').value=c;

          //Load each data
          window.location.href = window.location.href+'?studentnumber='+studentnumber;
          
          $studnum =c; //from js to php 

    
    });
</script>

    <?php
     //Pass the JS variable to PHP using GET
       $var = $_GET['studentnumber'];

    ?>

                <!--left-->
                <div class="col-md-4 order-sm-2">
                    <div class="row-md-4" hidden>
                        <label for="timenum" class="form-label">Record No. :</label>
                        <input type="text" class="form-control" id="timenum" name="timenum" disabled>
                    </div>

                    <div class="row-md-4">
                        <label for="stud_id" class="form-label">Student Number:</label>
                        <input type="text" class="form-control" id="studnum" name="studnum"  value="<?= $var ?>" disabled>
                       <!-- <button type="submit" name="search" class="btn1">Search</button>-->
                    
                    </div>
                  
                    
              <?php
              //Check if the var have a value 
               if (!empty($var)) {

                $sql = "SELECT * FROM `students` WHERE studnum ='$var'";
                $result = mysqli_query($con, $sql);

                if ($result){ 
                    while($row=mysqli_fetch_assoc($result))
                    {
                
                        $fname= $row['fullname'];
                        $studpicture = $row['picture'];
                       
                        $pathofimg = "../students/picture/".$studpicture; 
                    } }
                    else {
                        echo "
                        <script>
                        alert('Student Number cannot be found')
                        </script>";
                    }
                }
                
                ?>

                <div class="row-md-4"> <br>
                        <center> <img src="<?= $pathofimg; ?>" style="width:250px; height:250px; border:1px gray solid;"> <center>
                    </div>
                </div>


                <!--right-->
                <div class="col-md-3 order-sm-3">
     
                    <div class="row-md-4">
                        <label for="studname" class="form-label">Name:</label>
                        <input type="text" class="form-control" id="studname" name="studname" value="<?= $fname; ?>" disabled>
                    </div>
                
                    <div class="row-md-4">
                        <label for="stud_id" class="form-label">Type:</label>
                        <input type="text" class="form-control" id="stud_id" name="stud_id"  value="" placeholder="Time out" disabled>
                    </div>
                    
                    <div class="row-md-4 ">
                        <label for="date" class="form-label"> Date Record:</label>
                        <input type="text" class="form-control" id="daterec" name="daterec" value="<?php echo date('l, F j, Y'); ?>" disabled>
                    </div>

                    <div class="row-md-4">
                        <label for="timein" class="form-label">Time out:</label>
                        <input type="text" class="form-control" id="timein" name="timein" placeholder="time now" disabled>
                    </div>

            
                </div>
                <?php 
                 
                $_SESSION['studnum'] = $var; //Session StudID
           
                ?>
            
            </div>


    
            <!--view time out/update delete-->
            <div class="row buttondiv">
                <div class="col-md-2 order-sm-1">
                </div>
                <div class="col-md-4 order-sm-2">
                    <button type="submit" id="submit_add" name="add" class="btn1">
                   <a href="TimeOutAddForm2.php?studnum=<?php echo $var; ?>" id="tonext" class="a">ADD</a>
                    <!-- <a href="TimeInAddForm2.php>" id="tonext" class="a">ADD</a> -->
                
                </button>
                </div>
                <div class="col-md-4 order-sm-3">
                    <button type="submit" name="decline" class="btn1"><a href="../landingpage.php" class="a">BACK </a></button>
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