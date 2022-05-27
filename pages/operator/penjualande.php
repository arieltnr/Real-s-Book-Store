<?php
session_start();
if(empty($_SESSION['operator'])){
header("location: ../login.php");
}
ob_start();
$nama = $_SESSION['operator'];
include'../../conf.php';
$id = $_GET['id'];
$nam = $_GET['nam'];
$idp = $_GET['idp'];
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

<!--Icons-->
<script src="../../js/lumino.glyphs.js"></script>

<!--[if lt IE 9]>
<script src="js/html5shiv.js"></script>
<script src="js/respond.min.js"></script>
<![endif]-->
<style type="text/css">
        a {
            text-decoration: none;
            background-color: firebrick;
            color: whitesmoke;
        }
    </style>
</head>

<body>
	<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
		<div class="container-fluid" style="background-color: firebrick;">
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
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> <?php echo $f[1];?> <span class="caret"></span></a>
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
				<img src="../admin/img/pegawai/<?php echo $f['foto']; ?>" width='198px' height='200px'/>
			</div>
		</form>
		<ul class="nav menu">
			<li><a href="index.php"><svg class="glyph stroked dashboard-dial"><use xlink:href="#stroked-dashboard-dial"></use></svg> Dashboard</a></li>
            
            <li class="active"><a href="penjualan.php"><svg class="glyph stroked basket"><use xlink:href="#stroked-basket"/></svg> Transaksi Penjualan</a></li>
            
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
			<div class="col-lg-6">
				<div class="panel panel-default">
                      <div class="container"><a href="penjualan.php"><span class="glyphicon glyphicon-arrow-left"></span></a>
                      </div>
					<div class="panel-body">
<?php 
$no = 1;
$sql = $conn -> query("SELECT * FROM konfirmasi_bayar JOIN bank USING(id_bank) JOIN penjualan USING(idp) WHERE idp = '$idp'");
$sql2 = $conn -> query("SELECT * FROM penjualan JOIN rincian_jual USING(idp) JOIN buku USING(noisbn) JOIN konfirmasi_bayar USING(idp) WHERE idp = '$idp'"); ?>

<table class="table table-hover">
<?php while ($data = $sql -> fetch_array()){  $a = $data['bukti_bayar']; ?>
<tr>
    <td rowspan="7" > 
         <embed src="../admin/img/bukti/<?php echo $data['bukti_bayar']; ?>" width="200">
         <br>
         
             <a style="margin-left: 21%;" class="btn" href="../admin/img/bukti/<?php echo $a; ?>" target="_blank"><span class="glyphicon glyphicon-search"></span> Lihat</a>
         
    </td>
  </tr>
  <tr>
    <th> Nomor Rekening </th>
    <td><?php echo $data['norek']; ?></td>
  </tr>
  <tr>
    <th> Nama Rekening </th>
    <td><?php echo $data['narek']; ?></td>
  </tr>
  <tr>
    <th> Jumlah Transfer </th>
    <td><?php echo $data['nominal']; ?></td>
  </tr>
  <tr>
    <th> Bank </th>
    <td><?php echo $data['nama_bank']; ?></td>
  </tr>
  <tr>
    <th> Tgl Transfer </th>
    <td><?php echo $data['tgl_transfer']; ?></td>
  </tr>
  
    <?php 
        $st = $data['status'];
    } ?>
  <form action="" method="POST">
  <tr>
    <th> Status </th>
    <td>
              <select name="a" class="form-control" <?php if (empty($st =='tunggu')){ echo "disabled"; }?>>
                    <option value="tunggu" <?php if ($st =='tunggu'){ echo'selected';} ?>>Tunggu</option>
                    <option value="berhasil" <?php if ($st =='berhasil'){ echo'selected';} ?>>Berhasil</option>
                    <option value="gagal" <?php if ($st =='gagal'){ echo'selected';} ?>>Gagal</option>
              </select> 
        
    </td>
    <td><button type="submit" name="send" class="btn btn-warning" onclick="return confirm('Yakinn???')" <?php if (empty($st =='tunggu')){ echo "disabled"; }?>>Ganti</button></td>
  </tr> 
</form>
</table>
 


						</div>
				</div>
			</div>
			<div class="col-lg-6">
				<div class="panel panel-default">
                      <div class="container">
                      </div>
					<div class="panel-body">
<table class="table" align="center">
  <tr style="background-color: teal; color: white;">
    <th> No </th>
    <th> Nama Buku </th>
    <th> Harga </th>
    <th> Jumlah </th>
    <th> Total </th>
  </tr>

<?php 
$noo = 1;
while ($dataa = $sql2 -> fetch_array()){
?>
    <tr>
        <td><?php echo $noo++; ?></td>
        <td><?php echo $dataa['judul']; ?></td>
        <td>Rp.<?php echo number_format ($dataa['harga_jual']); ?>,-</td>
        <td align="center"><?php echo $dataa['jumlah'];  ?></td>
        <td>Rp.<?php echo number_format($dataa['subtotal']);?>,-</td> 
               <?php $ttl = $dataa['total']; ?>     
    </tr>
    <?php } ?>
    <tr><td colspan="4" align="center"><h3>Total Bayar : </h3></td><td><h3>Rp.<?php echo number_format($ttl); ?>,-</h3></td></tr>
    <tr><td colspan="5"><?php echo $dataa['tgl']; ?></td></tr>
    </table>	</div>
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
    $a = $_POST['a'];
    
    $ed = $conn -> query("UPDATE penjualan SET status = '$a', idk = '$nama' WHERE idp = '$idp'");
    $mm = $conn -> query("SELECT status FROM penjualan WHERE idp = '$idp'");
    $nn = $mm -> fetch_array();
    if($nn['status']=='gagal'){
        $sql = $conn -> query("SELECT * FROM penjualan WHERE idp = '$idp' AND idpem = '$id'");
$ii = $sql -> fetch_array();

$sql2 = $conn -> query("SELECT * FROM rincian_jual WHERE idp = '$idp'");
    //$aweu2 = mysqli_num_rows($sql2);

        while($ko  = $sql2 -> fetch_array()){
            $ka = $conn -> query("SELECT * FROM buku WHERE noisbn = '$ko[2]'");
            $ki = $ka -> fetch_array();

            $stok = $ki['stok'];
            $k = $stok + $ko['jumlah'];
           
            $ed = $conn -> query("UPDATE buku SET stok = '$k' WHERE noisbn = '$ko[2]'");
        }
    }    

if($ed) { ?>
         <script language="JavaScript">
	              alert('Status Telah Diubah');
	              document.location='penjualan.php';
	     </script>
<?php }

}
ob_flush();