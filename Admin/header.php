<?php
include("koneksi.php");
session_start();

  // cek apakah yang mengakses halaman ini sudah login
if($_SESSION['level']==""){
  header("location:login.php?pesan=belum_login ");
}

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

function rupiah($angka){

  $hasil_rupiah = "Rp. " . number_format($angka,2);
  return $hasil_rupiah;

}
function getDayIndonesia($date)
    {
        if($date != '0000-00-00'){
            $data = hari(date('D', strtotime($date)));
        }else{
            $data = '-';
        }
  
        return $data;
    }
function hari($day) {
        $hari = $day;
  
        switch ($hari) {
            case "Sun":
                $hari = "Minggu";
                break;
            case "Mon":
                $hari = "Senin";
                break;
            case "Tue":
                $hari = "Selasa";
                break;
            case "Wed":
                $hari = "Rabu";
                break;
            case "Thu":
                $hari = "Kamis";
                break;
            case "Fri":
                $hari = "Jum'at";
                break;
            case "Sat":
                $hari = "Sabtu";
                break;
        }
        return $hari;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="images/favicon.ico" type="image/ico" />
  <title>Dyah Ayu Salon
  </title>
  <!-- Bootstrap -->
  <link href="Admin/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link href="Admin/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <!-- NProgress -->
  <link href="Admin/vendors/nprogress/nprogress.css" rel="stylesheet">
  <!-- iCheck -->
  <link href="Admin/vendors/iCheck/skins/flat/green.css" rel="stylesheet">
  <!-- bootstrap-progressbar -->
  <link href="Admin/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
  <link href="Admin/vendors/google-code-prettify/bin/prettify.min.css" rel="stylesheet">
  <!-- JQVMap -->
  <link href="Admin/vendors/select2/dist/css/select2.min.css" rel="stylesheet">
  <!-- Switchery -->
  <link href="Admin/vendors/switchery/dist/switchery.min.css" rel="stylesheet">
  <!-- starrr -->
  <link href="Admin/vendors/starrr/dist/starrr.css" rel="stylesheet">
  <link href="Admin/vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>
  <!-- bootstrap-daterangepicker -->
  <link href="Admin/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
  <!-- Custom Theme Style -->
  <link href="Admin/build/css/custom.min.css" rel="stylesheet">

  <link href="Admin/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
  <link href="Admin/vendors/datatables.net/1.10.20/css/jquery.dataTables.min.css">

  <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
  <script type="text/javascript" src="source/jquery.fancybox.js?v=2.1.5"></script>
  <script type="text/javascript" src="lib/jquery-1.10.1.min.js"></script>
  <link rel="stylesheet" type="text/css" href="source/jquery.fancybox.js?v=2.1.5" media="screen">
  <!-- <script src='http://h1.ripway.com/acromcakep/magnifier.js' type='text/javascript'/> -->

  <style>
    .alert-pink { 
      color: #E9EDEF;
      background-color: rgb(255, 184,241, 0.88);
      border-color: rgb(255, 184,241, 0.88);
    }
    .bg-pink {
      color: #E9EDEF;
      background-color: rgb(255, 184,241, 0.88);
      border-color: rgb(255, 184,241, 0.88);
    }

    .alert-ungu{
      color: #fff;
      background-color: #5b429e;
    }
    .alert-kuning{
      color: #fff;
      background-color: #cea700;
      
    }
    .alert-hijau{
      color: #fff;
      background-color: #00af0a;
 
    }
    .alert-unguu{
      color: #fff;
      background-color: #ca18a7;
 
    }
    .alert-pinkk{
      color: #fff;
      background-color: #d6cdcd;
 
    }
    .alert-biruu{
      color: #7fd2ff;
      background-color: #7fd2ff;
 
    }

  </style>

</head>