<?php
ob_start();
include'conf.php';
$ayo = $_POST['term'];
$brg = $conn -> query("SELECT * FROM buku WHERE judul LIKE '%$ayo%' ORDER BY noisbn ASC");
$j = $conn -> query("SELECT id_jenis, nama_jenis FROM jenis");
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

$carikod = $conn -> query("SELECT max(idp) FROM penjualan");
  $datakod = mysqli_fetch_array($carikod);
  if ($datakod) {
   $nilaikod = substr($datakod[0], 1);

   $kod = (int) $nilaikod;

   $kod = $kod + 1;
   $kode_otomati = "J".str_pad($kod, 2, "0", STR_PAD_LEFT);
  } else {
   $kode_otomati = "J01";
  }
date_default_timezone_set("Asia/Jakarta");
$today = date("l, d-M-Y");
$now = date('y-m-d h:i:s');
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
    <link rel="stylesheet" type="text/css" href="aset/datatables/dataTables.bootstrap.css">

	<link rel="stylesheet" type="text/css" href="css/jquery-ui.min.css">

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
            color: aliceblue;
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
                    <li class="active">
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
        <div class="row">
        <center>
             <div class="col-md-8">
                <img class="img-responsive img-rounded" src="icon/Toko-Buku.jpeg" alt="">
            </div>
            <!-- /.col-md-8 -->
            <div class="col-md-4">
                <h1>Real's Book Store</h1>
                <p><img class="img-responsive img-rounded img6" src="icon/bokk.gif" alt="" style="height: 150px;"></p>
            </div>
            <!-- /.col-md-4 -->
        </center>
        </div>
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
									<input type="text" class="form-control" id="nama1" name="nama1" placeholder="Nama lengkap" autofocus/>
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
                		<th style="border-radius: 0 5px 5px 0;">
                			<form method="POST" action="search.php" class="ac-form">
                                 
                                       <input type="text" id="search" name="term" class="search-input form-control" placeholder="Cari.."/ size="5">
                               
                               </form>
                		</th>
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
					                              src='pages/admin/img/buku/".$data['gambar']."'>"; ?> <br>

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

	    	 <div class="col-md-3" style="float: right;">
                <fieldset>
                <h3>Yukk Membaca ^^</h3><hr>
                <div class="buters-guide">
                  <img class="img5" src="icon/lezen.png" width="260">
                    <font size="3" color="grey" face="impact">
                         <p><span>Buku Adalah Jembatan Ilmu.</span>	
				                  Barang siapa yg mencari ilmu, niscaya hidupnya terjamin. 
                        </p>
                    </font>
                     <a class="btn-info btn-lg"> More Info</a>
                </div>
                </fieldset><br><br>
                 <p class="lead">Follow US</p><hr>
                <div class="navbar nav">
                    <a href="https://www.facebook.com/profile.php?id=100008460228219"><img src="icon/1.jpg" width="70" height="50" style="margin: 2px;"></a>
                    <a href="https://twitter.com/Real_Good11"><img src="icon/2.jpg" width="70" height="50" style="margin: 2px;"></a>
                    <a href=""><img src="icon/3.jpg" width="70" height="50" style="margin: 2px;"></a>
                    <a href=""><img src="icon/4.jpg" width="70" height="50" style="margin: 2px;"></a>
                    <a href="https://www.instagram.com/real_good11/?hl=en"><img src="icon/5.jpg" width="70" height="50" style="margin: 2px;"></a>
                    <a href=""><img src="icon/6.jpg" width="70" height="50" style="margin: 2px;"></a>
                </div>
            </div>

	    </div>            
    </center>        
            <!-- /.col-md-4 -->
        </div>
        <!-- /.row --><br><br><br>		
        <!-- Footer -->
        <div class="container">
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; @Real_Good11</p>
                </div>
            </div>
        </footer>
        </div>
    <!-- /.container -->
    <script type="text/javascript" src="js/jquery-ui.min.js"></script>
        <script>
            $(function () { $("[data-toggle='tooltip']").tooltip();});
        </script>
    <!-- jQuery -->
<script>
            function tampilkanPreview(gambar,idpreview){
//                membuat objek gambar
                var gb = gambar.files;
                
//                loop untuk merender gambar
                for (var i = 0; i < gb.length; i++){
//                    bikin variabel
                    var gbPreview = gb[i];
                    var imageType = /image.*/;
                    var preview=document.getElementById(idpreview);            
                    var reader = new FileReader();
                    
                    if (gbPreview.type.match(imageType)) {
//                        jika tipe data sesuai
                        preview.file = gbPreview;
                        reader.onload = (function(element) { 
                            return function(e) { 
                                element.src = e.target.result; 
                            }; 
                        })(preview);
 
    //                    membaca data URL gambar
                        reader.readAsDataURL(gbPreview);
                    }else{
//                        jika tipe data tidak sesuai
                        alert("Type file tidak sesuai. Khusus image.");
                    }
                   
                }    
            }
</script>
    <!-- Bootstrap Core JavaScript -->

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
    $conn -> query("INSERT INTO penjualan VALUES('$kode_otomati', '$id', '', '', '', '')");?>
    
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