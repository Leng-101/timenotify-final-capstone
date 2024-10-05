<?php 
error_reporting(0);
include_once 'connection.php';
$con = connect();
session_start();

if(!isset($_SESSION["admin_username"]))
{
header("Location:login.php");
}

if(isset($_POST['logout']))
    {
       session_destroy();
       unset($_SESSION['admin_username']);
       header("Location: login.php"); 
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
  <link rel="stylesheet" type="text/css" href="css/landing.css">
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,500;0,700;1,600&display=swap" rel="stylesheet">
  <link rel="icon" href ="assets/logo_icon.png" type="image/x-icon"> <!-- Logo of Website -->
</head>
<body class="body ">

<div class="container-fluid ">

    <div class="row order-sm-1 upper">
        <div class="col-lg-6 order-sm-1 left">
            <div class="div innerleft ">
                <!--<h2>WELCOME TO</h2> --> <br><br>
                <h1 class="fw-bold">ARELLANO UNIVERSITY</h1>
                <h3 class="fw-bold">STUDENT TIME MONITORING SYSTEM</h3> <br>
                <div class="row  left-down-display  ">
                    <div class="col-sm-1 pb-3">
                       <img class="icon" src="assets/tracking.png" alt="right"> 
                    </div>
                    <div class="col-sm-11 pt-2">
                        <p class="for_icon">Easier tracking of students' time in and out</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-1">
                        <img class="icon" src="assets/student.png" alt="right">
                    </div>
                    <div class="col-sm-11 pt-2">
                        <p class="for_icon">Helps parents to be updated of their child's time in and out</p>
                    </div>
                </div>
                <br> <br> <br> 
            </div>
        </div>
        <div class="col-lg-6 order-sm-2 right text-center " >
            <div class="right_inner">
                <img class="logo" src="assets/LOGO.jpg" alt="right"> <br> <br>
                <form method="post" action="">
                <button class="student_button" name="student_time_button">
                    <a href="time/TimeInAddForm.php">TIME IN</a> 
                </button>
                <button class="student_button" name="student_time_button">
                    <a href="time/TimeOutAddForm.php">TIME OUT</a> 
                </button>
                <button class="student_button" name="student_time_button">
                    <a href="time/student_timetable.php">TIME RECORDS</a> 
                </button>
                <!--<button class="student_button" name="student_time_button">
                    <a href="time/TimeInAddForm.php">TIME OUT</a> -->
                </button>
                <button class="student_button" name="student_button">
                    <a href="students/studentstable.php">STUDENT RECORDS</a> 
                </button>
                <button class="student_button" name="student_time_button">
                    <a href="report/report.php">GENERATE REPORT</a> 
                </button>
                <button class="student_button" name="student_time_button">
                    <a href="users/main.php">USERS</a> 
                </button>
                <button class="student_time_button" name="logout">LOGOUT</button>
                <br><br>
            
            </form>

            </div>
            
                    
        </div>
    </div>
    <div class="row second">
        
        <h2 class="text-center fw-bold">ARELLANO UNIVERSITY CAMPUSES</h2><br> <br>
        </div>
        <div class="row order-sm-2 carocont text-center "  >
            
            <div class="col-sm-2">
            </div>

            <div class="col-sm-8 carocont">
                <br>
                <div id="carouselExampleCaptions" class="carousel slide caro" data-bs-ride="carousel">
                    <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="3" aria-label="Slide 4"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="4" aria-label="Slide 5"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="5" aria-label="Slide 6"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="6" aria-label="Slide 7"></button>
                    </div>
                    <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="assets/aum.jpg" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                        <h5> Arellano University- Manila </h5>
                        <p>Legarda Campus (Main)</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="assets/aup.jpg" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                        <h5>Arellano University - Pasig</h5>
                        <p>Andres Bonifacio Campus</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="assets/aujs.jpg" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                        <h5>Arellano University</h5>
                        <p>Jose Rizal Campus</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="assets/aujas.jpg" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                        <h5>Arellano University - Pasay</h5>
                        <p>Jose Abad Santos</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="assets/auam.jpg" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                        <h5>Arellano University - Pasay </h5>
                        <p>AU School of Law - Apolinario Mabini Campus</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="assets/aupl.jpg" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                        <h5>Arellano University - Mandaluyong</h5>
                        <p>Plaridel Campus</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="assets/auee.jpg" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                        <h5>Arellano University - Malabon </h5>
                        <p>Elisa Esquerra Campus</p>
                        </div>
                    </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                    </button>
                </div>
                <br> <br> 
            </div>
            <div class="col-sm-2">
            </div>
    </div>

    <div class="row third order-sm-3 iconscont blue text-center">
        
        <div class="col-lg-3 order-sm-1 ">   
        </div>

        <div class="col-lg-2 order-sm-2 ">   
            <div class="row">
                <img class="icon2" src="assets/clock.png" alt="right">
            </div>
            <div class="row">
               <p class="label1 fw-bold">TIME RECORD</p> 
            </div>
            <div class="row">
               <p class="label">Daily time in and time out of the students .</p> 
            </div>
        </div>
        
        <div class="col-lg-2 order-sm-3  text-center " >   
            <div class="row">
                <img class="icon2" src="assets/computer.png" alt="right">
            </div>
            <div class="row">
               <p class=" label1 fw-bold"> CAMPUS ATTENDANCE </p> 
            </div> 
            <div class="row">
               <p class="label"> A tool to help in monitoring the attendance of the students. </p> 
            </div>  
        </div>

        <div class="col-lg-2 order-sm-4 text-center " > 
            <div class="row">
                <img class="icon2" src="assets/reading.png" alt="right">
            </div>
            <div class="row">
               <p class="label1 fw-bold">FOR ALL STUDENTS</p> 
            </div>
            <div class="row">
               <p class="label">From Kindergarten to College Departments.</p> 
            </div>
        </div>

        <div class="col-lg-3 order-sm-5 ">   
        </div>

    </div>

    
    <div class="row fourth order-sm-2 carocont text-center "  >
        <div class="col-sm-2">
        </div>
        <div class="col-sm-4">
                    
            <div class="row picturecont">
                <p class="dev col-sm-4">DEVELOPERS </P>

            </div>
                    <div class="row picturecont">
                        <div class="col-sm-5">
                        <img class="picture" src="assets/paja.jpg" alt="picture"> 
                        </div>
                        <div class="col-sm-5">
                        <p class="name">Paja, Jeisamae C. </P>
                        </div>
                    </div>
                    <div class="row picturecont">
                        <div class="col-sm-5">
                        <img class="picture" src="assets/almodiel.jpg" alt="picture"> 
                        </div>
                        <div class="col-sm-5">
                        <p class="name">Almodiel, Renalyn D. </P>
                        </div>
                    </div>
                    <div class="row picturecont">
                        <div class="col-sm-5">
                        <img class="picture" src="assets/bette.jpg" alt="picture"> 
                        </div>
                        <div class="col-sm-5">
                        <p class="name">Bette, Josephine Venes R. </P>
                        </div>
                    </div>
                    <div class="row picturecont">
                        <div class="col-sm-5">
                        <img class="picture" src="assets/reposo.jpg" alt="picture"> 
                        </div>
                        <div class="col-sm-5">
                        <p class="name">Reposo, Paulene A. </P>
                        </div>
                    </div>
                    
                    <br>
        </div>
        <div class="col-sm-4">
            <img class="img pt-5" src="assets/student (2).png" alt="right">
        </div>
        <div class="col-sm-1">
        </div>


    </div>


    <div class="row fifth footer" >
        <p class="copyright"> Copyright © SEE sisters</p>
    </div>



</div>

</body>
</html>
