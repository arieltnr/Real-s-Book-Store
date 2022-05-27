<?php
include '../../../conf.php';
require('../../../aset/pdf/fpdf.php');

$tgl1 = $_GET['id'];
$tgl2 = $_GET['id2'];

$pdf = new FPDF("L","cm","A4");

$pdf->SetMargins(5.1,1,1);
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
$pdf->Cell(18.5,0.7,"Laporan Penjualan - Per Periode",0,10,'C');
$pdf->ln(1);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(5,0.7,"Dicetak pada : ".date("D-d/m/Y"),0,0,'C');
$pdf->ln(1);
$pdf->Cell(7.3,0.7,"Penjualan pada : ".$_GET['id']." - ".$_GET['id2'],0,0,'C');
$pdf->ln(1);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(1, 0.8, 'NO', 1, 0, 'C');
$pdf->Cell(4, 0.8, 'TANGGAL', 1, 0, 'C');
$pdf->Cell(6, 0.8, 'NAMA BUKU', 1, 0, 'C');
$pdf->Cell(3, 0.8, 'HARGA JUAL', 1, 0, 'C');
$pdf->Cell(2, 0.8, 'JUMLAH ', 1, 0, 'C');
$pdf->Cell(3, 0.8, 'TOTAL ', 1, 1, 'C');
$pdf->SetFont('Arial','',10);
$no=1;
$query = mysqli_query($conn, "SELECT * FROM penjualan JOIN rincian_jual USING(idp) JOIN buku USING(noisbn) WHERE tgl BETWEEN $tgl1 AND $tgl2 AND status = 'berhasil' GROUP BY noisbn");
$total = mysqli_query($conn, "SELECT SUM(subtotal) as tal FROM rincian_jual JOIN penjualan USING(idp) WHERE tgl BETWEEN $tgl1 AND $tgl2 AND status = 'berhasil' GROUP BY noisbn");
$jumlah = mysqli_query($conn, "SELECT SUM(jumlah) as jum FROM rincian_jual JOIN penjualan USING(idp) WHERE tgl BETWEEN $tgl1 AND $tgl2 AND status = 'berhasil' GROUP BY noisbn");


while($lihat = mysqli_fetch_array($query)){
	$pdf->Cell(1, 0.8, $no , 1, 0, 'C');
	$pdf->Cell(4, 0.8, $lihat['tgl'],1, 0, 'C');
	$pdf->Cell(6, 0.8, $lihat['judul'], 1, 0,'C');
	$pdf->Cell(3, 0.8, "Rp. ".number_format($lihat['harga_jual'],0,",","."),1, 0, 'C');
$jum = $jumlah -> fetch_array();
	$pdf->Cell(2, 0.8, $a = $jum['jum'], 1, 0,'C');
$tot = $total -> fetch_array();
	$pdf->Cell(3, 0.8, "Rp. ".number_format($tot['tal'],0,",","."), 1, 1,'C');
$no++;
}
$grand = mysqli_query($conn, "SELECT SUM(jumlah) as jumm FROM rincian_jual JOIN penjualan USING(idp) WHERE tgl BETWEEN $tgl1 AND $tgl2 AND status = 'berhasil'");
$totall = mysqli_query($conn, "SELECT SUM(subtotal) as tall FROM rincian_jual JOIN penjualan USING(idp) WHERE tgl BETWEEN $tgl1 AND $tgl2 AND status = 'berhasil'");
$tott = $totall -> fetch_array();
$grandd = $grand -> fetch_array();
$pdf->Cell(14, 0.8, 'TOTAL', 1, 0, 'C');
$pdf->Cell(2, 0.8, $grandd['jumm'], 1, 0, 'C');
$pdf->Cell(3, 0.8, "Rp. ".number_format($tott['tall'],0,",","."), 1, 1, 'C');
$pdf->Output("laporan_buku.pdf","I");

?>