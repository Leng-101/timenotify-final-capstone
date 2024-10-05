<?php 
    //error_reporting(0);
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
    <title>Student Tracking - Users</title>
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
        
        <div class="row row_upper order-sm-1">
            <div class="col-sm-2 text-center">
                <img class="icon" src="../assets/aulogo.png" alt="right">
                <img class="icon" src="../assets/logo_icon.png" alt="right">
            </div>
            <div class="col-sm-7">
                <h1>TIME NOTIFY MONITORING SYSTEM</h1>
                <h5>USERS ACCOUNTS</h5> 
            </div>
            <div class="col-sm-3 dropdown">
                <button class="btn btntoggle dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                    MENU
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                    <li class="text-center"><a href="teacher/teacheradd.php" class="b">ADD TEACHER ACCOUNT</a></li>
                    <li class="text-center"><a href="student-guardian/studguaradd.php" class="b">ADD STUDENT ACCOUNT</a></li>
                    <li class="text-center"><a href="../landingpage.php" class="b">HOME</a></li>
                </ul>
            </div> 
        </div>
        
        <!--tableee-->
        <div class="row row_inner order-sm-2">
            <div class="row overflow-auto row_table table-bordered table-responsive-xl order-sm-2">
           <center class="fw-bold section_title"> TEACHERS ACCOUNTS</center> <br> <br>
            <table class="table table-hover ">
                <thead>
                    <tr class="heading">
                    <th scope="col ">No.</th>
                    <th scope="col">USERNAME</th>
                    <th scope="col">PASSWORD</th>
                    <th scope="col">DEPARTMENT</th>
                    <th scope="col">EMAIL</th>
                    <th scope="col">ACTIONS</th>
                    </tr>
                </thead>
                <tbody>
                    <?php  
                            $sql="Select * from `teachers_acc`";
                            $result=mysqli_query($con,$sql);

                            if($result){
                                while($row=mysqli_fetch_assoc($result))
                                {
                                    
                                    $teacher_id=$row['teacher_id']; 
                                    $t_username=$row['t_username'];
                                    $t_password=$row['t_password'];
                                    $t_department=$row['t_department'];
                                    $t_email=$row['t_email'];

                                    
                                    echo'<tr>
                                            <td >'.$teacher_id.'</td>
                                            <td >'.$t_username.'</td> 
                                            <td >'.$t_password.'</td>
                                            <td >'.$t_department.'</td>
                                            <td >'.$t_email.'</td>
                                            <td class="buttons">
                                            <div class="col-sm-12 dropdown">
                                            <button class="btn fw-bold table_button dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                                MANAGE
                                            </button>
                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                                <li class="text-center"><a href="teacher/teacherupdate.php?teacher_id='.$teacher_id.'" class="b" >UPDATE</a></li>
                                                <li class="text-center"><a href="teacher/teacherdelete.php?teacher_id='.$teacher_id.'" class="b">DELETE</a></li>
                                            </ul>
                                        </div> 
                                                </td>
                                        <tr>
                                    ';
                                }
                            }
                       ?>
                </tbody>
            </table>

            <br><p class="pt-2 fw-bold section_title text-center">STUDENTS ACCOUNTS </p><br> <br>
            <table class="table table-hover ">
                <thead>
                    <tr class="heading">
                    <th scope="col ">No.</th>
                    <th scope="col">USERNAME</th>
                    <th scope="col">PASSWORD</th>
                    <th scope="col">STUDENT ID</th>
                    <th scope="col">ACTIONS</th>
                    </tr>
                </thead>
                <tbody>
                    <?php  
                            $sql="Select * from `studguardian_acc`";
                            $result=mysqli_query($con,$sql);

                            if($result){
                                while($row=mysqli_fetch_assoc($result))
                                {
                                    
                                    $sg_id=$row['sg_id']; 
                                    $sg_username=$row['sg_username'];
                                    $sg_password=$row['sg_password'];
                                    $sg_stud_id=$row['sg_stud_id'];

                                    
                                    echo'<tr>
                                            <td >'.$sg_id.'</td>
                                            <td >'.$sg_username.'</td> 
                                            <td >'.$sg_password.'</td>
                                            <td >'.$sg_stud_id.'</td>
                                            <td class="buttons">
                                            <div class="col-sm-12 dropdown">
                                            <button class="btn fw-bold table_button dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                                MANAGE
                                            </button>
                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                                <li class="text-center"><a href="student-guardian/studguarupdate.php?sg_id='.$sg_id.'" class="b" >UPDATE</a></li>
                                                <li class="text-center"><a href="student-guardian/studguardelete.php?sg_id='.$sg_id.'" class="b">DELETE</a></li>
                                            </ul>
                                        </div> 
                                                </td>
                                        <tr>
                                    ';
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
