<?php 
include 'koneksi.php';

function rupiah($angka){

  $hasil_rupiah = "Rp. " . number_format($angka,2);
  return $hasil_rupiah;
 
}
session_start();

// $lama = 1; // lama data adalah 3 hari
  
// // proses penghapusan data
 
// $query = mysqli_query($koneksi,"DELETE FROM booking
//           WHERE DATEDIFF(CURDATE(), tgl_booking) > $lama");

// $query = mysqli_query($koneksi,"DELETE FROM booking
//           WHERE bukti_bayar='' AND UNIX_TIMESTAMP(waktu_booking)<(UNIX_TIMESTAMP(now()-3600)");




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

        // variabel pecahkan 0 = tahun
        // variabel pecahkan 1 = bulan
        // variabel pecahkan 2 = tanggal

  return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
}


?>
<!DOCTYPE html>
<html lang="en">
<head>

  <!-- Basic Page Needs
    ================================================== -->
    <meta charset="utf-8">
    <title>Dyah Ayu Salon</title>

  <!-- Mobile Specific Metas
    ================================================== -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Construction Html5 Template">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">

  <!-- Favicon
    ================================================== -->
    <link rel="icon" type="image/png" href="assets/images/favicon.png">

  <!-- CSS
    ================================================== -->
    <!-- Bootstrap -->
    <link rel="stylesheet" href="assets/plugins/bootstrap/bootstrap.min.css">
    <!-- FontAwesome -->
    <link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">
    <!-- Animation -->
    <link rel="stylesheet" href="assets/plugins/animate-css/animate.css">
    <!-- slick Carousel -->
    <link rel="stylesheet" href="assets/plugins/slick/slick.css">
    <link rel="stylesheet" href="assets/plugins/slick/slick-theme.css">
    <!-- Colorbox -->
    <link rel="stylesheet" href="assets/plugins/colorbox/colorbox.css">
    <!-- Template styles-->
    <link rel="stylesheet" href="assets/css/style.css">
    <link href="Admin/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="Admin/vendors/datatables.net/1.10.20/css/jquery.dataTables.min.css">
  </head>