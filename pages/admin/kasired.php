<?php
session_start();
ob_start();
if(empty($_SESSION['admin'])){
header("location: ../login.php");
}
$nama = $_SESSION['admin'];
include'../../conf.php';
$id = $_GET['idk'];
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
					<div class="panel-heading">Real's Book</div>
                      <div class="container">
                         <a id="pesan_sedia" href="kasir.php"><span class="glyphicon glyphicon-arrow-left"></span></a>
                      </div>
					<div class="panel-body">
                       <form action="" method="POST" enctype="multipart/form-data">
                         <table class="table table-striped" data-toggle="table" id="table-style" data-url="tables/data2.json" data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc">
                         <?php $sqll = $conn -> query("SELECT * FROM pegawai WHERE idk = '$id'");
                               $data = $sqll -> fetch_array(); ?>
                         <tr>
						        <th> Nama </th>
                                <td> <div class="col-sm-5">
                                       <input type="txt" class="form-control" value="<?php echo $data[1];?>" readonly>
                                    </div>
                                </td>
                            </tr>
                  
                            <tr>
						        <th> Akses </th>
                                <td> <div class="col-sm-3">
                                       <select class="form-control" name="h" required="">
                                            <option>---- Pilih ----</option> 
                                            <option value="admin" <?php if($data[8]=='admin'){ echo 'selected';} ?>>Admin</option> 
                                            <option value="gudang" <?php if($data[8]=='gudang'){ echo 'selected';} ?>>Gudang</option>
                                            <option value="operator" <?php if($data[8]=='operator'){ echo 'selected';} ?>>Operator</option>
                                      </select>
                                    </div>
                                </td>
                            </tr>
                            <tr>
						        <th> Status </th>
                                <td> <div class="col-sm-3">
                                       <select class="form-control" name="i" required="">
                                            <option>---- Pilih ----</option> 
                                            <option value="aktif" <?php if($data[9]=='aktif'){ echo 'selected';} ?>>Aktif</option> 
                                            <option value="nonaktif" <?php if($data[9]=='nonaktif'){ echo 'selected';} ?>>Non Aktif</option>
                                      </select>
                                    </div>
                                </td>
                            </tr>
                        </table>
                        <input type="submit" class="btn btn-primary" name="send" style="margin-left: 50%;">
                        </form>
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
	<script>
		!function ($) {
			$(document).on("click","ul.nav li.parent > a > span.icon", function(){		  
				$(this).find('em:first').toggleClass("glyphicon-minus");	  
			}); 
			$(".sidebar span.icon").find('em:first').addClass("glyphicon-plus");
		}(window.jQuery);

		$(window).on('resize', function () {
		  if ($(window).width() > 768) $('#sidebar-collapse').collapse('show')
		})
		$(window).on('resize', function () {
		  if ($(window).width() <= 767) $('#sidebar-collapse').collapse('hide')
		})
	</script>	
</body>

</html>

<?php
if(isset($_POST['send'])){
    $h = $_POST['h'];
    $i = $_POST['i'];
    
    $conn -> query("UPDATE pegawai SET stat = '$i', akses = '$h' WHERE idk = '$id'");
    
header('location: kasir.php');
}
ob_flush();