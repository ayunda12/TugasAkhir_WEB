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

    $response['error']="400";
    $response['message']="Data Berhasil di Simpan";
}else{
   $response['error']="400";
    $response['message']="Data Gagal di Simpan";
}


  print(json_encode($response));

?>