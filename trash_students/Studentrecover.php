<?php 
include '../connection.php';


if(isset($_GET['deletestud_id']))
{
    $stud_id=$_GET['deletestud_id'];
        
        //get the student number of the trash record
        //$check1 = "SELECT studnum FROM `s_trash` WHERE(stud_id = '$stud_id')";
        //$query_run1= mysqli_query($con,$check1);

        //get the student number of all records in students table
        //$check2 = "SELECT studnum FROM `students`";
        //$query_run2= mysqli_query($con,$check2);

        //to be continued, can not recover but can delete
        //if($query_run1==$query_run2)
          //  {
            //header("Location: StudentAddForm.php?error=1");
            //}
        //else
          //  { 
    
            //get data by stud ID
            $sql1="INSERT INTO students
            SELECT * FROM s_trash
            WHERE stud_id='$stud_id' ";
            $con = connect(); 
            $result1=mysqli_query($con,$sql1);
            echo "
                                <script>
                                alert('Recovered successfully')
                                </script>";

                    if($result1)
                    {
                        $sql3="delete from `s_trash` where stud_id=$stud_id";
                        $result3=mysqli_query($con,$sql3);

                        if($result3){
                            echo "
                                <script>
                                alert('Recovered successfully')
                                </script>";
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
        //}
        
        else{
            die(mysqli_error($con));
            }
            


    
    
?>