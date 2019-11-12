<?php

// Arial bold 15<?php
session_start();
require('FPDF181/code128.php');

$date = date("F d, Y");
    include('dbconnections.php');

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

// Instanciation of inherited class
$pdf = new PDF();
$pdf=new PDF_Code128();
$pdf->AliasNbPages();
$pdf->AddPage();



  if(isset($_POST['submit'])){
                    $pid = $_POST["pid"];
                    $sy = $_POST["sy"];
                    $sec_id = $_POST["sec_id"];
                    $name = $_POST["name"];

                    $sql = "SELECT * FROM programs where program_id='$pid'";
                          $result = mysqli_query($conn, $sql);
                          while ($row = mysqli_fetch_array($result)) {
                            $program = $row["pname"];


                    $sql2 = "SELECT * FROM sections where sec_id='$sec_id'";
                          $result2 = mysqli_query($conn, $sql2);
                          while ($row2 = mysqli_fetch_array($result2)) {
                            $sec_no = $row2["sec_no"];
                

// Arial bold 15
	// Logo
	// Arial bold 15
	$pdf->SetFont('Arial','B',18);
	// Move to the right
	// Title
	$pdf->Image('img/als-logo.png',10,8,35);
	$pdf->Image('img/deped.png',168,12,21);
	$pdf->ln(5);
	$pdf->Cell(190.00,7,'ALTERNATIVE LEARNING SYSTEM',0,0,'C');
	$pdf->ln(5);
	$pdf->SetFont('Arial','B',14);
	$pdf->Cell(190.00,7,'P. GOMEZ ELEMENTARY SCHOOL',0,0,'C');
	$pdf->SetFont('Arial','I',12);
	$pdf->Ln(5);
	$pdf->Cell(190.00,7,'CLASS MASTERLIST',0,0,'C');
	// Line break
	// Arial bold 15
	$pdf->SetFont('Arial','B',12);
	$pdf->Ln(15);
	$pdf->Cell(10.00,5,'School Year:',0,0,'L');
	$pdf->Cell(16);
	$pdf->SetFont('Arial','B',12);
	$pdf->Cell(10.00,5,' '.$sy.' ',0,0,'L');
	$pdf->Cell(35);
	$pdf->SetFont('Arial','B',12);
	$pdf->Cell(10.00,5,'Class Section:',0,0,'L');
	$pdf->Cell(20);
	$pdf->SetFont('Arial','B',12);
	$pdf->Cell(10.00,5,'Section '.$sec_no,0,0,'L');
	$pdf->Cell(30);
	$pdf->SetFont('Arial','B',12);
	$pdf->Cell(10.00,5,'Program:',0,0,'L');
	$pdf->Cell(9);
	$pdf->SetFont('Arial','B',12);
	$pdf->Cell(10.00,5,' '.$program.' Program',0,0,'L');

	$pdf->Ln(15);


	$pdf->SetFont('Arial','',10);

	$pdf->Cell(30.00,5,'Student LRN','T,L,R',0,'C');
	$pdf->Cell(.01);
	$pdf->Cell(60.00,5,'Name','T,L,R',0,'C');
	$pdf->Cell(.01);
	$pdf->Cell(60.00,5,'Address','T,L,R',0,'C');
	$pdf->Cell(.01);
	$pdf->Cell(40.00,5,'Contact #','T,L,R',0,'C');	
	$pdf->Ln(5);
	$sql=mysqli_query($conn,"select * from students where sy='$sy' AND sec_id='$sec_id'")or die(mysqli_error($conn));
    
    while ($row=mysqli_fetch_array($sql)){
    	$sid = $row['Student_id'];
    	$fname = $row['fname'];
    	$mdname = $row['mdname'];
    	$lname = $row['lname'];
    	$lrn = $row['lrn'];
    	$address = $row['address'];
    	$cnumber = $row['contactno'];

    $pdf->SetFont('Arial','',10);
    $pdf->Cell(30.00,5,$lrn,1,0,'C');
	$pdf->Cell(.01);
	$pdf->Cell(60.00,5,$fname." ".$mdname." ".$lname,1,0,'C');
	$pdf->Cell(.01);
	$pdf->Cell(60.00,5,$address,1,0,'C');
	$pdf->Cell(.01);
	$pdf->Cell(40.00,5,$cnumber,1,0,'C');	
	$pdf->Ln(5);

}
}
}
}

	$pdf->SetFont('Arial','',11);
	$pdf->Ln(10);
	$pdf->Cell(180.00,5,'Prepared by:',0,0,'L');
	$pdf->Cell(.01);
	$pdf->Ln(10);
	$pdf->Ln(10);

	$pdf->SetFont('Arial','B',11);
	$pdf->Cell(180.00,5,strtoupper($name),0,0,'C');
	$pdf->Cell(.01);
	$pdf->Ln(20);



$pdf->Output();

?>
