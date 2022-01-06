<?php

require_once('../koneksi.php');
function tanggal_indonesia($tanggal){
  $bulan = array (
    1 =>   'Januari',
    'Februari',
    'Maret',
    'April',
    'Mei',
    'Juni',
    'Juli',
    'Agustus',
    'September',
    'Oktober',
    'November',
    'Desember'
  );

  $pecahkan = explode('-', $tanggal);


  return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
}
if (empty($_GET)) { 
  $query = mysqli_query($koneksi, "SELECT * FROM testimoni JOIN user ON testimoni.id_user = user.id_user ORDER BY id_testimoni DESC");
  $result = array();
  while ($row = mysqli_fetch_array($query)) {
    array_push($result, array (
      'id_testimoni' => $row['id_testimoni'],
      'keterangan' =>  strip_tags($row['keterangan']),
      'foto' => $row['foto'],
      'tgl_upload' => tanggal_indonesia($row['tgl_upload']),
      'nama' => $row['nama']
    ));
  }
  echo json_encode (
    array('result' => $result)
  ); 
}else{
  $query = mysqli_query($koneksi, "SELECT * FROM testimoni JOIN user ON testimoni.id_user = user.id_user WHERE id_testimoni =". $_GET['id_testimoni']);

  $result = array();
  while ($row = $query->fetch_assoc()) {
    $result= array (
      'id_testimoni' => $row['id_testimoni'],
      'keterangan' => strip_tags($row['keterangan']),
      'foto' => $row['foto'],
      'tgl_upload' => tanggal_indonesia($row['tgl_upload']),
      'nama' => $row['nama']
    );
  }
  echo json_encode (
    $result
  );
}

?>