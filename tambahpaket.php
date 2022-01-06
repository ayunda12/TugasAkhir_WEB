<?php 
require ('koneksi.php');

if(isset($_POST['submit'])){
    $nama = $_POST['nama'];
    $detail = $_POST['detail'];
    $harga = $_POST['harga'];
    $foto_nama = $_FILES['foto']['name'];
    $foto_size = $_FILES['foto']['size'];

// Mengecek apakah file lebih besar 2 MB atau tidak
    if ($foto_size > 5097152) {
    // Jika File lebih dari 2 MB maka akan gagal mengupload File
        header("location:paket.php?pesan=size");
    }else{

    // Mengecek apakah Ada file yang diupload atau tidak
        if ($foto_nama != "") {

        // Ekstensi yang diperbolehkan untuk diupload boleh diubah sesuai keinginan
            $ekstensi_izin = array('png','jpg','jpeg');
        // Memisahkan nama file dengan Ekstensinya
            $pisahkan_ekstensi = explode('.', $foto_nama); 
            $ekstensi = strtolower(end($pisahkan_ekstensi));
        // Nama file yang berada di dalam direktori temporer server
            $file_tmp = $_FILES['foto']['tmp_name']; 
          
            $foto_nama_new = $foto_nama;   
           

        // Mengecek apakah Ekstensi file sesuai dengan Ekstensi file yg diuplaod
            if(in_array($ekstensi, $ekstensi_izin) === true)  {
            // Memindahkan File kedalam Folder "FOTO"
                move_uploaded_file($file_tmp, 'assets/images/'.$foto_nama_new);

            // Query untuk memasukan data kedalam table SISWA
                $query = mysqli_query($koneksi, "INSERT INTO paket VALUES ('','$nama','$detail', '$foto_nama_new', '$harga')");

            // Mengecek apakah data gagal diinput atau tidak
                if($query){
                    header("location:paket.php?pesan=berhasil");
                } else {
                    header("location:paket.php?pesan=gagal");
                }

            } else { 
            // Jika ekstensinya tidak sesuai dengan apa yg kita tetapkan maka error
                header("location:insert.php?pesan=ekstensi");        }

            }else{

                    header("location:paket.php?pesan=kosong");
                }

            }

        }
    ?>