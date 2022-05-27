<?php
session_start();
if(empty($_SESSION['gudang'])){
header("location: ../login.php");
}
include'../../conf.php';
$id = $_SESSION['gudang'];

if(isset($_POST['send'])){

    $b = $_POST['b'];
    $c = $_POST['c'];
    $d = $_POST['d'];
    $e = $_POST['e'];
    $f = $_POST['f'];
    $g = $_POST['g'];
    $h = $_POST['h'];
    $j = $_POST['j'];
    
    $gambar = $_FILES['i']['name'];
    $move = move_uploaded_file($_FILES['i']['tmp_name'], '../admin/img/pegawai/'.$gambar);

if(!empty($gambar)){   
$up = $conn -> query("UPDATE pegawai SET nama = '$b',
                                   foto = '$gambar',
                                   alamat = '$c',
                                   telp = '$d',
                                   jk = '$e',
                                   username = '$f',
                                   Password = '$g'
                                   WHERE idk = '$id'");
}
else if(empty($gambar)){   
$up = $conn -> query("UPDATE pegawai SET nama = '$b',
                                   alamat = '$c',
                                   telp = '$d',
                                   jk = '$e',
                                   username = '$f',
                                   Password = '$g'
                                   WHERE idk = '$id'");
}
     if($up) { ?>
          <script language="JavaScript">
              alert('Profil Telah Diubah');
              document.location='my.php';
          </script>
<?php  }
     else {
      echo "Gagal";
     }
}