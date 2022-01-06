<?php 
require ('koneksi.php');
$id = $_GET['id'];
mysqli_query($koneksi,"DELETE FROM galeri WHERE id='$id'")or die(mysql_error());
header("location:galeri.php?pesan=berhasilhapus");

?>

