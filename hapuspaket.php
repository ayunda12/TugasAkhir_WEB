<?php 
require ('koneksi.php');
$id = $_GET['id'];
mysqli_query($koneksi,"DELETE FROM paket WHERE id_paket='$id'")or die(mysql_error());
header("location:paket.php?pesan=berhasilhapus");

?>

