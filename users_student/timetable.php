<?php 
    session_start();
    error_reporting(0);
    include_once '../connection.php';
    $con = connect();
    
    $studguardian_stud_id = $_SESSION['sg_stud_id']; //From login_student2.php


    if(!isset($_SESSION["sg_stud_id"]))
    {
    header("Location:login_student.php");
    }
    
    // $stud_id=$_GET['stud_id']; //This is From studenttable.php

    $sql="SELECT * FROM students WHERE stud_id='$studguardian_stud_id'";
    $con = connect(); 
    $result=mysqli_query($con,$sql);
    $row= mysqli_fetch_assoc($result);
    
        $stud_id=$row['stud_id'];
        $lastname=$row['lastname'];
        $middlename=$row['middlename'];
        $firstname=$row['firstname'];
 
        $_SESSION['stud_id'] = $stud_id;
        $_SESSION['firstname'] = $firstname;
        // with middle and last
        $_SESSION['middlename'] = $middlename;
        $_SESSION['lastname'] = $lastname;

        //additional 
        $studnum=$row['studnum'];
        $grade_year=$row['grade_year'];
        $department = $row['department'];
        $g_email=$row['g_email'];

        $teacher_prof=$row['teacher_prof'];

    

    if(isset($_POST['logout']))
    {
    session_destroy();
    unset($_SESSION['sg_stud_id']);
    header("Location: login_student.php"); 
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
  <link rel="stylesheet" type="text/css" href="css/main.css">
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,500;0,700;1,600&display=swap" rel="stylesheet">
  <link rel="icon" href ="../assets/logo_icon.png" type="image/x-icon"> <!-- Logo of Website -->
</head>

<body>
    
<div class="cont">
    <div class="row row_outer ">
        
        <div class="row row_upper order-sm-2">
            <div class="col-sm-2 text-center">
                <img class="icon" src="../assets/aulogo.png" alt="right">
                <img class="icon" src="../assets/logo_icon.png" alt="right">
            </div>
            <div class="col-sm-8">
                <h1>TIME NOTIFY MONITORING SYSTEM</h1>
                <h5>STUDENT TIME PORTAL</h5> 
            </div>
        </div>
        
        <!--white div-->
        <div class="row row_inner order-sm-2">

        <!--whole heading in white div-->
            <div class="row row_center order-sm-1 " >
                <div class="col-sm-8 ">
                    <h4> <?php echo $lastname.", ".$firstname." ".$middlename. " TIME RECORDS ";?></h4>
                </div>
                
                <div class="col-sm-2 dropdown">
                    <button class="btn btntoggle dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                        MENU
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                        <li class="text-center"><a href="timetable_search.php?stud_id=<?php echo $stud_id;?>" class="b">SEARCH</a></li>
                        <li class="text-center"><a href="StudentViewForm.php?stud_id=<?php echo $stud_id;?>" class="b">STUDENT RECORD</a></li>
                    </ul>
                </div> 

                <div class="col-sm-2 ">
                    <form method="post" action="">
                        <button class="btntoggle" name="logout" >LOGOUT</button>
                    </form>
                </div>

            </div>
            <br>

            <div class="row order-sm-2">
                <!-- display info-->
            <div class="col-md-3 left_info">
                <div class="row-md-4"> 
                    <center> <img src="<?php echo "../students/picture/".$row['picture'];?>" style="width:230px; height:230px; border:1px gray solid; margin:3px;"> <center>
                </div> <br>
                
                <div class="row-md-4">
                    <label for="stud_id" class="form-label">Student Number: <b><?php echo $studnum; ?> </b></label>
                </div> 
                <div class="row-md-4">
                    <label for="stud_id" class="form-label">Grade / Year: <b><?php echo $grade_year ?> </b></label>
                </div> 
                <div class="row-md-4">
                    <label for="stud_id" class="form-label">Department: <b><?php echo $department; ?> </b></label>
                </div> 
                <div class="row-md-4">
                    <label for="stud_id" class="form-label">Guardian Email: <b><?php echo $g_email; ?> </b></label>
                </div> 
                <div class="row-md-4">
                    <label for="stud_id" class="form-label">Teacher: <b><?php echo $teacher_prof; ?> </b></label>
                </div> 
                        
                
            </div>
                <!--the table-->
            <div class="col-md-9">
                <div class="row overflow-auto row_table order-sm-2">
                    <table class="table text-center table-hover">
                        <thead>
                            <tr class="heading">
                            <th scope="col ">Record No.</th>         
                            <th scope="col">Date</th>
                            <th scope="col">Type</th>
                            <th scope="col">Time</th>
                            </tr>
                        </thead>
                        <tbody class=" ">
                    
                            <?php  
                                    $sql="Select * from `time_in_records` where stud_id ='$stud_id' ";
                                    $result=mysqli_query($con,$sql);

                                    if(mysqli_num_rows($result)>0){
                                        while($row=mysqli_fetch_assoc($result))
                                        {
                                            $timeID=$row['timeID'];
                                            $daterec=$row['daterec'];
                                            $type=$row['type'];
                                            $time=$row['time'];

                                            # Get time ID and stud ID to send in another page(View)
                                            $_SESSION['id_time'] = $timeID;
                                            // $_SESSION['idstud'] = $stud_id;  

                                            echo'<tr>
                                                    <td >'.$timeID.'</td>
                                                    <td >'.$daterec.'</td>
                                                    <td >'.$type.'</td>
                                                    <td >'.$time.'</td>   
                                                <tr>
                                            ';

                                            // $_SESSION['timeID'] = $timeID;
                                        
                                        }
                                    } 
                                    else
                                    {
                                        echo'
                                        <tr>
                                            <td colspan="4">No Time records found</td>
                                        </tr>
                                        ';
                                    }
                                
                                ?>
                        </tbody>
                    </table>
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