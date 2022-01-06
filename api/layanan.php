<?php

require_once('../koneksi.php');

if (empty($_GET)) {
  $query = mysqli_query($koneksi, "SELECT * FROM layanan");
  $result = array();
  while ($row = mysqli_fetch_array($query)) {
    array_push($result, array (
      'id' => $row['id'],
      'nama' => $row['nama_layanan'],
      // 'keterangan' => $row['keterangan'],
      'gambar' => $row['gambar']
    ));
  }
  echo json_encode (
    array('result' => $result)
  );
}else{
  $query = mysqli_query($koneksi, "SELECT * FROM layanan WHERE id =". $_GET['id']);

  $result = array();
  while ($row = $query->fetch_assoc()) {
    $result= array (
      'id' => $row['id'],
      'nama' => $row['nama_layanan'],
      // 'keterangan' => $row['keterangan'],
      'gambar' => $row['gambar']
    );
  }
  echo json_encode (
    $result
  );
}

?>