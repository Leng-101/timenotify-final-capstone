<?php 

session_start();
include '../../connection.php';
$con = connect(); // Method that connect to SQL

if(!isset($_SESSION["admin_username"]))
    {
    header("Location:../../login.php");
    }


// $courseList = $_GET['courseList'];
// $gradeyear= $_GET['gradeyear'];
// $dateList= $_GET['dateList'];
// $sectionList= $_GET['sectionList'];



require('fpdf.php');
class PDF extends FPDF
{
// Page header
function Header()
{
    // Logo
    $this->Image('../../assets/aulogo.png',57,14,18);
    $this->Image('../../assets/logo_icon.png',75,14,18);
    // Arial bold 15
    $this->SetFont('Arial','B',18);
    $this->SetTextColor(232, 41, 146);
    // Move to the right
    $this->Cell(100);
    // Title
    $this->Cell(96,20,'TIME NOTIFY MONITORING SYSTEM',0,1,'C');
    
    $this->SetTextColor(27,24,17);
    $this->SetFont('Arial','B',14);
    $this->Cell(100);
    $this->Cell(88,-4,'ADMIN REPORT - COLLEGE DEPARTMENT' ,0,1,'C');
    // Line break
    
    $this->SetTextColor(232, 41, 146);
    $this->Ln(6);
    $this->Cell(0,5,'___________________________________________________________________________________________________',0,1);

}

// Page footer
function Footer()
{
    // Position at 1.5 cm from bottom
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Times','I',8);
    // Page number
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}

// Instanciation of inherited class
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage('L');
$title = 'AU - PDF REPORT';
$pdf->SetTitle($title);

$pdf->Cell(40,5,' ',0,1);
$pdf->SetTextColor(27,24,17);
$pdf->SetFont('Arial','B',11);
$pdf->Cell(270,10,'STUDENT - TIME RECORDS',0,1, 'C');

$pdf->Cell(190,5,' ',0,1, 'C');


$coll_grade = $_POST['gradeyear']; 
$coll_course = $_POST['courseList'];
$coll_sec = $_POST['sectionList'];
$coll_date = $_POST['dateList'];
     

$sql = "SELECT s.stud_id, s.fullname, s.sex, s.grade_year, s.section,
s.course, t.daterec, t.type, t.time, t.daterec 
FROM students s INNER JOIN time_in_records t ON s.studnum = t.studnum
WHERE s.grade_year = '$coll_grade' AND s.section = '$coll_sec' 
AND t.daterec = '$coll_date'AND s.course='$coll_course' ORDER BY lastname";

$res = mysqli_query($con,$sql);
$count = mysqli_num_rows($res);

$pdf->Cell(12,10,'Date: ',0,0); 
$pdf->Cell(210,10,$coll_date,0,1);

$pdf->Cell(39,10,'Number of Records: ',0,0); 
$pdf->Cell(30,10,$count,0,0); 

$pdf->Cell(16,10,'Course: ',0,0);  // 0,0
$pdf->Cell(100,10,$coll_course,0,0);

$pdf->Cell(26,10,'Grade Level: ',0,0); // 0,0
$pdf->Cell(30,10,$coll_grade,0,0);

$pdf->Cell(18,10,'Section: ',0,0); 
$pdf->Cell(15,10,$coll_sec,0,1);

$pdf->Cell(190,5,' ',0,1, 'C');

$pdf->SetTextColor(232, 41, 146);
$pdf->Cell(30,10,'No',0,0); 
$pdf->Cell(65,10,'Student Name',0,0);
$pdf->Cell(35,10,'Grade/Year',0,0);
$pdf->Cell(30,10,'Gender',0,0); 
$pdf->Cell(55,10,'Date Rec',0,0);
$pdf->Cell(30,10,'Type',0,0); 
$pdf->Cell(31,10,'Time',0,0); 

    

 $pdf->SetTextColor(27,24,17);
 $pdf->SetFont('Arial','',11);

 $sqlCOLL = "SELECT s.stud_id, s.fullname, s.sex, s.grade_year, s.section,
 s.course, t.daterec, t.type, t.time, t.daterec 
 FROM students s INNER JOIN time_in_records t ON s.studnum = t.studnum
 WHERE s.grade_year = '$coll_grade' AND s.section = '$coll_sec' 
 AND t.daterec = '$coll_date'AND s.course='$coll_course' ORDER BY lastname";

$result=mysqli_query($con,$sqlCOLL);
while($rows=mysqli_fetch_assoc($result))
    {
        $pdf->Ln(); // New line~
        $pdf->Cell(30,10,$rows['stud_id'],0,0); 
        $pdf->Cell(66,10,$rows['fullname'],0,0); 
        $pdf->Cell(35,10,$rows['grade_year'],0,0); 
        $pdf->Cell(29,10,$rows['sex'],0,0);
        $pdf->Cell(58,10,$rows['daterec'],0,0); 
        $pdf->Cell(25,10,$rows['type'],0,0); 
        $pdf->Cell(30,10,$rows['time'],0,0);  
     }




    $pdf->SetTextColor(128,128,128);
    $pdf->Cell(190,10,' ',0,1, 'C');
    $pdf->SetFont('Arial','B',11);
    $pdf->Cell(35,5,'Date Generated: ',0,0); 
    $pdf->SetFont('Arial','',11);
    $pdf->Cell(30, 5,date('Y-m-d'),0,1);  
    $pdf->Cell(190,5,' ',0,1, 'C');
    $pdf->Cell(30,5,'Pag-asa St., Caniogan, Pasig City',0,1);  
    $pdf->Cell(30,5,'8-404-1644 ',0,1);  
    $pdf->Cell(30,5,'Arellano.edu.ph@gmail.com',0,1); 
$pdf->Output();
?>
