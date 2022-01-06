<?php include 'Admin/header.php'; ?>
<?php include 'Admin/sidebar.php'; ?>
<!-- /sidebar menu -->

<!-- top navigation -->
<?php include 'Admin/navbar.php'; ?>
<!-- /top navigation -->
<!-- page content --> 
<div class="right_col" role="main">
	<div class="row">

		<li class="media event">
			<a class="pull-left border-blue profile_thumb">
				<i class="fa fa-clock-o blue"></i>
			</a>
			<div class="media-body">
				<a class="title" href="#"></a>
				<p><b><h2 id="timestamp"></h2></b></p>
				<p><h2><?php $hari_ini   = date('Y-m-d');echo getDayIndonesia($hari_ini);?>, <?php echo tanggal_indonesia(date('Y-m-d'))?></h2>
				</p>
			</div>
		</li>
	</div>
	<hr>
	<div class="row" style="display: inline-block;">
		<div class="top_tiles">
			<div class="animated flipInY col-lg-3 col-md-3 col-sm-6 ">
				<div class="tile-stats">
					<?php 
					$query = mysqli_query($koneksi, "SELECT * FROM user WHERE level=2");
					$count = mysqli_num_rows($query);
					?>
					<div class="icon"><i class="fa fa-users"></i></div>
					<div class="count ml-3"><?= $count?></div>
					
					<h3 style="font-size:20px" class="mt-3"><a href="pelanggan.php">Data Pelanggan</a></h3>

					<p></p>
				</div>
			</div>
			<div class="animated flipInY col-lg-3 col-md-3 col-sm-6 ">
				<div class="tile-stats">
					<?php 
					$query = mysqli_query($koneksi, "SELECT * FROM layanan");
					$count = mysqli_num_rows($query);
					?>
					<div class="icon"><i class="fa fa-files-o"></i></div>
					<div class="count ml-3"><?= $count?></div>
					
					<h3 style="font-size:20px" class="mt-3"><a href="layanan.php">Data Layanan</a></h3>

					<p></p>
				</div>
			</div>
			<div class="animated flipInY col-lg-3 col-md-3 col-sm-6 ">
				<div class="tile-stats">
					<?php 
					$query = mysqli_query($koneksi, "SELECT * FROM paket");
					$count = mysqli_num_rows($query);
					?>
					<div class="icon"><i class="fa fa-briefcase"></i></div>
					<div class="count ml-3"><?= $count?></div>
					
					<h3 style="font-size:20px" class="mt-3"><a href="paket.php">Data Paket Pernikahan</a></h3>

					<p></p>
				</div>
			</div>
			<div class="animated flipInY col-lg-3 col-md-3 col-sm-6 ">
				<div class="tile-stats">
					<?php 
					$query = mysqli_query($koneksi, "SELECT * FROM galeri");
					$count = mysqli_num_rows($query);
					?>
					<div class="icon"><i class="fa fa-image"></i></div>
					<div class="count ml-3"><?= $count?></div>
					
					<h3 style="font-size:20px" class="mt-3"><a href="galeri.php">Data Galeri</a></h3>

					<p></p>
				</div>
			</div>
			<div class="animated flipInY col-lg-3 col-md-3 col-sm-6 ">
				<div class="tile-stats">
					<?php 
					$query = mysqli_query($koneksi, "SELECT * FROM testimoni");
					$count = mysqli_num_rows($query);
					?>
					<div class="icon"><i class="fa fa-image"></i></div>
					<div class="count ml-3"><?= $count?></div>
					
					<h3 style="font-size:20px" class="mt-3"><a href="testimoni.php">Data Testimoni</a></h3>

					<p></p>
				</div>
			</div>
			<div class="animated flipInY col-lg-3 col-md-3 col-sm-6 ">
				<div class="tile-stats">
					<?php 
					$query = mysqli_query($koneksi, "SELECT * FROM booking");
					$count = mysqli_num_rows($query);
					?>
					<div class="icon"><i class="fa fa-dollar"></i></div>
					<div class="count ml-3"><?= $count?></div>
					
					<h3 style="font-size:20px" class="mt-3"><a href="booking.php">Data Pemesanan Paket</a></h3>

					<p></p>
				</div>
			</div>
		
		</div>
	</div>
</div>
<!-- /page content -->
<!-- footer content -->
<?php include 'Admin/footer.php'; ?>  