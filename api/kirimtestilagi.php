<?php

  require '../koneksi.php';

  $id_booking=$_POST['id_booking'];
  $keterangan=$_POST['keterangan'];
  $id_user = $_POST['id_user'];
  $tgl =date('Y-m-d');
 

  $checkUser="SELECT * FROM testimoni WHERE id_booking='$id_booking'";

  $result=mysqli_query($koneksi,$checkUser);

  if(mysqli_num_rows($result)>0){ 
      $response['error']="001";
      $response['message']="Terimakasih, Testimoni Untuk Data Ini Sudah Ada";
 
  }
  else{

      $checkUserquery="INSERT INTO testimoni(id_testimoni,id_booking,keterangan,id_user,tgl_upload) VALUES(NULL,'$id_booking','$keterangan','$id_user','$tgl')";
      $resultant=mysqli_query($koneksi,$checkUserquery);

      if($result){

        $response['error']="000";
        $response['message']="Pengisian Testimoni Berhasil";
      }
      else
      {
        $response['error']="001";
        $response['message']="Pengisian Testimoni Gagal";
      }

  }

  echo json_encode($response);
    
?>