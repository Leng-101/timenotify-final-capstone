<?php
    
    session_start();
    //error_reporting(0);
    require_once '../../connection.php';
    require_once '../../phpqrcode/qrlib.php';
    
    $path = 'qr_picture/'; 
    $con = connect();


    //session_start();

    if(!isset($_SESSION["admin_username"]))
    {
    header("Location:../login.php");
    }
    
   // $stud_id=$_GET['stud_id'];// to get from url

        if(isset($_POST['submittoqr']))  {

        //recnum
        $name = $_FILES['picture']['name']; //Image Name$lastname = $_POST['lastname'];
        $lastname = $_POST['lastname'];
        $firstname = $_POST['firstname'];
        $middlename = $_POST['middlename'];

        $studnum = $_POST['studnum'];
        $grade_year = $_POST['grade_year'];
        $strand = $_POST['strand'];
        $course = $_POST['course'];
        $section = $_POST['section'];

        $teacher_professor = $_POST['teacher_professor']; 
        $age = $_POST['age'];
        $sex = $_POST['sex'];
        $department = $_POST['department'];
        $g_email = $_POST['g_email'];

        //check if stud num exists
        $check = "SELECT * FROM `students` WHERE(studnum = '$studnum')";
        $query_run= mysqli_query($con,$check);

        if(mysqli_num_rows($query_run)>0)//&& $fnq==$firstname && $mnq==$middlename)
            {
            header("Location: StudentAddForm.php?error=1");
            }
        else
            { 
                            //Allowed Extension of Image
                        $allowed_extension = array('jpg','jpeg','png');
                        $filename = $_FILES['picture']['name'];
                        $file_extension = pathinfo($filename, PATHINFO_EXTENSION);

                        //Check if the Image Extension is allowed
                            if(!in_array($file_extension, $allowed_extension)) 
                            {
                                echo "File Extension Invalid";
                            } 
                            else {

                                //Check if the image is existing
                                if(file_exists("picture/" .$_FILES['picture']['name'])) 
                                {
                                    $filename =  $_FILES['picture']['name'];
                                    //echo "Image Exist!";
                                    header("Location: StudentAddForm.php?error=2");
                                }
                            
                                //If all condition correct then Insert record
                                else 
                                {

                                    $qrcode= $path.$lastname." ".$studnum.".png";
                                    $qrimage =$lastname." ".$studnum.".png";


                                    $queryAdd = "INSERT INTO `students`(`stud_id`, `studnum`,  `qr_img`, `picture`, `lastname`, `middlename`, `firstname`, `age`, `sex`, `grade_year`, `strand`, `course`, `section`, `department`, `teacher_prof`, `g_email`) 
                                                                VALUES (NULL, '$studnum', '$qrimage', '$name', '$lastname', '$middlename', '$firstname','$age', '$sex', '$grade_year', '$strand', '$course', '$section', '$department', '$teacher_professor', '$g_email')";
                            
                            $result=mysqli_query($con,$queryAdd);
                                
                            if($result)
                                {
                                
                                 //Move the picture in Picture Folder
                                move_uploaded_file( $_FILES['picture']['tmp_name'], "picture/" .$_FILES['picture']['name']);    
                                
                                //Path of the picture ID
                                $filepath = "picture/".$_FILES["picture"]["name"];

                            $lastname = $_POST['lastname'];
                            $firstname = $_POST['firstname'];
                            $middlename = $_POST['middlename'];

                            $fullname = $firstname . " " . $middlename . " " . $lastname;
                                
                                ?>
                                <script>
                                    alert("Saved successfully");
                                    
                                </script>

                            
                        
                                
            <!-- Creating the ID of the Student w/ QR Code -->
                <html>
                <head>
                <style>
                p.inline {display: inline-block;}
                span { font-size: 12px;}
                </style>
                <style type="text/css" media="print">
                    @page 
                    {
                        size: 2;   /* auto is the initial value */
                        margin: 1mm;  /* this affects the margin in the printer settings */

                    }
                    div.print{
                        height:auto;
                        width:300px;
                        border: 2px solid black;
                        background-image: linear-gradient(,#0a64cb,#a502a0);

                    }
                    b.au, font.name{
                        color:#000066;
                    }
                    font.name{
                        text-transform:uppercase;
                        font-family: Arial;
                    }
                    img.qr{
                        width:auto;
                        height:110px;
                    }
                </style>
                </head>

                <body onload="window.print();">
                <script>
                    window.onload = function() {
                        window.print();
                    };
                    </script>

                    <div class="print" style="margin: 10%">
                
                        <?php

                       // $remind = "Wer na 2 XD";

                        $namestud = $fullname;
                        $studnum = $_POST['studnum']; 
                        $grade= $_POST ['grade_year'];
                        $sec = $_POST['section'];
                        $dept =  $_POST['department'];
                        $picture =  $_POST['picture'];
      
                
                    echo "
                    <center>
                    <p>
                    <table class=center>
                        <tr>
                            <td>
                                <img src='../assets/aulogo.png' style=width:55px; height:55px;> <br>
                            </td>
                            <td> <font size=3>
                                <b class=au>Arellano University <br>
                                Andres Bonifacio Campus </b> <br>
                                </font>
                                <font size=1>Pag-asa St, Brgy. Caniogan, Pasig City <br> 
                                Tel No.8-404-1644</font>
                            </td>
                        </tr>
                    </table>
                    ___________________________________</p> 

                    <img src ='picture/".$name."' class=id_pic style=width:120px; height:130px; border=1px solid #000066;> <br> <br>
                    <font size=4 class=name>
                
                    <b>$namestud</b> 
                    </font>
                    
                    <table class=center>
                        <tr>
                            <td>
                            <font size=2>
                                SN: <b>".$studnum." </b> 
                                <br>
                                <br>
                                Grade/Year:<b> $grade</b> 
                                <br>
                                Section: <b>".$sec." </b> 
                                <br>
                                Department:<b> $dept</b> 
                                <br>
                                </font> 
                                

                            </td>
                            <td>
                            </td>
                           
              

                            <td>
                                <center>
                                <img class=qr src='".$qrcode."' style=float:right;>
                                </center>

                            

                            </td>
                        </tr>
                    </table>
                    <font size=1>
                    <center><b>S.Y. 2022-2023</b> </center>
                    </font>
                
                ___________________________________

                <table>
                        <tr>
                            <td>
                                <center>
                                <img src='picture/logo_icon.png' style=width:10px; height:10px;> 
                                </center>
                            </td>
                            <td>
                                <font size=1>
                                <b> TIME NOTIFY </b> : Student Time Monitoring System
                                </font>
                            </td>
                        </tr>
                    </table>
                </center>
            
                    
                    ";

                ?>
            </div>
        </body>
        </html>
        
        <?php
                    
        QRcode :: png($studnum,$qrcode, 'H',4 ,4 );   
        // header('location:studentstable.php');  
                                
                                }
                                      
                                    else {
                                        echo "Faileddddd :<";
                                        die(mysqli_error($con));
                                    }
                                }
                            }
                    }
                }
            
        

     

                        



        