<?php
session_start();
if(empty($_SESSION['beli'])){
    header('location: ../index.php');
}
include'../conf.php';
ob_start();
$i = $_SESSION['beli'];
$o = $_SESSION['jual'];
date_default_timezone_set("Asia/Jakarta");
$today = date("l, d-M-Y");
$now = date('y-m-d h:i:s');
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

    <style type="text/css">
		* {
			margin: 0;
			padding: 0;
		}
    
        .a {
            text-decoration: none;
            color: aliceblue;
        }

		</style>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
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
        <div class="row">
        <div class="col-md-3">
                <div class="list-group">
                    <a href="index.php" class="list-group-item"><span class="glyphicon glyphicon-home"></span> Beranda</a>
                    <a href="keranjang.php" class="list-group-item active"><span class="glyphicon glyphicon-calendar"></span> Daftar Belanja</a>
                    <a href="#" class="list-group-item">None</a>
                </div>
            </div>

     <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-body tabs">
                        <ul class="nav nav-tabs">

                            <li class="active"><a href="#tab1" data-toggle="tab">Pembelanjaan Sekarang</a></li>
                            <li><a href="#tab2" data-toggle="tab">Riwayat Pembelanjaan</a></li>
                            <?php $sqll = $conn -> query("SELECT * FROM penjualan JOIN rincian_jual USING(idp) JOIN buku USING(noisbn) WHERE idpem = '$i' AND status = 'tunggu'");
                 $hh = mysqli_num_rows($sqll);
                if($hh >  0 ){ ?>
                    <li><a href="#tab3" data-toggle="tab">Menunggu Konfirmasi</a></li>
              <?php  } ?>
                        </ul>
        
                        <div class="tab-content">
                            <div class="tab-pane fade in active" id="tab1">
                                <hr>
                                <table class="table table-striped table-bordered">
                             <tr style=" background-color: dodgerblue;">
                                <th> Nama Buku </th>
                                <th> Harga </th>
                                <th> Jumlah </th>
                                <th> Total </th>
                                <th> Status </th>
                                <th> Opsi </th>
                             </tr>
                              
                              <?php $sql = $conn -> query("SELECT * FROM penjualan JOIN rincian_jual USING(idp) JOIN buku USING(noisbn) WHERE idpem = '$i' AND status = ''");
                              while($data = $sql -> fetch_array()){ ?>
                              
                             <tr>
                                 <td> <?php echo $data['judul']; ?> </td>
                                 <td>Rp. <?php echo number_format ($data['harga_jual'],0,",","."); ?>,- </td>
                                 <td> <input type="txt" name="jml" size="2" min="1" value="<?php echo $data['jumlah']; ?>" readonly>
                                     <a href="add.php?input=tambah&no=<?php echo $data['noisbn']; ?>"> <span class="glyphicon glyphicon-arrow-up"></span></a>
                                     <a href="add.php?input=kurang&no=<?php echo $data['noisbn']; ?>"><span class="glyphicon glyphicon-arrow-down"></span></a>
                                 </td>  
                                 <td>Rp. <?php echo number_format ($data['subtotal'],0,",","."); ?>,- </td>
                                 <td> <?php echo $data['status']; ?> - </td>
                                 <td align="center"> 
                                    
                                     <a onclick="return confirm('Hapus?')" href="add.php?input=clear&no=<?php echo $data['noisbn']; ?>&jumlah=<?php echo $data['jumlah']; ?>"><span class="glyphicon glyphicon-trash"></span></a>
                                 </td>
                             </tr><?php $total = $data['harga_jual'] * $data['jumlah'];
                                        $i += $total; $no = $data['noisbn']; ?>
                              <?php } ?>
                          </table>
                            <?php $aweu = mysqli_num_rows($sql);     
                                  if ($aweu < 1){ ?>
                             <div><center> Tidak Ada Pesanan Sekarang </center></div><br>
                            <?php } 
                            else{ ?>
                            <b><i>Total Bayar :</i></b>
                                <font size="6" color="steelblue"> Rp.<?php echo number_format($i,0,",","."); ?>,-</font>
                            <div style="float: right;">
                            <a href="struk.php?idp=<?php echo $o; ?>&nama=<?php echo $nama; ?>" target="_blank" class="btn btn-primary btn-lg"><span class="glyphicon glyphicon-print"></span> Cetak Struk</a>
                            <a class="aw btn btn-success btn-lg" data-toggle="modal" data-target="#modalpesan2"><span class="glyphicon glyphicon-shopping-cart"></span> Check Out</a>
                            
                            </div>
                            <?php } ?>
                            </div>
                            <div class="tab-pane fade" id="tab2">
                                <hr>
                                <table class="table table-striped table-bordered">
                             <tr style=" background-color: indianred;">
                                <th> Tgl Beli </th>
                                <th> Total Pembelanjaan </th>
                                <th> Status </th>
                                <th> Ket </th>
                             </tr>             
                              
                             <?php
                                 $sql = $conn -> query("SELECT * FROM penjualan WHERE idpem = '$i' AND status NOT LIKE 'tunggu' AND status NOT LIKE '' GROUP BY idp DESC");
                              while($data = $sql -> fetch_array()){ ?>
                              
                             <tr>
                                 <td> <?php echo $data['tgl']; ?> </td>
                                 <td>Rp. <?php echo number_format ($data['total'],0,",","."); ?>,- </td>
                                 <td> <?php echo $data['status']; ?> </td>
                                 <td> <a href="keranjang.php?pesan=riwayat&pesan=det&idj=<?php echo $data['idp']; ?>">Detail</a> </td>
                              <?php } ?>
                            </tr>
                          </table>
                            
                            <?php if($sql -> num_rows < 1){ ?> 
                                <center><div>Tidak Ada Riwayat Pembelanjaan</div></center>
                            <?php } ?>
                            </div>
                            <div class="tab-pane fade" id="tab3">
                                <hr>
                                <table class="table table-striped table-bordered">
                             <tr style=" background-color: teal;">
                                <th> Nama Buku </th>
                                <th> Harga </th>
                                <th> Jumlah </th>
                                <th> Total </th>
                                <th> Status </th>
                             </tr>
                              
                            <?php  while($dataa = $sqll -> fetch_array()){ ?>                             
                             <tr>
                                 <td> <?php echo $dataa['judul']; ?> </td>
                                 <td>Rp. <?php echo number_format ($dataa['harga_jual'],0,",","."); ?>,- </td>
                                 <td> <input type="txt" name="jml" size="2" min="1" value="<?php echo $dataa['jumlah']; ?>" readonly></td>  
                                 <td>Rp. <?php echo number_format ($dataa['subtotal'],0,",","."); ?>,- </td>
                                 <td> <?php echo $dataa['status'];
   $oo = $conn -> query("SELECT SUM(total) AS totalll FROM penjualan WHERE idpem = '$i' AND status = 'tunggu'");
   $ooo = $oo -> fetch_array(); ?> 
                                 </td>
                             </tr>       
                              <?php } ?>
                          </table>
                            <?php $aweu = mysqli_num_rows($sqll);     
                                  if ($aweu < 1){ ?>
                             <div><center> Tidak Ada Pesanan Yang Sedang Diproses </center></div><br>
                            <?php } 
                            else{ ?>
                            <b><i>Total :</i></b>
                                <font size="6" color="steelblue"> Rp.<?php echo number_format($ooo['totalll'],0,",","."); ?>,-</font>
                            <?php } ?>
                            </div>
                        </div>
                    </div>
                </div><!--/.panel-->
            </div><!--/.col-->
                    
              
                 <center>
                     <a href="keranjang.php"><span class="glyphicon glyphicon-refresh"></span> Refresh</a>
                 </center>
		
         <br><br><br>
            <div id="modalpesan2" class="modal fade">
		<div class="modal-dialog" style="width: 370px;">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title">Check Out</h4>
				</div>
              <form action="buktip.php" method="post" class="form-horizontal" enctype="multipart/form-data">
				<div class="modal-body">
                    <div class="form-group">
                      <label class="control-label col-sm-5" for="nama">Nama Pembeli:</label>
                       <div class="col-sm-7">
                       <input type="text" class="form-control" value="<?php echo $nama; ?>" readonly>
                       <input type="hidden" class="form-control" name="a" value="<?php echo $o; ?>">
                       </div>
                     </div>
    
                    <div class="form-group">
                      <label class="control-label col-sm-5" for="nama">Nomor Rekening:</label>
                      <div class="col-sm-6">
                      <input type="number" min="1" class="form-control" name="e" required>
                      </div>
                     </div>

                     <div class="form-group">
                      <label class="control-label col-sm-5" for="nama">Nama Rekening:</label>
                      <div class="col-sm-7">
                      <input type="txt" maxlength="35" class="form-control" name="f" required>
                      </div>
                     </div>

                     <div class="form-group">
                      <label class="control-label col-sm-5" for="nama">Total Bayar:</label>
                      <div class="col-sm-5">
                      <input type="txt" class="form-control" name="b" value="<?php echo $i; ?>" onKeyup='hitung()' readonly>
                      </div>
                     </div>

                     <div class="form-group">
                      <label class="control-label col-sm-5" for="nama">Jumlah Transfer:</label>
                      <div class="col-sm-5">
                      <input type="number" min="50000" class="form-control" name="g" onKeyup='hitung()' required>
                      </div>
                     </div>

                     <div class="form-group">
                      <label class="control-label col-sm-5" for="nama">Uang Kembali:</label>
                      <div class="col-sm-5">
                      <input type="number" min="50000" class="form-control" name="i" readonly>
                      </div>
                     </div>

                     <div class="form-group">
                      <label class="control-label col-sm-5" for="nama">Bank:</label>
                      <div class="col-sm-5">
                       <select name="h" class="form-control" required>
                           <option>---Pilih---</option>
