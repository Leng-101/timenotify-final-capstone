<?php
error_reporting(0);
include_once '../connection.php';
$con = connect();
session_start();


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';



if(!isset($_SESSION["admin_username"]))
{
header("Location:../login.php");
}


 $var = $_SESSION['studnum']; 

 $search = "SELECT * FROM students WHERE studnum='$var'";

     $result=mysqli_query($con, $search);
     $row= mysqli_fetch_assoc($result);

         $studnum=$row['studnum'];
         $stud_id=$row['stud_id']; 

         $picture=$row['picture'];
         $img_src = "picture/".$picture;
         $typeTime = "out";

         $lastname=$row['lastname'];
         $middlename=$row['middlename'];
         $firstname=$row['firstname']; 
         
         $studentname = $lastname.", ".$firstname." ".$middlename;
         
         $g_email=$row['g_email'];
         
         date_default_timezone_set('Asia/Manila');
         $timestamp = time();
         $timein = date("h:i:s A", $timestamp);

         $mydate=getdate(date("U"));
         $daterec = "$mydate[weekday], $mydate[month] $mydate[mday], $mydate[year]";

if(isset($_POST['confirmtoadd'])) {

    if(empty($stud_id) || empty($var)|| empty($studentname) || empty($studentname)) 
    {
        header("Location:TimeOutAddForm.php");
    }

    $insert = "INSERT INTO `time_in_records`(`timeID`, `stud_id`,`studnum`, `type`, `studname`, `daterec`, `time`, `g_email`) 
                   VALUES (NULL, '$stud_id', '$var','$typeTime', '$studentname', '$daterec', '$timein', '$g_email')"; 

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
        $mail->addAddress($g_email);     //Add a recipient
    
        $message = "Good day, parent! <br> <br> TIME OUT REPORT <br> 
                                         STUDENT NAME: <b>".$studentname." </b><br> 
                                         STUDENT NUMBER: ".$var. "<br> 
                                         DATE: ".$daterec. "<br> 
                                         TIME OUT: ".$timein." <br> <br> 
                                         Best Regards, <br> <b> AU-ABC TIME NOTIFY ADMIN </b>
                                         :";
        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Arellano University - Time Notify';
        $mail->Body    = $message;
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
    
        $mail->send();
        echo 
        "
        <script>
        alert('Notified')
        document.location.href = 'TimeOutAddForm.php';
        </script>
        ";

       header("location:TimeOutAddForm.php");
    } else {
      echo "Failed";
      die(mysqli_error($con));
          echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
      
    }


}?>