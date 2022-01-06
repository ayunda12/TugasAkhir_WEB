<?php

  require '../koneksi.php';

  $id_booking=$_POST['id_booking'];
  $jumlah_bayar = $_POST['jumlah_bayar'];
 
  $sqlQuery="UPDATE booking SET jumlah_bayar='$jumlah_bayar', status='Menunggu Bukti Transfer', keterangan_bayar='DP' WHERE id_booking='$id_booking'";


  if(mysqli_query($koneksi, $sqlQuery)>0){

    $response['error']="400";
    $response['message']="Data Berhasil di Simpan";
}else{
   $response['error']="400";
    $response['message']="Data Gagal di Simpan";
}


  print(json_encode($response));

?>