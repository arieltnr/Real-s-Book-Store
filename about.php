<?php include'conf.php';
ob_start();
$j = $conn -> query("SELECT id_jenis, nama_jenis FROM jenis");
ob_start();
$carikode = $conn -> query("SELECT max(idpem) from pembeli");
  $datakode = mysqli_fetch_array($carikode);
  if ($datakode) {
   $nilaikode = substr($datakode[0], 1);

   $kode = (int) $nilaikode;

   $kode = $kode + 1;
   $kode_otomatis = "P".str_pad($kode, 2, "0", STR_PAD_LEFT);
  } else {
   $kode_otomatis = "P01";
  }
date_default_timezone_set("Asia/Jakarta");
$today = date("l, d-M-Y");
$now = date('y-m-d');
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
    <link href="css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/jquery-ui.min.css">
    <link href="css/styles.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/small-business.css" rel="stylesheet">

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
		.z {
			width: 100%;
		}
        .z img {
 height: 290px;
 width: 273px;
 }

		</style>
<script type="text/javascript" src="js/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="js/jquery-1.11.1.js"></script>
<script type="text/javascript" src="js/jquery.validate.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
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
                    <li class="active">
                        <a href="about.php">About</a>
                    </li>
                    <li>
                        <a href="kontak.php">Contact</a>
                    </li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li style="float: right;">
							<a href="#" data-toggle="modal" data-target="#modalpesan"><span class="glyphicon glyphicon-log-in"></span>&nbsp;Login</a>
				    </li>
                    <li style="float: right;">
							<a href="#" data-toggle="modal" data-target="#modalpesan2"><span class="glyphicon glyphicon-edit"></span>&nbsp;Daftar</a>
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
        <!-- /.row -->

        <hr>
<div id="modalpesan" class="modal fade">
		<div class="modal-dialog" style="margin-top: 12%;">
			<div class="login-panel panel panel-default">
				<div class="panel-heading">Log in Real's Book Store</div>
				<div class="panel-body">
					<form role="form" action="" method="post">
						<fieldset>
							<div class="form-group">
								<input class="form-control" placeholder="Username" name="f" type="txt" autofocus="" required="">
							</div>
							<div class="form-group">
								<input class="form-control" placeholder="Password" name="g" type="password" value="" required="">
							</div>
							<div class="checkbox">
								<label>
									<input name="remember" type="checkbox" value="Remember Me">Remember Me
								</label>
							</div>
							<input type="submit" name="send" class="btn btn-primary" value="Login" style="float: right;">
							<a href="ug.pdf">Help!</a>
						</fieldset>
					</form>
				</div>
			</div>
		</div>
