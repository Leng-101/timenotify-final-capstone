<?php 
    error_reporting(0);
    include_once '../connection.php';
    $con = connect();
    session_start();

    if(!isset($_SESSION["admin_username"]))
    {
    header("Location:../login.php");
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
    <link rel="stylesheet" type="text/css" href="css/report.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,500;0,700;1,600&display=swap" rel="stylesheet">
    <link rel="icon" href ="../assets/logo_icon.png" type="image/x-icon"> <!-- Logo of Website -->
    </head>

<body>
    
<div class="cont">
    <div class="row row_outer ">
        
        <div class="row row_upper order-sm-1">
            <div class="col-sm-2 text-center">
                <img class="icon" src="../assets/aulogo.png" alt="right">
                <img class="icon" src="../assets/logo_icon.png" alt="right">
            </div>
            <div class="col-sm-7">
                <h1>TIME NOTIFY MONITORING SYSTEM</h1>
                <h5>REPORT GENERATION</h5> 
            </div>
            <div class="col-sm-3 dropdown">
                <button class="btn btntoggle dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                    MENU
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                    <li class="text-center"><a href="report.php" class="bselected">DASHBOARD</a></li>
                    <li class="text-center"><a href="selection/report_grade.php" class="b">GRADE SCHOOL</a></li>
                    <li class="text-center"><a href="selection/report_jhs.php" class="b">JUNIOR HIGH SCHOOL</a></li>
                    <li class="text-center"><a href="selection/report_shs.php" class="b">SENIOR HIGH SCHOOL</a></li>
                    <li class="text-center"><a href="selection/report_college.php" class="b">COLLEGE</a></li>
                    <li class="text-center"><a href="selection/report_multiple.php" class="b">EXPORT</a></li>
                    <li class="text-center"><a href="../students/studentstable.php" class="b">STUDENT RECORDS</a></li>
                    <li class="text-center"><a href="../landingpage.php" class="b">HOME</a></li>
                </ul>
            </div> 
        </div>
        
        <!--white-->
        <div class="row row_inner order-sm-2">
            <div class="row row_table table-bordered table-responsive-xl order-sm-2">
                <div class="container">

                    <h3 class="fw-bold pt-2 text-center"> ADMIN DASHBOARD</h3> 
                    <br>
                    <h6 class="pt-2">All Records</h6>
                        <div class="row rowrecords">
                            <div class="col">
                                <a href="report_student.php">
                                    <div class="box student">
                                        <?php 
                                            $sql = "SELECT * FROM students";
                                            $res = mysqli_query($con,$sql);
                                            $count = mysqli_num_rows($res);
                                            ?>
                                            <h2><?php echo $count;?></h2>
                                            <h4>STUDENT BASIC RECORDS</h4>
                                    </div>
                                </a>
                                
                            </div>
                            <div class="col">
                                <a href="report_time.php">
                                    <div class="box time">
                                    <?php 
                                        $sql = "SELECT * FROM time_in_records";
                                        $res = mysqli_query($con,$sql);
                                        $count = mysqli_num_rows($res);
                                    ?>
                                        <h2><?php echo $count;?></h2>
                                        <h4>STUDENT TIME RECORDS</h4>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <br><br><br>

                    <h6>Student Records Per Department</h6>
                        <div class="row rowrecords">
                            <div class="col">
                            <a href="report_grade.php">
                                <button class="box2 grade">
                                <?php 
                                    $sql = "SELECT * FROM students WHERE department='Grade School'";
                                    $res = mysqli_query($con,$sql);
                                    $count = mysqli_num_rows($res);
                                ?>
                                    <h2><?php echo $count;?></h2>
                                    <h4>GRADE SCHOOL</h4>
                                </button>
                            </a>
                            </div>
                            <div class="col">
                                <a href="report_jhs.php">
                                    <button class="box2 jhs">
                                        <?php 
                                            $sql = "SELECT * FROM students WHERE department='Junior High'";
                                            $res = mysqli_query($con,$sql);
                                            $count = mysqli_num_rows($res);
                                        ?>
                                        <h2><?php echo $count;?></h2>
                                        <h4>JUNIOR HIGH</h4>
                                    </button>
                                </a>
                            </div>
                            <div class="col">
                                <a href="report_shs.php">
                                    <button class="box2 shs">
                                        <?php 
                                            $sql = "SELECT * FROM students WHERE department='Senior High'";
                                            $res = mysqli_query($con,$sql);
                                            $count = mysqli_num_rows($res);
                                        ?>
                                        <h2><?php echo $count;?></h2>
                                        <h4>SENIOR HIGH </h4>
                                    </button>
                                </a>
                            </div>
                            <div class="col">
                                <a href="report_college.php">
                                    <button class="box2 college">
                                        <?php 
                                            $sql = "SELECT * FROM students WHERE department='College'";
                                            $res = mysqli_query($con,$sql);
                                            $count = mysqli_num_rows($res);
                                        ?>
                                        <h2><?php echo $count;?></h2>
                                        <h4>COLLEGE</h4>
                                    </button>
                                </a>
                            </div>
                        </div>
                    

                </div>

            </div>

        </div>
    </div>
</div>
    
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
  </body>

</html>
