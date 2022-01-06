<?php

  require '../koneksi.php';

  $username=$_POST['username'];
  $password=$_POST['password'];

  $checkUser="SELECT * FROM user WHERE username='$username'";

  $result=mysqli_query($koneksi,$checkUser);

  if(mysqli_num_rows($result)>0){ 

    $checkUserquery="SELECT * FROM user WHERE username='$username' and password='$password'";
    $resultant=mysqli_query($koneksi,$checkUserquery);

    if(mysqli_num_rows($resultant)>0){

      while($row=$resultant->fetch_assoc())
      if($row['level']=="1"){
      $response['user']=$row;
      $response['error']="001";
      $response['message']="Username atau Password yang dimasukkan salah";
      }else{  
      
      $response['user']=$row;
      $response['error']="200";
      $response['message']="Login Berhasil";
    }
    }
    else{
      $response['user']=(object)[]; 
      $response['error']="300";
      $response['message']="Password yang dimasukkan salah";

    }
   
  }
  else{

    $response['user']=(object)[];
    $response['error']="400";
    $response['message']="Username yang dimasukkan salah";

  }

  echo json_encode($response);
    
?>