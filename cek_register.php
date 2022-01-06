<?php 

include 'koneksi.php';

error_reporting(0);

session_start();

if (isset($_SESSION['username'])) {
    header("Location: index.php"); 
} 

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $nama = $_POST['nama']; 
    $no_telp = $_POST['no_telp'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM user WHERE username='$username'";
    $result = mysqli_query($koneksi, $sql);
    if (!$result->num_rows > 0) {
        $sql = "INSERT INTO user(id_user, nama, username, password, level, foto, alamat, no_telp)
        VALUES ('', '$nama', '$username','$password', '2','fotouser.png','', '$no_telp')";
       
        $result = mysqli_query($koneksi, $sql);

        if ($result) {
            header("Location: login.php?pesan=berhasil");
        } else {
            echo "<script>alert('Woops! Terjadi kesalahan.')</script>";
        }
    } else {
        
        header("location:register.php?pesan=usernamesama");
    }

} 


?>