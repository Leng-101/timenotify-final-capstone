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
    <link rel="stylesheet" type="text/css" href="css/studentstable_search.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,500;0,700;1,600&display=swap" rel="stylesheet">
    <link rel="icon" href ="../assets/logo_icon.png" type="image/x-icon"> <!-- Logo of Website -->
    </head>

<body>
    
<div class="cont">
    <div class="row row_outer ">
        
        <div class="row row_upper order-sm-1">
            <div class="col-sm-2 text-center">
                <img class="icon" src="../assets/logo_icon.png" alt="right">
                <img class="icon" src="../assets/aulogo.png" alt="right">
            </div>
            <div class="col-sm-8">
                <h1>TIME NOTIFY MONITORING SYSTEM</h1>
                <h5>SEARCH STUDENTS RECORDS</h5> 
            </div>
            <div class="col-sm-2 dropdown">
                <button class="btn btntoggle ">
                   <a href="studentstable.php" class="b2">BACK</a>
                </button>
                <!--
                <ul class="dropdown-menu text-center" aria-labelledby="dropdownMenuButton1">
                    <li><a href="StudentAddForm.php" class="b">CREATE RECORD</a></li>
                    <li><a href="../report/report.php" class="b">GENERATE REPORT</a></li>
                    <li><a href="studentstable.php" class="b">BACK</a></li>
                    <li><a href="../landingpage.php" class="b">HOME</a></li>-->
                </ul>
            </div> 
        </div>
        
        <!--tableee-->
        <div class="row row_inner order-sm-2">
            
            <div class="row row_center order-sm-1 " >
                
                <!--search box and button-->
                    
                    <div class="col-sm-3 ">
                    </div>
                
                    <div class="col-sm-4 bttn text-center">
                        <form action="" method="GET">
                            <input type="text" class="form-control" name="search" required value="<?php 
                            if(isset($_GET['search']))
                            {echo $_GET['search'];
                            }?>" placeholder="search">
                        </div>
                        <div class="col-sm-2 bttn text-center">
                            <button type="submit" class="btn4 ">SEARCH</button>
                        </form>
                    </div>

                    <div class="col-sm-3 ">
                    </div>
               
            </div>
            <div class="row tableblue overflow-auto row_table table-bordered table-responsive-xl order-sm-2">
                    <br>
                <table class="table table-hover ">
                    <thead>
                        <tr class="heading">
                        <th scope="col">ID</th>
                        <th scope="col">STUDENT NUMBER</th>
                        <th scope="col">NAME </th>
                        <th scope="col">PICTURE</th>
                        <th scope="col">DEPARTMENT</th>
                        <th scope="col">GRADE</th>
                        <th scope="col">STRAND</th>
                        <th scope="col">COURSE</th>
                        <th scope="col">TEACHER</th>
                        <th scope="col">ACTION</th>
                        </tr>
                    </thead>
                    <tbody >
                        <?php  
                                if(isset($_GET['search']))
                                {
                                    $filtervalues = $_GET['search'];
                                    $query="SELECT * FROM `students` WHERE  CONCAT(studnum,firstname,lastname,grade_year,strand,course,teacher_prof,section) LIKE '%$filtervalues%' ORDER BY age, lastname";
                                    $query_run= mysqli_query($con,$query);

                                    if(mysqli_num_rows($query_run)>0)
                                    {
                                        while($row=mysqli_fetch_assoc($query_run))
                                    {
                                       $stud_id=$row['stud_id']; 
                                        $studnum=$row['studnum'];
                                        $department=$row['department']; 
                                        $lastname=$row['lastname'];
                                        $middlename=$row['middlename'];
                                        $firstname=$row['firstname'];
                                        $picture=$row['picture'];
                                        $img_src = "picture/".$picture;
                                        $grade_year=$row['grade_year'];
                                        $strand=$row['strand'];
                                        $course=$row['course'];
                                        $teacher_prof=$row['teacher_prof'];
                                        
                                        echo'<tr>
                                                <td >'.$stud_id.'</td>
                                                <td >'.$studnum.'</td>
                                                <td >'.$lastname.', '.$firstname.' '.$middlename.'</td>
                                                <td ><img src="'.$img_src.'" style="width:140px; height:150px;"></td>
                                                <td >'.$department.'</td>
                                                <td >'.$grade_year.'</td>
                                                <td >'.$strand.'</td>
                                                <td >'.$course.'</td>
                                                <td >'.$teacher_prof.'</td>
                                                <td class="buttons">
                                                <div class="col-sm-12 dropdown">
                                                <button class="btn fw-bold table_button dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                                    OPTIONS
                                                </button>
                                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                                    <li class="text-center"><a href="StudentViewForm.php?viewstud_id='.$stud_id.'"  class="b" >VIEW</a></li>
                                                    <li class="text-center"><a href="StudentUpdateForm.php?updatestud_id='.$stud_id.'" class="b" >UPDATE</a></li>
                                                    <li class="text-center"><a href="StudentDeleteForm.php?deletestud_id='.$stud_id.'" class="b">DELETE</a></li>
                                                    <li class="text-center"><a href="../time/timetable.php?stud_id='.$stud_id.'" class="b">TIME RECORDS</a></li>
                                                </ul>
                                            </div>  </td>
                                            <tr>
                                        ';
                                    }
                                }
                                    else
                                    {
                                        ?>
                                        <tr>
                                            <td colspan="10">No records found</td>
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
