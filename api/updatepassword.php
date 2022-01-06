<?php  

	require '../koneksi.php';
	$username=$_POST['username'];
	$current=$_POST['current'];
	$new=$_POST['new'];
	

	$checkuser="SELECT * FROM user WHERE username='$username' and password='$current'";
	
	$result=mysqli_query($koneksi,$checkuser);


	if(mysqli_num_rows($result)>0){

		$updatePass=mysqli_query($koneksi,"UPDATE user SET password='$new' WHERE username='$username'");

		if(mysqli_num_rows($result)>0){
			if ($current==$new) {
			$response['error']="400";
			$response['message']="Password baru tidak boleh sama dengan password lama";

		}else{

			$response['error']="200";
			$response['message']="Password berhasil di ubah";
		}

		}
		else{

			$response['error']="400";
			$response['message']="Password gagal di ubah";

		}

	}
	else{

		$response['error']="400";
		$response['message']="Password lama salah";

	}

	echo json_encode($response);

?>