<?php 
session_start();
include '../connection.php';

if(isset($_GET['timeID'])){

    $timeID = $_GET['timeID'];
    $stud_id = $_SESSION['stud_id'];

    $con = connect(); 
    $sql="delete from `time_in_records` where timeID = $timeID";
    $result=mysqli_query($con,$sql);

    if($result){
        header("location:student_timetable.php");
    }
    else{
        die(mysqli_error($con));
    }
}
?>