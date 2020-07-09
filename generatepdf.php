<?php
include_once("db.php");
include_once('fpdf181/fpdf.php');
 
class PDF extends FPDF
{
// Page header
function Header()
{	
	// Logo
    //$this->Image('logo.png',10,-1,70);
    $this->SetFont('Arial','B',13);
    // Move to the right
    $this->Cell(60);
    // Title
    $this->Cell(80,10,'Payment List',1,0,'C');
    // Line break
    $this->Ln(20);
}
 
// Page footer
function Footer()
{
    // Position at 1.5 cm from bottom
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Page number
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
} 
$display_heading = array('HOUSE_ID'=>'HOUSE_ID', 'DATE_TEXT'=> 'DATE_TEXT', 'PAYMENT_DATE'=> 'PAYMENT_DATE',);
 
$result = mysqli_query($conn, "SELECT HOUSE_ID, DATE_TEXT, PAYMENT_DATE FROM payment ORDER BY HOUSE_ID ASC, DATE_TEXT DESC") or die("database error:". mysqli_error($conn));
$header = mysqli_query($conn, "SHOW columns FROM payment");
//$header = mysqli_query($conn, "SHOW columns HOUSE_ID, DATE_TEXT, PAYMENT_DATE FROM FROM payment");
 
$pdf = new PDF();
//header
$pdf->AddPage();
//foter page
$pdf->AliasNbPages();
$pdf->SetFont('Arial','B',12);
foreach($header as $heading) {
//$pdf->Cell(40,12,$display_heading[$heading['Field']],1);
//$pdf->Cell(40,12,$display_heading[$heading['Field']],1);
}
foreach($result as $row) {
$pdf->Ln();
foreach($row as $column)
$pdf->Cell(40,12,$column,1);
}
$pdf->Output();
?>