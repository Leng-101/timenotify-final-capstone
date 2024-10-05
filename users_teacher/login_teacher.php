<?php 
    session_start();
    error_reporting(0);
    include_once('../connection.php');
    $con = connect(); // Method that connect to SQL

    if(isset($_POST['log_in'])) 
        {
            $t_username = mysqli_real_escape_string($con, $_POST['t_username']);
            $t_password = mysqli_real_escape_string($con, $_POST['t_password']);
            $t_department = mysqli_real_escape_string($con, $_POST['t_department']);
    
        if(empty($t_username) || empty($t_password)) {
            header("Location: login_teacher.php?error=2");
        } 
        else {
        $sql = "SELECT * FROM `teachers_acc` Where t_username = '$t_username' AND t_password = '$t_password' AND t_department = '$t_department'";
        $teachers_acc = $con->query($sql) or die ($con->error);
        $row = $teachers_acc->fetch_assoc();
        $total = $teachers_acc->num_rows;

        $teacher_id = $row['teacher_id'];
    
            /*if($total > 0){
                     
                     
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

    
            } else {
                header("Location:login_teacher.php?error=1");
            
            }*/


            if($total > 0){
                
                   $_SESSION['teacher_id'] = $teacher_id;
                   header("Location: login_teacher2.php");

            } else {
                header("Location:login_teacher.php?error=1");
            
            }
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
                <h5 class="login_text">TO TEACHER'S PORTAL!</h5> <br>
                <h6>Please login to continue </h6> <br>
                    <?php
                        if($_GET["error"]==1) {
                            echo '<p style="color: red; font-size: 15px; text-align: center;">Username, Password, or Department is Invalid.</p>';
                        } elseif($_GET["error"]==2) {
                            echo '<p style="color: red; font-size: 15px; text-align: center;">Username or Password is Required.</p>';
                        } 
                    ?>

                    <div class="divform">

                        <form action="#" method="POST" > <center>
                                <label for="t_department" class="form-label">Department:</label>
                                <select class="form-select form-select-sm  textbox" aria-label=".form-select-sm example" id="t_department" name="t_department" required>
                                        <option selected value="Grade School">Grade school</option>
                                        <option value="Junior High School">Junior High School</option>
                                        <option value="Senior High School">Senior High School</option>
                                        <option value="College">College</option>
                                </select> <br>

                                <input type="text" class="textbox" id="t_username" name="t_username" placeholder="Teacher or Professor's username" required> <br> 
                            
                                <input type="password" class="textbox" id="t_password" name="t_password" placeholder="Teacher or Professor's password" required> <br> 
                                
                                
                                
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