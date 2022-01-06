<?php

  require '../koneksi.php';

  $id_booking=$_POST['id_booking'];
 

  $checkUser="SELECT * FROM testimoni WHERE id_booking='$id_booking'";

  $result=mysqli_query($koneksi,$checkUser);

  if(mysqli_num_rows($result)>0){ 
      $response['error']="001";
      $response['message']="Terimakasih, Testimoni Untuk Data Ini Sudah Ada";

 
  }
  else{
    $response['error']="002";
    $response['message']="Isi Testi";


  }

  echo json_encode($response);
    
?>