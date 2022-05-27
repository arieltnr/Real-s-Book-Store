<?php
include '../conf.php';
require('../aset/fpdf/fpdf.php');
$idp = $_GET['idp'];
$query = $conn -> query("SELECT * FROM penjualan JOIN rincian_jual USING(idp) JOIN buku USING(noisbn) WHERE idp = '$idp'");
if($query -> num_rows == 0){
	header('location: index.php');
}

$pdf = new FPDF("P","cm","A4");

$pdf->SetMargins(3,1,1);
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','B',11);
$pdf->Image('../icon/untitled.png',1,1,2,2);
$pdf->SetX(4);            
$pdf->MultiCell(19.5,0.5,'Real\'S Book Store',0,'L');
$pdf->SetX(4);
$pdf->MultiCell(19.5,0.5,'Telpon : 02293000310',0,'L');    
$pdf->SetFont('Arial','B',10);
$pdf->SetX(4);
$pdf->MultiCell(19.5,0.5,'JL. Kita Beda No.18',0,'L');
$pdf->SetX(4);
$pdf->MultiCell(19.5,0.5,'website : www.realsbook.com',0,'L');
$pdf->Line(1,3.1,20.5,3.1);
$pdf->SetLineWidth(0.1);      
$pdf->Line(1,3.2,20.5,3.2);   
$pdf->SetLineWidth(0);
$pdf->ln(1);
$pdf->SetFont('Arial','B',14);
$pdf->Cell(15.5,0.7,"Nota Pembayaran",0,6,'C');
$pdf->ln(0.3);
$pdf->SetFont('Arial','B',8);
$pdf->Cell(15.5,0.7,"No.rek: 1100983900",0,6,'C');
$pdf->SetFont('Arial','B',9);
$pdf->Cell(27.5,0.7,date("D, d/m/Y"),0,0,'C');
$pdf->ln(0);
$pdf->Cell(3.5,0.7,"Nama Pembeli : ".$_GET['nama'],7,9,'C');
$pdf->ln(1);
$pdf->SetFont('Arial','B',8);
$pdf->SetFillColor(210,221,249);
$pdf->Cell(1, 0.8, 'NO', 1, 0, 'C', true);
$pdf->Cell(5, 0.8, 'NAMA BUKU', 1, 0, 'C', true);
$pdf->Cell(4, 0.8, 'HARGA', 1, 0, 'C', true);
$pdf->Cell(2, 0.8, 'JUMLAH', 1, 0, 'C', true);
$pdf->Cell(3, 0.8, 'TOTAL', 1, 1, 'C', true);
$pdf->SetFont('Arial','',8);
$no=1;

while($lihat = mysqli_fetch_array($query)){
	$pdf->Cell(1, 0.7, $no , 1, 0, 'C');
	$pdf->Cell(5, 0.7, $lihat['judul'],1, 0, 'C');
	$pdf->Cell(4, 0.7, "Rp. ".number_format($lihat['harga_jual'],0,",","."), 1, 0,'C');
	$pdf->Cell(2, 0.7, $lihat['jumlah'],1, 0, 'C');
	$pdf->Cell(3, 0.7, "Rp. ".number_format($lihat['subtotal'],0,",","."), 1, 1,'C');
	$no++;
}
$totall = mysqli_query($conn, "SELECT SUM(subtotal) as tall FROM rincian_jual JOIN penjualan USING(idp) WHERE idp = '$idp'");
$tott = $totall -> fetch_array();

$pdf->SetFont('Arial','I',13);
$pdf->Cell(12, 0.8, 'Total Bayar ', 1, 0, 'C');
$pdf->Cell(3, 0.8, "Rp. ".number_format($tott['tall'],0,",",".").",-",1, 1, 'C');
$pdf->Cell(15.5,3.9,"\"Mudah dan Terpercaya\"",0,10,'C');
$pdf->Output("nota_bayar.pdf","I");

?>

