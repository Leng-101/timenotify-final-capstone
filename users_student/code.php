<?php
//error_reporting(0);
session_start();
include_once '../connection.php';
$con = connect();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';


/*
if(!isset($_SESSION["admin_username"]))
{
header("Location:../login.php");
}*/

    // $sg_stud_id = $_GET['sg_stud_id'];
    // $sg_id = $_GET['sg_id'];

    $sg_stud_id = $_SESSION['sg_stud_id'];
    $sg_id = $_SESSION['student_guardianID'];

    $sql = "SELECT * FROM `students` Where stud_id = '$sg_stud_id'";
    $con = connect(); 
    $result=mysqli_query($con,$sql);
    $row= mysqli_fetch_assoc($result);
    $sg_fullname=$row['fullname'];
    $sg_gmail=$row['g_email'];


    $status='active';
    $code=rand(10000,99999);
    $insert = "INSERT INTO `student_code_records`(`id`, `sg_id`, `code`,`stat`) 
                   VALUES (NULL,'$sg_id', '$code', '$status')"; 

    $insert_res = mysqli_query($con, $insert);
    
    

    if($insert_res){ 
        $mail = new PHPMailer(true);
        //Server settings
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'timenotify.au.abc@gmail.com';                     //SMTP username
        $mail->Password   = 'nrgz dnqq qdiv oywc';   //ykvbroxvdmdvdywa     srbzmazjhllqjnji                          //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    
        //Recipients
        $mail->setFrom('timenotify.au.abc@gmail.com');
        $mail->addAddress($sg_gmail);     //Add a recipient
    
        $message = "Good day, parent! <br> <br> VERIFICATION <br> 
                                         It seems like you are trying to login your account in time notify. <br>
                                         The following are the details: <br>
                                         Student Name: ".$sg_fullname." <br> 
                                         Verification code: <b>".$code. "<br><br>  </b>
                                         Best regards, <br> <b> AU-ABC TIME NOTIFY ADMIN </b></b>";
        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Arellano University - Time Notify';
        $mail->Body    = $message;
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
    
        $mail->send();

        $sql = "SELECT * FROM `student_code_records` Where code = '$code'";
        $con = connect(); 
        $result=mysqli_query($con,$sql);
        $row= mysqli_fetch_assoc($result);

        $id=$row['id'];
        
        echo 
        "
        <script>
        alert('Verification code sent to GMAIL')
        document.location.href = 'login_student2.php?id=$id';

        </script>
        ";
    } else {
      echo "
      <script>
      alert('Verification not sent')
      </script>";
      die(mysqli_error($con));
          echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
      
    }


?>