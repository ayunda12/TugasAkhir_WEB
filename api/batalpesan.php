<?php

  
  require '../koneksi.php';

  $id_booking=$_POST['id_booking'];
 
  $sqlQuery="DELETE FROM booking WHERE id_booking='$id_booking'";

  if(mysqli_query($koneksi, $sqlQuery)>0){

    $response['error']="400";
    $response['message']="Pesanan Berhasil di Batalkan";
}else{
   $response['error']="400";
    $response['message']="Pesanan Gagal di Batalkan";
}


  print(json_encode($response));

?>