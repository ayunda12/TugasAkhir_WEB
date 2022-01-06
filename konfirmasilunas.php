<?php 
require ('koneksi.php');
$id = $_GET['id_booking']; 
$bayar = 'lunas';
mysqli_query($koneksi,"UPDATE booking SET keterangan_bayar = '$bayar', jumlah_bayar = harga_paket WHERE id_booking='$id'");
header("location:booking.php?pesan=berhasilkonfirmasibayar");

?>

