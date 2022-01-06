<?php
include('../koneksi.php');
require_once("../dompdf/autoload.inc.php");
use Dompdf\Dompdf;
$dompdf = new Dompdf();
function tanggal_indonesia($tanggal){
  $bulan = array (
    1 =>   'Januari',
    'Februari',
    'Maret', 
    'April',
    'Mei',
    'Juni',
    'Juli',
    'Agustus',
    'September',
    'Oktober',
    'November',
    'Desember'
  );

  $pecahkan = explode('-', $tanggal);

  return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
}
$query = mysqli_query($koneksi,"SELECT * FROM layanan ORDER BY id DESC");
$row = mysqli_num_rows($query);
if($row>0){
$html = '<center><h2>Dyah Ayu Salon</h2><h3>Laporan Data Layanan</h3></center><hr><br/>
';
$html .= '<table border="1" width="100%">
        <tr>
            <th><center>No</center></th>
            <th><center>Nama Layanan</center></th>
        </tr>';
$no = 1;
while($row = mysqli_fetch_array($query))
{
    $html .= "<tr>
        <td><center>".$no."</center></td>
        <td><center>".$row['nama_layanan']."</center></td>
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
$dompdf->stream('LaporanLayanan.pdf',array("Attachment"=>0));
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
    $dompdf->stream('LaporanLayanan.pdf',array("Attachment"=>0));
}
?>