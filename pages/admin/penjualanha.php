<?php
session_start();
if(empty($_SESSION['admin'])){
header("location: ../index.php");
}
$nama = $_SESSION['admin'];
include'../../conf.php';
$idp = $_GET['idp'];

$conn -> query("DELETE FROM penjualan WHERE idp = '$idp'");
$conn -> query("DELETE FROM rincian_jual WHERE idp = '$idp'");
header('location: penjualan.php');