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
function rupiah($angka){

  $hasil_rupiah = "Rp. " . number_format($angka,2);
  return $hasil_rupiah;

}
if (empty($_GET)) { 
  $query = mysqli_query($koneksi, "SELECT * FROM booking JOIN user ON booking.id_user = user.id_user JOIN paket ON booking.id_paket = paket.id_paket ORDER BY id_booking DESC");
  $result = array();
  while ($row = mysqli_fetch_array($query)) {
    array_push($result, array (
      'id_user'=>$row['id_user'],
      'id_paket'=>$row['id_paket'],
      'nama_paket'=>$row['nama_paket'],
      'id_booking' => $row['id_booking'],
      'tgl_booking' => tanggal_indonesia($row['tgl_booking']),
      'tgl_acara' => tanggal_indonesia($row['tgl_acara']),
      'harga'=>$row['harga'],
      'status'=>$row['status'],
      'keterangan_bayar'=>$row['keterangan_bayar'],
      'bukti_bayar'=>$row['bukti_bayar']
    ));
  }
  echo json_encode ($result);
}else{
  $query = mysqli_query($koneksi, "SELECT * FROM booking JOIN user ON booking.id_user = user.id_user JOIN paket ON booking.id_paket = paket.id_paket WHERE booking.id_user =". $_GET['id_user']. " ORDER BY id_booking DESC" );
  $result = array();
  while ($row = mysqli_fetch_array($query)) {
    array_push($result, array (
      'id_user'=>$row['id_user'],
      'id_paket'=>$row['id_paket'],
      'nama_paket'=>$row['nama_paket'],
      'id_booking' => $row['id_booking'],
      'tgl_booking' => tanggal_indonesia($row['tgl_booking']),

      // 'tgl_acaraa' => tanggal_indonesia($row['tgl_acara']),
      'tgl_acara' => tanggal_indonesia($row['tgl_acara']),
      'harga'=>$row['harga'],
      'status'=>$row['status'],
      'keterangan_bayar'=>$row['keterangan_bayar'],
      'bukti_bayar'=>$row['bukti_bayar']
      
    ));
  }
  echo json_encode (
    $result
  );
}

?>