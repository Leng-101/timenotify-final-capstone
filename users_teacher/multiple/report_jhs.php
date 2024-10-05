<?php 
    error_reporting(0);
    include_once '../../connection.php';
    $con = connect();
    session_start();

    if(!isset($_SESSION["t_username"]))
    {
    header("Location:../login_teacher.php");
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
    <link rel="stylesheet" type="text/css" href="../css/report_jhs.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,500;0,700;1,600&display=swap" rel="stylesheet">
    <link rel="icon" href ="../../assets/logo_icon.png" type="image/x-icon"> <!-- Logo of Website -->
    </head>

<body>
<!-- <div class="container-fluid"> -->
    <div class="cont">
        <div class="row row_outer ">
        
        <div class="row row_upper order-sm-1">
            <div class="col-sm-2 text-center">
                <img class="icon" src="../../assets/aulogo.png" alt="right">
                <img class="icon" src="../../assets/logo_icon.png" alt="right">
            </div>
            <div class="col-sm-8">
                
            <h1>TIME NOTIFY MONITORING SYSTEM</h1>
             <h5>AU TEACHER'S PORTAL</h5> 
            </div>
            <div class="col-sm-3 dropdown">
                <button class="btn btntoggle dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                    MENU
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                    <li class="text-center"><a href="report_grade.php" class="b">GRADE SCHOOL</a></li>
                    <li class="text-center"><a href="report_multiple.php" class="bselected">JUNIOR HIGH SCHOOL</a></li>
                    <li class="text-center"><a href="report_shs.php" class="b">SENIOR HIGH SCHOOL</a></li>
                    <li class="text-center"><a href="report_college.php" class="b">COLLEGE</a></li>
                    <li class="text-center"><a href="report_multiple.php" class="b">EXPORT</a></li>
                </ul>
            </div> 
        </div>

        <!--white-->
        <div class="row row_inner order-sm-2">

        <!-- FORM  -->
            <form action="" method="POST">

                <h4 class="text-center fw-bold">JUNIOR HIGH SCHOOL DEPARTMENT</h4> <br>
                <div class="row row_table table-bordered table-responsive-xl order-sm-2">
                <div class="container">
                    <div class="row">  

                        <!-- GRADE DROPDOWN  -->
                        <div class="col-sm-3">
                                    GRADE :
                                    <select class="form-select" name="gradeyear" aria-label="Default select example" value="<?php if(isset($_POST['gradeyear']))
                                        { $gradeandyr = $_POST['gradeyear']; } ?>">

                            <option>Select Grade</option>
                            
                            <!-- Get the data value from students table from column grade_year with no repeat value -->   
                                    <?php 
                                        $g_query = "SELECT DISTINCT grade_year FROM students WHERE
                                            grade_year LIKE ('Grade 7')
                                        OR  grade_year LIKE ('Grade 8')
                                        OR  grade_year LIKE ('Grade 9')
                                        OR  grade_year LIKE ('Grade 10') ";   
                
                                        $listresult = $con->query($g_query); 
                                            if($listresult -> num_rows > 0) {
                                                while($gradeOption=$listresult->fetch_assoc()) {
                                                    $optionGrade = $gradeOption['grade_year'];               
                                        ?> 
                                        <option value="<?= $optionGrade; ?>"> <?= $optionGrade; ?> </option>
                                        <?php
                                                }}                                   
                                        ?>
                                        </select>
                        </div>

                        <!-- SECTION DROPDOWN -->
                        <div class="col-sm-3">
                                    SECTION :
                                    <select class="form-select" name="sectionList" aria-label="Default select example" value="<?php if(isset($_POST['sectionList']))
                                        {$secList = $_POST['sectionList']; } ?>">

                                    <option>Select Section</option> 

                                    <!-- Get the data value from students table from column section with no repeat value -->                         
                                    <?php
                                        $sec_query = "SELECT DISTINCT section FROM students WHERE
                                                    grade_year LIKE ('Grade 7')
                                                OR  grade_year LIKE ('Grade 8')
                                                OR  grade_year LIKE ('Grade 9')
                                                OR  grade_year LIKE ('Grade 10') "; 

                                        $sec_result = $con->query($sec_query); 
                                        if($sec_result -> num_rows > 0) {
                                            while($secOption=$sec_result->fetch_assoc()) {
                                                $optionSec = $secOption['section'];          
                                        ?> 
                                        <option value="<?= $optionSec; ?>"> <?= $optionSec; ?> </option>
                                        <?php
                                            }}
                                        ?>
                                    </select>
                        </div> 

                        <!-- DATE DROPDOWN -->
                        <div class="col-sm-3">
                                        DATE :
                                        <select class="form-select" name= "dateList" aria-label="Default select example" value="<?php if(isset($_POST['dateList']))
                                            {$date_rec_list = $_POST['dateList']; } ?>">
                                            
                                        <option>Select Date</option>

                                    <!-- Get the data value from time_in_records table from column daterec with no repeat value specific for JHS    
                                        <php
                                            //$date_query = "SELECT DISTINCT daterec FROM time_in_records"; 
                                            $date_query = "SELECT DISTINCT daterec FROM time_in_records INNER JOIN students ON students.stud_id = time_in_records.studID  
                                                    WHERE  grade_year LIKE ('Grade 7')
                                                        OR  grade_year LIKE ('Grade 8')
                                                        OR  grade_year LIKE ('Grade 9')
                                                        OR  grade_year LIKE ('Grade 10') ";   
                                                
                                            $date_result = $con->query($date_query); 
                                            if($date_result -> num_rows > 0) {
                                                while($dateOption=$date_result->fetch_assoc()) {
                                                    $optionDate = $dateOption['daterec'];          
                                            ?> 
                                            <option value="<?= $optionDate; ?>"> <?= $optionDate; ?> </option>
                                            <php
                                                }}
                                            ?>-->
                                        
                                        </select>
                        </div>
                                    
                        <div class="col-sm-3 text-center">
                                    <button class="btn btngenreport" type="submit">GENERATE</button>                
                                        <!-- <input type="submit" class="btn btngenreport" name="generate" value="GENERATE"> -->           
                            
                        </div>

                    </div>
            </form>
            <br>  

                  <!--the table-->
                  <div class="row overflow-auto row_table2 table-bordered table-responsive-xl order-sm-2">
                        <br>
                        <table class="table  table-hover ">
                    <thead>
                        <tr class="heading">
                        <th scope="col ">No.</th>
                        <th scope="col">STUDENT</th>
                        <th scope="col">PICTURE</th>
                        <th scope="col">GRADE</th>
                        <th scope="col">SECTION</th> 
                        <th scope="col">DATE</th>
                        <th scope="col">TIME</th>
                        <th scope="col">TYPE</th>
                        </tr>
                    </thead>
                    <tbody>

                    <?php
                            if(isset($gradeandyr) && isset($secList) && isset($date_rec_list)) {  
                  
                                $query="SELECT * FROM `students` 
                                INNER JOIN time_in_records ON students.stud_id = time_in_records.studID
                                WHERE section = '$secList' AND grade_year = '$gradeandyr' AND daterec = '$date_rec_list' ";
                                       
                                $query_run= mysqli_query($con,$query);

                                if(mysqli_num_rows($query_run)>0)
                                {
                                    while($row=mysqli_fetch_assoc($query_run))
                                    {
                                        $stud_id=$row['stud_id'];
                                        $studname=$row['studname'];
                                        $picture=$row['picture'];
                                        $img_stud = "../../students/picture/".$picture;
                                        $grade_year=$row['grade_year'];
                                        $section=$row['section'];

                                        $daterec=$row['daterec'];
                                        $guardianlist=$row['guardianlist'];
                                        $timein=$row['timein'];
                                        $guardianlist2=$row['guardianlist2'];
                                        $timeout=$row['timeout'];
                                        
                                        echo'<tr>
                                                <td >'.$stud_id.'</td>
                                                <td >'.$studname.'</td>
                                                <td ><img src="'.$img_stud.'" style="width:140px; height:150px;"></td>
                                                <td >'.$grade_year.'</td>
                                                <td >'.$section.'</td>

                                                <td >'.$daterec.'</td>
                                                <td >'.$guardianlist.'</td>
                                                <td >'.$timein.'</td>
                                                
                                                <td >'.$guardianlist2.'</td>
                                                <td >'.$timeout.'</td>
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
</div>  
                    
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
  
</body>
</html>
