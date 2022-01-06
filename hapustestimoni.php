<?php 
require ('koneksi.php');
$id = $_GET['id'];
mysqli_query($koneksi,"DELETE FROM testimoni WHERE id_testimoni='$id'")or die(mysql_error());
header("location:testimoni.php?pesan=berhasilhapus");

?>

