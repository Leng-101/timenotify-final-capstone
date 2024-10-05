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
    $this->SetTextColor(165,70,2);
    // Move to the right
    $this->Cell(100);
    // Title
    $this->Cell(80,20,'TIME NOTIFY MONITORING SYSTEM',0,1,'C');
    
    $this->SetFont('Arial','B',14);
    $this->SetTextColor(27,24,17);
    $this->Cell(100);
    $this->Cell(8,-4,'ADMIN REPORT',0,1,'C');
    // Line break
    
    $this->SetTextColor(165,70,2);
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
$pdf->Cell(270,10,'ALL TIME RECORDS',0,1, 'C');

$pdf->Cell(190,5,' ',0,1, 'C');

$sql="SELECT *
FROM students
INNER JOIN time_in_records ON students.stud_id = time_in_records.stud_id ORDER BY age, lastname, daterec";
  
$res = mysqli_query($con,$sql);
$count = mysqli_num_rows($res);

$pdf->Cell(39,10,'Number of Records: ',0,0);
$pdf->Cell(15,10,$count,0,1); 

$pdf->Cell(190,5,' ',0,1, 'C');

$pdf->SetTextColor(165,70,2);
$pdf->Cell(10,10,'ID',0,0); 
$pdf->Cell(30,10,'Number',0,0); 
$pdf->Cell(65,10,'Student Name',0,0); 
$pdf->Cell(45,10,'Grade ',0,0); 
$pdf->Cell(60,10,'Date',0,0); 
$pdf->Cell(40,10,'Time',0,0); 
$pdf->Cell(40,10,'Type',0,1); 

$pdf->SetTextColor(27,24,17);
$pdf->SetFont('Arial','',11);
$sql="SELECT *
FROM students
INNER JOIN time_in_records ON students.stud_id = time_in_records.stud_id ORDER BY age";
                            
$result=mysqli_query($con,$sql);
while($rows=mysqli_fetch_assoc($result))
    {
    $pdf->Cell(10,10,$rows['stud_id'],0,0); 
    $pdf->Cell(30,10,$rows['studnum'],0,0);
    $pdf->Cell(65,10,$rows['studname'],0,0);
    $pdf->Cell(45,10,$rows['grade_year'],0,0); 
    $pdf->Cell(60,10,$rows['daterec'],0,0); 
    $pdf->Cell(40,10,$rows['time'],0,0); 
    $pdf->Cell(40,10,$rows['type'],0,1); 
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
