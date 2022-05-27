<?php
session_start();
if(empty($_SESSION['admin'])){
header("location: ../login.php");
}
$nama = $_SESSION['admin'];
ob_start();
include'../../conf.php';
$no = $_GET['no'];
$idj = $_GET['idj'];
$idp = $_GET['idp'];
$sql = $conn -> query("SELECT * FROM buku WHERE id_jenis = '$idj' AND noisbn = '$no'");
$sql2 = $conn -> query("SELECT id_penerbit, nm_p FROM penerbit");
$sql3 = $conn -> query("SELECT id_jenis, nama_jenis FROM jenis");
$data = $sql -> fetch_array();
$sql = $conn -> query("SELECT foto,nama FROM pegawai WHERE idk = '$nama'");
$f = $sql -> fetch_array();
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
					<div class="panel-heading">Real's Book</div>
                      <div class="container">
                         <a href="buku.php"><span class="glyphicon glyphicon-arrow-left"></span></a>
                      </div>
					<div class="panel-body">
                       <form action="" method="POST" enctype="multipart/form-data">
                         <table class="table table-striped" data-toggle="table" id="table-style" data-url="tables/data2.json" data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc">
                            <tr>
                                <th> NO ISBN </th>
                                <td> <div class="col-sm-4">
                                         <input type="txt" name="a" class="form-control" value="<?php echo $data['noisbn']; ?>" readonly>
                                     </div>
                                </td>
                            </tr>
                            <tr>
						        <th> Judul </th>
                                <td> <div class="col-sm-5">
                                          <input type="txt" name="b" class="form-control" value="<?php echo $data['judul']; ?>" maxlength="35" required="">
                                     </div>
                                </td>
                            </tr>
                            <tr>
						        <th> Sinopsis </th>
                                <td> <div class="col-sm-6">
                                          <textarea name="c" class="form-control" required=""><?php echo $data['sinopsis']; ?></textarea>
                                     </div>
                                </td>
                            </tr>
                            <tr>
						        <th> Jenis </th>
                                <td> <div class="col-sm-2">
                                         <select name="d" class="form-control" required=""><?php while($data2 = $sql3 -> fetch_array()){ ?>
                                            <option value="<?php echo $data2['id_jenis']; ?>"><?php echo $data2['nama_jenis']; ?></option>
                                         <?php } ?>
                                         </select> 
                                     </div>
                                </td>
                            </tr>
                            <tr>
						        <th> Penulis </th>
                                <td> <div class="col-sm-5">
                                         <input type="txt" name="e" class="form-control" value="<?php echo $data['penulis']; ?>" maxlength="35" required="">
                                     </div>
                                </td>
                            </tr>
                            <tr>
                                <th> Penerbit </th>
                                <td> <div class="col-sm-3">
                                         <select name="f" class="form-control" required=""><?php while($data3 = $sql2 -> fetch_array()){ ?>
                                             <option value="<?php echo $data3['id_penerbit']; ?>"><?php echo $data3['nm_p']; ?></option>
                                              <?php } ?>
                                         </select>
                                     </div>
                                </td>
                            </tr>
                            <tr>
						        <th> Tahun Terbit</th>
                                <td> <div class="col-sm-2">
                                         <input type="number" name="g" min="1" max="9999" class="form-control" value="<?php echo $data['tahun_terbit']; ?>" required=""> 
                                     </div>
                                </td>
                            </tr>
                            <tr>
						        <th> Stok </th>
                                <td> <div class="col-sm-2">
                                         <input type="number" min="0" max="99999" name="h" class="form-control" value="<?php echo $data['stok']; ?>">
                                     </div>
                                </td>
                            </tr>
                            <tr>
						        <th> Harga Jual </th>
                                <td> <div class="col-sm-3">
                                         <input type="txt" name="i" max="9999999999" class="form-control" value="<?php echo $data['harga_jual']; ?>" required="">
                                     </div>
                                </td>
                            </tr>
                            <tr>
						        <th> Gambar1 </th>
                                <?php echo "<img src='img/buku/".$data['gambar']."' width='198px' height='300px'/>"; ?>
                                <td> <div class="col-sm-6">
                                        <input type="file" name="j" class="form-control">
                                     </div>
                                </td>
                            </tr>
                            <tr>
						        <th> Gambar2 </th>
                                <?php echo "<img src='img/buku/".$data['gambar2']."' width='198px' height='300px'/>"; ?>
                                <td><div class="col-sm-6">
                                        <input type="file" name="k" class="form-control"> 
                                     </div>
                                </td>
                            </tr>
                            <tr>
						        <th> Gambar3 </th>
                                <?php echo "<img src='img/buku/".$data['gambar3']."' width='198px' height='300px'/>"; ?>
                                <td><div class="col-sm-6">
                                         <input type="file" name="l" class="form-control">
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

