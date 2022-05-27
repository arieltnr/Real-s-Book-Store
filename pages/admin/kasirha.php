<?php
session_start();
if(empty($_SESSION['admin'])){
header("location: ../login.php");
}
$nama = $_SESSION['admin'];
include'../../conf.php';
$id = $_GET['idk'];

$conn -> query("DELETE FROM pegawai WHERE idk = '$id'");
header('location: kasir.php');