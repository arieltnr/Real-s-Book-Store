<?php
session_start();
if(empty($_SESSION['admin'])){
header("location: ../login.php");
}
$nama = $_SESSION['admin'];
include'../../conf.php';
ob_start();
$carikode = $conn -> query("SELECT max(idk) from pegawai");
  $datakode = mysqli_fetch_array($carikode);
  if ($datakode) {
   $nilaikode = substr($datakode[0], 1);

   $kode = (int) $nilaikode;

   $kode = $kode + 1;
   $kode_otomatis = "K".str_pad($kode, 2, "0", STR_PAD_LEFT);
  } else {
   $kode_otomatis = "K01";
  }
$sql = $conn -> query("SELECT foto, nama FROM pegawai WHERE idk = '$nama'");
$f = $sql -> fetch_array();
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Data Pegawai</title>

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
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> <?php echo $f['nama']; ?> <span class="caret"></span></a>
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
            <li class="active"><a href="kasir.php"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> Data Pegawai</a></li>
            <li><a href="guest.php"><svg class="glyph stroked female-user"><use xlink:href="#stroked-female-user"></use></svg> Data Pembeli</a></li>
            <li class="parent ">
				<a href="#">
					<span data-toggle="collapse" href="#sub-item-1"><svg class="glyph stroked chevron-down"><use xlink:href="#stroked-chevron-down"></use></svg></span> Data Buku 
				</a>
				<ul class="children collapse" id="sub-item-1">
					<li>
						<a class="" href="buku.php">
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
				<h1 class="page-header">Data Pegawai</h1>
			</div>
		</div><!--/.row-->
				
		
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">
                         <a class="btn btn-success" href="#" data-toggle="modal" data-target="#modalpesan2">Tambah</a>
                         <a class="btn btn-primary" target="_blank" href="report/lap_pegawai.php">
                               <span class="glyphicon glyphicon-print"></span> Cetak Laporan
                         </a>
                         <a class="btn btn-default" href="kasir.php"><span class="glyphicon glyphicon-refresh"></span> Refresh</a>
          </div>
                      <div class="container">
					<div class="panel-body">
                        <table id="lookup" class="table table-striped" data-toggle="table" data-select-item-name="toolbar1">
                            <thead>
                            <tr class="pilih" style=" background-color: cadetblue;">
                                <th>No</th>
						                    <th>Nama</th>
						                    <th>Alamat</th>
						                    <th>Telp</th>
                                <th>Status</th>
                                <th>Opsi</th>
                            </tr>
                            </thead>
                            <tbody>
                            
                               <?php
                                $no = 1;
                                $sql = $conn -> query("SELECT * FROM pegawai ORDER BY nama ASC");
                                while($data = $sql -> fetch_object()){ ?>
                                
                            <tr>
                                <td> <?php echo $no++; ?> </td>
                                <td> <?php echo $data -> nama ?> </td>
                                <td> <?php echo $data -> alamat ?> </td>
                                <td> <?php echo $data -> telp ?> </td>
                                <td> <?php echo $data -> stat; ?> </td>
                                <td> <a class="btn btn-info" href="kasirde.php?idk=<?php echo $data -> idk ?>"><span class="glyphicon glyphicon-list"></span></a>
                                     <a class="btn btn-warning" href="kasired.php?idk=<?php echo $data -> idk ?>"><span class="glyphicon glyphicon-edit"></span></a>
                                     <a class="btn btn-danger" href="kasirha.php?idk=<?php echo $data -> idk ?>"<?php if($data -> idk==$nama) { echo "disabled";} ?>><span class="glyphicon glyphicon-remove" onclick="return confirm('Hapus????')"></span></a>
                                </td>
                            </tr>
                            <?php } ?>
                            </tbody>
                        </table>
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
              <form id="myForm" action="" method="POST" class="form-horizontal" enctype="multipart/form-data">
				<div class="modal-body">
                    <div class="form-group">
                      <label class="control-label col-sm-3" for="nama">ID Pegawai:</label>
                       <div class="col-sm-2">
                       <input type="text" class="form-control" name="a" value="<?php echo $kode_otomatis; ?>" readonly>
                       </div>
                     </div>
    
                    <div class="form-group">
                      <label class="control-label col-sm-3" for="nama">Nama:</label>
                      <div class="col-sm-7">
                      <input type="txt" class="form-control" name="b" maxlength="35" required="">
                      </div>
                     </div>
                    
                    <div class="form-group">
                      <label class="control-label col-sm-3" for="nama">Foto:</label>
                      <div class="col-sm-7">
                      <input type="file" class="form-control" name="i" required="" accept="image/*" onchange="tampilkanPreview(this,'preview')">
                      <img id="preview" src="" alt="" width="250px" />
                     </div>
                    
                    <div class="form-group">
                      <label class="control-label col-sm-3" for="nama">Alamat:</label>
                       <div class="col-sm-6">
                           <textarea class="form-control" name="c" required=""></textarea>
                       </div>
                     </div>
                    
                    <div class="form-group">
                      <label class="control-label col-sm-3" for="nama">Telp:</label>
                       <div class="col-sm-5">
                       <input type="number" min="1" maxlength="15" class="form-control" name="d" required="" accept="image/*" onchange="tampilkanPreview(this,'preview')">
                      <img id="preview" src="" alt="" width="250px" />
                       </div>
                     </div>
                    
                    <div class="form-group">
                      <label class="control-label col-sm-3" for="nama">Jenis Kelamin:</label>
                       <div class="col-sm-4">
                         <input type="radio" name="e" value="Laki-laki" required=""> Laki-laki
                         <input type="radio" name="e" value="Perempuan" required=""> Perempuan
                       </div>
                    </div>
                    
                    <div class="form-group">
                      <label class="control-label col-sm-3" for="nama">Username:</label>
                       <div class="col-sm-6">
                       <input type="text" class="form-control" name="f" maxlength="35" required="">
                       </div>
                    </div>
                    
                    <div class="form-group">
                      <label class="control-label col-sm-3" for="nama">Password:</label>
                       <div class="col-sm-6">
                       <input type="text" class="form-control" name="g" maxlength="35" required="">
                       </div>
                    </div>
                    
                    <div class="form-group">
                      <label class="control-label col-sm-3" for="nama">Akses:</label>
                       <div class="col-sm-3">
                           <select class="form-control" name="h" required="">
                              <option>---- Pilih ----</option> 
                              <option value="admin">Admin</option> 
                              <option value="gudang">Gudang</option>
                              <option value="operator">Operator</option>
                           </select>
                       </div>
                    </div>

                    <div class="form-group">
                      <label class="control-label col-sm-3" for="nama">Status:</label>
                       <div class="col-sm-2">
                           <select class="form-control" name="j" required="">
                              <option>---- Pilih ----</option> 
                              <option value="aktif">Aktif</option> 
                              <option value="nonaktif">Non Aktif</option>
                           </select>
                       </div>
                    </div>
                    
				</div>
				<div class="modal-footer">
                    <input type="submit" name="kirim" value="Simpan" class="btn btn-info btn-md">
					<button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>						
				</div>
                </form>
			</div>
		</div>
	</div>
        </div>			
	</div><!--/.main-->
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
    $j = $_POST['j'];
    
    $gambar = $_FILES['i']['name'];
    $move = move_uploaded_file($_FILES['i']['tmp_name'], 'img/pegawai/'.$gambar);
    
$conn -> query("INSERT INTO pegawai VALUES('$a', '$b', '$gambar', '$c', '$d', '$e', '$f', '$g', '$h', '$j')");
header('location: kasir.php');
}
ob_flush();