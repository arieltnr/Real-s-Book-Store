<?php
session_start();
if(empty($_SESSION['beli'])){
    header('location: ../index.php');
}
ob_start();
$i = $_SESSION['beli'];
$o = $_SESSION['jual'];
include'../conf.php';
$ayo = $_POST['term'];
$brg = $conn -> query("SELECT * FROM buku WHERE stok >= 2 AND judul LIKE '%$ayo%' ORDER BY noisbn");
$j = $conn -> query("SELECT id_jenis, nama_jenis FROM jenis");

date_default_timezone_set("Asia/Jakarta");
$today = date("l, d-M-Y");
$now = date('y-m-d');
$aa = $conn -> query("SELECT nama FROM pembeli JOIN penjualan USING(idpem) WHERE idpem = '$i' AND idp = '$o'");
$bb = $aa -> fetch_array();
$nama = $bb['nama'];
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Real's Book</title>

    <!-- Bootstrap Core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../css/jquery-ui.min.css">

    <!-- Custom CSS -->
    <link href="../css/small-business.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style type="text/css">
        * {
            margin: 0;
            padding: 0;
        }
    
        a {
            text-decoration: none;
            color: aliceblue;
        }
        #gallery {
            width: 100%;
            height: 570px;
            margin: -40px auto;
            padding: 15px;
        }
    
    .b {
        background-color: white;
        width: 100%;
    }

         .oo img{
            height: 226px;
            width: 188px;
        }
        
        .img3 {
-webkit-transition: all 1s ease-in-out;
-moz-transition: all 1s ease-in-out;
-o-transition: all 1s ease-in-out;
transition: all 1s ease-in-out;
}

.img3:hover {
-webkit-transform: scale(2) rotate(1080deg);
-moz-transform: scale(2) rotate(1080deg);
-o-transform: scale(2) rotate(1080deg);
-ms-transform: scale(2) rotate(1080deg);
transform: scale(2) rotate(1080deg);
}
.img5 {
    border-radius: 30px 0 30px 0;
    -moz-border-radius: 30px 0 30px 0;
    -webkit-border-radius: 30px 0 30px 0;
    -o-border-radius: 30px 0 30px 0;
    transition: all 0.5s;
    -moz-transition: all 0.5s;
    -webkit-transition: all 0.5s;
    -o-transition: all 0.5s;
}
.img5:hover {
    box-shadow: 1px 1px 10px 3px rgba(0,0,0,0.5);
    border-radius:0;
    -moz-border-radius:0;
    -webkit-border-radius:0;
    -o-border-radius:0;
}
.img6 {
    box-shadow: 0 3px 6px rgba(0,0,0,.25);
    transform:  rotate(+2deg);
    -o-transform: rotate(+2deg);
    -webkit-transform:  rotate(+2deg);
    -moz-transform: rotate(+2deg);
}
.img6:hover {
    box-shadow:  0 3px 6px rgba(0,0,0,.5);
    transform:  rotate(-1deg);
    -webkit-transform:  rotate(-1deg);
    -o-transform:  rotate(-1deg);
    -moz-transform: rotate(-1deg);
}
        </style>
<script type="text/javascript" src="../js/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="../js/bootstrap.min.js"></script>
</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                 <ul class="nav navbar-nav">
                    <li>
                        <a href="index.php">Home</a>
                    </li>
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Kategori
                            <span class="caret"></span></a>
                          <ul class="dropdown-menu"><?php while($da = $j -> fetch_array()){ ?>
                              <li>
                                 <a href="jenis.php?jenis=<?php echo $da[1]; ?>"> <?php echo $da[1]; ?></a>
                              </li> <?php } ?>
                          </ul>
                    </li>
                    <li>
                        <a href="about.php">About</a>
                    </li>
                    <li>
                        <a href="kontak.php">Contact</a>
                    </li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown" style="float: right;">
                         <a class="dropdown-toggle a" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-user"> <?php echo $nama = $bb['nama'];?></span> <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                              <li><a href="profile.php?id=<?php echo $i; ?>"><span class="glyphicon glyphicon-user"></span> Profile</a></li>
                              <li><a onclick="return confirm('Yakin??? Pesanan yang belum di check out akan terhapus')" href="logout.php?idp=<?php echo $o; ?>"><span class="glyphicon glyphicon-log-out"></span> LogOut</a></li>
                            </ul>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Page Content -->
    <div class="container">

        <!-- Heading Row -->
        <div class="row">
        <center>
             <div class="col-md-8">
                <img class="img-responsive img-rounded" src="../icon/Toko-Buku.jpeg" alt="">
            </div>
            <!-- /.col-md-8 -->
            <div class="col-md-4">
                <h1>Real's Book Store</h1>
                <p><img class="img-responsive img-rounded img6" src="../icon/bokk.gif" alt="" style="height: 150px;"></p>
            </div>
            <!-- /.col-md-4 -->
        </center>
        </div>
        <!-- /.row -->

        <hr>
        
        <!-- Call to Action Well -->
        <div class="row">
            <div class="col-lg-12">
                <table class="table">
                    <tr bgcolor="teal">
                        <td style="border-radius: 5px 0 0 5px;">
                            <font color="white" size="2"> <?php echo $today;?> </font>
                        </td>
                        <th>
                            <font color="white" size="2"> Hanya Berbagi </font>
                        </th>
                                <form method="POST" action="search.php" class="ac-form">
                        <th>
                                     <input type="text" id="search" name="term" class="search-input form-control" placeholder="Cari.."/ size="5">
                        </th>
                         <th style="border-radius: 0 5px 5px 0;">
                                     <button type="submit" name="search" class="btn"><span class="glyphicon glyphicon-search"></span></button>
                        </th>
                                </form>
                    </tr>
                </table>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
