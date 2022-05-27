<?php
include '../../../conf.php';
require('../../../aset/pdf/fpdf.php');

$pdf = new FPDF("L","cm","A4");

$pdf->SetMargins(2,1,1);
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
$pdf->Line(1,3.1,28.5,3.1);
$pdf->SetLineWidth(0.1);      
$pdf->Line(1,3.2,28.5,3.2);   
$pdf->SetLineWidth(0);
$pdf->ln(1);
$pdf->SetFont('Arial','B',14);
$pdf->Cell(25.5,0.7,"Laporan Data Pegawai",0,10,'C');
$pdf->ln(1);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(5,0.7,"Dicetak pada : ".date("D-d/m/Y"),0,0,'C');
$pdf->ln(1);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(1, 0.8, 'NO', 1, 0, 'C');
$pdf->Cell(5, 0.8, 'NAMA PEGAWAI', 1, 0, 'C');
$pdf->Cell(7, 0.8, 'ALAMAT', 1, 0, 'C');
$pdf->Cell(4, 0.8, 'TELPON', 1, 0, 'C');
$pdf->Cell(3, 0.8, 'JENIS KELAMIN', 1, 0, 'C');
$pdf->Cell(3, 0.8, 'AKSES', 1, 0, 'C');
$pdf->Cell(3, 0.8, 'STATUS', 1, 1, 'C');
$pdf->SetFont('Arial','',10);
$no=1;
$query = mysqli_query($conn, "SELECT * FROM pegawai");
while($lihat = mysqli_fetch_array($query)){
	$pdf->Cell(1, 0.8, $no , 1, 0, 'C');
	$pdf->Cell(5, 0.8, $lihat['nama'],1, 0, 'C');
	$pdf->Cell(7, 0.8, $lihat['alamat'], 1, 0,'C');
	$pdf->Cell(4, 0.8, $lihat['telp'],1, 0, 'C');
	$pdf->Cell(3, 0.8, $lihat['jk'], 1, 0,'C');
	$pdf->Cell(3, 0.8, $lihat['akses'], 1, 0,'C');
	$pdf->Cell(3, 0.8, $lihat['stat'],1, 1, 'C');

	$no++;
}

$pdf->Output("laporan_buku.pdf","I");

?>

