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
  <link rel="stylesheet" type="text/css" href="css/students.css">
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,500;0,700;1,600&display=swap" rel="stylesheet">
  <link rel="icon" href="../assets/logo_icon.png" type="image/x-icon"> <!-- Logo of Website -->
</head>

<body>
    
<div class="cont">
    
    <div class="row row_outer">
        
        <form class="row g-3 row_inner" action="StudentQrcode.php" method="POST" enctype="multipart/form-data">
            <div class="col-sm-2 text-center">
                <img class="icon" src="../assets/logo_icon.png" alt="right">
                <img class="icon" src="../assets/aulogo.png" alt="right">
            </div>
            <div class="col-sm-10 row_upper">
                <h1>TIME NOTIFY MONITORING SYSTEM</h1>
                <h5>CREATE STUDENT RECORD</h5> 
            </div>

            <div class="row">
                <?php
                        if($_GET["error"]==1) 
                        {
                            echo '<p style="color: red; font-size: 15px; text-align: center;"> Student Number Already Exists.</p>';
                        } 
                        if($_GET["error"]==2) 
                        {
                            echo '<p style="color: red; font-size: 15px; text-align: center;"> Student Image Already Exists.</p>';
                        } 
                ?>

                <!--left-->
                <div class="col-md-4 order-sm-1">
                <div class="row-md-4">
                    <label for="studnum" class="form-label">Record ID.:</label>
                    <input type="text" class="form-control" id="recnum" name="recnum" disabled>
                </div>
                <!-- PICTURE -->
                <div class="row-md-4">
                    <label for="picture" class="form-label">Picture:</label>
                    <input class="form-control" type="file" id="file" name="picture" required>
            
                </div>
                <div class="row-md-4">
                    <label for="lastname" class="form-label">Last Name:</label>
                    <input type="text" class="form-control" id="lastname" name="lastname" required>
                </div>
                <div class="row-md-4">
                    <label for="firstname" class="form-label">First Name:</label>
                    <input type="text" class="form-control" id="firstname" name="firstname" required>
                </div>
                <div class="row-md-4">
                <label for="middlename" class="form-label">Middle Name:</label>
                <input type="text" class="form-control" id="middlename" name="middlename" required>
                </div>
                </div>

                <!--center-->
                <div class="col-md-4 order-sm-2">
                
                    <div class="row-md-4">
                        <label for="studnum" class="form-label">Student No.:</label>
                        <input type="text" class="form-control" id="studnum" name="studnum">
                    </div>
                    <div class="row-md-4">
                        <label for="grade_year" class="form-label">Grade / Year Level: </label>
                        <select class="form-select form-select-sm department_textbox" aria-label=".form-select-sm example" id="grade_year" name="grade_year" required>
                            <option selected value="Pre-Kindergarten">Pre-Kindergarten</option>
                            <option value="Kindergarten">Kindergarten</option>
                            <option value="Grade 1">Grade 1</option>
                            <option value="Grade 2">Grade 2</option>
                            <option value="Grade 3">Grade 3</option>
                            <option value="Grade 4">Grade 4</option>
                            <option value="Grade 5">Grade 5</option>
                            <option value="Grade 6">Grade 6</option>
                            <option value="Grade 7">Grade 7</option>
                            <option value="Grade 8">Grade 8</option>
                            <option value="Grade 9">Grade 9</option>
                            <option value="Grade 10">Grade 10</option>
                            <option value="Grade 11">Grade 11</option>
                            <option value="Grade 12">Grade 12</option>
                            <option value="1st year">1st year</option>
                            <option value="2nd year">2nd year</option>
                            <option value="3rd year">3rd year</option>
                            <option value="4th year">4th year</option>
                        </select>
                    </div>
                    <div class="row-md-4">
                        <label for="strand" class="form-label">Strand: </label>
                        <select class="form-select form-select-sm department_textbox" aria-label=".form-select-sm example" id="strand" name="strand" required>
                            <option selected value="None-Grade School"> None-Grade School</option>
                            <option value="None-JHS">None-JHS</option>
                            <option value="None-College">None-College</option>
                            <option value="ABM">ABM</option>
                            <option value="GAS">GAS</option>
                            <option value="HUMSS">HUMSS</option>
                            <option value="STEM">STEM</option>
                            <option value="Home Economics">Home Economics</option>
                            <option value="ICT">ICT</option>
                            <option value="Industrial Arts">Industrial Arts</option>
                        </select>
                    </div>
                    <div class="row-md-4">
                        <label for="course" class="form-label">Course: </label>
                        <select class="form-select form-select-sm department_textbox" aria-label=".form-select-sm example" id="course" name="course" required>
                            <option selected value="None-Grade School"> None-Grade School</option>
                            <option value="None-JHS">None-JHS</option>
                            <option value="None-SHS">None-SHS</option>
                            <option value="Bachelor of Science in Nursing">Bachelor of Science in Nursing</option>
                            <option value="Bachelor of Elementary Education Major in General Education">Bachelor of Elementary Education Major in General Education</option>
                            <option value="Bachelor of Elementary Education">Bachelor of Elementary Education</option>
                            <option value="Bachelor of Physical Education">Bachelor of Physical Education</option>
                            <option value="Bachelor of Secondary Education">Bachelor of Secondary Education</option>
                            <option value="Bachelor of Science in Business Administration Major in Marketing Management">Bachelor of Science in Business Administration Major in Marketing Management</option>
                            <option value="Bachelor of Science in Business Administration Major in Financial Management">Bachelor of Science in Business Administration Major in Financial Management</option>
                            <option value="Bachelor of Science in Information Technology">Bachelor of Science in Information Technology</option>
                            <option value="Bachelor of Science in Computer Science">Bachelor of Science in Computer Science</option>
                            <option value="Bachelor of Science in Hospitality Management">Bachelor of Science in Hospitality Management</option>
                            <option value="Bachelor of Science in Tourism Management">Bachelor of Science in Tourism Management</option>
                            <option value="Bachelor of Science in Criminology">Bachelor of Science in Criminology</option>
                            <option value="Bachelor of Arts in English Language">Bachelor of Arts in English Language</option>
                            <option value="Bachelor of Arts in Psychology">Bachelor of Arts in Psychology</option>
                            <option value="Bachelor of Arts in Political Science">Bachelor of Arts in Political Science</option>
                            <option value="Diploma in Midwifery">Diploma in Midwifery</option>
                        </select>
                    </div>
                    <div class="row-md-4">
                        <label for="section" class="form-label">Section:</label>
                        <input type="text" class="form-control" id="section" name="section" >
                    </div>

                </div>

                <!--right-->
                <div class="col-md-4 order-sm-3">
                    
                    <div class="row-md-4">
                        <label for="teacher" class="form-label">Teacher / Professor:</label>
                        <input type="text" class="form-control" id="teacher_professor" name="teacher_professor" required>
                    </div>
                    <div class="row-md-4">
                        <label for="age" class="form-label">Age:</label>
                        <input type="text" class="form-control" id="age" name="age" required>
                    </div>
                    <div class="row-md-4">
                        <label for="sex" class="form-label">Sex:</label>
                        <select class="form-select form-select-sm department_textbox" aria-label=".form-select-sm example" id="sex" name="sex" required>
                            <option selected value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                    </div>

                    <div class="row-md-4">
                        <label for="grade_year" class="form-label">Department:</label>
                        <select class="form-select form-select-sm department_textbox" aria-label=".form-select-sm example" id="department" name="department" required>
                            <option selected value="Grade School">Grade School</option>
                            <option value="Junior High">Junior High</option>
                            <option value="Senior High">Senior High</option>
                            <option value="College">College</option>
		            </select>
                    </div>

                    <div class="row-md-4">
                        <label for="g_email" class="form-label">Guardian Email:</label>
                        <input type="email" class="form-control" id="g_email" name="g_email" required placeholder="@gmail.com">
                    </div>
                    
                </div>           
            </div>


            <div class="row buttondiv">
            <br><br><br>
                <div class="col-md-2 order-sm-1">
                </div>
                <div class="col-md-4 order-sm-2">
                    <button type="submit" class="btn1" name="submittoqr">ADD STUDENT RECORD</button><a href="studentstable.php?stud_id=<?php echo $stud_id;?>" class="a"></a>
                </div>
                <div class="col-md-4 order-sm-3">
                    <button type="submit" class="btn2"><a href="studentstable.php" class="a">VIEW STUDENT LIST</a></button>
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