<script type="text/javascript">
        $(document).ready(function(){
            $("#search").autocomplete({
                source: "<?php echo 'data.php';?>"
            });
        }); 
</script>
        <!-- Content Row -->
    <center>
        <div class="row">
          <div class="col-lg-9">
              <?php while($data = $brg -> fetch_array()){ ?>
                    <div class="col-md-3">
                         <div class="oo">
                                       <?php echo "<img style='solid #333333; border-radius:5px;
                                        -moz-border-radius:2em; margin: 10px;' 
                                        class='img3 img-thumbnail' 
                                        src='../pages/admin/img/buku/".$data['gambar']."'>"; ?> <br>

                                        <font face="arial" size="2" color="black">
                                            <b><?php echo $data['judul']; ?></b>
                                        </font> <br>

                                        <font color="green" face="arial" size="4">
                                           <i>Rp.<?php echo number_format ($data['harga_jual'],0,",","."); ?>,-</i>
                                        </font> <br>
                                        <a class="btn" data-toggle="tooltip" data-placement="top" 
                                         title="Detail Buku" style="color: cadetblue; text-decoration: none;" 
                                         href="detail.php?no=<?php echo $data[0]; ?>">
                                         <span class="glyphicon glyphicon-eye-open"></span> Detail
                                        </a>
                         </div>
                    </div><!-- /.col-->
              <?php } ?>
           </div>
           
            <div class="col-md-3">
                <div class="list-group">
                    <a href="index.php" class="list-group-item"><span class="glyphicon glyphicon-home"></span> Beranda</a>
                    <a href="keranjang.php" class="list-group-item"><span class="glyphicon glyphicon-calendar"></span> Daftar Belanja</a>
                    <a href="#" class="list-group-item">None</a>
                </div>
                
                <fieldset>
                <h3>Baca bukumu</h3><hr>
                <div class="buters-guide">
                  <img class="img5" src="../icon/book.png" width="260">
                    <font size="3" color="grey" face="impact">
                         <p><span>Perpustakaan Adalah Gudang Ilmu, </span>  
                                  dan perpustakaan adalah tempat membaca. 
                        </p>
                    </font>
                     <a class="btn-info btn-lg"> More Info</a>
                </div>
                </fieldset><br><br>
                
                <p class="lead">Follow US</p><hr>
                <div class="navbar nav">
                    <a href="https://www.facebook.com/profile.php?id=100008460228219"><img src="../icon/1.jpg" width="70" height="50" style="margin: 2px;"></a>
                    <a href="https://twitter.com/Real_Good11"><img src="../icon/2.jpg" width="70" height="50" style="margin: 2px;"></a>
                    <a href=""><img src="../icon/3.jpg" width="70" height="50" style="margin: 2px;"></a>
                    <a href=""><img src="../icon/4.jpg" width="70" height="50" style="margin: 2px;"></a>
                    <a href="https://www.instagram.com/real_good11/?hl=en"><img src="../icon/5.jpg" width="70" height="50" style="margin: 2px;"></a>
                    <a href=""><img src="../icon/6.jpg" width="70" height="50" style="margin: 2px;"></a>
                </div>
            </div>               
        </div>
    </center>
        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; @Real_Good11</p>
                </div>
            </div>
        </footer>
    <!-- /.container -->
<script src="../js/bootstrap-table.js"></script>
<script type="text/javascript" src="../js/jquery-ui.min.js"></script>
        <script>
            $(function () { $("[data-toggle='tooltip']").tooltip();});
        </script>
    <!-- jQuery -->

</body>

</html>

<?php
ob_flush();
?>