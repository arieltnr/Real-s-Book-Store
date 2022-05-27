<?php
session_start();
$id = $_SESSION['beli'];
$o = $_SESSION['jual'];
include'../conf.php';
if(isset($_POST['send'])){
    $a = $_POST['a'];
    $b = $_POST['b'];
    $c = $_POST['c'];
    $gambar = $_FILES['d']['name'];
    $move = move_uploaded_file($_FILES['d']['tmp_name'], '../pages/admin/img/bukti/'.$gambar);
    $e = $_POST['e'];
    $f = $_POST['f'];
    $g = $_POST['g'];
    $h = $_POST['h'];
    
$in = $conn -> query("UPDATE penjualan SET total = '$b',                                     
                                     tgl = '$c',
                                     status = 'tunggu'
                                     WHERE idp = '$a'");
$in = $conn -> query("INSERT INTO konfirmasi_bayar VALUES('', '$a', '$e', '$f', '$g', '$h', '$c', '$gambar')");

if($in) { 
  header('location: berhasil.php'); 
    }
 }

if(isset($_GET['lanjut'])){

       $kokod = $conn -> query("SELECT * FROM penjualan WHERE idp = '$o'");
       $huntu = mysqli_num_rows($kokod);
             if($huntu >= 1){   
                  unset($_SESSION['jual']);
                      $carikod = $conn -> query("SELECT max(idp) FROM penjualan");
                      $datakod = mysqli_fetch_array($carikod);
                      if ($datakod) {
                          $nilaikod = substr($datakod[0], 1);

                          $kod = (int) $nilaikod;

                          $kod = $kod + 1;
                          $kode_otomati = "J".str_pad($kod, 2, "0", STR_PAD_LEFT);
                      }   
                      else {
                      $kode_otomati = "J01";
                      }

                      $_SESSION['jual'] = $kode_otomati;
                      $conn -> query("INSERT INTO penjualan VALUES('$kode_otomati', '$id', '', '', '', '')");
    
                      header('location: index.php');
            }
}