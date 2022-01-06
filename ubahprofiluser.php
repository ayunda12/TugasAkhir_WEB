<?php 
// Menghubungkan file ini dengan file database
include 'koneksi.php';
// Mengecek apakah ID ada datanya atau tidak
if (isset($_POST['id'])) {

        // Mengambil data dari form lalu ditampung didalam variabel
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $username = $_POST['username'];
    $no_telp = $_POST['no_telp'];
    $alamat = $_POST['alamat'];

    
    $sql = "SELECT * FROM user WHERE username='$username'";
  

        $query = mysqli_query($koneksi, "UPDATE user SET nama='$nama', username='$username', alamat='$alamat', no_telp='$no_telp' WHERE id_user='$id'");

                // Mengecek apakah data gagal diinput atau tidak
        if($query){
           header("location:ProfilUser.php?pesan=berhasil");
        } else {
            header("location:ProfilUser.php?pesan=gagal");
        }

   
}else{
    // Apabila ID tidak ditemukan maka akan dikembalikan ke halaman index
    header("location:ProfilUser.php");
}
?>