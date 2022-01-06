<?php 
require ('koneksi.php');
$id = $_GET['id_booking']; 
$status = 'dikonfirmasi';
mysqli_query($koneksi,"UPDATE booking SET status = '$status' WHERE id_booking='$id'");
header("location:booking.php?pesan=berhasilkonfirmasipaket");

?>

