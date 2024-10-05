<?php
    error_reporting(0);
    include_once '../../connection.php';
    $con = connect();
    session_start();

    if(!isset($_SESSION["admin_username"]))
    {
    header("Location:../../login.php");
    }

    if(isset($_POST['submit']))  {

        $sg_username = $_POST['sg_username'];
        $sg_password = $_POST['sg_password'];
        $sg_stud_id = $_POST['sg_stud_id'];

        //check if account exists
        $check = "SELECT * FROM `studguardian_acc` WHERE(sg_username = '$sg_username' AND sg_password = '$sg_password' AND  sg_stud_id = '$sg_stud_id')";
        $query_run= mysqli_query($con,$check);

        if(mysqli_num_rows($query_run)>0)
            {
            header("Location: studguaradd.php?error=1");
            }
        else
            { 
                //check if account exists
                $check1 = "SELECT * FROM `studguardian_acc` WHERE sg_stud_id = '$sg_stud_id'";
                $query_run= mysqli_query($con,$check1);
                if(mysqli_num_rows($query_run)>0)
                    {
                    header("Location: studguaradd.php?error=2");
                    }
                else{

                    $queryAdd = "INSERT INTO `studguardian_acc`(`sg_id`, `sg_username`, `sg_password`, `sg_stud_id`) 
                    VALUES (NULL, '$sg_username', '$sg_password', '$sg_stud_id')";
                                
                        $result=mysqli_query($con,$queryAdd);
                                    
                         if($result)
                        {
                            header('location:../main.php');           
                        }    
                        else 
                        {
                            echo "Faileddddd :<";
                            die(mysqli_error($con));
                        }

                }
            }

        }
//
   
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Student Tracking</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" type="text/css" href="../css/userform.css">
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,500;0,700;1,600&display=swap" rel="stylesheet">
  <link rel="icon" href="../../assets/logo_icon.png" type="image/x-icon"> <!-- Logo of Website -->
</head>

<body>
    
<div class="cont">
    
    <div class="row row_outer">
        
        <form class="row g-3 row_inner" action="studguaradd.php" method="post" enctype="multipart/form-data">
            <div class="col-sm-1 text-center">
            </div>
            <div class="col-sm-2 text-center">
                <img class="icon" src="../../assets/aulogo.png" alt="right">
                <img class="icon" src="../../assets/logo_icon.png" alt="right">
            </div>
            <div class="col-sm-8 row_upper">
                <h1>TIME NOTIFY MONITORING SYSTEM</h1>
                <h5>ADD STUDENT ACCOUNT</h5> 
            </div>

            <div class="row">
                <div class="row order-sm-1">
                    <?php
                            if($_GET["error"]==1) 
                            {
                                echo '<p style="color: red; font-size: 15px; text-align: center;"> Account Already Exists.</p>';
                            } 
                            if($_GET["error"]==2) 
                            {
                                echo '<p style="color: red; font-size: 15px; text-align: center;"> Account with that Student ID Already Exists.</p>';
                            } 
                    ?>

                    <!--left-->
                    <div class="col-md-4 order-sm-1">
                    </div>

                    <!--center-->
                    <div class="col-md-4 order-sm-2">
                    <div class="row-md-4">
                            <label for="sg_id" class="form-label"> Account Number:</label>
                            <input type="text" class="form-control" id="sg_id" name="sg_id"  disabled>
                    </div>
                    <div class="row-md-4">
                            <label for="sg_username" class="form-label">Username:</label>
                            <input type="text" class="form-control" id="sg_username" name="sg_username" required>
                        </div>
                    <div class="row-md-4">
                        <label for="sg_password" class="form-label">Password:</label>
                        <input type="text" class="form-control" id="sg_password" name="sg_password" required>
                    </div>
                    <div class="row-md-4">
                        <label for="sg_stud_id" class="form-label">Student Number:</label>
                        <input type="text" class="form-control" id="sg_stud_id" name="sg_stud_id" required>
                    </div>

                    </div>
                    <br>

                    <!--right-->
                    <div class="col-md-4 order-sm-3">
                
                    </div>
                </div>

            <div class="row buttondiv order-sm-2">
                <div class="col-md-2 order-sm-1">
                </div>
                <div class="col-md-4 order-sm-2">
                    <!-- <button type="submit" name="save" class="btn1">ADD STUDENT RECORD</button> -->
                    <a href="../main.php" class="a"><input type="submit" class="btn1" name="submit" value="ADD ACCOUNT"></a>
                </div>
                <div class="col-md-4 order-sm-3">
                    <button type="submit" class="btn2"><a href="../main.php" class="a">VIEW ACCOUNTS</a></button>
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