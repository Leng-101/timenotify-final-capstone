<?php
session_start();

// $grschool_date = $_GET['date'];
// $grschool_grade = $_GET['grade'];
// $grschool_sec = $_GET['sec'];

include_once '../../connection.php';
$con = connect();

$outputheader='';

date_default_timezone_set('Asia/Manila');
            $timestamp = time();
            $time = date("h:i:s A", $timestamp);

            $mydate=getdate(date("U"));
            $daterec = "$mydate[weekday], $mydate[month] $mydate[mday], $mydate[year]";


$outputheader.='<table class="table-bordered">
                    <tr> 
                        <th colspan="12">ARELLANO UNIVERSITY ANDRES BONIFACIO CAMPUS</th>
                    </tr>
                    <tr> 
                        <th colspan="12">ANDRES BONIFACIO CAMPUS</th>
                    </tr>
                    <tr> 
                        <th colspan="12">ALL JUNIOR HIGH SCHOOL STUDENT RECORDS</th>
                    </tr>
                    <tr> 
                        <th colspan="12"></th>
                    </tr>
                    <tr>
                        <td> </td>
                        <td>DATE GENERATED:</td>
                        <td colspan="3">'.$daterec.'</td>
                    </tr>
                    <tr>
                        <td> </td>
                        <td>TIME GENERATED:</td>
                        <td colspan="3">'.$time.'</td>
                    </tr>
                    <tr>
                        <td> </td>
                        <td>GENERATED BY:</td>
                        <td colspan="3">TIME NOTIFY TEACHER ACCOUNT</td>
                    </tr>
                </table>';

                $output='';

$output .='
        <table class="table" bordered="1">
            <thead>
                <tr class="heading">
                <th scope="col">STUDENT NUMBER</th>
                <th scope="col">NAME</th>
                <th scope="col">PICTURE NAME</th>
                <th scope="col">AGE</th>
                <th scope="col">SEX</th>
                <th scope="col">GRADE</th>
                <th scope="col">STRAND</th>
                <th scope="col">SECTION</th>
                <th scope="col">DEPARTMENT</th>
                <th scope="col">TEACHER</th>
                <th scope="col">GUARDIAN EMAIL</th>
                <th scope="col">DATE RECORD</th>
                <th scope="col">TIME</th>
                <th scope="col">TYPE</th>
                </tr>
            </thead>
                <tbody>';


                if(isset($_POST['generateExcel'])){  

                    //If the selected box is not empty
                        if(!empty($_POST['gradeyear']) && !empty($_POST['sectionList']) && 
                            !empty($_POST['dateList']) && !empty($_POST['strandList'])) {  
                            
                            $shs_grade = $_POST['gradeyear']; 
                            $shs_strand = $_POST['strandList'];  
                            $shs_sec = $_POST['sectionList'];
                            $shs_date = $_POST['dateList'];
                        } else {
                            echo 'Put a value';
                        }
                    }
                    
            // DISPLAY THE DATA BASED ON DROPDOWN BUTTON 
                    $sqlQuery = "SELECT s.stud_id, s.studnum, s.fullname, s.picture, s.age, s.sex, s.grade_year, s.section, s.department, s.teacher_prof, 
                                 s.g_email, s.strand, t.daterec, t.time, t.type FROM students s INNER JOIN time_in_records t 
                                 ON s.studnum = t.studnum WHERE s.grade_year = '$shs_grade' AND s.section = '$shs_sec' 
                                 AND s.strand = '$shs_strand' AND t.daterec = '$shs_date'"; 
                          
                            $result=mysqli_query($con,$sqlQuery);
                            if($result){
                                while($row=mysqli_fetch_assoc($result))
                                {

                                    $stud_id=$row['stud_id']; 
                                    $studnum=$row['studnum']; 
                                    $fullname=$row['fullname'];
                                   
                                    $picture=$row['picture'];
                                    $age=$row['age'];
                                    $sex=$row['sex'];

                                    $grade_year=$row['grade_year'];
                                    $strand = $row['strand'];
                                    $section=$row['section'];
                                    $department=$row['department'];
                                    $teacher_prof=$row['teacher_prof'];
                                    $g_email=$row['g_email'];

                                    $daterec = $row['daterec'];
                                    $time = $row['time'];
                                    $type = $row['type'];

                                    
                                    $output .='<tr>
                                            <td ><center>'.$stud_id.'</center></td>
                                            <td ><center>'.$fullname.'</center></td>  
                                            <td ><center>'.$picture.'</center></td> 
                                            <td ><center>'.$age.'</center></td>   
                                            <td ><center>'.$sex.'</center></td>   
                                            <td ><center>'.$grade_year.'</center></td>
                                            <td ><center>'.$strand.'</center></td>
                                            <td ><center>'.$section.'</center></td>  
                                            <td ><center>'.$department.'</center></td>  
                                            <td ><center>'.$teacher_prof.'</center></td>
                                            <td ><center>'.$g_email.'</center></td>   
                                            <td ><center>'.$daterec.'</center></td> 
                                            <td ><center>'.$time.'</center></td> 
                                            <td ><center>'.$type.'</center></td> 
                                        </tr>
                                    ';
                                }
                            }
                          
                        $output.='</table>';                                
                            
                       


    header("Content-Type: application/xls");
    header("Content-Disposition: attachment; Filename =all_senior_high_school_record.xls ");

    echo '<br>';
    echo $outputheader;
    echo '<br>';
    echo $output;


    ?>