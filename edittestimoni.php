<?php 
// Menghubungkan file ini dengan file database
include 'koneksi.php';
// Mengecek apakah ID ada datanya atau tidak
if (isset($_POST['id'])) {
    if ($_POST['id'] != "") {
        // Mengambil data dari form lalu ditampung didalam variabel
        $id = $_POST['id'];
        $foto_nama = $_FILES['foto']['name'];
        $foto_size = $_FILES['foto']['size'];

    }else{
        header("location:testimoni.php");
    }

    // Mengecek apakah file lebih besar 2 MB atau tidak
    if ($foto_size > 2097152) {
	   // Jika File lebih dari 2 MB maka akan gagal mengupload File
       header("location:testimoni.php?pesan=size");

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
		 
		  // Menyatukan angka/huruf acak dengan nama file aslinya
          $foto_nama_new = $foto_nama; 

		  // Mengecek apakah Ekstensi file sesuai dengan Ekstensi file yg diuplaod
          if(in_array($ekstensi, $ekstensi_izin) === true)  {

            // Mengambil data siswa_foto didalam table siswa
            $get_foto = "SELECT foto FROM testimoni WHERE id_testimoni='$id'";
            $data_foto = mysqli_query($koneksi, $get_foto); 
            // Mengubah data yang diambil menjadi Array
            $foto_lama = mysqli_fetch_array($data_foto);

            // Menghapus Foto lama didalam folder FOTO
            unlink("assets/images/".$foto_lama['foto']);    

			// Memindahkan File kedalam Folder "FOTO"
            move_uploaded_file($file_tmp, 'assets/images/'.$foto_nama_new);

            // Query untuk memasukan data kedalam table SISWA
            $query = mysqli_query($koneksi, "UPDATE testimoni SET foto ='$foto_nama_new' WHERE id_testimoni='$id'");

            // Mengecek apakah data gagal diinput atau tidak
            if($query){
            	header("location:testimoni.php?pesan=berhasiledit");
            } else {
                header("location:testimoni.php?pesan=gagaledit");
            }

        } else { 
        	// Jika ekstensinya tidak sesuai dengan apa yg kita tetapkan maka error
        	header("location:testimoni.php?pesan=ekstensi");        }

        }else{
            
                header("location:testimoni.php?pesan=kosong");
            }
        }

    
}else{
    // Apabila ID tidak ditemukan maka akan dikembalikan ke halaman index
    header("location:testimoni.php");
}
?>