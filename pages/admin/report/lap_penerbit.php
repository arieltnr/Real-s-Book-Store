<?php
include '../../../conf.php';
require('../../../aset/pdf/fpdf.php');

$pdf = new FPDF("P","cm","A4");

$pdf->SetMargins(1.5,1,1);
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','B',11);
$pdf->Image('../../../icon/untitled.png',1,1,2,2);
$pdf->SetX(4);            
$pdf->MultiCell(19.5,0.5,'Real\'S Book Store',0,'L');
$pdf->SetX(4);
$pdf->MultiCell(19.5,0.5,'Telpon : 02293000310',0,'L');    
$pdf->SetFont('Arial','B',10);
$pdf->SetX(4);
$pdf->MultiCell(19.5,0.5,'JL. Kita Beda No.18',0,'L');
$pdf->SetX(4);
$pdf->MultiCell(19.5,0.5,'website : www.realsbook.com',0,'L');
$pdf->Line(1,3.1,20,3.1);
$pdf->SetLineWidth(0.1);      
$pdf->Line(1,3.2,20,3.2);   
$pdf->SetLineWidth(0);
$pdf->ln(1);
$pdf->SetFont('Arial','B',14);
$pdf->Cell(17,0.7,"Laporan Data Penerbit",0,10,'C');
$pdf->ln(1);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(3,0.7,"Dicetak pada : ".date("D-d/m/Y"),0,0,'C');
$pdf->ln(1);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(1, 0.8, 'NO', 1, 0, 'C');
$pdf->Cell(3, 0.8, 'ID PENERBIT', 1, 0, 'C');
$pdf->Cell(5, 0.8, 'NAMA PENERBIT', 1, 0, 'C');
$pdf->Cell(5, 0.8, 'ALAMAT', 1, 0, 'C');
$pdf->Cell(4, 0.8, 'TELPON', 1, 1, 'C');
$pdf->SetFont('Arial','',10);
$no=1;
$query = mysqli_query($conn, "SELECT * FROM penerbit");
while($lihat = mysqli_fetch_array($query)){
	$pdf->Cell(1, 0.8, $no , 1, 0, 'C');
	$pdf->Cell(3, 0.8, $lihat['id_penerbit'],1, 0, 'C');
	$pdf->Cell(5, 0.8, $lihat['nm_p'], 1, 0,'C');
	$pdf->Cell(5, 0.8, $lihat['almt_p'],1, 0, 'C');
	$pdf->Cell(4, 0.8, $lihat['tlp_p'], 1, 1,'C');

	$no++;
}

$pdf->Output("laporan_buku.pdf","I");

?>

