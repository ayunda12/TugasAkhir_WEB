  <?php
  require '../koneksi.php';
  $username=$_POST['username'];
  $nama=$_POST['nama'];
  $password=$_POST['password'];
  $notelp=$_POST['no_telp'];
  $checkUser="SELECT * from user WHERE username='$username'";
  $checkQuery=mysqli_query($koneksi,$checkUser);

  if(mysqli_num_rows($checkQuery)>0){

      $response['error']="002";
      $response['message']="Maaf Username Sudah Terdaftar";
  }
  else
  {
     $insertQuery="INSERT INTO user(username,nama,password,no_telp) VALUES('$username','$nama','$password','$notelp')";
  $result=mysqli_query($koneksi,$insertQuery);

  if($result){

    $response['error']="000";
    $response['message']="Registrasi Berhasil, Silahkan Login";
  }
  else
  {
    $response['error']="001";
    $response['message']="Maaf Registrasi Gagal";
  }

  }
 
  echo json_encode($response);

?>