</div>
          
    <div id="modalpesan2" class="modal fade">
		<div class="modal-dialog" style=" margin-top: 5%;">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title">Tambah Data</h4>
				</div>
              <form id="signupForm1" method="post" class="form-horizontal" action="" enctype="multipart/form-data">

							<div class="form-group">
								<label class="col-sm-4 control-label" for="nama1">Nama Lengkap</label>
								<div class="col-sm-5">
									<input type="text" class="form-control" id="nama1" name="nama1" placeholder="Nama lengkap" autofocus />
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-4 control-label" for="firstname1">Foto</label>
								<div class="col-sm-5">
									<input type="file" class="form-control" id="firstname1" name="firstname1" placeholder="First name" accept="image/*"  onchange="tampilkanPreview(this,'preview')">
									<img id="preview" src="" alt="" width="235px" />
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-4 control-label" for="lastname1">Alamat</label>
								<div class="col-sm-5">
									<textarea class="form-control" id="lastname1" name="lastname1" placeholder="Alamat"></textarea>
								</div>
							</div>
                  
                            
							<div class="form-group">
								<label class="col-sm-4 control-label" for="id1">No Telp</label>
								<div class="col-sm-5">
									<input type="text" class="form-control" id="id1" name="id1" placeholder="telephone" />
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-4 control-label" for="username1">Jenis Kelamin</label>
								<div class="col-sm-5">
									<input type="radio" value="Laki-laki" id="username1" name="username1" placeholder="Username" />Laki-laki
                                    <input type="radio" value="Perempuan" id="username1" name="username1" placeholder="Username" />Perempuan
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-4 control-label" for="email1">Email</label>
								<div class="col-sm-5">
									<input type="text" class="form-control" id="email1" name="email1" placeholder="Email" />
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-4 control-label" for="password1">Password</label>
								<div class="col-sm-5">
									<input type="password" class="form-control" id="password1" name="password1" placeholder="Password" />
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-4 control-label" for="confirm_password1">Konfirmasi password</label>
								<div class="col-sm-5">
									<input type="password" class="form-control" id="confirm_password1" name="confirm_password1" placeholder="Konfirmasi password" />
								</div>
							</div>

							<div class="form-group">
								<div class="col-sm-5 col-sm-offset-4">
									<div class="checkbox">
										<label>
											<input type="checkbox" id="agree1" name="agree1" value="agree" />Setuju dengan ketentuan kami
										</label>
									</div>
								</div>
							</div>

							<div class="form-group">
								<div class="col-sm-9 col-sm-offset-4">
									<button type="submit" class="btn btn-primary" name="signu" value="Sign up">Daftar</button>
								</div>
							</div>
						</form>
			</div>
		</div>
	</div>
        <script type="text/javascript">
		

		$( document ).ready( function () {
			$( "#signupForm" ).validate( {
				rules: {
					firstname: "required",
					lastname: "required",
					username: {
						required: true,
					},
					nama: {
						required: true,
						minlength: 2
					},
					id: {
						required: true,
						digits: true,
						minlength:10,
						maxlength:10
					},
					password: {
						required: true,
						minlength: 5
					},
					confirm_password: {
						required: true,
						minlength: 5,
						equalTo: "#password"
					},
					email: {
						required: true,
						email: true
					},
					agree: "required"
				},
				messages: {
					firstname: "Please enter your picture",
					lastname: "Please enter your address",
					username: {
						required: "Please check Your Gender",
						minlength: "Your username must consist of at least 2 characters"
					},
					nama: {
						required: "Please provide an completely name",
						minlength: "Your id must be at least 2 characters long"
					},
					id: {
						required: "Please provide an id",
						minlength: "Your id must be at least 10 characters long"
					},
					password: {
						required: "Please provide a password",
						minlength: "Your password must be at least 5 characters long"
					},
					confirm_password: {
						required: "Please provide a password",
						minlength: "Your password must be at least 5 characters long",
						equalTo: "Please enter the same password as above"
					},
					email: "Please enter a valid email address",
					agree: "Please accept our policy"
				},
				errorElement: "em",
				errorPlacement: function ( error, element ) {
					// Add the `help-block` class to the error element
					error.addClass( "help-block" );

					if ( element.prop( "type" ) === "checkbox" ) {
						error.insertAfter( element.parent( "label" ) );
					} else {
						error.insertAfter( element );
					}
				},
				highlight: function ( element, errorClass, validClass ) {
					$( element ).parents( ".col-sm-5" ).addClass( "has-error" ).removeClass( "has-success" );
				},
				unhighlight: function (element, errorClass, validClass) {
					$( element ).parents( ".col-sm-5" ).addClass( "has-success" ).removeClass( "has-error" );
				}
			} );

			$( "#signupForm1" ).validate( {
				rules: {
					firstname1: "required",
					lastname1: "required",
					username1: {
						required: true,
					},
					nama1: {
						required: true,
						minlength: 2
					},
					id1: {
						required: true,
						digits: true,
						minlength:10,
						maxlength:15
					},
					password1: {
						required: true,
						minlength: 5
					},
					confirm_password1: {
						required: true,
						minlength: 5,
						equalTo: "#password1"
					},
					email1: {
						required: true,
						email: true
					},
					agree1: "required"
				},
				messages: {
					firstname1: "Please enter your picture",
					lastname1: "Please enter your address",
					username1: {
						required: "Please check your gender",
						minlength: "Your username must consist of at least 2 characters"
					},
					nama1: {
						required: "Please provide an completely name",
						minlength: "Your id must be at least 2 characters long"
					},
					id1: {
						required: "Please enter your number phone",
						minlength: "Your id must be at least 11 characters long"
					},
					password1: {
						required: "Please provide a password",
						minlength: "Your password must be at least 5 characters long"
					},
					confirm_password1: {
						required: "Please provide a password",
						minlength: "Your password must be at least 5 characters long",
						equalTo: "Please enter the same password as above"
					},
					email1: "Please enter a valid email address",
					agree1: "Please accept our policy"
				},
				errorElement: "em",
				errorPlacement: function ( error, element ) {
					// Add the `help-block` class to the error element
					error.addClass( "help-block" );

					// Add `has-feedback` class to the parent div.form-group
					// in order to add icons to inputs
					element.parents( ".col-sm-5" ).addClass( "has-feedback" );

					if ( element.prop( "type" ) === "checkbox" ) {
						error.insertAfter( element.parent( "label" ) );
					} else {
						error.insertAfter( element );
					}

					// Add the span element, if doesn't exists, and apply the icon classes to it.
					if ( !element.next( "span" )[ 0 ] ) {
						$( "<span class='glyphicon glyphicon-remove form-control-feedback'></span>" ).insertAfter( element );
					}
				},
				success: function ( label, element ) {
					// Add the span element, if doesn't exists, and apply the icon classes to it.
					if ( !$( element ).next( "span" )[ 0 ] ) {
						$( "<span class='glyphicon glyphicon-ok form-control-feedback'></span>" ).insertAfter( $( element ) );
					}
				},
				highlight: function ( element, errorClass, validClass ) {
					$( element ).parents( ".col-sm-5" ).addClass( "has-error" ).removeClass( "has-success" );
					$( element ).next( "span" ).addClass( "glyphicon-remove" ).removeClass( "glyphicon-ok" );
				},
				unhighlight: function ( element, errorClass, validClass ) {
					$( element ).parents( ".col-sm-5" ).addClass( "has-success" ).removeClass( "has-error" );
					$( element ).next( "span" ).addClass( "glyphicon-ok" ).removeClass( "glyphicon-remove" );
				}
			} );
		} );
	</script>
        <!-- Call to Action Well -->
        <!-- /.row -->
        <!-- Content Row -->
    </div>
    <div class="container">
    <div class="row">
			<div class="col-lg-12">
				<h2>User Guide</h2>
			</div>
			
			<div class="col-md-7">
				<div class="panel panel-blue">
					<div class="panel-heading dark-overlay"><span class="glyphicon glyphicon-ok"></span></div>
					<div class="panel-body">
						<p>1. Register terlebih dahulu bila tidak memiliki akun.</p>
						<p>2. Login dengan akun yang sudah didaftarkan.</p>
						<p>3. Pada halaman awal setelah login klik detail pada buku yang ditampilkan.</p>
						<p>4. Ditampilan detail bila ingin membeli buku tersebut klik button beli maka buku tersebut akan masuk ke halaman keranjang belanja.</p>
					</div>
				</div>
			</div><!--/.col-->
			
			<div class="col-md-5">
				<div class="panel panel-teal">
					<div class="panel-heading dark-overlay"><span class="glyphicon glyphicon-ok"></span></div>
					<div class="panel-body">
						<p>7. Bila fix dengan belanjaan tersebut, cetak dulu struk pembayaran sebagai tanda bukti sudah memesan buku yang akan diuploadkan nanti.</p>
						<p>8. Setelah mencetak struk kemudian klik check out untuk memasukan data-data pembayaran ke rekening juga menguploadkan struk yg sudah dicetak tadi.</p>
					</div>
				</div>
			</div><!--/.col-->
			
			<div class="col-md-6">
				<div class="panel panel-orange">
					<div class="panel-heading dark-overlay"><span class="glyphicon glyphicon-ok"></span></div>
					<div class="panel-body">
						<p>5. Pada halaman keranjang bila ingin menambah jumlah dari buku tersebut klik icon arrow up.</p>
						<p>6. Bila ingin mengurangi jumlah klik icon arrow down, dan bila ingin menghapus klik icon trash.</p>
					</div>
				</div>
			</div><!--/.col-->
			
			<div class="col-md-6">
				<div class="panel panel-red">
					<div class="panel-heading dark-overlay"><span class="glyphicon glyphicon-ok"></span></div>
					<div class="panel-body">
						<p>9. Bila sudah memasukan data check out, maka hanya tinggal menunggu konfirmasi dari operator.</p>
						<p>10. Bila berhasil maka pembelanjaan akan dikirim, dan bila gagal maka jumlah dari data dari buku yg dibelanja akan kembali ke stok.</p>
					</div>
				</div>
			</div><!--/.col-->
		</div><!--/.row-->		
		</div>
		<div class="container">
			<footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; @Real_Good11</p>
                </div>
            </div>
        </footer>
		</div>
