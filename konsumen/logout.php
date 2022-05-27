<?php
session_start();
include'../conf.php';
$i = $_SESSION['beli'];
$o = $_SESSION['jual'];
$idp = $_GET['idp'];

$sql = $conn -> query("SELECT * FROM penjualan WHERE idp = '$idp' AND idpem = '$i' AND status=''");
$ii = $sql -> fetch_array();

$sql2 = $conn -> query("SELECT * FROM rincian_jual WHERE idp = '$idp'");
    //$aweu2 = mysqli_num_rows($sql2);

        while($ko  = $sql2 -> fetch_array()){
            $ka = $conn -> query("SELECT * FROM buku WHERE noisbn = '$ko[2]'");
            $ki = $ka -> fetch_array();

            $stok = $ki['stok'];
            $k = $stok + $ko['jumlah'];
           
            $conn -> query("UPDATE buku SET stok = '$k' WHERE noisbn = '$ko[2]'");
        }
            $conn -> query("DELETE FROM penjualan WHERE idp = '$idp'");
            $conn -> query("DELETE FROM rincian_jual WHERE idp = '$idp'");
unset($_SESSION['beli']);
unset($_SESSION['jual']);
header('location: ../index.php');
?>
