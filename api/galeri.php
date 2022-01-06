<?php

require_once('../koneksi.php');

if (empty($_GET)) {
  $query = mysqli_query($koneksi, "SELECT * FROM galeri");
  $result = array();
  while ($row = mysqli_fetch_array($query)) {
    array_push($result, array (
      'id' => $row['id'],
      'keterangan' =>  strip_tags($row['keterangan']),
      'foto' => $row['foto']
    ));
  }
  echo json_encode (
    array('result' => $result)
  );
}else{
  $query = mysqli_query($koneksi, "SELECT * FROM galeri WHERE id =". $_GET['id']);

  $result = array();
  while ($row = $query->fetch_assoc()) {
    $result= array (
       'id' => $row['id'],
      'keterangan' => strip_tags($row['keterangan']),
      'foto' => $row['foto']
    );
  }
  echo json_encode (
    $result
  );
}

?>