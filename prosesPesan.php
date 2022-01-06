<?php 

include("koneksi.php");
session_start();


if(isset($_POST['submit'])){
	$tgl_acara = date('Y-m-d', strtotime($_POST['tgl_acara']));
	$id_paket = $_POST['id_paket'];
	$id_user = $_POST['id_user'];
	$harga = $_POST['harga'];
	$tgl= date('Y-m-d');
	if($tgl_acara < date('Y-m-d')){  

		echo "<script>alert('Tanggal tidak boleh yang sudah lewat. Mohon pilih tanggal lain!!');window.location='paketUser.php';</script>";

	}else if($tgl_acara == date('Y-m-d')){
		echo "<script>alert('Tanggal tidak boleh sama dengan tanggal sekarang. Mohon pilih tanggal lain!!');window.location='paketUser.php';</script>";

	}else if($tgl_acara != date('Y-m-d')){
		$cekk = mysqli_query($koneksi,"select * from booking where tgl_acara='$tgl_acara'");
	// menghitung jumlah data yang ditemukan
		$cek = mysqli_num_rows($cekk);
		if($cek > 0){
			echo "<script>alert('Maaf, Paket sudah dipesan untuk tanggal ini. Mohon pilih tanggal lain!!');window.location='paketUser.php';</script>";
		}else{
			$query = mysqli_query($koneksi, "INSERT INTO booking VALUES ('','$id_paket','$id_user', 'Menunggu Pembayaran','','','','$tgl','$harga','$tgl_acara',CURRENT_TIMESTAMP())");
			echo "<script>alert('Berhasil Melakukan Pemesanan');window.location='pesanan.php';</script>";
		}	
	}else{

	}
}
 

// if(isset($_POST['batal'])){
// 	$id = $_POST['id'];
// 	mysqli_query($koneksi,"DELETE FROM booking WHERE id_user='$id' and status='keranjang'")or die(mysql_error());
// 	header("location:keranjang.php");
// }

if(isset($_POST['dp'])){
	$jumlah = $_POST['jumlah'];
	$id_booking = $_POST['id_booking'];

	if($jumlah<500000){
		echo "<script>alert('Mohon masukkan minimal pembayaran Rp.500.000');window.location='pesanan.php';</script>";
	}else{
		$query = mysqli_query($koneksi, "UPDATE booking SET status ='Menunggu Bukti Transfer', jumlah_bayar='$jumlah', keterangan_bayar='DP' WHERE id_booking='$id_booking'");
		if($query){
			header("location:pembayaran.php?pesan=berhasiledit");
		} else {
			echo "<script>alert('gagal');window.location='pesanan.php';</script>";
		}

	} 
}

if(isset($_POST['lunas'])){
	$harga = $_POST['harga'];
	$id_booking = $_POST['id_booking'];
	
		$query = mysqli_query($koneksi, "UPDATE booking SET status ='Menunggu Bukti Transfer', jumlah_bayar='$harga', keterangan_bayar='lunas' WHERE id_booking='$id_booking'");
		if($query){
			header("location:pembayaran.php");
		} else {
			header("location:pesanan.php");
		}

	
}

if(isset($_POST['testi'])){
	$keterangan = $_POST['keterangan'];
	$id_user = $_POST['id_user'];
	$id_booking = $_POST['id_booking'];
	$tgl= date('Y-m-d');

	
		$query = mysqli_query($koneksi, "INSERT INTO testimoni VALUES ('','$id_user','$tgl', '$keterangan','$id_booking')");
			
		if($query){
			echo "<script>alert('Terimakasih, testimoni untuk pesanan ini berhasil ditambahkan');window.location='pesanan.php';</script>";
		} else {
			header("location:pesanan.php");
		}

	
}

if(isset($_POST['bayar'])){

	
	$id = $_POST['id'];
	$foto_nama = $_FILES['foto']['name'];
	$foto_size = $_FILES['foto']['size'];
	

	if ($foto_size > 2097152) {
    // Jika File lebih dari 2 MB maka akan gagal mengupload File
		echo "<script>alert('Gambar tidak boleh lebih dari 2 mb');window.location='pesanan.php';</script>";
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
				$query = mysqli_query($koneksi, "UPDATE booking SET status ='diproses', bukti_bayar='$foto_nama_new' WHERE id_user='$id' and status='Menunggu Bukti Transfer'");

            // Mengecek apakah data gagal diinput atau tidak
				if($query){
					echo "<script>alert('Bukti Transfer Berhasil di Simpan');window.location='pesanan.php';</script>";
				} else {
					echo "<script>alert('Bukti Transfer Gagal di Simpan');window.location='pesanan.php';</script>";
				}

			} else { 
            // Jika ekstensinya tidak sesuai dengan apa yg kita tetapkan maka error
				header("location:pesanan.php");        }

			}else{

				header("location:pesanan.php");
			}

		}

	}
	?>




