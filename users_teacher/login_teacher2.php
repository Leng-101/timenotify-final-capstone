<?php 
    session_start();
    error_reporting(0);
    include_once('../connection.php');
    $con = connect(); // Method that connect to SQL

    //get the id in url
    // $teacher_id = $_GET['teacher_id'];
    // $id = $_GET['id'];
    
    
    $teacher_id = $_SESSION['teacher_id'];


    //get data from the enetered details
    $sql = "SELECT * FROM `teachers_acc` Where teacher_id = '$teacher_id'";
    $con = connect(); 
    $result=mysqli_query($con,$sql);
    $row= mysqli_fetch_assoc($result);
    $t_username=$row['t_username'];
    $teacher_dept =$row['t_department'];

    //if clinick and sendcode button
    if(isset($_POST['sendcode'])) 
        {
        $_SESSION['teacher_ID'] =  $teacher_id;
        $_SESSION['teacher_dept'] = $teacher_dept;
         header("Location: code.php");
        }

    //if clinick and log_in na may id na
    if(isset($_POST['log_in'])) 
        {
          
      //get yung asa url na data
         $id = $_GET['id'];

        //kukunin na yung code gamit ang teacher_id at id 
        //DI MAKUHA YUNG CODE
        $sql = "SELECT * FROM `teachers_code_records` Where teacher_id= '$teacher_id' AND  id = '$id'";
        $con = connect(); 
        $result=mysqli_query($con,$sql);
        $row= mysqli_fetch_assoc($result);

        $generated_code=$row['code'];

        $entered_code = $_POST['code'];
    
        if($entered_code == $generated_code)
        {
            //header("Location: multiple/report_teacher_grade.php");
            $sql = "SELECT * FROM `teachers_acc` Where teacher_id= '$teacher_id'";
            $teachers_acc = $con->query($sql) or die ($con->error);
            $row = $teachers_acc->fetch_assoc();
            $total = $teachers_acc->num_rows;

            if($total > 0)
            {    
                $t_department=$row['t_department'];

                if($t_department === "Grade School")
                {
                   session_start();
                   $_SESSION['t_username_grade'] = $row['t_username'];
                   $t_username =$_SESSION['t_username_grade'];
                   header("Location: multiple/report_teacher_grade.php");
                }

                
                elseif($t_department === "Junior High School")
                {
                   session_start();
                   $_SESSION['t_username_jhs'] = $row['t_username'];
                   $t_username =$_SESSION['t_username_jhs'];
                   header("Location: multiple/report_teacher_jhs.php");
                }
                elseif($t_department === "Senior High School")
                {
                   session_start();
                   $_SESSION['t_username_shs'] = $row['t_username'];
                   $t_username =$_SESSION['t_username_shs'];
                   header("Location: multiple/report_teacher_shs.php");

                }
                elseif($t_department === "College")
                {
                   session_start();
                   $_SESSION['t_username_col'] = $row['t_username'];
                   $t_username =$_SESSION['t_username_col'];
                   header("Location: multiple/report_teacher_college.php");
                }

            }
        } 
        else 
        {
            header("Location:login_teacher2.php?error=1");
        }
    }
        
     
    ?>
    
    <!DOCTYPE html>
<html lang="en">
<head>
    <title>Time Notify Teacher Portal</title>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" type="text/css" href="css/login_teacher.css">
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
                <h5 class="login_text">TO TEACHER'S PORTAL!</h5>
                <h6>Verification Portal </h6> <br>
                    <?php
                        if($_GET["error"]==1) {
                            echo '<p style="color: red; font-size: 15px; text-align: center;">Verification code is invalid.</p>';
                        }
                    ?>

                    <div class="divform">

                        <form action="#" method="POST" > <center>
                        <p style="color: black;" > <?php echo "Hi, <b>".$t_username."</b>!"; ?></p> 
                        <button class="log_in2" name="sendcode"><a class="forbutton">SEND CODE<a></button><br><br>
                        <p style="color: black;"> Kindly check your gmail for the verification code </p>
                        </form>
                        <form action="#" method="POST" >
                                <input type="password" class="textbox" id="code" name="code" placeholder="00000" required> <br>
                            
                                <button class="log_in" name="log_in"><a class="forbutton">LOG IN<a></button> 
                                <br>
                                <p class="copyright"> Copyright © SIA sisters</p>
                                <br>
                    </center>

                        </form>
                    </div>

            </div>
            
                    
        </div>

        
        


    </div>
                    </div>
   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
  </body>

</html>