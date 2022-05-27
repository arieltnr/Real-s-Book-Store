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
$pdf->Cell(25.5,0.7,"Laporan Data Buku - Per Penerbit",0,10,'C');
$pdf->ln(1);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(5,0.7,"Dicetak pada : ".date("D-d/m/Y"),0,0,'C');
$pdf->ln(1);
$pdf->Cell(4,0.7,"Penerbit : ".$_GET['id'],0,0,'C');
$pdf->ln(1);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(1, 0.8, 'NO', 1, 0, 'C');
$pdf->Cell(5, 0.8, 'NAMA BUKU', 1, 0, 'C');
$pdf->Cell(3, 0.8, 'JENIS', 1, 0, 'C');
$pdf->Cell(5, 0.8, 'PENULIS', 1, 0, 'C');
$pdf->Cell(4, 0.8, 'PENERBIT ', 1, 0, 'C');
$pdf->Cell(2, 0.8, 'TERBIT', 1, 0, 'C');
$pdf->Cell(2, 0.8, 'STOK ', 1, 0, 'C');
$pdf->Cell(3, 0.8, 'HARGA JUAL', 1, 1, 'C');
$pdf->SetFont('Arial','',10);
$no=1;
$np = $_GET['id'];
$query = mysqli_query($conn, "SELECT * FROM buku JOIN jenis USING(id_jenis) JOIN penerbit USING(id_penerbit) WHERE nm_p = ".$np);
while($lihat = mysqli_fetch_array($query)){
	$pdf->Cell(1, 0.8, $no , 1, 0, 'C');
	$pdf->Cell(5, 0.8, $lihat['judul'],1, 0, 'C');
	$pdf->Cell(3, 0.8, $lihat['nama_jenis'], 1, 0,'C');
	$pdf->Cell(5, 0.8, $lihat['penulis'], 1, 0,'C');
	$pdf->Cell(4, 0.8, $lihat['nm_p'],1, 0, 'C');
	$pdf->Cell(2, 0.8, $lihat['tahun_terbit'], 1, 0,'C');
	$pdf->Cell(2, 0.8, $lihat['stok'], 1, 0,'C');
	$pdf->Cell(3, 0.8, "Rp. ".number_format($lihat['harga_jual'],0,",","."),1, 1, 'C');

	$no++;
}

$pdf->Output("laporan_buku.pdf","I");

?>

