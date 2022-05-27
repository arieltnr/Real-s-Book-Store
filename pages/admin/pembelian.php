<?php
session_start();
if(empty($_SESSION['admin'])){
header("location: ../login.php");
}
$nama = $_SESSION['admin'];
include'../../conf.php';
ob_start();
$sql = $conn -> query("SELECT foto,nama FROM pegawai WHERE idk = '$nama'");
$f = $sql -> fetch_array();
$pe = $conn -> query("SELECT id_penerbit,nm_p FROM penerbit");
$pee = $conn -> query("SELECT id_penerbit,noisbn, judul FROM buku");
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Data Pengiriman</title>

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
            <li class="active"><a href="pembelian.php"><svg class="glyph stroked bag"><use xlink:href="#stroked-bag"></use></svg> Transaksi Pembelian</a></li>
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
				<h1 class="page-header">Data Pengiriman</h1>
			</div>
		</div><!--/.row-->
				
		
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">
                         <a id="pesan_sedia" class="btn btn-success" href="#" data-toggle="modal" data-target="#modalpesan2">Tambah</a>
                         <a class="btn btn-default" href="pembelian.php"><span class="glyphicon glyphicon-refresh"></span> Refresh</a>
                    </div>
                    <div style="margin-left: 20px; margin-bottom: 20px;">
                  <table style="margin-right: 9px;" width="29%" border="0">
                    <tr>
                       <th colspan="6" style="background-color: darkgray;">&nbsp;LIHAT DATA PENGIRIMAN BUKU PER PERIODE</th>
                    </tr>
                <form action="" method="POST" class="form-horizontal" style="margin-top: 5px;">
                    <tr>
                       <th rowspan="">Tgl Awal :</th>
                       <td rowspan=""> 
                           <div class="col-lg-10">
                              <input type="date" name="a" class="form-control">
                           </div>
                      </td>
                    </tr>
                    <tr>
                       <th rowspan="">Tgl Akhir :</th>
                       <td rowspan=""> 
                           <div class="col-lg-10">
                             <input type="date" name="b" class="form-control">
                           </div>
                      </td>
                    </tr>
                    <tr>
                       <th style="margin-left: 6px;"><button type="submit" name="aww" class="btn"> Tampil </button></th>
                    </tr>
                    </form>
                  </table>
                </div>
<?php
 if(isset($_POST['aww'])){
 	       $tgl1 = $_POST['a'];
 	       $tgl2 = $_POST['b'];
           $tg  = "lap_pengiriman.php?id='$tgl1'&id2='$tgl2'"; ?>

  <a style="margin-right: 6%; margin-top: -70px;" href="report/<?php echo $tg ?>" target="_blank" class="btn btn-warning btn-lg pull-right">
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
if(isset($_POST['aww'])){
  echo "<h4 style='margin-left: 450px; margin-top: -65px;'> Data Pengiriman: <u><b><i> <a style='color:teal'> ". $tgl1."</a> Sampai <a style='color:teal'>".$tgl2."</a></i></b></u></h4>";
} ?>
                      <div class="container">
                      
					<div class="panel-body">
                         <table id="lookup" class="table table-striped" data-toggle="table" data-select-item-name="toolbar1">
                            <thead>
                            <tr class="pilih" style=" background-color: cadetblue;">
                                <th>No</th>
						        <th>Penerbit</th>
						        <th>Nama Buku</th>
						        <th>Jumlah</th>
                                <th>Tanggal</th>
                                <th>Opsi</th>
                            </tr>
                             </thead>
                             <tbody>
                             
 <?php
  $no = 1;
  if(isset($_POST['aww'])){
          $sql = $conn -> query("SELECT * FROM pengiriman JOIN penerbit USING(id_penerbit) JOIN buku USING(noisbn) WHERE tgl BETWEEN '$tgl1' AND '$tgl2' ORDER BY tgl DESC");
  }
  else {
          $sql = $conn -> query("SELECT * FROM pengiriman JOIN penerbit USING(id_penerbit) JOIN buku USING(noisbn)");
 }
       $no = 1;
 while($data = $sql -> fetch_array()){ ?>
                                
                            <tr>
                                <td> <?php echo $no++; ?> </td>
                                <td> <?php echo $data['nm_p']; ?> </td>
                                <td> <?php echo $data['judul']; ?> </td>
                                <td> <?php echo $data[3]; ?> </td>
                                <td> <?php echo $data[4]; ?> </td>
                                <td>
                                     <a class="btn btn-warning" href="pembelianed.php?id=<?php echo $data['id_pengiriman']; ?>"><span class="glyphicon glyphicon-edit"></span></a>
                                     <a class="btn btn-danger" href="pembelianha.php?id=<?php echo $data['id_pengiriman']; ?>"><span class="glyphicon glyphicon-remove" onclick="return confirm('Hapus')"></span></a>
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
              <form action="" method="POST" class="form-horizontal">
				<div class="modal-body">

				<div class="form-group">
                      <label class="control-label col-sm-3" for="nama">Nama Buku:</label>
                      <div class="col-sm-4">
                      <select id="tstd_paket" name="b" class="form-control" required="">
                           <option>---Pilih---</option>
                      <?php while($uu = $pee -> fetch_array()){ ?>
                           <option value="<?php echo $uu['noisbn']; ?>" data-harga="<?php echo $uu['id_penerbit'];?>"><?php echo $uu['judul']; ?></option> <?php } ?>
                        </select>
                      </div>
                     </div>

                    <div class="form-group">
                      <label class="control-label col-sm-3" for="nama">Penerbit:</label>
                       <div class="col-sm-3">
                       <input type="text" name="a" id="tstd_total_harga"/ class="form-control" readonly>
                       </div>
                     </div>
                    
                    <div class="form-group">
                      <label class="control-label col-sm-3" for="nama">Jumlah:</label>
                       <div class="col-sm-2">
                           <input type="number" min="1" max="99999" class="form-control" name="c" required="">
                       </div>
                     </div>
                    
                    <div class="form-group">
                      <label class="control-label col-sm-3" for="nama">Tgl:</label>
                       <div class="col-sm-4">
                       <input type="date" class="form-control" name="d" required="">
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
     
<script type="text/javascript">
       $('#tstd_paket').change(function(){
    var
    value = $(this).val(),
    $obj = $('#tstd_paket option[value="'+value+'"]'),
    harga = $obj.attr('data-harga'),
    ket = $obj.attr('data-ket');
    
    $('#tstd_total_harga').val(harga);
    
});
</script>

</body>

</html>

<?php
if(isset($_POST['kirim'])){
    $a = $_POST['a'];
    $b = $_POST['b'];
    $c = $_POST['c'];
    $d = $_POST['d'];
    
$up = $conn -> query("INSERT INTO pengiriman VALUES('' ,'$a', '$b', '$c', '$d')");
    if($up) { ?>
         <script language="JavaScript">
	              alert('Data Berhasil Ditambahkan');
	              document.location='pembelian.php';
	     </script>
<?php }
}
ob_flush();