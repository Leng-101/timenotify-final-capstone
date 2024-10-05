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
    <link rel="stylesheet" type="text/css" href="css/report_shs.css">
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
                    <li class="text-center"><a href="gen_pdf/genreport_shs.php" class="b">GENERATE PDF REPORT</a></li>
                    <li class="text-center"><a href="gen_excel/report_shs_excel.php" class="b">GENERATE EXCEL REPORT</a></li>
                    <li class="text-center"><a href="report.php" class="b">DASHBOARD</a></li>
                    <li class="text-center"><a href="../landingpage.php" class="b">HOME</a></li>
                </ul>
            </div> 
        </div>
        
        <!--white-->
        <div class="row row_inner order-sm-2">
                <h4 class="text-center fw-bold">ALL RECORDS FROM SENIOR HIGH SCHOOL DEPARTMENT</h4> <br> <br>
            <div class="row overflow-auto row_table table-bordered table-responsive-xl order-sm-2">
            <div class="container">
                
                    <table class="table table-hover ">
                        <thead>
                            <tr class="heading">
                            <th scope="col ">No.</th>
                            <th scope="col">STUDENT NUMBER</th>
                            <th scope="col">NAME</th>
                            <th scope="col">PICTURE</th>
                            <th scope="col">AGE</th>
                            <th scope="col">SEX</th>
                            <th scope="col">GRADE</th>
                            <th scope="col">STRAND</th>
                            <th scope="col">SECTION</th>
                            <th scope="col">TEACHER</th>
                            <th scope="col">GUARDIAN EMAIL</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php  
                                    $sql="Select * from `students` where  department='Senior High'";
                                    $result=mysqli_query($con,$sql);

                                    if($result){
                                        if(mysqli_num_rows($result)>0)
                                        {
                                            
                                            while($row=mysqli_fetch_assoc($result))
                                            {
                                                
                                                $stud_id=$row['stud_id']; 
                                                $studnum=$row['studnum']; 
                                                $lastname=$row['lastname'];
                                                $middlename=$row['middlename'];
                                                $firstname=$row['firstname'];

                                                $picture=$row['picture'];
                                                $img_src = "../students/picture/".$picture;
                                                $age=$row['age'];
                                                $sex=$row['sex'];

                                                $grade_year=$row['grade_year'];
                                                $strand=$row['strand'];
                                                $section=$row['section'];
                                                $teacher_prof=$row['teacher_prof'];
                                                $g_email=$row['g_email'];

                                                $_SESSION['student_id'] = $stud_id; //Session StudID

                                                
                                                echo'<tr>
                                                        <td >'.$stud_id.'</td>
                                                        <td >'.$studnum.'</td>
                                                        <td >'.$lastname.', '.$firstname.' '.$middlename.'</td>       
                                                        <td ><img src="'.$img_src.'" style="width:140px; height:150px;"></td>
                                                        <td >'.$age.'</td>
                                                        <td >'.$sex.'</td>

                                                        <td >'.$grade_year.'</td>
                                                        <td >'.$strand.'</td>
                                                        <td >'.$section.'</td>
                                                        <td >'.$teacher_prof.'</td>
                                                        <td >'.$g_email.'</td>
                                                    <tr>
                                                ';
                                            }
                                        }
                                        else
                                        {
                                            ?>
                                            <tr>
                                                <td colspan="11" class="text-center">No Senior High School records</td>
                                            </tr>
                                            <?php
                                        }
                                    }

                            ?>
                        </tbody>
                    </table>


            </div>

        </div>
</div>
</div>
    
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
  </body>

</html>