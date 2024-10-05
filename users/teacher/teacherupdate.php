<?php
    //error_reporting(0);
    include_once '../../connection.php';
    $con = connect();
    session_start();

    if(!isset($_SESSION["admin_username"]))
    {
    header("Location:../../login.php");
    }

    $teacher_id=$_GET['teacher_id'];

    $sql="SELECT * FROM teachers_acc WHERE teacher_id='$teacher_id' ";
    $con = connect(); 
    $result=mysqli_query($con,$sql);
    $row= mysqli_fetch_assoc($result);

        $teacher_id=$row['teacher_id'];
        $t_username=$row['t_username'];
        $t_password=$row['t_password'];
        $t_department=$row['t_department'];
        $t_email=$row['t_email'];

    if(isset($_POST['update']))  {

        $t_username = $_POST['t_username'];
        $t_password = $_POST['t_password'];
        $t_department = $_POST['t_department'];
        $t_email=$_POST['t_email'];

            $sql = "UPDATE teachers_acc SET t_username='$t_username',
            t_password = '$t_password',
            t_department = '$t_department',
            t_email = '$t_email' 
            where teacher_id = '$teacher_id'";
                        
                $result=mysqli_query($con,$sql);
                            
                 if($result)
                {
                    header('location:../main.php');           
                }    
                else 
                {
                    echo "Faileddddd :<";
                    die(mysqli_error($con));
                }
            }

        
//
   
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Student Tracking</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" type="text/css" href="../css/userform.css">
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,500;0,700;1,600&display=swap" rel="stylesheet">
  <link rel="icon" href="../../assets/logo_icon.png" type="image/x-icon"> <!-- Logo of Website -->
</head>

<body>
    
<div class="cont">
    <br>
    <div class="row row_outer">
        
        <form class="row g-3 row_inner" action="" method="post" enctype="multipart/form-data">
        <div class="col-sm-1 text-center">
            </div>
            <div class="col-sm-2 text-center">
                <img class="icon" src="../../assets/aulogo.png" alt="right">
                <img class="icon" src="../../assets/logo_icon.png" alt="right">
            </div>
            <div class="col-sm-8 row_upper">
                <h1>TIME NOTIFY MONITORING SYSTEM</h1>
                <h5>UPDATE TEACHER ACCOUNT</h5> 
            </div>

            <div class="row">
                <div class="row order-sm-1">

                    <!--left-->
                    <div class="col-md-4 order-sm-1">
                    </div>

                    <!--center-->
                    <div class="col-md-4 order-sm-2">
                    <div class="row-md-4">
                            <label for="sg_id" class="form-label"> Account Number:</label>
                            <input type="text" class="form-control" id="sg_id" name="sg_id" value="<?php echo $teacher_id;?>" disabled>
                    </div>
                    <div class="row-md-4">
                            <label for="t_username" class="form-label">Username:</label>
                            <input type="text" class="form-control" id="t_username" name="t_username" value="<?php echo $t_username;?>" required>
                        </div>
                    <div class="row-md-4">
                        <label for="t_password" class="form-label">Password:</label>
                        <input type="text" class="form-control" id="t_password" name="t_password" value="<?php echo $t_password;?>" required>
                    </div>
                    <div class="row-md-4">
                        <label for="t_department" class="form-label">Department:</label>
                        <select class="form-select form-select-sm department_textbox" aria-label=".form-select-sm example" id="t_department" name="t_department" required>
                                <option selected value="<?php echo $t_department;?>"><?php echo $t_department;?></option>
                                <option value="Grade School">Grade school</option>
                                <option value="Junior High School">Junior High School</option>
                                <option value="Senior High School">Senior High School</option>
                                <option value="College">College</option>
                            </select>
                    </div>
                    <div class="row-md-4">
                        <label for="t_email" class="form-label">Gmail:</label>
                        <input type="text" class="form-control" id="t_email" name="t_email" value="<?php echo $t_email;?>" required>
                    </div>

                    </div>

                    <!--right-->
                    <div class="col-md-4 order-sm-3">
                
                    </div>
                </div>

            <div class="row buttondiv order-sm-2">
                <div class="col-md-2 order-sm-1">
                </div>
                <div class="col-md-4 order-sm-2">
                    <!-- <button type="submit" name="save" class="btn1">ADD STUDENT RECORD</button> -->
                    <button type="update" class="btn2" name="update">UPDATE ACCOUNT</button>
                    <!--<a href="../main.php" class="a"><input type="update" class="btn1" name="update" value="UPDATE ACCOUNT"></a>-->
                </div>
                <div class="col-md-4 order-sm-3">
                    <button type="submit" class="btn2"><a href="../main.php" class="a">VIEW ACCOUNTS</a></button>
                </div>
                <div class="col-md-2 order-sm-4">
                   </div>
            </div>

        </form>
        

    </div>
</div>
   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
  </body>

</html>