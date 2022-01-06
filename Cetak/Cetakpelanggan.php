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
$query = mysqli_query($koneksi,"SELECT * FROM user WHERE level = 2 ORDER BY id_user DESC");
$row = mysqli_num_rows($query);
if($row>0){
$html = '<center><h2>Dyah Ayu Salon</h2><h3>Laporan Data Pelanggan</h3></center><hr><br/>
';
$html .= '<table border="1" width="100%">
        <tr>
            <th><center>No</center></th>
            <th><center>Nama Pelanggan</center></th>
            <th><center>Username</center></th>
            <th><center>No Hp/WA</center></th>
            <th><center>Alamat</center></th>
        </tr>';
$no = 1;
while($row = mysqli_fetch_array($query))
{
    $html .= "<tr>
        <td><center>".$no."</center></td>
        <td><center>".$row['nama']."</center></td>
        <td><center>".$row['username']."</center></td>
        <td><center>".$row['no_telp']."</center></td>
        <td><center>".$row['alamat']."</center></td>
    </tr>";
    $no++;
}
$html .= "</html>";
$dompdf->loadHtml($html);
// Setting ukuran dan orientasi kertas
$dompdf->setPaper('A4', 'landscape');
// Rendering dari HTML Ke PDF
$dompdf->render();
// Melakukan output file Pdf
$dompdf->stream('LaporanPelanggan.pdf',array("Attachment"=>0));
}else{
    $html = '<center><h2>Mohon maaf, data yang dicari tidak ada !!</h2></center><br/>
    ';  
    $html .= "</html>";
    $dompdf->loadHtml($html);
// Setting ukuran dan orientasi kertas
    $dompdf->setPaper('A4', 'landscape');
// Rendering dari HTML Ke PDF
    $dompdf->render();
// Melakukan output file Pdf
    $dompdf->stream('LaporanPelanggan.pdf',array("Attachment"=>0));
}
?>