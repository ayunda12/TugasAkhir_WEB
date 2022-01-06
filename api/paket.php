<?php

require_once('../koneksi.php');
function rupiah($angka){

  $hasil_rupiah = "Rp. " . number_format($angka,2);
  return $hasil_rupiah;

}
if (empty($_GET)) {
  $query = mysqli_query($koneksi, "SELECT * FROM paket");
  $result = array();
  while ($row = mysqli_fetch_array($query)) {
    array_push($result, array (
      'id_paket' => $row['id_paket'],
      'nama_paket' =>  $row['nama_paket'],
      'harga' =>  $row['harga'],
      'detail' =>  strip_tags($row['detail']),
      'gambar' => $row['gambar']
    ));
  }
  echo json_encode (
    array('result' => $result)
  );
}else{
  $query = mysqli_query($koneksi, "SELECT * FROM paket WHERE id_paket =". $_GET['id_paket']);

  $result = array();
  while ($row = $query->fetch_assoc()) {
    $result= array (
     'id_paket' => $row['id_paket'],
     'nama_paket' => $row['nama_paket'],
     'harga' =>  $row['harga'],
     'detail' =>  strip_tags($row['detail']),
     'gambar' => $row['gambar']
   );
  }
  echo json_encode (
    $result
  );
}

?>