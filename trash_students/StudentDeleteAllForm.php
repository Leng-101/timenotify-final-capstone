<?php 
include '../connection.php';

    $con = connect(); 
    $sql="delete from `s_trash`";
    $result=mysqli_query($con,$sql);

    if($result){
        header('location:studentstable.php');
    }
    else{
        die(mysqli_error($con));
    }
?>