<?php
session_start();
if(empty($_SESSION['admin'])){
header("location: ../login.php");
}
$nama = $_SESSION['admin'];
include'../../conf.php';
$sql = $conn -> query("SELECT foto,nama FROM pegawai WHERE idk = '$nama'");
$f = $sql -> fetch_array();
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Data Penjualan</title>

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
            <li class="active"><a href="penjualan.php"><svg class="glyph stroked basket"><use xlink:href="#stroked-basket"/></svg> Transaksi Penjualan</a></li>
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
				<h1 class="page-header">Data Penjualan</h1>
			</div>
		</div><!--/.row-->
				
		
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">
					     <a class="btn btn-default" href="Penjualan.php"><span class="glyphicon glyphicon-refresh"></span> Refresh</a>
					</div>
					<div style="margin-left: 20px; margin-bottom: 20px;">
                  <table style="margin-right: 9px;" width="29%" border="0">
                    <tr>
                       <th colspan="6" style="background-color: darkgray;">&nbsp;LIHAT DATA PENJUALAN PER PERIODE</th>
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
           $tg  = "lap_penjualan.php?id='$tgl1'&id2='$tgl2'"; ?>

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
  echo "<h4 style='margin-left: 450px; margin-top: -65px;'> Data Penjualan: <u><b><i> <a style='color:teal'> ". $tgl1."</a> Sampai <a style='color:teal'>".$tgl2."</a></i></b></u></h4>";
} ?>
                      <div class="container">
					<div class="panel-body">
                        
                        <table id="lookup" class="table table-striped" data-toggle="table" data-select-item-name="toolbar1">
                            <thead>
                            <tr class="pilih" style=" background-color: cadetblue;">
                                <th> No </th>
                                <th> Nama Pembeli </th>
                                <th> Tgl Pesan </th>
                                <th> Status </th>
                                <th> Opsi </th>
                            </tr>
                            </thead>
                            <tbody>
                            
<?php
     if(isset($_POST['aww'])){
          $sql2 = $conn -> query("SELECT * FROM Penjualan JOIN pembeli USING(idpem) WHERE tgl BETWEEN '$tgl1' AND '$tgl2' AND status NOT LIKE '' ORDER BY tgl DESC");
        }
     else {
          $sql2 = $conn -> query("SELECT * FROM penjualan JOIN pembeli USING(idpem) WHERE status NOT LIKE '' ORDER BY tgl DESC");
      }
       $no = 1;
       while($data = $sql2 -> fetch_array()){ ?>                              
                            <tr>
                                <td> <?php echo $no++; ?> </td>
                                <td> <?php echo $data['nama']; ?> </td>
                                <td> <?php echo $data['tgl']; ?> </td>
                                <td> <?php echo $data['status']; ?> </td>
                                <td> <a class="btn btn-info" href="penjualande.php?id=<?php echo $data['idpem']; ?>&nam=<?php echo $data['nama']; ?>&idp=<?php echo $data['idp']; ?>"><span class="glyphicon glyphicon-list"></span></a>
                                     <a onclick="return confirm('Hapus????')" class="btn btn-danger" href="penjualanha.php?idp=<?php echo $data['idp']; ?>"><span class="glyphicon glyphicon-remove"></span></a>
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