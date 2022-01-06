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
				<h5 class="alert alert-ungu" style="font-size: 18px; color: white;">Data Layanan</h5>		<hr>
				<div class="x_content">
					<a class="btn btn-primary btn-sm" data-toggle="modal" data-toggle="modal" data-target="#tambah" style="color:white"><i class="fa fa-plus"></i> Tambah Data</a>
					<div class="row">
						<div class="col-sm-12">
							<div class="card-box table-responsive">
								<br>
								<table id="datatable" class="table table-striped table-bordered" style="width:100%">
									<thead>
										<tr>
											<th>No</th> 
											<th>Nama Layanan</th>
											<th>Gambar</th>
											<th>Keterangan</th>
											<th>Aksi</th>
										</tr>
									</thead>
									<tbody>
										<?php
										$no = 1;
										$query = mysqli_query($koneksi, "SELECT * FROM layanan ORDER BY id DESC");
										foreach($query as $row ) { ?>
											<tr>
												<td><?= $no++?></td>
												<td><?= $row['nama_layanan']?></td>
												<td><img class="img"
													src="assets/images/<?= $row['gambar']?>" style="width:150px;">
												</td>
												<td style="width: 200px;">
													<?= 
													substr($row["keterangan"],0,200).'.....'?>
												</td>
												
												<td>
													<div class="input-group-btn">
														<button type="button" class="btn btn-info btn-sm dropdown-toggle" data-toggle="dropdown" aria-expanded="false">Pilih <span class="caret"></span>
														</button>
														<ul class="dropdown-menu dropdown-menu-right" role="menu">
															<li><a class="dropdown-item" href="#" data-toggle="modal" data-target="#detail<?= $row['id'];?>">Detail</a>
															</li>
															<li><a class="dropdown-item" href="#" data-toggle="modal" data-target="#edit<?= $row['id'];?>">Edit</a>
															</li>
															<li><a class="dropdown-item" href="hapuslayanan.php?id=<?= $row['id'];?>" onclick="return confirm('Apakah anda yakin akan menghapus data ini?')">Hapus</a>
															</li>
														</ul>
													</div>
												</td>
											</tr>
											<!-- modal detail -->
											<div class="modal fade" id="detail<?= $row['id'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
												<div class="modal-dialog" role="document">
													<div class="modal-content">
														<div class="modal-header alert-ungu">
															<h5 class="modal-title" id="exampleModalLabel" style="color:white">Detail Data Layanan</h5>
															<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																<span aria-hidden="true">&times;</span>
															</button>
														</div> 
														<div class="modal-body">
															<div class="form-group row m-1">
																<img class="rounded mx-auto d-block"
																src="assets/images/<?= $row['gambar']?>"  style="width: 50%;">
															</div>
															<div class="form-group row m-1">
																<label class="col-form-label">Nama Layanan</label>
																<input type="text" name="nama" class="form-control" value="<?= $row['nama_layanan']?>" readonly>		
															</div> 
															<div class="form-group row m-1">
																<label class="col-form-label">Keterangan</label>
																<textarea class="ckeditor" id="ckedtor" name="keterangan" readonly disabled><?= $row['keterangan']?></textarea>	
															</div> 


														</div>
														<div class="modal-footer">
															<button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
														</div>
													</div>

												</div>
											</div>

											<!-- modal edit -->
											<div class="modal fade" id="edit<?= $row['id'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
												<div class="modal-dialog" role="document">
													<div class="modal-content">
														<div class="modal-header alert-ungu">
															<h5 class="modal-title" id="exampleModalLabel" style="color:white">Edit Data Layanan</h5>
															<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																<span aria-hidden="true">&times;</span>
															</button>
														</div>
														<div class="modal-body">
															<form action="editlayanan.php" method="POST" enctype="multipart/form-data">
																<div class="form-group row m-1">
																	<input type="hidden" name="id" class="form-control" value="<?= $row['id']?>">	
																	<label class="col-form-label">Nama Layanan</label>

																	<input type="text" name="nama_layanan" class="form-control" value="<?= $row['nama_layanan']?>" required>		
																</div>
																<div class="form-group row m-1">
																	<label class="col-form-label">Gambar</label>
																	<div class="input-group mb-3">
																		<div class="custom-file">
																			<input type="file" name="foto" class="custom-file-input" id="file-_<?= $row['id'];?>" aria-describedby="inputGroupFileAddon01" onChange="loadFilee_<?= $row['id'];?>(event)" accept="image/jpeg,image/jpg,image/png," value="<?= $row['gambar']?>">
																			<label class="custom-file-label" for="inputGroupFile01"><?= $row['gambar']?></label>
																		</div>
																	</div>	

																	<img src="assets/images/<?= $row['gambar']?>" class="rounded mx-auto d-block" alt="..." id="preview__<?= $row['id'];?>" style="width:50%">
																</div>
																<script>
																	$('#file-_<?= $row['id'];?>').change(function(event){
																			// console.log(event.target.files)
																			console.log($(this).parents('.modal'))
																			var fileName = event.target.files[0].name;
																			if (event.target.nextElementSibling!=null){
																				event.target.nextElementSibling.innerText=fileName;
																			}
																		});
																	var loadFilee_<?= $row['id'];?> = function (event) {
																		let output = document.querySelector("#preview__<?= $row['id'];?>");
																		console.log(output)
																		output.src = URL.createObjectURL(event.target.files[0]);
																		output.onload = function () {
																			URL.revokeObjectURL(output.src)
																		}
																	};
																	$(document).on('bs.modal.hide','.modal--edit',function(e){
																		$(this).find('#file-<?= $row['id'];?>').val('')
																	})
																</script>
																<div class="form-group row m-1">	
																	<label class="col-form-label">Keterangan</label>				
																	<textarea class="ckeditor" id="ckedtor" name="keterangan" required><?= $row['keterangan']?></textarea>
																</div>
																
																<div class="modal-footer">
																	<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
																	<button type="submit" name="submit" class="btn btn-primary" onclick="return confirm('Apakah anda yakin data sudah benar?')">Simpan</button>
																</div>
															</form>	
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
<div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header alert-ungu">
				<h5 class="modal-title" id="exampleModalLabel" style="color:white">Tambah Data Layanan</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="tambahlayanan.php" method="POST" enctype="multipart/form-data">
					<div class="form-group row m-1">
						<label class="col-form-label">Nama Layanan</label>
						<input type="text" name="nama" class="form-control" required>		
					</div>
					<div class="form-group row m-1">
						<label class="col-form-label">Gambar</label>
						<div class="input-group mb-3">
							<div class="custom-file">
								<input type="file" name="foto" class="custom-file-input" id="file-" aria-describedby="inputGroupFileAddon01" onChange="loadFilee_(event)" accept="image/jpeg,image/jpg,image/png," required>
								<label class="custom-file-label" for="inputGroupFile01">Choose file</label>
							</div>
						</div>
						<img src="" class="rounded mx-auto d-block" alt="..." id="preview" style="width:50%">

					</div>
					<script>
						$('#file-').change(function(event){
										// console.log(event.target.files)
										console.log($(this).parents('.modal'))
										var fileName = event.target.files[0].name;
										if (event.target.nextElementSibling!=null){
											event.target.nextElementSibling.innerText=fileName;
										}
									});
						var loadFilee_ = function (event) {
							let output = document.querySelector("#preview");
							console.log(output)
							output.src = URL.createObjectURL(event.target.files[0]);
							output.onload = function () {
								URL.revokeObjectURL(output.src)
							}
						};
						$(document).on('bs.modal.hide','.modal--edit',function(e){
							$(this).find('#file-').val('')
						})
					</script>
					<div class="form-group row m-1">	
							<label class="col-form-label">Keterangan</label>				
							<textarea class="ckeditor" id="ckedtor" name="keterangan" required></textarea>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
						<button type="submit" name="submit" class="btn btn-primary" onclick="return confirm('Apakah anda yakin data sudah benar?')">Simpan</button>
					</div>	
				</form>
			</div>
		</div>
	</div>
</div>


<!-- footer content -->
<?php include 'Admin/footer.php'; ?>

