<?php
require('code39.php');

$pdf=new PDF_Code39();
$pdf->AddPage();
$pdf->Code39(80,40,'Neil Henessy Cuare',1,10);
$pdf->Output();
?>
