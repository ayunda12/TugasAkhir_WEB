<?php 

include("../koneksi.php");

 
// proses penghapusan data
if (empty($_GET)) {
$query = "DELETE FROM booking
WHERE tglwaktu < (NOW() - INTERVAL 24 HOUR) AND status='Menunggu Bukti Transfer'";
$result=mysqli_query($koneksi,$query);

if($result>0){
  $response['error']="400";
  $response['message']="yes";
}else{
 $response['error']="400";
 $response['message']="Data Gagal di Ubah";
}
}else{}

echo json_encode($response);

?>