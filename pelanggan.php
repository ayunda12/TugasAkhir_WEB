<?php include 'Admin/header.php'; ?>
<?php include 'Admin/sidebar.php'; ?>
<!-- /sidebar menu -->

<!-- top navigation -->
<?php include 'Admin/navbar.php'; ?>
<!-- /top navigation -->
<!-- page content -->
<div class="right_col" role="main">
	<div class="row"> 
		<?php 
		if(isset($_GET['pesan'])){
			if($_GET['pesan'] == "berhasilhapus"){
				echo '<div class="alert alert-success alert-dismissible" role="alert" style="font-size:15px; width : 500px">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
				</button>Data Berhasil dihapus !</div>';
			} else if ($_GET['pesan'] == "berhasil"){
				echo '<div class="alert alert-success alert-dismissible" role="alert" style="font-size:15px; width : 500px">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
				</button>Data Berhasil ditambahkan !</div>';
			}else if ($_GET['pesan'] == "berhasiledit"){
				echo '<div class="alert alert-success alert-dismissible" role="alert" style="font-size:15px; width : 500px">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
				</button>Data Berhasil diubah !</div>';
			}
		}
		?>
		<div class="col-md-12 col-sm-12 ">  
			<div class="x_panel">
				<h5 class="alert alert-biruu" style="font-size: 18px; color: black;">Data Pelanggan</h5>		<hr>
				<div class="x_content">
					<!-- <a class="btn btn-primary btn-sm" data-toggle="modal" data-toggle="modal" data-target="#tambah" style="color:white"><i class="fa fa-plus"></i> Tambah Data</a> -->
					<div class="row">
						<div class="col-sm-12">
							<div class="card-box table-responsive">
								
								<table id="datatable" class="table table-striped table-bordered" style="width:100%">
									<thead>
										<tr>
											<th style="width:20px;">No</th> 
											<th>Nama pelanggan</th>
											<th style="width:150px;">Foto</th>
											<th>No Hp</th>
											<th>Aksi</th>
										</tr>
									</thead>
									<tbody>
										<?php
										$no = 1;
										$query = mysqli_query($koneksi, "SELECT * FROM user WHERE level = 2 ORDER BY id_user DESC");
										foreach($query as $row ) { ?>
											<tr>
												<td><?= $no++?></td>
												<td><?= $row['nama']?></td>
												<td><img class="img"
													src="assets/images/<?= $row['foto']?>" style="width:150px;">
												</td>
												<td><?= $row['no_telp']?></td>
												<td>
													<a class="btn btn-info " href="#" data-toggle="modal" data-target="#detail<?= $row['id_user'];?>">Detail</a>
													
												</td>
											</tr>
											<!-- modal detail -->
											<div class="modal fade" id="detail<?= $row['id_user'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
												<div class="modal-dialog" role="document">
													<div class="modal-content">
														<div class="modal-header alert-biruu">
															<h5 class="modal-title" id="exampleModalLabel" style="color:black">Detail Data pelanggan</h5>
															<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																<span aria-hidden="true">&times;</span>
															</button>
														</div> 
														<div class="modal-body">
															<div class="form-group row m-1">
																<img class="rounded mx-auto d-block"
																src="assets/images/<?= $row['foto']?>"  style="width: 50%;">
															</div>
															<div class="form-group row m-1">
																<label class="col-form-label">Nama pelanggan</label>
																<input type="text" name="nama" class="form-control" value="<?= $row['nama']?>" readonly>		
															</div> 
															<div class="form-group row m-1">
																<label class="col-form-label">Username</label>
																<input type="text" name="nama" class="form-control" value="<?= $row['username']?>" readonly>		
															</div> 
															<div class="form-group row m-1">
																<label class="col-form-label">No Hp/WA</label>
																<input type="text" name="nama" class="form-control" value="<?= $row['no_telp']?>" readonly>		
															</div> 
															<div class="form-group row m-1">
																<label class="col-form-label">Alamat</label>
																<textarea class="form-control" name="keterangan" readonly><?= $row['alamat']?></textarea>	
															</div> 
														</div>
														<div class="modal-footer">
															<button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
														</div>
													</div>

												</div>
											</div> 

									
										<?php } ?>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>



<!-- modal tambah -->
<!-- <div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header alert-biruu">
				<h5 class="modal-title" id="exampleModalLabel" style="color:black">Tambah Data Pelanggan</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="tambahpelanggan.php" method="POST" enctype="multipart/form-data">
					<div class="form-group row m-1">
						<label class="col-form-label">Nama pelanggan</label>
						<input type="text" name="nama" class="form-control" required>		
					</div>
					<div class="form-group row m-1">
						<label class="col-form-label">Gambar</label>
						<div class="input-group mb-3">
							<div class="custom-file">
								<input type="file" name="foto" class="custom-file-input" id="filee" aria-describedby="inputGroupFileAddon01" onChange="loadFile(event)" accept="image/jpeg,image/jpg,image/png," required>
								<label class="custom-file-label" for="inputGroupFile01">Choose file</label>
							</div>
							<script>
								$('#filee').change(function(event){
									var fileName = event.target.files[0].name;
									if (event.target.nextElementSibling!=null){
										event.target.nextElementSibling.innerText=fileName;
									}
								});
								var loadFile = function (event) {
									var output = document.getElementById('prevv');
									output.src = URL.createObjectURL(event.target.files[0]);
									output.onload = function () {
										URL.revokeObjectURL(output.src)
									}
								};
							</script>
						</div>	
						<img src="..." class="rounded mx-auto d-block" alt="..." id="prevv" style="width:50%">
					</div>
					<div class="form-group row m-1">
						<label class="col-form-label">Username</label>
						<input type="text" name="nama" class="form-control" required>		
					</div> 
					<div class="form-group row m-1">
						<label class="col-form-label">No Hp/WA</label>
						<input type="text" name="no_telp" class="form-control" required>		
					</div> 
					<div class="form-group row m-1">
						<label class="col-form-label">Alamat</label>
						<textarea class="form-control" name="alamat"></textarea>	
					</div> 
				</div>
				
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
					<button type="submit" name="submit" class="btn btn-primary" onclick="return confirm('Apakah anda yakin data sudah benar?')">Simpan</button>
				</div>	
			</form>
		</div>
	</div>
</div>
</div> -->


<!-- footer content -->
<?php include 'Admin/footer.php'; ?>

