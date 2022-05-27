<?php
session_start();
if(empty($_SESSION['admin'])){
header("location: ../login.php");
}
$nama = $_SESSION['admin'];
include'../../conf.php';
$p = $conn -> query("SELECT id_penerbit, nm_p FROM penerbit");
$q = $conn -> query("SELECT id_jenis, nama_jenis FROM jenis");
$sql = $conn -> query("SELECT foto,nama FROM pegawai WHERE idk = '$nama'");
$f = $sql -> fetch_array();
$aweu = $conn -> query("SELECT noisbn, id_penerbit FROM pengiriman");
ob_start();
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Data Buku</title>

<link rel="shortcut icon" href="../../icon/Buku.png">
<link href="../../css/bootstrap.min.css" rel="stylesheet">
<link href="../../css/datepicker3.css" rel="stylesheet">
<link href="../../css/bootstrap-table.css" rel="stylesheet">
<link href="../../css/styles.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="../../aset/datatables/dataTables.bootstrap.css">

<!--Icons-->
<script src="../../js/lumino.glyphs.js"></script>

<!--[if lt IE 9]>
<script src="js/html5shiv.js"></script>
<script src="js/respond.min.js"></script>
<![endif]-->

</head>

<body>
	<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#"><span>Real's Book </span>Store</a>
				<ul class="user-menu">
					<li class="dropdown pull-right">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> <?php echo $f[1]; ?> <span class="caret"></span></a>
						<ul class="dropdown-menu" role="menu">
							<li><a href="my.php"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> Profile</a></li>
							<li><a href="logout.php" onclick="return confirm('Yakin Keluar???')"><svg class="glyph stroked cancel"><use xlink:href="#stroked-cancel"></use></svg> Logout</a></li>
						</ul>
					</li>
				</ul>
			</div>
							
		</div><!-- /.container-fluid -->
	</nav>
		
	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<form role="search">
			<div class="form-group">				
                 <?php echo "<img class='img-rounded' src='img/pegawai/".$f['foto']."' width='198px' height='200px'/>"; ?>
			</div>
		</form>
		<ul class="nav menu">
			<li><a href="index.php"><svg class="glyph stroked dashboard-dial"><use xlink:href="#stroked-dashboard-dial"></use></svg> Dashboard</a></li>
            <li><a href="kasir.php"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> Data Pegawai</a></li>
            <li><a href="guest.php"><svg class="glyph stroked female-user"><use xlink:href="#stroked-female-user"></use></svg> Data Pembeli</a></li>
            <li class="parent">
				<a href="" class="active">
					<span data-toggle="collapse" href="#sub-item-1"><svg class="glyph stroked chevron-down"><use xlink:href="#stroked-chevron-down"></use></svg></span> Data Buku 
				</a>
				<ul class="children collapse" id="sub-item-1">
					<li class="active">
						<a href="buku.php">
							<span class="glyphicon glyphicon-book"></span> Buku
						</a>
					</li>
					<li>
						<a class="" href="jenis.php">
							<span class="glyphicon glyphicon-equalizer"></span> Jenis
						</a>
					</li>
				</ul>
			</li>
            <li><a href="penjualan.php"><svg class="glyph stroked basket"><use xlink:href="#stroked-basket"/></svg> Transaksi Penjualan</a></li>
            <li><a href="pembelian.php"><svg class="glyph stroked bag"><use xlink:href="#stroked-bag"></use></svg> Transaksi Pembelian</a></li>
            <li><a href="distributor.php"><svg class="glyph stroked wireless router"><use xlink:href="#stroked-wireless-router"/></svg> Penerbit</a></li>
		</ul>

	</div><!--/.sidebar-->
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">Icons</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Data Buku</h1>
			</div>
		</div><!--/.row-->
				
		
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">
                         <a id="pesan_sedia" class="btn btn-success" href="#" data-toggle="modal" data-target="#modalpesan2">Tambah</a>
                         <a class="btn btn-info" target="_blank" href="report/lap_buku.php">
                            <span class="glyphicon glyphicon-print"></span> Cetak Laporan
                         </a>
                         <a class="btn btn-default" href="buku.php"><span class="glyphicon glyphicon-refresh"></span> Refresh</a>
          </div>
                <div style="margin-left: 20px; margin-bottom: -30px;">
                  <table style="margin-right: 9px;" width="29%" border="0">
                    <tr>
                       <th colspan="6" style="background-color: darkgray;">&nbsp;LIHAT BUKU PER DATA</th>
                    </tr>
                <form action="" method="GET" class="form-horizontal" style="margin-top: 5px;">
                    <tr>
                       <th rowspan="">Penerbit :</th>
                       <td rowspan=""> 
                           <div class="col-lg-8">
                              <select name="penerbit" class="form-control" type="submit" onchange="this.form.submit()">
                                    <option>----Pilih----</option>
