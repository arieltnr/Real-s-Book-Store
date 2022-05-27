<?php 
session_start();
if(empty($_SESSION['beli'])){
    header('location: ../index.php');
}
$i = $_SESSION['beli'];
$o = $_SESSION['jual'];
include'../conf.php';
ob_start();
$no = $_GET['no'];
$sql = $conn -> query("SELECT * FROM buku JOIN penerbit USING(id_penerbit) JOIN jenis USING(id_jenis) WHERE noisbn = '$no'");
$data = $sql -> fetch_array();

date_default_timezone_set("Asia/Jakarta");
$today = date("l, d-M-Y");
$now = date('y-m-d');
$aa = $conn -> query("SELECT nama FROM pembeli WHERE idpem = '$i'");
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
        <div class="product-details">
        <table cellpadding="50" width="90%" class="table table-bordered table-striped">
             <tr>
                <th rowspan="6">
                        <div class="z">
                           <center>
                                    <?php echo "<img class='img-thumbnail' width='190px' height='290px' src='../pages/admin/img/buku/".$data['gambar']."'>"; ?>
                                    <?php echo "<img class='img-thumbnail' src='../pages/admin/img/buku/".$data['gambar2']."'>"; ?>
                                    <?php echo "<img class='img-thumbnail' src='../pages/admin/img/buku/".$data['gambar3']."'>"; ?>
                           </center>
                        </div>
                </th>
            </tr>
            <tr>
                <th> Judul </th>
                <td> <?php echo $data['judul']; ?></td>
            </tr>
            <tr>
                <th> Harga </th>
                <td> Rp.<?php echo number_format ($data['harga_jual'],0,",","."); ?>,-</td>
            </tr>
            <tr>
                <th> Penulis </th>
                <td> <?php echo $data['penulis']; ?></td>
            </tr>
            <tr>
                <th> Penerbit </th>
                <td> <?php echo $data['nm_p']; ?></td>
            </tr>
            <tr>
                <th> Tahun Terbit </th>
                <td> <?php echo $data['tahun_terbit']; ?></td>
            </tr>
             <tr>
                <th colspan="3">
                <font size="8" face="algeria"> Sinopsis: </font>
                    <i>"<?php echo $data['sinopsis']; ?>"</i>
                </th>
            </tr>
            
        </table>
          </div>
				
                <center>
					<a href="add.php?input=add&no=<?php echo $data['noisbn']; ?>" class="btn btn-block btn-warning">Beli</a>
                </center>
					<div class="clear"></div>
			<div class="clear"></div>
        <!-- /.row --><br><br><br>
        
        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; @Real_Good11</p>
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