<?php
	// require connection.php
	require('conf.php');

	$q = strtolower($_GET['term']);
	$query = $conn -> query("SELECT * FROM buku WHERE judul LIKE '%$q%' ORDER BY noisbn ASC");
	$num = mysqli_num_rows($query);
   	if($num > 0){
		while ($row = mysqli_fetch_array($query)){
			$row_set[] = htmlentities(stripslashes($row['judul']));
		}
		echo json_encode($row_set);
	}
	else {
		$row_set[] = htmlentities(stripslashes('Tidak Ada Hasil Yang Ditemukan'));
		echo json_encode($row_set);
	}
?>