<?php
include('hconnect.php');
require('FPDF181/code128.php');

$date = date("F d, Y");

class PDF extends FPDF
{
// Page header
function Header()
{
	// Logo
	$this->Image('img/deped.png',10,10,35);
	// Arial bold 15
	$this->SetFont('Arial','B',18);
	// Move to the right
	// Title
	$this->ln(5);
	$this->Cell(0,7,'ALTERNATIVE LEARNING SYSTEM',0,0,'C');
	// Arial bold 15
	$this->SetFont('Arial','',12);
	// Line break
	$this->Ln(5);
	$this->Cell(0,7,'P. Gomez Elementary School',0,0,'C');
	// Line break
	$this->Ln(5);
	$this->Cell(0,7,'P. Gomez, Manila City',0,0,'C');
	// Line break
	$this->Ln(5);
	$this->Cell(0,7,'',0,0,'C');
	// Line break
	$this->Ln(5);
	$this->Cell(0,7,'',0,0,'C');
	$this->Ln(18);
	// Arial bold 15
	$this->SetFont('Arial','B',11);
	$this->Cell(0,7,'CLASS MASTERLIST',0,0,'L');
	$this->Ln(7);
}


// Instanciation of inherited class
$pdf = new PDF();
$pdf=new PDF_Code128();
$pdf->AliasNbPages();
$pdf->AddPage();
// Arial bold 15
	// Logo
	// Arial bold 15
	$pdf->SetFont('Arial','B',18);
	// Move to the right
	// Title
	$pdf->Cell(190.00,7,'',0,0,'C');
	$pdf->ln(5);
	$pdf->Cell(190.00,7,'MASTERLIST',
		0,0,'C');
	// Arial bold 15
	

	$pdf->SetFont('Arial','I',12);
	$pdf->Ln(5);
	$pdf->Cell(190.00,7,'As of '.$date,0,0,'C');
	// Line break
	// Arial bold 15
	$pdf->SetFont('Arial','B',12);
	$pdf->Ln(15);

	$pdf->Cell(10.00,5,'Unit:',0,0,'L');
	$pdf->Cell(.01);
	$pdf->SetFont('Arial','BU',12);
	$pdf->Cell(85.00,5,'University Library',0,0,'L');

	$pdf->Ln(15);

	$pdf->SetFont('Arial','',10);
	// Arial bold 15

	$pdf->Cell(0,7,"Office Supplies",0,0,'L');
	$pdf->Ln(7);
	// pdfial bold 15
	$pdf->SetFont('Arial','',10);
	$pdf->Cell(15.00,5,'','T,L,R',0,'C');
	$pdf->Cell(.01);
	$pdf->Cell(85.00,5,'','T,L,R',0,'C');
	$pdf->Cell(.01);
	$pdf->Cell(20.00,5,'UNIT OF','T,L,R',0,'C');
	$pdf->Cell(.01);
	$pdf->Cell(25.00,5,'ON HAND','T,L,R',0,'C');
	$pdf->Cell(.01);
	$pdf->Cell(20.00,5,'UNIT','T,L,R',0,'C');
	$pdf->Cell(.01);
	$pdf->Cell(25.00,5,'','T,L,R',0,'C');
	$pdf->Ln(5);

	$pdf->Cell(15.00,5,'ITEM','L,R',0,'C');
	$pdf->Cell(.01);
	$pdf->Cell(85.00,5,'DESCRIPTION','L,R',0,'C');
	$pdf->Cell(.01);
	$pdf->Cell(20.00,5,'MEASURE','L,R',0,'C');
	$pdf->Cell(.01);
	$pdf->Cell(25.00,5,'PER COUNT','L,R',0,'C');
	$pdf->Cell(.01);
	$pdf->Cell(20.00,5,'COST','L,R',0,'C');
	$pdf->Cell(.01);
	$pdf->Cell(25.00,5,'TOTAL','L,R',0,'C');
	$pdf->Ln(5);

	$pdf->Cell(15.00,5,'','B,L,R',0,'C');
	$pdf->Cell(.01);
	$pdf->Cell(85.00,5,'','B,L,R',0,'C');
	$pdf->Cell(.01);
	$pdf->Cell(20.00,5,'','B,L,R',0,'C');
	$pdf->Cell(.01);
	$pdf->Cell(25.00,5,'(Quantity)','B,L,R',0,'C');
	$pdf->Cell(.01);
	$pdf->Cell(20.00,5,'','B,L,R',0,'C');
	$pdf->Cell(.01);
	$pdf->Cell(25.00,5,'','B,L,R',0,'C');
	$pdf->Ln(5);

	$pdf->SetFont('Arial','',11);
	$pdf->Ln(10);
	$pdf->Ln(10);
	$pdf->Ln(10);
	$pdf->Cell(63.00,5,'Prepared by:',0,0,'L');
	$pdf->Cell(.01);
	$pdf->Cell(63.00,5,'Certified Correct:',0,0,'L');
	$pdf->Cell(.01);
	$pdf->Cell(63.00,5,'Noted by:',0,0,'L');
	$pdf->Ln(20);



$pdf->Output();

?>

