<?php

  require '../koneksi.php';

  $id_booking=$_POST['id_booking'];
  $harga_paket = $_POST['harga_paket'];
 
  $sqlQuery="UPDATE booking SET jumlah_bayar='$harga_paket', status='Menunggu Bukti Transfer', keterangan_bayar='LUNAS' WHERE id_booking='$id_booking'";

  if(mysqli_query($koneksi, $sqlQuery)>0){

    $response['error']="400";
    $response['message']="Data Berhasil di Simpan";
}else{
   $response['error']="400";
    $response['message']="Data Gagal di Simpan";
}


  print(json_encode($response));

?>