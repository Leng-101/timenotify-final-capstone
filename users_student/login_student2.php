<?php 
    session_start();
    error_reporting(0);
    include_once('../connection.php');
    $con = connect(); // Method that connect to SQL

    // $sg_id = $_GET['sg_id'];
    $sg_id = $_SESSION['sg_id']; //From login_student.php

    $sql = "SELECT * FROM `studguardian_acc` Where sg_id = '$sg_id'";
    $con = connect(); 
    $result=mysqli_query($con,$sql);
    $row= mysqli_fetch_assoc($result);

    //Display the fullname and student guardian ID
    $sg_username=$row['sg_username'];
    $sg_stud_id=$row['sg_stud_id'];

    //check the code here
    //Sending Codes
    if(isset($_POST['sendcode'])) 
        {

        $_SESSION['sg_stud_id'] = $sg_stud_id;
        $_SESSION['student_guardianID'] = $sg_id;
        //  header("Location: code.php?sg_stud_id=$sg_stud_id&sg_id=$sg_id");
        header("Location: code.php");
        }
    
        
//check the code here
    if(isset($_POST['log_in2'])) 
        {
     
        $id = $_GET['id'];
        // $sg_stud_id = $_GET['sg_stud_id'];

        $sql = "SELECT * FROM `student_code_records` Where sg_id = '$sg_id' AND  id = '$id'";
        $result=mysqli_query($con,$sql);
        $row= mysqli_fetch_assoc($result);

        $generated_code=$row['code'];

        $entered_code = $_POST['code'];

            if($entered_code === $generated_code){
                
                $sql = "SELECT * FROM `studguardian_acc` Where sg_stud_id= '$sg_stud_id'";
                $studguardian_acc = $con->query($sql) or die ($con->error);
                $row = $studguardian_acc->fetch_assoc();
                $total = $studguardian_acc->num_rows;

                $studguardian_stud_id = $row['sg_stud_id'];
    
                     $_SESSION['sg_stud_id'] = $studguardian_stud_id;
                     header("Location: timetable.php");
            }
                   
            else {
                header("Location:login_student2.php?error=1");
            
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
                <h5 class="login_text">TO STUDENT - GUARDIAN TIME PORTAL!</h5> 
                <h6>Verification Portal </h6> <br>
                    <?php
                        if($_GET["error"]==1) {
                            echo '<p style="color: red; font-size: 15px; text-align: center;">Incorrect verification code.</p>';
                        }
                    ?>

                    <div class="divform">

                        <form action="#" method="POST" >
                                <p style="color: black;" > <?php echo "Hi, <b>".$sg_username."</b>'s guardian"; ?></p>
                                <button class="log_in2" name="sendcode"><a class="forbutton">SEND CODE<a></button>  <br> <br>
                        
                                <p style="color: black;"> Kindly check your gmail for the verification code </p>
                                </form>
                        <form action="#" method="POST" >
                                <input type="password" class="textbox" id="code" name="code" placeholder="00000"> <br>

                                
                                <button class="log_in" name="log_in2"><a class="forbutton">CONTINUE LOG IN<a></button> 
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