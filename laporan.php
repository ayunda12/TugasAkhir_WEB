<?php include 'Admin/header.php'; ?>
<?php include 'Admin/sidebar.php'; ?>
<!-- /sidebar menu -->

<!-- top navigation -->
<?php include 'Admin/navbar.php'; ?>
<!-- /top navigation -->
<!-- page content -->

<div class="right_col" role="main">
<?php 
if(isset($_GET['pesan'])){
	if($_GET['pesan'] == "datakosong"){
		echo "<script>alert('Maaf data yang dicari tidak ada!!');</script>";
	}
}
?>
	<div class="row">

		<div class="col-sm-3">

			<div class="card text-center">
				<div class="card-body">
					<img class="rounded mx-auto d-block"
					src="assets/images/seo-report.png"  style="width: 35%;">
					<a href="Cetak/Cetakpelanggan.php" class="btn btn-primary mt-3">Laporan Data Pelanggan</a>
				</div>
			</div> 
		</div>
		<div class="col-sm-3">
			<div class="card text-center">
				<div class="card-body">
					<img class="rounded mx-auto d-block"
					src="assets/images/seo-report.png"  style="width: 35%;">
					<a href="Cetak/Cetaklayanan.php" class="btn btn-primary mt-3">Laporan Data Layanan</a>
				</div>
			</div>
		</div>
		<div class="col-sm-3">
			<div class="card text-center">
				<div class="card-body">
					<img class="rounded mx-auto d-block"
					src="assets/images/seo-report.png"  style="width: 35%;">
					<a href="Cetak/Cetakpaket.php" target="_blank" class="btn btn-primary mt-3">Laporan Data Paket</a>
				</div>
			</div>
		</div>
		<div class="col-sm-3">
			<div class="card text-center">
				<div class="card-body">
					<img class="rounded mx-auto d-block"
					src="assets/images/seo-report.png"  style="width: 35%;">
					<a href="Cetak/Cetaktestimoni.php" class="btn btn-primary mt-3">Laporan Data Testimoni</a>
				</div>
			</div>
		</div>

		<div class="col-sm-6">
			<br>
			
			<div class="card">
				<h6 class="card-header"><b>Laporan Pemesanan Paket</b></h6>
				<div class="card-body">
					<a href="Cetak/CetakBookingSemua.php" class="btn btn-primary" style="color:white"> Laporan Semua</a><br>
					<a href="Cetak/CetakBookingLunas.php" class="btn btn-primary" style="color:white"> Laporan dengan Status Pembayaran : Lunas</a>
					<a href="Cetak/CetakBookingDp.php" class="btn btn-primary" data-target="#tambah" style="color:white"> Laporan dengan Status Pembayaran : DP</a>
					<a href="Cetak/CetakBookingMenunggu.php" class="btn btn-primary" style="color:white"> Laporan dengan Status Pemesanan : Menunggu Pembayaran</a>
					<a href="Cetak/CetakBookingMenungguBukti.php" class="btn btn-primary" style="color:white"> Laporan dengan Status Pemesanan : Menunggu Bukti Transfer</a>
					<a href="Cetak/Cetakbookingproses.php" class="btn btn-primary" class="btn btn-primary" style="color:white"> Laporan dengan Status Pemesanan : Diproses</a>
					<a href="Cetak/CetakBookingDikonfirmasi.php" class="btn btn-primary" class="btn btn-primary" style="color:white"> Laporan dengan Status Pemesanan : Dikonfirmasi</a>
					
				</div>

			</div>

		</div>

		<div class="col-sm-6">
			<br>
			
			<div class="card">
				<h6 class="card-header"><b>Laporan Pemesanan Paket Berdasarkan Jangka Waktu</b></h6>
				<div class="card-body">
					<br>
					<form action="Cetak/Cetakfilter.php" method="GET">
						<div class="form-row">
							<div class="form-group col-md-6">
								<label for="inputEmail4">Dari Tanggal</label>
								<input type="date" class="form-control" name="from" required>
							</div>
							<div class="form-group col-md-6">
								<label for="inputPassword4">Sampai Tanggal</label>
								<input type="date" class="form-control" name="end" required>
							</div>
						</div>
						<button type="submit" name="submit" class="btn btn-info pull-right"><i class="fa fa-print"></i> Cetak Laporan </button>
					</form>
				</div>

			</div>

		</div>

	</div>
</div>
</div>




<!-- footer content -->
<?php include 'Admin/footer.php'; ?>