<?php $penerbit = $conn -> query("SELECT nm_p FROM penerbit");
while($pbt = $penerbit -> fetch_array()){ ?>
                                    <option><?php echo $pbt[0]; ?></option>
<?php } ?>
                              </select>
                           </div>
                      </td>
                    </tr>
                </form>
                <form action="" method="GET" class="form-horizontal" style="margin-top: 5px;">
                    <tr>
                       <th rowspan="">Kategori :</th>
                       <td rowspan=""> 
                           <div class="col-lg-8">
                              <select name="kategori" class="form-control" type="submit" onchange="this.form.submit()">
                                    <option>----Pilih----</option>
<?php $jenis = $conn -> query("SELECT nama_jenis FROM jenis");
while($jns = $jenis -> fetch_array()){ ?>
                                    <option><?php echo $jns[0]; ?></option>
<?php } ?>
                              </select>
                           </div>
                      </td>
                    </tr>
                </form>
                  </table>
                </div>
 <?php
 if(isset($_GET['penerbit'])){
          $ambil = mysqli_real_escape_string($conn, $_GET['penerbit']);
           $tg ="lap_buku_penerbit.php?id='$ambil'"; ?>

  <a style="margin-right: 6%; margin-top: -40px;" href="report/<?php echo $tg ?>" target="_blank" class="btn btn-warning btn-lg pull-right">
      <span class='glyphicon glyphicon-print'></span>  Cetak
  </a>

 <?php
}
else if(isset($_GET['kategori'])){
          $ambil2 = mysqli_real_escape_string($conn, $_GET['kategori']);
           $tg2 ="lap_buku_kategori.php?id='$ambil2'"; ?>

  <a style="margin-right: 6%; margin-top: -40px;" href="report/<?php echo $tg2 ?>" target="_blank" class="btn btn-warning btn-lg pull-right">
      <span class='glyphicon glyphicon-print'></span>  Cetak
  </a>

 <?php
}
else {
  $tg = "lap_barang_laku.php";
}
?>

