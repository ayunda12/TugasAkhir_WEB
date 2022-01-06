  <?php

  require '../koneksi.php';

  $id_user=$_POST['id_user'];
  $id_paket=$_POST['id_paket'];
  $tgl_acara = date('Y-m-d', strtotime($_POST['tgl_acara']));
  $harga = $_POST['harga'];
  $tgl= date('Y-m-d');

  $checkUser = mysqli_query($koneksi, "SELECT * FROM booking where tgl_acara='$tgl_acara'");

  if(mysqli_num_rows($checkUser)>0){
  while($rowData=$checkUser->fetch_assoc()){
      if($tgl_acara < date('Y-m-d')){ 
        $response['error']="002";
        $response['message']="Tanggal tidak boleh yang sudah lewat. Mohon pilih tanggal lain!!";
      }else if($tgl_acara == date('Y-m-d')){
        $response['error']="003";
        $response['message']="Tanggal tidak boleh sama dengan tanggal sekarang. Mohon pilih tanggal lain!!";
      }else if($tgl_acara == $rowData['tgl_acara']){
        $response['error']="004";
        $response['message']="Tanggal sudah dipesan orang lain. Mohon pilih tanggal lain!!";
      }else{
         
      }
    }
  }else{

  $insertQuery="INSERT INTO booking(id_booking, id_paket, id_user, harga_paket, tgl_booking,tgl_acara,status) VALUES (NULL, '$id_paket', '$id_user', '$harga','$tgl', '$tgl_acara','Menunggu Pembayaran');";
  $result=mysqli_query($koneksi,$insertQuery);
  if($result){
    $response['error']="000";
    $response['message']="Berhasil Melakukan Pemesanan";
  }
  else
  {
    $response['error']="001";
    $response['message']="Gagal Melakukan Pemesanan";
  }
   

  }

  
  echo json_encode($response);

?>