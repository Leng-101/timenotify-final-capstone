<?php 
include '../connection.php';


if(isset($_GET['deletestud_id']))
{
    $stud_id=$_GET['deletestud_id'];
    
    
    //get data by stud ID
    $sql1="INSERT INTO s_trash
    SELECT * FROM students
    WHERE stud_id='$stud_id' ";
    $con = connect(); 
    $result1=mysqli_query($con,$sql1);


            if($result1)
            {
                $sql3="delete from `students` where stud_id=$stud_id";
                $result3=mysqli_query($con,$sql3);

                if($result3){
                    header('location:studentstable.php');
                }
                else{
                    die(mysqli_error($con));
                }
            }
            else
            {
                die(mysqli_error($con));
            }
        }
        
else{
    die(mysqli_error($con));
    }
    
        

    
    
?>