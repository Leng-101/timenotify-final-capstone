<?php 
session_start();
include '../../connection.php';

if(isset($_GET['teacher_id'])){

    $teacher_id = $_GET['teacher_id'];

    $con = connect(); 
    $sql="delete from `teachers_acc` where teacher_id= $teacher_id";
    $result=mysqli_query($con,$sql);

    if($result){
        header("location:../main.php");
    }
    else{
        die(mysqli_error($con));
    }
}
?>