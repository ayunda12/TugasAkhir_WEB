<?php

  require '../koneksi.php';

  $users="SELECT * FROM user";
  $result=mysqli_query($koneksi,$users);


  if(mysqli_num_rows($result)>0){


    while($row=$result->fetch_assoc()){

      $response['users'][]=$row;
      $response['error']="200";
    }
  }
  else{

    $response['error']="400";
    $response['users'][]="";


  }

  
  echo json_encode($response);
    
?>