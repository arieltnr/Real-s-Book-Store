<?php
session_start();
if(empty($_SESSION['gudang'])){
header("location: ../login.php");
}
$nama = $_SESSION['gudang'];
include'../../conf.php';
$id = $_GET['id'];

$conn -> query("DELETE FROM penerbit WHERE id_penerbit = '$id'");
header('location: distributor.php');