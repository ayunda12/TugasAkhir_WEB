<?php 
require ('koneksi.php');
$id = $_GET['id'];
mysqli_query($koneksi,"DELETE FROM layanan WHERE id='$id'")or die(mysql_error());
header("location:layanan.php?pesan=berhasilhapus");

?>

