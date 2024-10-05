<?php 
session_start();
include '../../connection.php';

if(isset($_GET['sg_id'])){

    $sg_id = $_GET['sg_id'];

    $con = connect(); 
    $sql="delete from `studguardian_acc` where sg_id= $sg_id";
    $result=mysqli_query($con,$sql);

    if($result){
        header("location:../main.php");
    }
    else{
        die(mysqli_error($con));
    }
}
?>