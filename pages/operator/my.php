<?php
session_start();
if(empty($_SESSION['operator'])){
header("location: ../login.php");
}
$nama = $_SESSION['operator'];
include'../../conf.php';
$sqll = $conn -> query("SELECT foto,nama FROM pegawai WHERE idk = '$nama'");
$f = $sqll -> fetch_array();
$sql = $conn -> query("SELECT * FROM pegawai WHERE idk = '$nama'");
$data = $sql -> fetch_array();
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Real's Book Store</title>

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
<style type="text/css">
        body {
            background-image: url('../../icon/Download-Desktop-Book-HD-Backgrounds.jpg');
        }
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
				<a class="navbar-brand"><span>Real's Book </span>Store</a>
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
				   <img src="../admin/img/pegawai/<?php echo $f['foto']; ?>" width='198px' height='200px'/>
			</div>
		</form>
		<ul class="nav menu">
			<li><a href="index.php"><svg class="glyph stroked dashboard-dial"><use xlink:href="#stroked-dashboard-dial"></use></svg> Dashboard</a></li>
            
            <li><a href="penjualan.php"><svg class="glyph stroked basket"><use xlink:href="#stroked-basket"/></svg> Transaksi Penjualan</a></li>
           
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
			</div>
		</div><!--/.row-->
				
		
		<div class="row">
			<div class="col-lg-12">
				
                             <div class="modal-dialog" style="margin-left: 130px;">
      <div class="modal-content">
        <div class="modal-header">
        <span style="float: right;" class="glyphicon glyphicon-user"></span>
          <h4 class="modal-title">Profile</h4>
        </div>
              <form action="" method="POST" class="form-horizontal">
      <center>
        <table style="width: 100%;" class="table table-striped" data-toggle="table" id="table-style" data-url="tables/data2.json" data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc">
        <img src="../admin/img/pegawai/<?php echo $data[2]; ?>" width="200" class="img img-circle img-thumbnail" style="margin: 10px;"><br>

                            <tr>
                    <th> Nama </th>
                    <th> : </th>
                                <td> <div class="col-sm-9">
                                        <?php echo $data[1] ?>
                                     </div>
                                </td>
                            </tr>
                            <tr>
                    <th> Alamat </th>
                    <th> : </th>
                                <td> <div class="col-sm-9">
                                         <?php echo $data[3] ?>
                                     </div>
                                </td>
                            </tr>
                            <tr>
                    <th> No Telp </th>
                    <th> : </th>
                                <td> <div class="col-sm-9">
                                         <?php echo $data[4] ?>
                                     </div>
                                </td>
                            </tr>
                            <tr>
                    <th> Jenis Kelamin </th>
                    <th> : </th>
                                <td> <div class="col-sm-9">
                                         <?php echo $data[5] ?>
                                     </div>
                                </td>
                            </tr>
                            <tr>
                    <th> Username </th>
                    <th> : </th>
                                <td> <div class="col-sm-9">
                                         <?php echo $data[6] ?>
                                     </div>
                                </td>
                            </tr>
                            <tr>
                    <th> Password </th>
                    <th> : </th>
                                <td> <div class="col-sm-9">
                                         <?php echo $data[7] ?>
                                     </div>
                                </td>
                            </tr>
                            <tr>
                    <th> Akses </th>
                    <th> : </th>
                                <td> <div class="col-sm-9">
                                         <?php echo $data[8] ?>
                                     </div>
                                </td>
                            </tr>
                        </table>
        </center>
        <div class="modal-footer">
                    <a class="btn btn-primary" href="#" data-toggle="modal" data-target="#modalpesan">Edit Profile</a>           
        </div>
                </form>
      </div>
			</div>
		</div><!--/.row-->

<div id="modalpesan" class="modal fade">
		<div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Edit Profile</h4>
        </div>
              <form id="myForm" action="myed.php" method="POST" class="form-horizontal" enctype="multipart/form-data">
      <center>
        
        <img src="../admin/img/pegawai/<?php echo $data[2]; ?>" width="200" class="img img-circle"><br>
    
                    <div class="form-group">
                      <label class="control-label col-sm-3" for="nama">Nama:</label>
                      <div class="col-sm-7">
                      <input type="txt" class="form-control" name="b" required="" value="<?php echo $data[1] ?>">
                      </div>
                     </div>
                    
                    <div class="form-group">
                      <label class="control-label col-sm-3" for="nama">Foto:</label>
                      <div class="col-sm-7">
                      <input type="file" class="form-control" name="i" accept="image/*" onchange="tampilkanPreview(this,'preview')">
                      <img id="preview" src="" alt="" width="250px" />
                      </div>
                     </div>
                    
                    <div class="form-group">
                      <label class="control-label col-sm-3" for="nama">Alamat:</label>
                       <div class="col-sm-6">
                           <textarea class="form-control" name="c" required=""><?php echo $data[3] ?></textarea>
                       </div>
                     </div>
                    
                    <div class="form-group">
                      <label class="control-label col-sm-3" for="nama">Telp:</label>
                       <div class="col-sm-5">
                       <input type="txt" class="form-control" name="d" required="" value="<?php echo $data[4] ?>">
                       </div>
                     </div>
                    
                    <div class="form-group">
                      <label class="control-label col-sm-3" for="nama">Jenis Kelamin:</label>
                       <div class="col-sm-4">
                         <input type="radio" name="e" value="Laki-laki" required="" <?php if($data[5] == 'Laki-laki'){ echo "checked";} ?>> Laki-laki
                         <input type="radio" name="e" value="Perempuan" required="" <?php if($data[5] == 'Perempuan'){ echo "checked";} ?>> Perempuan
                       </div>
                    </div>
                    
                    <div class="form-group">
                      <label class="control-label col-sm-3" for="nama">Username:</label>
                       <div class="col-sm-6">
                       <input type="text" class="form-control" name="f" required="" value="<?php echo $data[6] ?>">
                       </div>
                    </div>
                    
                    <div class="form-group">
                      <label class="control-label col-sm-3" for="nama">Password:</label>
                       <div class="col-sm-6">
                       <input type="text" class="form-control" name="g" required="" value="<?php echo $data[7] ?>">
                       </div>
                    </div>
        </center>
        <div class="modal-footer">
                    <input type="submit" class="btn btn-primary" value="Edit Profile" name="send">           
        </div>
                </form>
      </div>
    </div>
    </div>
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