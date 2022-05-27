<?php
include'../conf.php';
session_start();
if(isset($_SESSION['beli'])) {
$o = $_SESSION['jual'];
date_default_timezone_set('Asia/Jakarta');
$id = $_GET['no'];
$now = date('y-m-d');
$input = $_GET['input'];

$book = $conn -> query("SELECT stok, harga_jual FROM buku WHERE noisbn = '$id'");
$ambil = $book -> fetch_array();

if ($input=='add'){
          $sql = $conn -> query("SELECT * FROM rincian_jual WHERE noisbn = '$id' AND idp = '$o'");
          $aweu = mysqli_num_rows($sql);
          if ($aweu == 0){
                  $conn -> query("INSERT INTO rincian_jual VALUES('', '$o', '$id', '1', '$ambil[1]')");
                  $conn -> query("UPDATE buku SET stok = stok - 1 WHERE noisbn ='$id'");
          }
          else {
                  $conn -> query("UPDATE rincian_jual SET jumlah = jumlah + 1, subtotal = jumlah * '$ambil[1]' WHERE noisbn = '$id' AND idp = '$o'");
                  $conn -> query("UPDATE buku SET stok = stok - 1 WHERE noisbn ='$id'");
          }
    header('location: keranjang.php');
}

if ($input=='tambah'){
           if($ambil[0] <= 1) { ?>
               <script language="JavaScript">
	               alert('Stok buku ini telah habis');
	               document.location='keranjang.php';
	           </script>
 <?php    }
           else { 
		     $conn -> query("UPDATE rincian_jual SET jumlah = jumlah + 1, subtotal = jumlah * '$ambil[1]' WHERE noisbn = '$id' AND idp = '$o'");
             $conn -> query("UPDATE buku SET stok = stok - 1 WHERE noisbn ='$id'");  
               header('location: keranjang.php');
           } 
}

if ($input=='kurang'){
    $aa = $conn -> query("SELECT jumlah FROM rincian_jual WHERE noisbn = '$id' AND idp = '$o'");
    $bb = $aa -> fetch_array();
      if ($bb['jumlah'] <= 0){
	        $conn -> query("DELETE FROM rincian_jual WHERE noisbn = '$id' AND idp = '$o'");
          $conn -> query("UPDATE buku SET stok = stok + '$jumlah' WHERE noisbn = '$id'");
      }
      else{         
		      $conn -> query("UPDATE rincian_jual SET jumlah = jumlah - 1, subtotal = jumlah * '$ambil[1]' WHERE noisbn = '$id' AND idp = '$o'");
          $conn -> query("UPDATE buku SET stok = stok + 1 WHERE noisbn ='$id'");
      }
    header('location: keranjang.php');
}

else if ($input=='clear'){
$jumlah = $_GET['jumlah'];
         $conn -> query("UPDATE buku SET stok = stok + '$jumlah' WHERE noisbn = '$id'");
	     $conn -> query("DELETE FROM rincian_jual WHERE noisbn = '$id' AND idp = '$o'");
    header('location: keranjang.php');
}
//header('location: keranjang.php');
}
?>