<br/>
<?php 
if(isset($_GET['penerbit'])){
  echo "<h2 style='margin-left: 550px; margin-top: -55px;'> Data Buku Dari: <u><b><i> <a style='color:teal'> ". $_GET['penerbit']."</a></i></b></u></h2>";
}
else if(isset($_GET['kategori'])){
  echo "<h2 style='margin-left: 515px; margin-top: -55px;'> Data Buku Kategori: <u><b><i> <a style='color:teal'> ". $_GET['kategori']."</a></i></b></u></h2>";
}
?>                     
					<div class="panel-body">
                        <table id="lookup" class="table table-striped" data-toggle="table" data-select-item-name="toolbar1">
                            <thead>
                            <tr class="pilih" style=" background-color: cadetblue;">
                                <th>No</th>
						        <th>Judul</th>
						        <th>Penulis</th>
						        <th>Penerbit</th>
                                <th>Stok</th>
                                <th>Harga Jual</th>
                                <th>Opsi</th>
                            </tr>
                            </thead>
  
                            <tbody>
                               <?php 
  if(isset($_GET['penerbit'])){
    $pnrbt = mysqli_real_escape_string($conn, $_GET['penerbit']);
    $sql = $conn -> query("SELECT * FROM buku JOIN penerbit USING(id_penerbit) JOIN jenis USING(id_jenis) WHERE nm_p = '$pnrbt'");
  }
  else if(isset($_GET['kategori'])){
    $pnrbt2 = mysqli_real_escape_string($conn, $_GET['kategori']);
    $sql = $conn -> query("SELECT * FROM buku JOIN penerbit USING(id_penerbit) JOIN jenis USING(id_jenis) WHERE nama_jenis = '$pnrbt2'");
  }
  else {
    $sql = $conn -> query("SELECT * FROM buku JOIN penerbit USING(id_penerbit) JOIN jenis USING(id_jenis)");
  }
  $no = 1;
  while($data = $sql -> fetch_array()){ ?>
                                
                            <tr>
                                <td> <?php echo $no++; ?> </td>
                                <td> <?php echo $data['judul']; ?> </td>
                                <td> <?php echo $data['penulis']; ?> </td>
                                <td> <?php echo $data['nm_p']; ?> </td>
                                <td> <?php echo $data['stok']; ?></td>
                                <td> <?php echo $data['harga_jual']; ?> </td>
                                <td>
                                    
                                    <a class="btn btn-info" href="bukude.php?idj=<?php echo $data['id_jenis']; ?>&idp=<?php echo $data['id_penerbit']; ?>&no=<?php echo $data['noisbn']; ?>"><span class="glyphicon glyphicon-list"></span></a>
                                     <a class="btn btn-warning" href="bukued.php?idj=<?php echo $data['id_jenis']; ?>&idp=<?php echo $data['id_penerbit']; ?>&no=<?php echo $data['noisbn']; ?>"><span class="glyphicon glyphicon-edit"></span></a>
                                     <a class="btn btn-danger" href="bukuha.php?idj=<?php echo $data['id_jenis']; ?>&idp=<?php echo $data['id_penerbit']; ?>&no=<?php echo $data['noisbn']; ?>"><span class="glyphicon glyphicon-remove" onclick="return confirm('Hapus')"></span></a>
                                </td>
                            </tr>
                            <?php } ?>
                                </tbody>
                        </table>
						</div>
                    </div>
				</div>
			</div>
		</div><!--/.row-->
        <div id="modalpesan2" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title">Tambah Data</h4>
				</div>
              <form action="" method="POST" class="form-horizontal" enctype="multipart/form-data">
				<div class="modal-body">
                    <div class="form-group">
                      <label class="control-label col-sm-3" for="nama">NO ISBN:</label>
                       <div class="col-sm-4">
                       <input type="number" class="form-control" name="a" maxlength="25" required>
                       </div>
                     </div>
    
                    <div class="form-group">
                      <label class="control-label col-sm-3" for="nama">Judul:</label>
                      <div class="col-sm-7">
                      <input type="txt" class="form-control" name="b" maxlength="35" required>
                      </div>
                     </div>
                    
                    <div class="form-group">
                      <label class="control-label col-sm-3" for="nama">Jenis:</label>
                      <div class="col-sm-3">
                      <select name="c" class="form-control" required><?php while($dat = $q -> fetch_array()){ ?>
                            <option value="<?php echo $dat[0]; ?>"><?php echo $dat[1]; ?></option>
                                         <?php } ?>
                      </select>
                      </div>
                     </div>
                    
                    <div class="form-group">
                      <label class="control-label col-sm-3" for="nama">Sinopsis:</label>
                       <div class="col-sm-6">
                           <textarea class="form-control" name="d" required=""></textarea>
                       </div>
                     </div>
                    
                    <div class="form-group">
                      <label class="control-label col-sm-3" for="nama">Penulis:</label>
                       <div class="col-sm-7">
                       <input type="txt" class="form-control" name="e" maxlength="35" required="">
                       </div>
                     </div>
                    
                    <div class="form-group">
                      <label class="control-label col-sm-3" for="nama">Penerbit:</label>
                       <div class="col-sm-4">
                       <select name="f" class="form-control" required=""><?php while($dt = $p -> fetch_array()){ ?>
                            <option value="<?php echo $dt[0]; ?>"><?php echo $dt[1]; ?></option>
                                         <?php } ?>
                      </select> 
                       </div>
                    </div>
                    
                    <div class="form-group">
                      <label class="control-label col-sm-3" for="nama">Tahun Terbit:</label>
                       <div class="col-sm-3">
                       <input type="number" class="form-control" name="g" min="1" max="9999" required="">
                       </div>
                    </div>
                    
                    <div class="form-group">
                      <label class="control-label col-sm-3" for="nama">Stok:</label>
                       <div class="col-sm-3">
                       <input type="number" min="1" class="form-control" max="99999" name="h">
                       </div>
                    </div>
                    
                    <div class="form-group">
                      <label class="control-label col-sm-3" for="nama">Harga Jual:</label>
                       <div class="col-sm-4">
                       <input type="number" class="form-control" name="i" min="1" max="9999999999" required="">
                       </div>
                    </div>
                    
                    <div class="form-group">
                      <label class="control-label col-sm-3" for="nama">Gambar1:</label>
                       <div class="col-sm-6">
                           <input type="file" class="form-control" name="j" accept="image/*"  onchange="tampilkanPreview(this,'preview')">
                       </div>
                     </div>
                    
                    <div class="form-group">
                      <label class="control-label col-sm-3" for="nama">Gambar2:</label>
                       <div class="col-sm-6">
                           <input type="file" class="form-control" name="k" accept="image/*"  onchange="tampilkanPreview(this,'preview')">
                       </div>
                     </div>
                    
                    <div class="form-group">
                      <label class="control-label col-sm-3" for="nama">Gambar3:</label>
                       <div class="col-sm-6">
                           <input type="file" class="form-control" name="l" accept="image/*"  onchange="tampilkanPreview(this,'preview')">                       </div>
                     </div>
				</div>
				<div class="modal-footer">
                  <img id="preview" src="" alt="" width="235px" />
                  <img id="preview2" src="" alt="" width="235px" />
                  <img id="preview3" src="" alt="" width="235px" />

                    <input type="submit" name="kirim" value="Simpan" class="btn btn-info btn-md">
					<button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>						
				</div>
                </form>
			</div>
		</div>
	</div>
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
<script>
            function tampilkanPreview(gambar,idpreview2){
//                membuat objek gambar
                var gb = gambar.files;
                
//                loop untuk merender gambar
                for (var i = 0; i < gb.length; i++){
//                    bikin variabel
                    var gbPreview = gb[i];
                    var imageType = /image.*/;
                    var preview=document.getElementById(idpreview2);            
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
<script>
            function tampilkanPreview(gambar,idpreview3){
//                membuat objek gambar
                var gb = gambar.files;
                
//                loop untuk merender gambar
                for (var i = 0; i < gb.length; i++){
//                    bikin variabel
                    var gbPreview = gb[i];
                    var imageType = /image.*/;
                    var preview=document.getElementById(idpreview3);            
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
						<script>
						    $(function () {
						        $('#hover, #striped, #condensed').click(function () {
						            var classes = 'table';
						
						            if ($('#hover').prop('checked')) {
						                classes += ' table-hover';
						            }
						            if ($('#condensed').prop('checked')) {
						                classes += ' table-condensed';
						            }
						            $('#table-style').bootstrapTable('destroy')
						                .bootstrapTable({
						                    classes: classes,
						                    striped: $('#striped').prop('checked')
						                });
						        });
						    });
						
						    function rowStyle(row, index) {
						        var classes = ['active', 'success', 'info', 'warning', 'danger'];
						
						        if (index % 2 === 0 && index / 2 < classes.length) {
						            return {
						                classes: classes[index / 2]
						            };
						        }
						        return {};
						    }
						</script>
	</div><!--/.main-->

	<script src="../../js/jquery-1.11.1.min.js"></script>
	<script src="../../js/bootstrap.min.js"></script>
	<script src="../../js/chart.min.js"></script>
	<script src="../../js/chart-data.js"></script>
	<script src="../../js/easypiechart.js"></script>
	<script src="../../js/easypiechart-data.js"></script>
	<script src="../../js/bootstrap-datepicker.js"></script>
	<script src="../../js/bootstrap-table.js"></script>
	<script type="text/javascript" src="../../aset/datatables/jquery.dataTables.js"></script>
    <script type="text/javascript" src="../../aset/datatables/dataTables.bootstrap.js"></script>
   	<script type="text/javascript">

//            jika dipilih, nim akan masuk ke input dan modal di tutup
            $(document).on('click', '.pilih', function (e) {
                document.getElementById("nim").value = $(this).attr('data-nim');
                $('#myModal').modal('hide');
            });
			

//            tabel lookup mahasiswa
            $(function () {
                $("#lookup").dataTable();
            });

            function dummy() {
                var nim = document.getElementById("nim").value;
                alert('Nomor Induk Mahasiswa ' + nim + ' berhasil tersimpan');
				
				var ket = document.getElementById("ket").value;
                alert('Keterangan ' + ket + ' berhasil tersimpan');
            }
        </script>
        </body>
</html>

<?php
if(isset($_POST['kirim'])){
    $a = $_POST['a'];
    $b = $_POST['b'];
    $c = $_POST['c'];
    $d = $_POST['d'];
    $e = $_POST['e'];
    $f = $_POST['f'];
    $g = $_POST['g'];
    $h = $_POST['h'];
    $i = $_POST['i'];
    $gambar = $_FILES['j']['name'];
    $move = move_uploaded_file($_FILES['j']['tmp_name'], 'img/buku/'.$gambar);
    
    $gambar2 = $_FILES['k']['name'];
    $move = move_uploaded_file($_FILES['k']['tmp_name'], 'img/buku/'.$gambar2);
    
    $gambar3 = $_FILES['l']['name'];
    $move = move_uploaded_file($_FILES['l']['tmp_name'], 'img/buku/'.$gambar3);
    
$up = $conn -> query("INSERT INTO buku VALUES('$a', '$f', '$c', '$b', '$d', '$e', '$g', '$h', '$i', '$gambar', '$gambar2', '$gambar3')");
    if($up) { ?>
         <script language="JavaScript">
	              alert('Data Berhasil Ditambahkan');
	              document.location='buku.php';
	     </script>
<?php }
}
ob_flush();