<?php 
include '../connection.php';
if(isset($_GET['deletestud_id'])){
    $stud_id=$_GET['deletestud_id'];

    //select the record to locate the name of the picture
    $sql="SELECT * FROM s_trash WHERE stud_id='$stud_id' ";
    $con = connect(); 
    $result=mysqli_query($con,$sql);
    $row= mysqli_fetch_assoc($result);

        //get the name of the picture
        $picture=$row['picture'];
        $img_src = "../students/picture/".$picture;

        if(file_exists($img_src))
        {//to delete the record use the unlink() function :< not working
            unlink($img_src);

            $con = connect(); 
            $sql="delete from `s_trash` where stud_id=$stud_id";
            $result1=mysqli_query($con,$sql);

            //delete also the picture in the folder
        
            if($result1){
                ?>
                <script>
                    alert("Record deleted successfully");
                    
                </script>
                <?php
                header("Location:studentstable.php");
            }
            else{
                die(mysqli_error($con));
            }


        }
        else {
            ?>
            <script>
                alert("Picture was not deleted");
                
            </script>
            <?php

        }
}
?>