<?php 
    error_reporting(0);
    include_once '../connection.php';
    $con = connect();
    session_start();

    if(!isset($_SESSION["admin_username"]))
    {
    header("Location:../login.php");
    }
   // $stud_id=$_GET['stud_id']; //This is From studenttable.php

    $stud_id = $_SESSION['stud_id']; 

    $sql="SELECT * FROM students WHERE stud_id='$stud_id' ";
    $con = connect(); 
    $result=mysqli_query($con,$sql);
    $row= mysqli_fetch_assoc($result);
    
        $stud_id=$row['stud_id'];
        $studnum=$row['studnum'];
        $lastname=$row['lastname'];
        $middlename=$row['middlename'];
        $firstname=$row['firstname'];
 
        // $_SESSION['stud_id'] = $stud_id;
        // $_SESSION['firstname'] = $firstname;
        // // with middle and last
        // $_SESSION['middlename'] = $middlename;
        // $_SESSION['lastname'] = $lastname;

        if(isset($_POST['search'])) {   
                {      
                    header("location:timetable_search.php?stud_id=$stud_id");
                }
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
  <link rel="stylesheet" type="text/css" href="css/timetable.css">
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,500;0,700;1,600&display=swap" rel="stylesheet">
  <link rel="icon" href ="../assets/logo_icon.png" type="image/x-icon"> <!-- Logo of Website -->
</head>

<body>
    
<div class="cont">
    <div class="row row_outer ">
        
        <div class="row row_upper order-sm-1">
            <div class="col-sm-2 text-center">
                <img class="icon" src="../assets/aulogo.png" alt="right">
                <img class="icon" src="../assets/logo_icon.png" alt="right">
            </div>
            <div class="col-sm-10">
                <h1>TIME NOTIFY MONITORING SYSTEM</h1>
                <h5>SEARCH TIME IN AND TIME OUT RECORDS</h5> 
            </div>
        </div>
        
        <!--tableee-->
        <div class="row row_inner order-sm-2">
            <div class="row row_center order-sm-1 " >
                <div class="col-sm-6 ">
                <h4> <?php echo $lastname.", ".$firstname." ".$middlename." - ".$studnum." ";?></h4>
                </div>
                <div class="col-sm-2 bttn">
                    <form action="" method="GET">
                            <input type="text" class="form-control" name="search" required value="<?php 
                            if(isset($_GET['search']))
                            {echo $_GET['search'];
                            }?>" placeholder="search">
                </div>
                <div class="col-sm-2 bttn">
                        <button type="search" class="btn4">SEARCH</button>
                    </form>
                </div>
                <!--<div class="col-sm-1 btnn">
                    <button type="submit" class="btn3"><a href="TimeInAddForm.php?stud_id="" class="a">TIME IN</a></button>
                </div>-->
                <div class="col-sm-1 btnn">
                    <button type="submit" class="btn3a"><a href="timetable.php?stud_id=<?php echo $stud_id;?>" class="a">BACK</a></button>
                </div>
            </div>
            <br>

            <div class="row row_table overflow-auto row_table2 order-sm-2">
            <table class="table table-hover">
                <thead>
                    <tr class="heading">
                    <th scope="col">REC NO</th>
                    <th scope="col">TYPE</th>
                    <th scope="col">DATE</th>
                    <th scope="col">TIME</th>
                    <th scope="col">ACTIONS</th>
                    </tr>
                </thead>
                <tbody>
            
                    <?php  
                        if(isset($_GET['search']))
                        {
                            $filtervalues = $_GET['search'];
                            $query="SELECT * FROM `time_in_records` WHERE stud_id ='$stud_id' AND CONCAT(daterec,time,type) LIKE '%$filtervalues%'";
                            $query_run= mysqli_query($con,$query);

                            if(mysqli_num_rows($query_run)>0)
                            {
                                while($row=mysqli_fetch_assoc($query_run))
                                {
                                    $timeID=$row['timeID'];
                                    $studnum=$row['studnum'];
                                    $type=$row['type'];
                                    $studname=$row['studname'];
                                    $daterec=$row['daterec'];
                                    $time=$row['time'];

                                    # Get time ID and stud ID to send in another page(View)
                                     $_SESSION['id_time'] = $timeID;
                                    // $_SESSION['idstud'] = $stud_id;  

                                    echo'<tr>
                                            <td >'.$timeID.'</td>
                                            <td >'.$type.'</td>
                                            <td >'.$daterec.'</td>   
                                            <td >'.$time.'</td>
                                                                                       
                                            <td class="buttons">
                                            <div class="col-sm-12 dropdown">
                                                <button class="btn table_button dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                                OPTIONS
                                                </button>
                                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                                    <li class="text-center"><a href="TimeViewForm.php?timeID='.$timeID.'& stud_id='.$stud_id.'" class="b">VIEW</a></li>
                                                    <li class="text-center"><a href="TimeInDeleteForm.php?timeID='.$timeID.'& stud_id='.$stud_id.'" class="b">DELETE</a></li>
                                                </ul>
                                                </div> 
                                            </td>
                                        <tr>
                                    ';

                                    // $_SESSION['timeID'] = $timeID;
                                  
                                }
                            } 
                            else
                            {
                                echo'
                                <tr>
                                    <td colspan="7">No Time records found</td>
                                </tr>
                                ';
                            }
                        }
                          
                        ?>
                </tbody>
            </table>

            </div>               
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
  </body>

</html>