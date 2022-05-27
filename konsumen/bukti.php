<?php
session_start();
if(empty($_SESSION['beli'])){
    header('location: ../index.php');
}
$id = $_SESSION['beli'];
include'../conf.php';
$sql = $conn -> query("SELECT * FROM pembeli WHERE idpem = '$id'");
$data = $sql -> fetch_array();
?>

<html>
<head>
<link href="../css/bootstrap.css" rel="stylesheet">
<script type="text/javascript" src="../js/bootstrap.min.js"></script>
    <style type="text/css">
    a {
            text-decoration: none;
            color: aliceblue;
        }
    </style>
</head>
<body>

<fieldset>
    <legend>Edit Profile</legend>
<form id="myForm" action="profile.php" method="post" class="form-horizontal" enctype="multipart/form-data">
<div class="form-group">
    <label class="control-label col-sm-2" for="nama">ID :</label>
    <div class="col-sm-1">
        <input type="txt" class="form-control" name="a" value="<?php echo $data['0']; ?>" readonly>
    </div>
</div>

<div class="form-group">
    <label class="control-label col-sm-2" for="nama">Nama :</label>
    <div class="col-sm-3">
        <input type="txt" class="form-control" name="b" value="<?php echo $data[1]; ?>">
    </div>
</div>

<div class="form-group">
    <label class="control-label col-sm-2" for="nama">Foto:</label>
    <div class="col-sm-2">
        <input type="file" class="form-control" name="c" accept="image/*"  onchange="tampilkanPreview(this,'preview')">
        <img id="preview" src="" alt="" width="320px"/>
    </div>
</div>
    
<div class="form-group">
    <label class="control-label col-sm-2" for="nama">Alamat :</label>
    <div class="col-sm-4">
        <textarea class="form-control" name="d"><?php echo $data[3]; ?> </textarea>
    </div>
</div>
    
<div class="form-group">
    <label class="control-label col-sm-2" for="nama">Telp :</label>
    <div class="col-sm-2">
        <input type="txt" class="form-control" name="e" value="<?php echo $data[4]; ?>">
    </div>
</div>
    
<div class="form-group">
    <label class="control-label col-sm-2" for="nama">Jenis Kelamin :</label>
    <div class="col-sm-2">
        <input type="radio" name="f" value="<?php echo $data[5]; ?>" <?php if($data[5]=='Laki-laki'){ echo'checked';} ?>> Laki-laki
        <input type="radio" name="f" value="<?php echo $data[5]; ?>" <?php if($data[5]=='Perempuan'){ echo'checked';} ?>> Perempuan
    </div>
</div>
    
<div class="form-group">
    <label class="control-label col-sm-2" for="nama">Email :</label>
    <div class="col-sm-2">
        <input type="txt" class="form-control" name="g" value="<?php echo $data[6]; ?>">
</div>
</div>
    
<div class="form-group">
    <label class="control-label col-sm-2" for="nama">Password :</label>
    <div class="col-sm-2">
        <input type="txt" class="form-control" name="h" value="<?php echo $data[7]; ?>">
    </div>
</div>

<div class="modal-footer">
    <center><button type="submit" name="kirim" class="btn btn-info btn-md">Ubah</button></center>
 </div>
</form>
</fieldset>

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

    </body>
</html>