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



    $teacher_id = $_SESSION['teacher_ID'];
    $t_department = $_SESSION['teacher_dept'];


    $sql = "SELECT * FROM `teachers_acc` Where teacher_id = '$teacher_id'";
    $con = connect(); 
    $result=mysqli_query($con,$sql);
    $row= mysqli_fetch_assoc($result);
    $t_username=$row['t_username'];
    $t_email=$row['t_email'];


    //$status='active';
    $code=rand(10000,99999);
    $insert = "INSERT INTO `teachers_code_records`(`id`, `teacher_id`, `code`) 
                   VALUES (NULL,'$teacher_id', '$code')"; 

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
        $mail->addAddress($t_email);     //Add a recipient
    
        $message = "Good day, Teacher! <br> <br> VERIFICATION CODE <br> 
                                         Faculty username: <b>".$t_username." </b><br> 
                                         Verification code: ".$code. "<br> 
                                         Best regards, <br> <b> AU-ABC TIME NOTIFY ADMIN </b>
                                         :";
        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Arellano University - Time Notify';
        $mail->Body    = $message;
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
    
        $mail->send();

        $sql = "SELECT * FROM `teachers_code_records` Where code = '$code'";
        $con = connect(); 
        $result=mysqli_query($con,$sql);
        $row= mysqli_fetch_assoc($result);

        $id=$row['id'];

        echo 
        "
        <script>
        alert('Verification code sent to GMAIL')
        
        document.location.href = 'login_teacher2.php?id=$id';

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