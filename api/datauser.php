<?php

include "../koneksi.php";

if(function_exists($_POST['fungsi'])){
	$_POST['fungsi']();
}

function get_login(){
	global $koneksi;
	$user = $_POST['username'];
	$pass = $_POST['password'];

	$user = mysqli_query($koneksi, "SELECT * FROM user WHERE username='$user'");
	$rowData = mysqli_fetch_assoc($user);

	if($user || $pass == $rowData['password']){
		$response = [
				'message' => 'Success',
				'id_user' => $rowData['id_user'],
		];
	}else{
		$response = [
				'message' => 'Username atau Password salah!'
		];
	}

	header('Content-Type: application/json');
	echo json_encode($response);

}