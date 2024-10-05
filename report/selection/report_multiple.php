<?php 
    error_reporting(0);
    include_once '../../connection.php';
    $con = connect();
    session_start();

    if(!isset($_SESSION["admin_username"]))
    {
    header("Location:../../login.php");
    }
    ?>
    
    <!DOCTYPE html>
    <html lang="en">
    <head>
    <title>Student Tracking - Student Record</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../css/report.css">
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
                <div class="col-sm-7">
                    <h1>TIME NOTIFY MONITORING SYSTEM</h1>
                    <h5>REPORT GENERATION</h5>  
                </div>
                <div class="col-sm-3 dropdown">
                    <button class="btn btntoggle dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                        MENU
                    </button>
                    <ul class="dropdown-menu menu2" aria-labelledby="dropdownMenuButton1">
                        <li class="text-center"><a href="../report.php" class="b">DASHBOARD</a></li>
                        <li class="text-center"><a href="report_grade.php" class="b">GRADE SCHOOL</a></li>
                        <li class="text-center"><a href="report_jhs.php" class="b">JUNIOR HIGH SCHOOL</a></li>
                        <li class="text-center"><a href="report_shs.php" class="b">SENIOR HIGH SCHOOL</a></li>
                        <li class="text-center"><a href="report_college.php" class="b">COLLEGE</a></li>
                        <li class="text-center"><a href="report_multiple.php" class="bselected">EXPORT</a></li>
                        <li class="text-center"><a href="../../students/studentstable.php" class="b">STUDENT RECORDS</a></li>
                        <li class="text-center"><a href="../../landingpage.php" class="b">HOME</a></li>
                    </ul>
                </div> 
            </div>

            <!--white-->
            <div class="row row_inner order-sm-2 overflow-auto pt-3">
                <div class="row forms_container table-responsive-xl order-sm-2">
                    
                        <h3 class="text-center fw-bold pt-2">EXPORT REPORT</h3> 
                    <br> <br>
                    <div class="rowgrade"><br>
                        
         <!-- GRADE SCHOOL FORM  -->
                        <form class="gradeschool" action="../gen_excel/mulreport_grade_excel.php" method="POST">

                            <h4 class="text-center grade1 fw-bold pt-2">GRADESCHOOL DEPARTMENT</h4> <br>
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
                                                grade_year LIKE ('Grade 6')
                                            OR  grade_year LIKE ('Grade 2')
                                            OR  grade_year LIKE ('Grade 3')
                                            OR  grade_year LIKE ('Grade 4')
                                            OR  grade_year LIKE ('Grade 5')
                                            OR  grade_year LIKE ('Grade 1') ";   

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
                                                        grade_year LIKE ('Grade 6')
                                                    OR  grade_year LIKE ('Grade 2')
                                                    OR  grade_year LIKE ('Grade 3')
                                                    OR  grade_year LIKE ('Grade 4')
                                                    OR  grade_year LIKE ('Grade 5')
                                                    OR  grade_year LIKE ('Grade 1') "; 

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

                                                <!-- Get the data value from time_in_records table from column daterec with no repeat value specific for Gradeschool -->
                                                    <?php
                                                        $date_query = "SELECT DISTINCT daterec FROM time_in_records INNER JOIN students ON students.stud_id = time_in_records.stud_id  
                                                                WHERE  grade_year LIKE ('Grade 6')
                                                                OR  grade_year LIKE ('Grade 2')
                                                                OR  grade_year LIKE ('Grade 3')
                                                                OR  grade_year LIKE ('Grade 4')
                                                                OR  grade_year LIKE ('Grade 5')
                                                                OR  grade_year LIKE ('Grade 1') ";   
                                                            
                                                        $date_result = $con->query($date_query); 
                                                        if($date_result -> num_rows > 0) {
                                                            while($dateOption=$date_result->fetch_assoc()) {
                                                                $optionDate = $dateOption['daterec'];          
                                                        ?> 
                                                        <option value="<?= $optionDate; ?>"> <?= $optionDate; ?> </option>
                                                        <?php
                                                            }}
                                                        ?>  
                                                    
                                                    </select>
                                    </div>
                                            
                                    <div class="col-sm-3 text-center">
                                        <button formaction="../gen_pdf/genrepmul_grade.php" class="btn btngenreportgrade" type="submit" target="_blank" name="generate">PDF</button>                           
                                        <button class="btn btngenreportgrade" type="submit" target="_blank" name="generateExcel">EXCEL</button>                          
                                    </div>
                            </div>
                        </form> 
                        <br><br>
                    </div>
  <!-- GRADE SCHOOL FORM  -->
            
        <!-- JHS SCHOOL FORM  -->
                    <div class="rowgrade">
                        <form class="jhs1" action="../gen_excel/mulreport_jhs_excel.php" method="POST">

                            <h4 class="text-center fw-bold">JUNIOR HIGH SCHOOL DEPARTMENT</h4> <br>
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

                                                <!-- Get the data value from time_in_records table from column daterec with no repeat value specific for JHS --> 
                                                    <?php
                                                        //$date_query = "SELECT DISTINCT daterec FROM time_in_records"; 
                                                        $date_query = "SELECT DISTINCT daterec FROM time_in_records INNER JOIN students ON students.stud_id = time_in_records.stud_id 
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
                                                        <?php
                                                            }}
                                                        ?>   
                                                    
                                                    </select>
                                    </div>
                                                
                                    <div class="col-sm-3 text-center">
                                                <button formaction="../gen_pdf/genrepmul_jhs.php" class="btn btngenreportjhs" type="submit">PDF</button>                
                                                <button class="btn btngenreportjhs" type="submit" name="generateExcel">EXCEL</button>                      
                                    </div>
                                </div>
                        </form> <br><br>
                    </div>    
        <!-- END OF JHS SCHOOL FORM  -->
                
                    
          <!-- SHS  SCHOOL FORM  -->
                    <div class="rowgrade">
                        <form class="shs1" action="../gen_excel/mulreport_shs_excel.php" method="POST">

                            <h4 class="text-center  fw-bold">SENIOR HIGH SCHOOL DEPARTMENT</h4> <br>
                                <div class="row">  

                                    <!-- GRADE DROPDOWN  -->
                                        <div class="col-sm-2">
                                                GRADE :
                                                <select class="form-select" name="gradeyear" aria-label="Default select example" value="<?php if(isset($_POST['gradeyear']))
                                                    { $gradeandyr = $_POST['gradeyear']; } ?>">

                                            <option>Select Grade</option>
                                            
                                            <!-- Get the data value from students table from column grade_year with no repeat value -->   
                                                    <?php 
                                                        $g_query = "SELECT DISTINCT grade_year FROM students WHERE
                                                            grade_year LIKE ('Grade 11')
                                                        OR  grade_year LIKE ('Grade 12') ";   

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
                                    <!-- STRAND DROPDOWN -->
                                    <div class="col-sm-3">
                                            STRAND :
                                            <select class="form-select" name= "strandList" aria-label="Default select example" value="<?php if(isset($_POST['strandList']))
                                                {$strand_list = $_POST['strandList']; } ?>">
                                                    
                                                <option>Select Date</option>

                                                <!-- Get the data value from students table from column strand with no repeat value specific for JHS -->      
                                                    <?php
                                                        //$date_query = "SELECT DISTINCT daterec FROM time_in_records"; 
                                                        $strand_query = "SELECT DISTINCT strand FROM students WHERE
                                                                    grade_year LIKE ('Grade 11')
                                                                OR  grade_year LIKE ('Grade 12') ";   
                                                            
                                                        $strand_result = $con->query($strand_query); 
                                                        if($strand_result -> num_rows > 0) {
                                                            while($strandOption=$strand_result->fetch_assoc()) {
                                                                $optionStrand = $strandOption['strand'];          
                                                        ?> 
                                                        <option value="<?= $optionStrand; ?>"> <?= $optionStrand; ?> </option>
                                                        <?php
                                                            }}
                                                        ?>                           
                                                    </select>
                                        </div> 

                                    <!-- SECTION DROPDOWN -->
                                        <div class="col-sm-2">
                                            SECTION :
                                            <select class="form-select" name="sectionList" aria-label="Default select example" value="<?php if(isset($_POST['sectionList']))
                                                {$secList = $_POST['sectionList']; } ?>">

                                            <option>Select Section</option> 

                                            <!-- Get the data value from students table from column section with no repeat value -->                         
                                            <?php
                                                $sec_query = "SELECT DISTINCT section FROM students WHERE
                                                            grade_year LIKE ('Grade 11')
                                                        OR  grade_year LIKE ('Grade 12') "; 

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

                                                    <!-- Get the data value from time_in_records table from column daterec with no repeat value specific for JHS -->  
                                                        <?php
                                                            //$date_query = "SELECT DISTINCT daterec FROM time_in_records"; 
                                                            $date_query = "SELECT DISTINCT daterec FROM time_in_records INNER JOIN students ON students.stud_id = time_in_records.stud_id  
                                                                    WHERE  grade_year LIKE ('Grade 11')
                                                                        OR  grade_year LIKE ('Grade 12')  ";   
                                                                
                                                            $date_result = $con->query($date_query); 
                                                            if($date_result -> num_rows > 0) {
                                                                while($dateOption=$date_result->fetch_assoc()) {
                                                                    $optionDate = $dateOption['daterec'];          
                                                            ?> 
                                                            <option value="<?= $optionDate; ?>"> <?= $optionDate; ?> </option>
                                                            <?php
                                                                }}
                                                            ?>                               
                                                        </select>
                                        </div> <br><br><br>

                                        <div class="col-sm-2 text-center">
                                            <button formaction="../gen_pdf/genrepmul_shs.php"  class="btn btngenreportshs" type="submit">PDF</button>                
                                            <!-- <input type="submit" class="btn btngenreport" name="generate" value="GENERATE"> -->   
                                            <button class="btn btngenreportshs" type="submit" name="generateExcel">EXCEL</button>                
                                        </div>
                                </div>
                        </form> <br><br>
                    </div> 
            <!-- SHS  SCHOOL FORM  -->

             <!-- COLLEGE  SCHOOL FORM  -->
                    <div class="rowgrade">
                        <form class="college1" action="../gen_excel/mulreport_coll_excel.php" method="POST">

                            <h4 class="text-center col fw-bold">COLLEGE DEPARTMENT</h4> <br>
                                <div class="row">  

                                    <!-- GRADE DROPDOWN  -->
                                        <div class="col-sm-2">
                                            YEAR :
                                            <select class="form-select" name="gradeyear" aria-label="Default select example" value="<?php if(isset($_POST['gradeyear']))
                                                { $gradeandyr = $_POST['gradeyear']; } ?>">

                                            <option>Select Year</option>
                                    
                                            <!-- Get the data value from students table from column grade_year with no repeat value -->   
                                            <?php 
                                                $g_query = "SELECT DISTINCT grade_year FROM students WHERE
                                                    grade_year LIKE ('1st year')
                                                OR  grade_year LIKE ('2nd year') 
                                                OR  grade_year LIKE ('3rd year') 
                                                OR  grade_year LIKE ('4th year') ";   

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
                                    
                                    <!-- COURSE DROPDOWN -->
                                        <div class="col-sm-3">
                                                COURSE :
                                                <select class="form-select" name= "courseList" aria-label="Default select example" value="<?php if(isset($_POST['courseList']))
                                                    {$course_list = $_POST['courseList']; } ?>">
                                                    
                                                <option>Select Course</option>

                                                <!-- Get the data value from students table from column course with no repeat value specific for Collage -->      
                                                <?php
                                                    //$date_query = "SELECT DISTINCT daterec FROM time_in_records"; 
                                                    $strand_query = "SELECT DISTINCT course FROM students WHERE
                                                                grade_year LIKE ('1st year')
                                                            OR  grade_year LIKE ('2nd year') 
                                                            OR  grade_year LIKE ('3rd year') 
                                                            OR  grade_year LIKE ('4th year') ";   
                                                        
                                                    $strand_result = $con->query($strand_query); 
                                                    if($strand_result -> num_rows > 0) {
                                                        while($strandOption=$strand_result->fetch_assoc()) {
                                                            $optionStrand = $strandOption['course'];          
                                                    ?> 
                                                    <option value="<?= $optionStrand; ?>"> <?= $optionStrand; ?> </option>
                                                    <?php
                                                        }}
                                                    ?>                           
                                                </select>
                                        </div> 

                                    <!-- SECTION DROPDOWN -->
                                        <div class="col-sm-2">
                                            SECTION :
                                            <select class="form-select" name="sectionList" aria-label="Default select example" value="<?php if(isset($_POST['sectionList']))
                                                {$secList = $_POST['sectionList']; } ?>">

                                            <option>Select Section</option> 

                                            <!-- Get the data value from students table from column section with no repeat value -->                         
                                            <?php
                                                $sec_query = "SELECT DISTINCT section FROM students WHERE
                                                            grade_year LIKE ('1st year')
                                                        OR  grade_year LIKE ('2nd year') 
                                                        OR  grade_year LIKE ('3rd year') 
                                                        OR  grade_year LIKE ('4th year')"; 

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

                                            <!-- Get the data value from time_in_records table from column daterec with no repeat value specific for JHS   -->   
                                            <?php
                                                $date_query = "SELECT DISTINCT daterec FROM time_in_records"; 
                                                $date_query = "SELECT DISTINCT daterec FROM time_in_records INNER JOIN students ON students.stud_id = time_in_records.stud_id
                                                        WHERE  grade_year LIKE ('1st year')
                                                            OR  grade_year LIKE ('2nd year') 
                                                            OR  grade_year LIKE ('3rd year') 
                                                            OR  grade_year LIKE ('4th year')";   
                                                    
                                                $date_result = $con->query($date_query); 
                                                if($date_result -> num_rows > 0) {
                                                    while($dateOption=$date_result->fetch_assoc()) {
                                                        $optionDate = $dateOption['daterec'];          
                                                ?> 
                                                <option value="<?= $optionDate; ?>"> <?= $optionDate; ?> </option>
                                                <?php
                                                    }}
                                                ?>   

                                            </select>
                                        </div> 

                                        <div class="col-sm-2 text-center">
                                            <button formaction="../gen_pdf/genrepmul_college.php" class="btn btngenreportcol"  type="submit">PDF</button>                
                                                <!-- <input type="submit" class="btn btngenreport" name="generate" value="GENERATE"> -->   
                                            <button class="btn btngenreportcol" type="submit" name="generateExcel">EXCEL</button>                

                                        </div>
                                </div>
                        </form> <br><br>
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