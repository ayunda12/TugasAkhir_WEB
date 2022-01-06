<?php
include('../koneksi.php');
require_once("../dompdf/autoload.inc.php");
use Dompdf\Dompdf;
$dompdf = new Dompdf();
function rupiah($angka){

  $hasil_rupiah = "Rp. " . number_format($angka,2);
  return $hasil_rupiah;

}
$query = mysqli_query($koneksi,"select * from paket");
$row = mysqli_num_rows($query);
if($row>0){
$html = '<center><h2>Dyah Ayu Salon</h2><h3>Laporan Data Paket Pernikahan</h3></center><hr><br/>
';
$html .= '<table border="1" width="100%">
        <tr>
            <th><center>No</center></th>
            <th><center>Nama Paket</center></th>
            <th><center>Harga</center></th>
            <th><center>Detail</center></th>
        </tr>';
$no = 1;
while($row = mysqli_fetch_array($query))
{
    $html .= "<tr>
        <td><center>".$no."</center></td>
        <td><center>".$row['nama_paket']."</center></td>
        <td><center>".rupiah($row['harga'])."</center></td>
        <td>".$row['detail']."</td>
    </tr>";
    $no++;
}
$html .= "</html>";
$dompdf->loadHtml($html);
// Setting ukuran dan orientasi kertas
$dompdf->setPaper('A4', 'potrait');
// Rendering dari HTML Ke PDF
$dompdf->render();
// Melakukan output file Pdf
$dompdf->stream('LaporanPaket.pdf',array("Attachment"=>0));
}else{
    $html = '<center><h2>Mohon maaf, data yang dicari tidak ada !!</h2></center><br/>
    ';  
    $html .= "</html>";
    $dompdf->loadHtml($html);
// Setting ukuran dan orientasi kertas
    $dompdf->setPaper('A4', 'potrait');
// Rendering dari HTML Ke PDF
    $dompdf->render();
// Melakukan output file Pdf
    $dompdf->stream('LaporanPaket.pdf',array("Attachment"=>0));
}
?>