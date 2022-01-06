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

function rupiah($angka){

  $hasil_rupiah = "Rp. " . number_format($angka,2);
  return $hasil_rupiah;

}
$from = date('Y-m-d', strtotime($_GET['from']));
$end = date('Y-m-d', strtotime($_GET['end']));
$query = mysqli_query($koneksi,"SELECT * FROM booking JOIN user ON booking.id_user = user.id_user JOIN paket ON booking.id_paket = paket.id_paket WHERE tgl_booking between '$from' AND '$end' ORDER BY tgl_booking ASC");
$row = mysqli_num_rows($query);
if($row>0){
    $html = '<center><h2>Dyah Ayu Salon</h2><h3>Laporan Data Pemesanan Paket Pernikahan</h3><h3>Dari tanggal '.tanggal_indonesia($from).' - '.tanggal_indonesia($end).'</h3></center><hr><br/>
    ';
    $html .= '<table border="1" width="100%">
    <tr>
    <th><center>No</center></th>
    <th><center>Nama</center></th>
    <th><center>Paket</center></th>
    <th><center>Status</center></th>
    <th><center>Tgl Pesan</center></th>
    <th><center>Harga</center></th>
    <th><center>Keterangan</center></th>
    <th><center>No Hp</center></th>
    <th><center>Bayar</center></th>
    </tr>';
    $no = 1;
    $total = 0;
    while($row = mysqli_fetch_array($query))
    {
        $html .= "<tr>
        <td><center>".$no."</center></td>
        <td><center>".$row['nama']."</center></td>
        <td><center>".$row['nama_paket']."</center></td>
        <td><center>".$row['status']."</center></td>
        <td><center>".tanggal_indonesia($row['tgl_booking'])."</center></td>
        <td><center>".rupiah($row['harga_paket'])."</center></td>
        <td><center>".strtoupper($row['keterangan_bayar'])."</center></td>
        <td><center>".$row['no_telp']."</center></td>
        <td><center>".rupiah($row['jumlah_bayar'])."</center></td>
        </tr>";
        $no++;
        $total = $total + $row['jumlah_bayar'];
    }
    $html .='<h4 style="text-align: right;">Total Bayar : '.rupiah($total).'</h4>';
    $html .= "</html>";
    $dompdf->loadHtml($html);
// Setting ukuran dan orientasi kertas
    $dompdf->setPaper('A4', 'landscape');
// Rendering dari HTML Ke PDF
    $dompdf->render();
// Melakukan output file Pdf
    $dompdf->stream('LaporanPesanan_Filter.pdf',array("Attachment"=>0));
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
    $dompdf->stream('LaporanPesanan_Filter.pdf',array("Attachment"=>0));
}
?>