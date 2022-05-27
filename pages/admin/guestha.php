<?php
session_start();
if(empty($_SESSION['admin'])){
header("location: ../index.php");
}
$nama = $_SESSION['admin'];
include'../../conf.php';
$id = $_GET['id'];

$conn -> query("DELETE FROM pembeli WHERE idpem = '$id'");
header('location: guest.php');