</body>

</html>

<?php
if(isset($_POST['send'])){
    $f = $_POST['f'];
    $g = $_POST['g'];
    
$sql = $conn -> query("SELECT * FROM pembeli WHERE email = '$f' AND pass = '$g'");
    $data = $sql -> fetch_array();
    $id = $data[0];
if ($sql -> num_rows > 0){
    session_start();
    $_SESSION['beli'] = $id;
    $_SESSION['jual'] = $kode_otomati;
    $conn -> query("INSERT INTO penjualan VALUES('$kode_otomati', '$id', '', '', '', '')"); ?>
    
    <script language="JavaScript">
	alert('Selamat Datang');
	document.location='konsumen/index.php';
	</script>
    
<?php }
else { ?>
    <script language="JavaScript">
	alert('Username atau Password tidak sesuai!');
	document.location='index.php';
	</script>
<?php }
}
if(isset($_POST['signu'])){
    $b = $_POST['nama1'];
    $c = $_POST['lastname1'];
    $d = $_POST['id1'];
    $e = $_POST['username1'];
    $f = $_POST['email1'];
    $g = $_POST['password1'];
    
    $gambar = $_FILES['firstname1']['name'];
    $move = move_uploaded_file($_FILES['firstname1']['tmp_name'], 'pages/admin/img/pembeli/'.$gambar);
    
$up = $conn -> query("INSERT INTO pembeli VALUES('$kode_otomatis', '$b', '$gambar', '$c', '$d', '$e', '$f', '$g', '$now')");
if($up) { ?>
	<script language="JavaScript">
	alert('Selamat ... Akun Telah Dibuat, Silahkan Login Untuk Memulai Pembelanjaan');
	document.location='index.php';
	</script>
<?php }
}
ob_flush();
?>