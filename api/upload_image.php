<?php

	require '../koneksi.php';

	$id_user=$_POST['id_user'];
	$foto = $_POST['foto'];
	$ftoTitle = $id_user."fotoku".".jpg";
	$imageTitle = $id_user."fotoku";
	$imageLocation = "../assets/images/$imageTitle.jpg";

	$sqlQuery="UPDATE user SET foto='$ftoTitle' WHERE id_user='$id_user'";

	if(mysqli_query($koneksi, $sqlQuery)>0){

		file_put_contents($imageLocation, base64_decode($foto));
		$fetchuser=mysqli_query($koneksi,"SELECT * FROM user WHERE id_user='$id_user'");

        if(mysqli_num_rows($fetchuser)>0){

         while($row=$fetchuser->fetch_assoc()){

			$response["user"]=$row;
			}
			$response["error"] = "200";
			$response["message"] = "Foto berhasil diubah";

		}else{

			$response["user"]=(object)[];
			$response["error"] = "400";
			$response["message"] = "Foto gagal diubah";

		}
	}else{
			$response["user"]=(object)[];
			$response["error"] = "400";
			$response["message"] = "Foto gagal diubah";

	}


	print(json_encode($response));

?>