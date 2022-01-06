<?php
// memanggil library FPDF
include '../koneksi.php';
require('../fpdf.php');

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
$id_booking = $_GET['id_booking'];

// $mahasiswa = mysqli_query($koneksi, "SELECT * FROM booking JOIN user ON booking.id_user = user.id_user JOIN paket ON booking.id_paket = paket.id_paket WHERE id_booking = '$id_booking' ORDER BY id_booking DESC");
// foreach($query as $row ) {}

  $sql = $koneksi->query("SELECT * FROM booking JOIN user ON booking.id_user = user.id_user JOIN paket ON booking.id_paket = paket.id_paket WHERE id_booking = '$id_booking' ORDER BY id_booking DESC"); // query memilih entri username pada database
  if(mysqli_num_rows($sql) == 0){
  }else{
    $row = mysqli_fetch_assoc($sql);
  }

  ?>

  <!DOCTYPE html>
  <html>
  <head>
    <title>Bukti Pembayaran </title>
  </head>
  <body>

    <center>
      <h2>Bukti Pembayaran</h2>
      <h4 style="margin-top:-20px">Pemesanan Paket Dyah Ayu Salon</h4>
    </center>
     <li> Nama Pelanggan : <?= $row['nama']?></li>
       <li>Paket : <?= $row['nama_paket']?></li>
       <li>Harga : <?= rupiah($row['harga_paket'])?></li>
       <li>Tanggal Pesan : <?= tanggal_indonesia($row['tgl_booking'])?></li>
       <li>Keterangan Bayar : <?= $row['keterangan_bayar']?></li><br>
      <img src="../assets/images/<?= $row['bukti_bayar']?>" style="width: 200px; margin-left: 20px;">

    <script>
      window.print();
    </script>
  </body>
  </html>