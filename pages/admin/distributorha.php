<?php
session_start();
if(empty($_SESSION['admin'])){
header("location: ../login.php");
}
$nama = $_SESSION['admin'];
include'../../conf.php';
$id = $_GET['id'];

$conn -> query("DELETE FROM penerbit WHERE id_penerbit = '$id'");
header('location: distributor.php');