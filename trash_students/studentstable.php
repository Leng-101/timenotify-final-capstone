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
    <title>Time Notify - AUABC </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/studentstable.css">
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
                <h5>TRASH RECORDS</h5> 
            </div>
            <div class="col-sm-2 dropdown">
                <button class="btn btntoggle dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                    MENU
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                    <li class="text-center"><a href="studentstablesearch.php" class="b">SEARCH</a></li>
                    <li class="text-center"><a href="StudentDeleteAllForm.php" class="b">DELETE ALL PEMANENTLY</a></li>
                    <li class="text-center"><a href="../students/studentstable.php" class="b">STUDENT LIST</a></li>
                    <li class="text-center"><a href="../landingpage.php" class="b">HOME</a></li>
                </ul>
            </div> 
        </div>
        
        <!--tableee-->
        <div class="row row_inner row_center order-sm-2">
            <div class="row overflow-auto  row_table table-bordered table-responsive-xl order-sm-2">
                <br>
            <table class="table text-center table-hover ">
                <thead>
                    <tr class="heading">
                    <th scope="col">STUDENT NUMBER</th>
                    <th scope="col">NAME</th>
                    <th scope="col">PICTURE</th>
                    <th scope="col">GRADE</th>
                    <th scope="col">STRAND</th>
                    <th scope="col">COURSE</th>
                    <th scope="col">TEACHER</th>
                    <th scope="col">ACTION</th>
                    </tr>
                </thead>
                <tbody>
                    <?php  
                            $sql="Select * from `s_trash` ORDER BY age, lastname, grade_year, strand, course";
                            $result=mysqli_query($con,$sql);

                            if($result){
                                while($row=mysqli_fetch_assoc($result))
                                {
                                    
                                    $stud_id=$row['stud_id']; 
                                    $studnum=$row['studnum']; 
                                    $lastname=$row['lastname'];
                                    $middlename=$row['middlename'];
                                    $firstname=$row['firstname'];
                                    $picture=$row['picture'];
                                    $img_src = "../students/picture/".$picture; //hack code
                                    $grade_year=$row['grade_year'];
                                    $strand=$row['strand'];
                                    $course=$row['course'];
                                    $teacher_prof=$row['teacher_prof'];

                                    $_SESSION['student_id'] = $stud_id; //Session StudID

                                    
                                    echo'<tr>
                                            <td >'.$studnum.'</td>
                                            <td >'.$lastname.', '.$firstname.' '.$middlename.'</td>       
                                            <td ><img src="'.$img_src.'" style="width:140px; height:150px;"></td>
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
                                                <li class="text-center"><a href="StudentDeleteForm.php?deletestud_id='.$stud_id.'" class="b">DELETE PERMANENTLY</a></li>
                                                <li class="text-center"><a href="Studentrecover.php?deletestud_id='.$stud_id.'&recover_id='.$studnum.'" class="b">RECOVER</a></li>
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
