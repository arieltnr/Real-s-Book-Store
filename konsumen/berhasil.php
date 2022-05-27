<?php
session_start();
if(empty($_SESSION['beli'])){
    header('location: ../index.php');
}
ob_start();
$i = $_SESSION['beli'];
$o = $_SESSION['jual'];
include'../conf.php';
$sqll = $conn -> query("SELECT * FROM penjualan JOIN rincian_jual USING(idp) JOIN buku USING(noisbn) WHERE idpem = '$i' AND status = 'tunggu' AND idp = '$o'");
if($sqll -> num_rows == 0 ){
    header('location: index.php');
}
?>

<title>Berhasil</title>
<link href="../css/bootstrap.min.css" rel="stylesheet">
<style type="text/css">
    
        body{
            background-image: url('../icon/Download-Desktop-Book-HD-Backgrounds.jpg');
        }
    </style>

<center>
  <h1 style="color: white;">Pesanan Anda Sedang Diproses</h1>
     <img src="../icon/ajax-loader.gif" width="400"><br><br>
     <h5 style="color: white;"><b><i>"Uang kembali akan dikirim bersamaan pesanan buku."</i></b></h5>
     <img src="../icon/success-icon-2.png" width="400"><br><br>
     <a href="struk.php?idp=<?php echo $o; ?>" target="_blank" class="btn btn-primary"><span class="glyphicon glyphicon-print"></span> Cetak Struk</a>
     <a href="buktip.php?lanjut" class="btn btn-success"><span class="glyphicon glyphicon-shopping-cart"></span> Lanjut Belanja</a>
     <a href="logout.php" class="btn btn-danger" onclick="return confirm('Logout??')"><span class="glyphicon glyphicon-log-out"></span> Log out</a>
</center>