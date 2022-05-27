<?php
session_start();
if(empty($_SESSION['beli'])){
    header('location: ../index.php');
}
ob_start();
$i = $_SESSION['beli'];
$o = $_SESSION['jual'];
include'../conf.php';
$sql = $conn -> query("SELECT * FROM pembeli WHERE idpem = '$i'");
$data = $sql -> fetch_array();
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
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="keywords" content="Accessible Profile Widget Responsive Widget,Login form widgets, Sign up Web forms , Login signup Responsive web form,Flat Pricing table,Flat Drop downs,Registration Forms,News letter Forms,Elements" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
			<script src="js/jquery.min.js"></script>
			<script>$(document).ready(function(c) {
			$('.alert-close').on('click', function(c){
				$('.main-agile').fadeOut('slow', function(c){
					$('.main-agile').remove();
				});
			});	  
		});
		</script>

    <title>Real's Book</title>

    <!-- Bootstrap Core CSS -->
    
    
	<link href="../css/stylei.css" rel='stylesheet' type='text/css'/>
	<link href="../css/popuo-box.css" rel="stylesheet" type="text/css" media="all" />
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../css/small-business.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style type="text/css">
    a {
            text-decoration: none;
            color: aliceblue;
        }
        body{
            background-image: url('../icon/v.jpg');
        }
    </style>

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
    
	<center><h2>Profile Mu</h2></center>
		<div class="main-agileits">
		<div class="right-wthree" style="width: 46%; height: 100%;">
				<?php echo "<img alt='image' style='border:4px solid #333333; border-radius:2em; -moz-border-radius:2em;' class='img-thumbnail' src='../pages/admin/img/pembeli/".$data['foto']."'>"; ?>
				<h2><?php echo $data[1]; ?></h2>
				<p>Customer</p>
			</div>
			<div class="left-w3ls">
			<ul class="address">
													<li>
														<ul class="address-text">
															<li><b>TELP </b></li>
															<li>: <?php echo $data[4]; ?></li>
														</ul>
													</li>
													<li>
														<ul class="address-text">
															<li><b>ALAMAT </b></li>
															<li> : <?php echo $data[3]; ?>.</li>
														</ul>
													</li>
													<li>
														<ul class="address-text">
															<li><b>JK </b></li>
															<li>: <?php echo $data[5]; ?></li>
														</ul>
													</li>
													<li>
														<ul class="address-text">
															<li><b>EMAIL </b></li>
															<li>: <?php echo $data[6]; ?></li>
														</ul>
													</li>
                                                    <li>
														<ul class="address-text">
															<li><b>PASS </b></li>
															<li>: <?php echo $data[7]; ?></li>
														</ul>
													</li>
                                                    <li>
														<ul class="address-text">
															<li><b>TGL DAFTAR </b></li>
															<li>: <?php echo $data[8]; ?></li>
														</ul>
													</li>
												</ul>
				
				<div class="button">
					<a href="#" class="play-icon popup-with-zoom-anim bt">Edit Profile</a>
				</div>
	<!-- //pop-up-box -->
					<script src="../js/jquery.magnific-popup.js" type="text/javascript"></script>
					<script>
					$(document).ready(function() {
					$('.popup-with-zoom-anim').magnificPopup({
					type: 'inline',
					fixedContentPos: false,
					fixedBgPos: true,
					overflowY: 'auto',
					closeBtnInside: true,
					preloader: false,
					midClick: true,
					removalDelay: 300,
					mainClass: 'my-mfp-zoom-in'
					});

					});
					</script>

			</div>
			<div class="clear"></div>
		</div>
    <div id="crud"></div>
</body>
</html>
        <!-- /.row --><br><br><br>		
        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12" style="color: white;">
                    <p>Copyright &copy; @Real_Good11</p>
                </div>
            </div>
        </footer>
    <!-- /.container -->

    <!-- jQuery -->
<script type="text/jscript" src="../js/jquery-1.11.1.js"></script>
<script type="text/javascript">
       $(document).ready(function(){
         $(".bt").click(function() {
           $("#crud").load("bukti.php").slideToggle(1500);
         });
        });
     </script>
</body>

</html>

<?php
if(isset($_POST['kirim'])){
    $a = $_POST['a'];
    $b = $_POST['b'];
    $d = $_POST['d'];
    $e = $_POST['e'];
    $f = $_POST['f'];
    $g = $_POST['g'];
    $h = $_POST['h'];
    
    $gambar = $_FILES['c']['name'];
    $move = move_uploaded_file($_FILES['c']['tmp_name'], '../pages/admin/img/pembeli/'.$gambar);
    
if(empty($gambar)){
$conn -> query("UPDATE pembeli SET nama = '$b',
                                   alamat = '$d',
                                   telp = '$e',
                                   jk = '$f',
                                   email = '$g',
                                   pass = '$h' WHERE idpem = '$a'");
}
else if(!empty($gambar)){
$conn -> query("UPDATE pembeli SET nama = '$b',
                                   foto = '$gambar',
                                   alamat = '$d',
                                   telp = '$e',
                                   jk = '$f',
                                   email = '$g',
                                   pass = '$h' WHERE idpem = '$a'");
}   
header('location: profile.php');
}
ob_flush();
?>