<?php 
session_start();
if(empty($_SESSION['beli'])){
    header('location: ../index.php');
}
$i = $_SESSION['beli'];
$o = $_SESSION['jual'];
include'../conf.php';
ob_start();

date_default_timezone_set("Asia/Jakarta");
$today = date("l, d-M-Y");
$now = date('y-m-d');
$aa = $conn -> query("SELECT nama FROM pembeli JOIN penjualan USING(idpem) WHERE idpem = '$i' AND idp = '$o'");
$bb = $aa -> fetch_array();
$nama = $bb['nama'];
$j = $conn -> query("SELECT id_jenis, nama_jenis FROM jenis");
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
			height: 370px;
			margin: -40px auto;
			padding: 15px;
		}
    
    .b {
        background-color: white;
        width: 100%;
    }

		 #gallery ul li {
            font-size: 13px;
			float: left;
			margin:50px;
			height: 330px;
			width: 300px;
		}
		 
		#gallery ul li img{
			height: 240px;
			width: 200px;
		}
       .z img {
 height: 290px;
 width: 273px;
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
    <div class="row">
           <div class="container">
            <div class="col-lg-12">
                <h2>Kontak Informasi</h2>
            </div>
            
            <div class="col-md-4">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        Address
                    </div>
                    <div class="panel-body">
                        <p>
                          <font size="6" color="teal" face="algeria">
                             Real'S Book Store.
                          </font>
                        </p>
                        <p>Belanja Cerdas Harga Pas.</p>
                        <p>Jl. Masih Teramat Jauh.</p>
                        <p>Phone   : 089662391933.</p>
                        <p>Website : www.realsbookstore.com.</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <img class="img-rounded img-rounded" src="../icon/Toko-Buku.jpeg" style="solid #333333; border-radius:5px; -moz-border-radius:2em;">
            </div>
           </div>
        </div>
					<div class="clear"></div>
			<div class="clear"></div>
        <!-- /.row --><br><br><br>
        
        <!-- Footer -->
        <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; @Real_Good11</p>
                </div>
            </div>
            </div>
        </footer>
    <!-- /.container -->

    <!-- jQuery -->
<script src="../js/bootstrap-table.js"></script>
<script type="text/javascript" src="../js/jquery-ui.min.js"></script>

</body>

</html>

<?php
ob_flush();
?>