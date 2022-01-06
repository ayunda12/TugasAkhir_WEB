<?php 

  	require '../koneksi.php';

    $id_user=$_POST['id_user'];
    $username=$_POST['username'];
    $nama=$_POST['nama'];
    $no_telp=$_POST['no_telp'];
    $alamat=$_POST['alamat'];

    $update_query="UPDATE user SET username='$username', nama='$nama', no_telp='$no_telp', alamat='$alamat' WHERE id_user='$id_user'";
    $result=mysqli_query($koneksi,$update_query);
    

    if($result>0){

      $fetchuser=mysqli_query($koneksi,"SELECT * FROM user WHERE username='$username'");

        if(mysqli_num_rows($fetchuser)>0){

          while($row=$fetchuser->fetch_assoc()){
            $response["user"]=$row;
            }
            $response['error']="200";
            $response['message']="Data Berhasil di Ubah";
          }
        else{
          $response["user"]=(object)[];
          $response['error']="400";
          $response['message']="Data Gagal di Ubah";

        }

    }
    else{
      $response["user"]=(object)[];
      $response['error']="400";
      $response['message']="Data Gagal di Ubah";
    }
  	


  	echo json_encode($response);

 ?>