<?php 
    session_start();
    error_reporting(0);
    include_once('../connection.php');
    $con = connect(); // Method that connect to SQL

    if(isset($_POST['log_in'])) 
        {
            $sg_username = mysqli_real_escape_string($con, $_POST['sg_username']);
            $sg_password = mysqli_real_escape_string($con, $_POST['sg_password']);
    
        if(empty($sg_username) || empty($sg_password)) {
            header("Location: login_student.php?error=2");
        } elseif(strlen($sg_username) < 4) {
            header("Location: login_student.php?error=3");
        } else {
        $sql = "SELECT * FROM `studguardian_acc` Where sg_username = '$sg_username' AND sg_password = '$sg_password'";
        $studguardian_acc = $con->query($sql) or die ($con->error);
        $row = $studguardian_acc->fetch_assoc();
        $total = $studguardian_acc->num_rows;
    
            if($total > 0){
    
                //session_start();
                     //$_SESSION['sg_stud_id'] = $row['sg_stud_id'];
                     //$sg_stud_id =$_SESSION['sg_stud_id'];
                   
                    $sg_id = $row['sg_id'];
                    $_SESSION['sg_id'] = $sg_id;
                    

                    header("Location: login_student2.php"); //URL DISPLAY
    
            } else {
                header("Location:login_student.php?error=1");
            
            }
        }
    
        }
    
    
     
    ?>
    
    <!DOCTYPE html>
<html lang="en">
<head>
<title>Time Notify Student Guardian Portal</title>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" type="text/css" href="css/login_student.css">
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,500;0,700;1,600&display=swap" rel="stylesheet">
  <link rel="icon" href ="../assets/logo_icon.png" type="image/x-icon"> <!-- Logo of Website -->
</head>
<body class="body ">

<div class="container-fluid ">

    <div class="row order-sm-1 upper">
        <div class="col-lg-6 order-sm-1 text-center left">
            <div class="div innerleft text-center ">
                <!--<h2>WELCOME TO</h2> --> 
                <img class="logo" src="../assets/aulogo.png" alt="right"> 
                <img class="logo" src="../assets/logo_icon.png" alt="right"><br> 
                <h1 class="fw-bold text-center">ARELLANO UNIVERSITY <br> & <br>TIME NOTIFY</h1>
                <h3 class="fw-bold text-center">STUDENT TIME MONITORING SYSTEM</h3> <br>
               <p class="label"> A tool to help in monitoring the attendance of the students. </p> 
                
                <br> <br> <br> 
            </div>
        </div>
        <div class="col-lg-6 order-sm-2 right text-center " >
            <div class="right_inner">
                    <br>
                <h2 class="login_text">WELCOME</h2> 
                <h5 class="login_text">TO STUDENT - GUARDIAN TIME PORTAL!</h5> <br>
                <h6>Please login to continue </h6> <br>
                    <?php
                        if($_GET["error"]==1) {
                            echo '<p style="color: red; font-size: 15px; text-align: center;">Username or Password is Invalid.</p>';
                        } elseif($_GET["error"]==2) {
                            echo '<p style="color: red; font-size: 15px; text-align: center;">Username or Password is Required.</p>';
                        } elseif ($_GET["error"]==3) {
                            echo '<p style="color: red; font-size: 15px; text-align: center;">Username must be atleast 4 characters.</p>';
                        }
                    ?>

                    <div class="divform">

                        <form action="#" method="POST" >
                                <input type="text" class="textbox" id="sg_username" name="sg_username" placeholder="Student username"> <br> <br> 
                            
                                <input type="password" class="textbox" id="sg_password" name="sg_password" placeholder="Student password"> <br>
                                
                                <button class="log_in" name="log_in"><a class="forbutton">LOG IN<a></button> 
                                <br>
                                <p class="copyright"> Copyright © SIA sisters</p>
                                <br>
                                <br>

                        </form>
                    </div>

            </div>
            
                    
        </div>

        
        


    </div>
                    </div>
   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
  </body>

</html>