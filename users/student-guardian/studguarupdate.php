<?php
    //error_reporting(0);
    include_once '../../connection.php';
    $con = connect();
    session_start();

    if(!isset($_SESSION["admin_username"]))
    {
    header("Location:../../login.php");
    }

    $sg_id=$_GET['sg_id'];

    $sql="SELECT * FROM studguardian_acc WHERE sg_id='$sg_id' ";
    $con = connect(); 
    $result=mysqli_query($con,$sql);
    $row= mysqli_fetch_assoc($result);

        $sg_id=$row['sg_id'];
        $sg_username=$row['sg_username'];
        $sg_password=$row['sg_password'];
        $sg_stud_id=$row['sg_stud_id'];

    if(isset($_POST['update']))  {

        $sg_username = $_POST['sg_username'];
        $sg_password = $_POST['sg_password'];
        $sg_stud_id= $_POST['sg_stud_id'];

            $sql = "UPDATE studguardian_acc SET sg_username='$sg_username',
            sg_password = '$sg_password',
            sg_stud_id = '$sg_stud_id'
            where sg_id = '$sg_id'";
                        
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
                <h5>UPDATE STUDENT ACCOUNT</h5> 
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
                            <input type="text" class="form-control" id="sg_id" name="sg_id" value="<?php echo $sg_id;?>" disabled>
                    </div>
                    <div class="row-md-4">
                            <label for="sg_username" class="form-label">Username:</label>
                            <input type="text" class="form-control" id="sg_username" name="sg_username" value="<?php echo $sg_username;?>" required>
                        </div>
                    <div class="row-md-4">
                        <label for="sh_password" class="form-label">Password:</label>
                        <input type="text" class="form-control" id="sg_password" name="sg_password" value="<?php echo $sg_password;?>" required>
                    </div>
                    <div class="row-md-4">
                        <label for="sg_stud_id" class="form-label">Student Number:</label>
                        <input type="text" class="form-control" id="sg_stud_id" name="sg_stud_id" value="<?php echo $sg_stud_id;?>" required>

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