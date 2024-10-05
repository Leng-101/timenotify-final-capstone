<?php 
//error_reporting(0);
session_start();
include '../../connection.php';
$con = connect(); // Method that connect to SQL

if(!isset($_SESSION["admin_username"]))
    {
    header("Location:../../login.php");
    }

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
    $this->SetTextColor(0,78,167);
    // Move to the right
    $this->Cell(100);
    // Title
    $this->Cell(83,20,'TIME NOTIFY MONITORING SYSTEM',0,1,'C');
    
    $this->SetFont('Arial','B',14);
    $this->SetTextColor(27,24,17);
    $this->Cell(100);
    $this->Cell(8,-4,'ADMIN REPORT',0,1,'C');
    // Line break
    
    $this->SetTextColor(0,78,167);
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
$pdf->SetFont('Arial','B',11);
$pdf->SetTextColor(27,24,17);
$pdf->Cell(270,10,'ALL STUDENT RECORDS',0,1, 'C');

$pdf->Cell(190,5,' ',0,1, 'C');

$sql = "SELECT * FROM students ORDER BY age, grade_year,lastname";
$res = mysqli_query($con,$sql);
$count = mysqli_num_rows($res);

$pdf->SetTextColor(27,24,17);
$pdf->Cell(39,10,'Number of Records: ',0,0);
$pdf->Cell(15,10,$count,0,1); 

$pdf->Cell(190,5,' ',0,1, 'C');

$pdf->SetTextColor(0,78,167);

$pdf->Cell(15,10,'No',0,0); 
$pdf->Cell(30,10,'Number',0,0); 
$pdf->Cell(75,10,'Student Name',0,0); 
$pdf->Cell(19,10,'Age',0,0); 
$pdf->Cell(24,10,'Sex',0,0); 
$pdf->Cell(36,10,'Grade',0,0);  
$pdf->Cell(24,10,'Section',0,0); 
$pdf->Cell(36,10,'Teacher',0,1); 


$pdf->SetTextColor(27,24,17);
$pdf->SetFont('Arial','',11);
$sql= "SELECT * FROM students ORDER BY age, grade_year,lastname";
$result=mysqli_query($con,$sql);
while($rows=mysqli_fetch_assoc($result))
    {
    $pdf->Cell(15,10,$rows['stud_id'],0,0); 
    $pdf->Cell(30,10,$rows['studnum'],0,0);
    $pdf->Cell(20,10,$rows['lastname'],0,0);
    $pdf->Cell(25,10,$rows['firstname'],0,0); 
    $pdf->Cell(30,10,$rows['middlename'],0,0); 
    $pdf->Cell(19,10,$rows['age'],0,0); 
    $pdf->Cell(24,10,$rows['sex'],0,0); 
    $pdf->Cell(36,10,$rows['grade_year'],0,0);
    $pdf->Cell(24,10,$rows['section'],0,0);
    $pdf->Cell(34,10,$rows['teacher_prof'],0,1);
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