<?php $kkk = $conn -> query("SELECT * FROM bank");
while($bank = $kkk -> fetch_array()) { ?>
                           <option value="<?php echo $bank[0]; ?>"><?php echo $bank[1]; ?></option>
<?php } ?>
                       </select>
                      </div>
                     </div>
                    
                    <div class="form-group">
                      <label class="control-label col-sm-5" for="nama">Bukti Pembayaran:</label>
                       <div class="col-sm-7">
                       <input type="file" class="form-control" name="d" required>
                       <input type="hidden" name="c" value="<?php echo $now; ?>">
                       </div>
                     </div>
				</div>
				<div class="modal-footer">
                    <input type="submit" name="send" value="Kirim" class="btn btn-info btn-md">
					<button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>						
				</div>
                </form>
			</div>
		</div>
	</div>
    <?php  if(isset($_GET['pesan'])){
                          if($_GET['pesan']=='det') {
                   $oo = $_GET['idj']; ?>
                <div class="thumbnail">
                    <div class="caption-full">
                        <p><ul>
                          <table class="table table-striped table-bordered">
                             <tr style=" background-color: burlywood;">
                                <th> Nama Buku </th>
                                <th> Harga </th>
                                <th> Jumlah </th>
                                <th> Total </th>
                                <th> Status </th>
                             </tr>
                              
                              <?php $sql9 = $conn -> query("SELECT * FROM pembeli JOIN penjualan USING(idpem) JOIN rincian_jual USING(idp) JOIN buku USING(noisbn) WHERE idp ='$oo'");
                              while($data9 = $sql9 -> fetch_array()){ ?>
                             <tr>
                                 <td><?php echo $data9['judul']; ?> </td>
                                 <td>Rp. <?php echo number_format ($data9['harga_jual'],0,",","."); ?>,- </td>
                                 <td> <input type="txt" name="jml" size="2" min="1" value="<?php echo $data9['jumlah']; ?>" readonly></td>  
                                 <td>Rp. <?php echo number_format ($data9['subtotal'],0,",","."); ?>,- </td>
                                 <td> <?php echo $data9['status'];
                                       $tgl = $data9['tgl'];
                                       $tot = $data9['total'];?> </td>
                             </tr>
                              <?php } ?><h4>Pembelanjaan Tanggal : <?php echo $tgl; ?> wib</h4>
                          </table>
                        
                            <b><i>Total Bayar :</i></b> 
                            <font size="6" color="steelblue"> Rp.<?php echo number_format($tot,0,",","."); ?>,-</font>
                        </ul>
                    </div>
                    
                </div>
        <?php               }
                       } ?>
        
            </div>
        <!-- /.row --><br><br><br>
        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12" style="text-align: center;">
                    <p>Copyright &copy; @Real_Good11</p>
                </div>
            </div>
        </footer>
    <!-- /.container -->
            <script>
               function hitung(){
                   var a = document.getElementsByName("b")[0].value;
                   var b = document.getElementsByName("g")[0].value;
                   var c = parseInt(b) - parseInt(a);
                   document.getElementsByName("i")[0].value = c;
               }   
            </script>
    <!-- jQuery -->
<script type="text/javascript" src="../js/jquery-ui.min.js"></script>


    <!-- Bootstrap Core JavaScript -->

</body>

</html>
    
<?php
ob_flush();
?>