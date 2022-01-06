<?php 
require ('koneksi.php');

if(isset($_POST['submit'])){
    $id_user = $_POST['id_user'];
    $tanggal = date("Y-m-d");
    $keterangan = $_POST['keterangan'];
 
    mysqli_query("INSERT INTO testimoni VALUES('','$id_user','$tanggal','$keterangan')");
     
    header("location:testimoni.php?pesan=berhasil");




}
?>