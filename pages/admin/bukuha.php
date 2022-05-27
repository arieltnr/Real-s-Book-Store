<?php
session_start();
if(empty($_SESSION['admin'])){
header("location: ../index.php");
}
include'../../conf.php';
$id = $_GET['no'];

$conn -> query("DELETE FROM buku WHERE noisbn = '$id'");
header('location: buku.php');