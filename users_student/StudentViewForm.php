<?php
error_reporting(0);
include_once '../connection.php';
$con = connect();
session_start();

//if(!isset($_SESSION["admin_username"]))
//{
//header("Location:../login_student.php");
//}

$stud_id=$_GET['stud_id'];

$sql="SELECT * FROM students WHERE stud_id='$stud_id'";
$con = connect(); 
$result=mysqli_query($con,$sql);
$row= mysqli_fetch_assoc($result);

    $stud_id=$row['stud_id'];
    $studnum=$row['studnum'];
    $picture=$row['picture'];
    $img_src = "picture/".$picture;
    $lastname=$row['lastname'];
    $middlename=$row['middlename'];
    $firstname=$row['firstname'];
    
    $age=$row['age'];
    $sex=$row['sex'];

    $grade_year=$row['grade_year'];
    $strand=$row['strand'];
    $course=$row['course'];
    $section=$row['section'];
    $department = $row['department'];
    $g_email=$row['g_email'];

    $teacher_prof=$row['teacher_prof'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>Time Notify Student Guardian Portal</title>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" type="text/css" href="css/students.css">
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,500;0,700;1,600&display=swap" rel="stylesheet">
  <link rel="icon" href ="../assets/logo_icon.png" type="image/x-icon"> <!-- Logo of Website -->
</head>

<body>
    
<div class="cont">
    
    <div class="row row_outer">
        
        <form class="row g-3 row_inner" action="#" method="post">
            <div class="col-sm-2 text-center">
                <img class="icon" src="../assets/aulogo.png" alt="right">
                <img class="icon" src="../assets/logo_icon.png" alt="right"><br> 

            </div>
            <div class="col-sm-10">
                <h1>TIME NOTIFY MONITORING SYSTEM</h1>
                <h5>STUDENT TIME PORTAL</h5> 
            </div>

            <div class="row">

                <!--left-->
                <div class="col-md-4 order-sm-1">
                <div class="row-md-4">
                    <label for="studnum" class="form-label">Student Number:</label>
                    <input type="text" class="form-control" id="studnum" name="studnum" value="<?php echo $studnum;?>"disabled>
                </div>
                <div class="row-md-4">
                    <label for="picture" class="form-label">Picture:</label>
                    <!-- Student Picture Name -->
                    <center> <img src="<?php echo "../students/picture/".$row['picture'];?>" alt="image" width="245px" height="245px"></center> <br>
                    <input type="text" class="form-control" name ="stud_old_img" value="<?php echo $row['picture'];?>" disabled > 
                    
                </div>
                </div>

                <!--center-->
                <div class="col-md-4 order-sm-2">
                
                <div class="row-md-4">
                    <label for="lastname" class="form-label">Last Name:</label>
                    <input type="text" class="form-control" id="lastname" name="lastname"  value="<?php echo $lastname;?>" disabled>
                </div>
                <div class="row-md-4">
                    <label for="firstname" class="form-label">First Name:</label>
                    <input type="text" class="form-control" id="firstname" name="firstname" value="<?php echo $firstname;?>" disabled>
                </div>
                
                <div class="row-md-4">
                <label for="middlename" class="form-label">Middle Name:</label>
                <input type="text" class="form-control" id="midname" name="middlename" value="<?php echo $middlename;?>" disabled>
                </div>
                <div class="row-md-4">
                    <label for="age" class="form-label">Age:</label>
                    <input type="text" class="form-control" id="age" name="age" value="<?php echo $age;?>" disabled>
                </div>
                <div class="row-md-4">
                    <label for="sex" class="form-label">Sex:</label>
                    <input type="text" class="form-control" id="sex" name="sex" value="<?php echo $sex;?>" disabled>
                </div>

                <div class="row-md-4">
                        <label for="department" class="form-label">Department:</label>
                        <input type="text" class="form-control" id="department" name="department" value="<?php echo $department;?>" disabled>
                    </div>
                </div>

                <!--right-->
                <div class="col-md-4 order-sm-3">

                    <div class="row-md-4">
                        <label for="grade_year" class="form-label">Grade / Year Level: </label>
                        <input type="text" class="form-control" id="grade_year" name="grade_year" value="<?php echo $grade_year;?>" disabled>
                    </div>
                    <div class="row-md-4">
                        <label for="strand" class="form-label">Strand: </label>
                        <input type="text" class="form-control" id="strand" name="strand" value="<?php echo $strand;?>" disabled>
                    </div>
                    <div class="row-md-4">
                        <label for="course" class="form-label">Course: </label>
                        <input type="text" class="form-control" id="course" name="course" value="<?php echo $course;?>" disabled>
                    </div>
                    <div class="row-md-4">
                        <label for="section" class="form-label">Section:</label>
                        <input type="text" class="form-control" id="section" name="section" value="<?php echo $section;?>" disabled>
                    </div>
                    <div class="row-md-4">
                        <label for="teacher" class="form-label">Teacher / Professor:</label>
                        <input type="text" class="form-control" id="teacher_prof" name="teacher_prof" value="<?php echo $teacher_prof;?>" disabled>
                    </div>

                    <div class="row-md-4">
                    <label for="g_email" class="form-label">Guardian Email:</label>
                    <input type="text" class="form-control" id="g_email" name="g_email" value="<?php echo $g_email;?>" disabled>
                </div>

                </div>
            
            </div>

            <div class="row buttondiv">
                <div class="col-md-4 order-sm-1">
                </div>
                <div class="col-md-4 order-sm-2">
                    <button type="submit" class="btn2"><a href="timetable.php?stud_id=<?php echo $stud_id;?>" class="a">BACK</a></button>
                </div>
                <div class="col-md-4 order-sm-5">
                   </div>
            </div>

        </form>
        <br>

    </div>
</div>
   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
  </body>

</html>
