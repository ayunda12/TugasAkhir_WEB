<?php

	
	require '../koneksi.php';

	$id_booking=$_POST['id_booking'];
	$foto = $_POST['foto'];
	$ftoTitle = $id_booking."fotoku".".jpg";
	$imageTitle = $id_booking."fotoku";
	$imageLocation = "../assets/images/$imageTitle.jpg";

	$sqlQuery="UPDATE booking SET bukti_bayar='$ftoTitle', status='diproses' WHERE id_booking='$id_booking'";

	if(mysqli_query($koneksi, $sqlQuery)>0){

		file_put_contents($imageLocation, base64_decode($foto));
		$response['error']="400";
    	$response['message']="Data Berhasil di Simpan";
	}else{
		$response["error"] = "300";
		$response["message"] = "Data Gagal di Simpan";

	}


	print(json_encode($response));

?>