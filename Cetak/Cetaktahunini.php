<?php
// memanggil library FPDF
include '../koneksi.php';
require('../fpdf.php');

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

        // variabel pecahkan 0 = tahun
        // variabel pecahkan 1 = bulan
        // variabel pecahkan 2 = tanggal

  return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
}

function rupiah($angka){

  $hasil_rupiah = "Rp. " . number_format($angka,2);
  return $hasil_rupiah;

}

$mahasiswa = mysqli_query($koneksi, "SELECT * FROM booking JOIN user ON booking.id_user = user.id_user JOIN paket ON booking.id_paket = paket.id_paket WHERE YEAR(tgl_booking)=YEAR(NOW()) ORDER BY id_booking DESC");
$column_id = "";
$column_nama = "";
$column_paket = "";
$column_status = "";
$column_tgl = "";
$column_harga = "";
$column_ket = "";
$column_nohp ="";
$column_bayar ="";
$total ="0";
while ($row = mysqli_fetch_array($mahasiswa)){

    $id = $row["id_booking"];
    $nama = $row["nama"];
    $paket = $row["nama_paket"];
    $status =$row['status'];
    $tgl = tanggal_indonesia($row['tgl_booking']);
    $harga = rupiah($row['harga_paket']);
    $ket = strtoupper($row["keterangan_bayar"]);
    $nohp = $row["no_telp"];
    $bayar = rupiah($row["jumlah_bayar"]);

   
    $total = $total + $row['jumlah_bayar'];


    $column_id = $column_id.$id."\n";
    $column_nama = $column_nama.$nama."\n";
    $column_paket = $column_paket.$paket."\n";
    $column_status = $column_status.$status."\n";
    $column_tgl = $column_tgl.$tgl."\n";
    $column_harga = $column_harga.$harga."\n";
    $column_ket = $column_ket.$ket."\n";
    $column_nohp = $column_nohp.$nohp."\n";
    $column_bayar = $column_bayar.$bayar."\n";


    $pdf = new FPDF('L','mm',array(297,210)); //L For Landscape / P For Portrait
    $pdf->AddPage();

//Menambahkan Gambar
// $pdf->Image('assets/images/d.jpg',10,10,-175);

    $pdf->SetFont('Arial','B',13);
    $pdf->Cell(125);
    $pdf->Cell(30,10,'Dyah Ayu Salon',0,0,'C');

    $pdf->Ln();

    $pdf->Cell(125);
    $pdf->Cell(30,10,'Laporan Data Pemesanan Paket Pernikahan Tahun Ini',0,0,'C');
    $pdf->Ln();
}

$Y_Fields_Name_position = 36;

//First create each Field Name
//Gray color filling each Field Name box
$pdf->SetFillColor(115,180,230);
//Bold Font for Field Name
$pdf->SetFont('Arial','B',10);
$pdf->SetY($Y_Fields_Name_position);
$pdf->SetX(5);
$pdf->Cell(18,8,'ID',1,0,'C',1);
$pdf->SetX(23);
$pdf->Cell(45,8,'Nama Pelanggan',1,0,'C',1);
$pdf->SetX(68);
$pdf->Cell(29,8,'Paket',1,0,'C',1);
$pdf->SetX(97);
$pdf->Cell(35,8,'Status',1,0,'C',1);
$pdf->SetX(132);
$pdf->Cell(35,8,'Tgl Pesan',1,0,'C',1);
$pdf->SetX(167);
$pdf->Cell(35,8,'Harga',1,0,'C',1);
$pdf->SetX(202);
$pdf->Cell(23,8,'Keterangan',1,0,'C',1);
$pdf->SetX(225);
$pdf->Cell(32,8,'No Hp',1,0,'C',1);
$pdf->SetX(257);
$pdf->Cell(35,8,'Bayar',1,0,'C',1);
$pdf->Ln();
$Y_Table_Position = 44;

//Now show the columns
$pdf->SetFont('Arial','',10);

$pdf->SetY($Y_Table_Position);
$pdf->SetX(5);
$pdf->MultiCell(18,7,$column_id,1,'C');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(23);
$pdf->MultiCell(45,7,$column_nama,1,'L');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(68);
$pdf->MultiCell(29,7,$column_paket,1,'C');
$pdf->SetY($Y_Table_Position);
$pdf->SetX(97);
$pdf->MultiCell(35,7,$column_status,1,'C');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(132);
$pdf->MultiCell(35,7,$column_tgl,1,'C');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(167);
$pdf->MultiCell(35,7,$column_harga,1,'L');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(202);
$pdf->MultiCell(23,7,$column_ket,1,'C');
$pdf->SetY($Y_Table_Position); 
$pdf->SetX(225);
$pdf->MultiCell(32,7,$column_nohp,1,'C');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(257);
$pdf->MultiCell(35,7,$column_bayar,1,'R');

$pdf->SetFont('Arial','B',13);
    $pdf->Cell(125);
    $pdf->Cell(240,20,'Total Bayar : '.rupiah($total),0,0,'C');
$pdf->Output();
// $pdf->Output();


?>