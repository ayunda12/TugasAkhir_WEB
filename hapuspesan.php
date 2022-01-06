<?php 
require ('koneksi.php');
$id_booking = $_GET['id_booking'];
mysqli_query($koneksi,"DELETE FROM booking WHERE id_booking='$id_booking'")or die(mysql_error());
header("location:Pesanan.php?pesan=berhasilbatal");

?>