if(empty($gambar && $gambar2 && $gambar3)){
    $ed = $conn -> query("UPDATE buku SET judul = '$b',
                                noisbn = '$a',
                                penulis = '$e',
                                sinopsis = '$c',
                                id_jenis = '$d',
                                id_penerbit = '$f',
                                tahun_terbit = '$g',
                                stok = '$h',
                                harga_jual = '$i'
                                WHERE noisbn = '$a'");
}
else if(empty($gambar && $gambar2)){
    $ed = $conn -> query("UPDATE buku SET judul = '$b',
                                noisbn = '$a',
                                penulis = '$e',
                                sinopsis = '$c',
                                id_jenis = '$d',
                                id_penerbit = '$f',
                                tahun_terbit = '$g',
                                stok = '$h',
                                harga_jual = '$i',
                                gambar3 = '$gambar3'
                                WHERE noisbn = '$a'");
}
else if(empty($gambar && $gambar3)){
    $ed = $conn -> query("UPDATE buku SET judul = '$b',
                                noisbn = '$a',
                                penulis = '$e',
                                sinopsis = '$c',
                                id_jenis = '$d',
                                id_penerbit = '$f',
                                tahun_terbit = '$g',
                                stok = '$h',
                                harga_jual = '$i',
                                gambar2 = '$gambar2'
                                WHERE noisbn = '$a'");
}
else if(empty($gambar2 && $gambar3)){
    $ed = $conn -> query("UPDATE buku SET judul = '$b',
                                noisbn = '$a',
                                penulis = '$e',
                                sinopsis = '$c',
                                id_jenis = '$d',
                                id_penerbit = '$f',
                                tahun_terbit = '$g',
                                stok = '$h',
                                harga_jual = '$i',
                                gambar = '$gambar'
                                WHERE noisbn = '$a'");
}
else if(empty($gambar)){
    $ed = $conn -> query("UPDATE buku SET judul = '$b',
                                noisbn = '$a',
                                penulis = '$e',
                                sinopsis = '$c',
                                id_jenis = '$d',
                                id_penerbit = '$f',
                                tahun_terbit = '$g',
                                stok = '$h',
                                harga_jual = '$i',
                                gambar3 = '$gambar3',
                                gambar2 = '$gambar2'
                                WHERE noisbn = '$a'");
}
else if(empty($gambar2)){
    $ed = $conn -> query("UPDATE buku SET judul = '$b',
                                noisbn = '$a',
                                penulis = '$e',
                                sinopsis = '$c',
                                id_jenis = '$d',
                                id_penerbit = '$f',
                                tahun_terbit = '$g',
                                stok = '$h',
                                harga_jual = '$i',
                                gambar3 = '$gambar3',
                                gambar = '$gambar'
                                WHERE noisbn = '$a'");
}
else if(empty($gambar3)){
    $ed = $conn -> query("UPDATE buku SET judul = '$b',
                                noisbn = '$a',
                                penulis = '$e',
                                sinopsis = '$c',
                                id_jenis = '$d',
                                id_penerbit = '$f',
                                tahun_terbit = '$g',
                                harga_jual = '$i',
                                gambar = '$gambar',
                                gambar2 = '$gambar2'
                                WHERE noisbn = '$a'");
}
if(!empty($gambar && $gambar2 && $gambar3)){
    $ed = $conn -> query("UPDATE buku SET judul = '$b',
                                noisbn = '$a',
                                penulis = '$e',
                                sinopsis = '$c',
                                id_jenis = '$d',
                                id_penerbit = '$f',
                                tahun_terbit = '$g',
                                stok = '$h',
                                harga_jual = '$i',
                                gambar = '$gambar',
                                gambar2 = '$gambar2',
                                gambar3 = '$gambar3'
                                WHERE noisbn = '$a'");
}
else if(!empty($gambar && $gambar2)){
    $ed = $conn -> query("UPDATE buku SET judul = '$b',
                                noisbn = '$a',
                                penulis = '$e',
                                sinopsis = '$c',
                                id_jenis = '$d',
                                id_penerbit = '$f',
                                tahun_terbit = '$g',
                                harga_jual = '$i',
                                gambar = '$gambar',
                                gambar2 = '$gambar2'
                                WHERE noisbn = '$a'");
}
else if(!empty($gambar && $gambar3)){
    $ed = $conn -> query("UPDATE buku SET judul = '$b',
                                noisbn = '$a',
                                penulis = '$e',
                                sinopsis = '$c',
                                id_jenis = '$d',
                                id_penerbit = '$f',
                                tahun_terbit = '$g',
                                stok = '$h',
                                harga_jual = '$i',
                                gambar = '$gambar',
                                gambar3 = '$gambar3'
                                WHERE noisbn = '$a'");
}
else if(!empty($gambar2 && $gambar3)){
    $ed = $conn -> query("UPDATE buku SET judul = '$b',
                                noisbn = '$a',
                                penulis = '$e',
                                sinopsis = '$c',
                                id_jenis = '$d',
                                id_penerbit = '$f',
                                tahun_terbit = '$g',
                                stok = '$h',
                                harga_jual = '$i',
                                gambar2 = '$gambar2',
                                gambar3 = '$gambar3'
                                WHERE noisbn = '$a'");
}
else if(!empty($gambar)){
    $ed = $conn -> query("UPDATE buku SET judul = '$b',
                                noisbn = '$a',
                                penulis = '$e',
                                sinopsis = '$c',
                                id_jenis = '$d',
                                id_penerbit = '$f',
                                tahun_terbit = '$g',
                                stok = '$h',
                                harga_jual = '$i',
                                gambar = '$gambar'
                                WHERE noisbn = '$a'");
}
else if(!empty($gambar2)){
    $ed = $conn -> query("UPDATE buku SET judul = '$b',
                                noisbn = '$a',
                                penulis = '$e',
                                sinopsis = '$c',
                                id_jenis = '$d',
                                id_penerbit = '$f',
                                tahun_terbit = '$g',
                                stok = '$h',
                                harga_jual = '$i',
                                gambar2 = '$gambar2'
                                WHERE noisbn = '$a'");
}
else if(!empty($gambar3)){
    $ed = $conn -> query("UPDATE buku SET judul = '$b',
                                noisbn = '$a',
                                penulis = '$e',
                                sinopsis = '$c',
                                id_jenis = '$d',
                                id_penerbit = '$f',
                                tahun_terbit = '$g',
                                stok = '$h',
                                harga_jual = '$i',
                                gambar3 = '$gambar3'
                                WHERE noisbn = '$a'");
}
     if($ed) { ?>
         <script language="JavaScript">
	              alert('Data Berhasil Diubah');
	              document.location='buku.php';
	     </script>
<?php }
}
ob_flush();