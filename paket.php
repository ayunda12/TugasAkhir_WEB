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
			}else if ($_GET['pesan'] == "size"){
				echo '<div class="alert alert-danger alert-dismissible" role="alert" style="font-size:15px; width : 500px">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
				</button>Size file tidak boleh lebih dari 5 mb !</div>';
			}
		}
		?>
		<div class="col-md-12 col-sm-12 "> 
			<div class="x_panel">
				
				<h5 class="alert bg-pink" style="font-size: 18px; color: black;">Data Paket Pernikahan</h5>		
				<hr>
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
											<th>Nama paket</th>
											<th>Gambar</th>
											<th>Detail</th>
											<th style="width: 150px;">Harga</th>
											<th>Aksi</th>
										</tr> 
									</thead>
									<tbody>
										<?php
										$no = 1;
										$query = mysqli_query($koneksi, "SELECT * FROM paket ORDER BY id_paket DESC");
										foreach($query as $row ) { ?>
											<tr>
												<td><?= $no++?></td>
												<td><?= $row['nama_paket']?></td>
												<td><img class="img"
													src="assets/images/<?= $row['gambar']?>" style="width: 200px;">
												</td>
												<td style="width: 200px;">
													<?= 
													substr($row["detail"],0,200).'.....'?>
												</td>
												<td>

													<?= rupiah($row['harga'])?></td>
													<td>
														<div class="input-group-btn">
															<button type="button" class="btn btn-info btn-sm dropdown-toggle" data-toggle="dropdown" aria-expanded="false">Pilih <span class="caret"></span>
															</button>
															<ul class="dropdown-menu dropdown-menu-right" role="menu">
																<li><a class="dropdown-item" href="#" data-toggle="modal" data-target="#detail<?= $row['id_paket'];?>">Detail</a>
																</li>
																<li><a class="dropdown-item" href="#" data-toggle="modal" data-toggle="modal" data-target="#edit<?= $row['id_paket'];?>">Edit</a>
																</li>
																<li><a class="dropdown-item" href="hapuspaket.php?id=<?= $row['id_paket'];?>" onclick="return confirm('Apakah anda yakin akan menghapus data ini?')">Hapus</a>
																</li>
															</ul>
														</div>
													</td>
												</tr>
												<!-- modal detail -->
												<div class="modal fade" id="detail<?= $row['id_paket'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
													<div class="modal-dialog" role="document">
														<div class="modal-content">
															<div class="modal-header bg-pink">
																<h5 class="modal-title" id="exampleModalLabel" style="color:black;">Detail Data paket</h5>
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

																	<input type="hidden" name="id" class="form-control" value="<?= $row['id_paket']?>">	

																</div>
																<div class="alert alert-pink" role="alert" style="color: black;">
																	<h4 class="alert-heading"><b><?= $row['nama_paket']?></b></h4>
																	
																	<hr>
																	<p class="mb-0" style="font-size: 15px;"><b>Detail : </b></p>
																	<p ><?= $row['detail']?></p>
																	<br>
																	<p class="mb-0" style="font-size: 15px;"><b>Harga : </b><?= rupiah($row['harga'])?></p>
																	
																</div>
																<div class="modal-footer">
																	<button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
																</div>
															</div>
														</div>
													</div>
												</div>

												<!-- modal edit -->
												<div class="modal fade modal--edit" id="edit<?= $row['id_paket'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
													<div class="modal-dialog" role="document">
														<div class="modal-content">
															<div class="modal-header bg-pink">
																<h5 class="modal-title" id="exampleModalLabel" style="color:black;">Edit Data paket</h5>
																<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																	<span aria-hidden="true">&times;</span>
																</button>
															</div>
															<div class="modal-body">
																<form action="editpaket.php" method="POST" enctype="multipart/form-data">
																	<div class="form-group row m-1">
																		<label class="col-form-label">Nama paket</label>
																		<input type="text" name="nama" class="form-control" value="<?= $row['nama_paket']?>" required>		
																	</div> 
																	<div class="form-group row m-1">
																		<input type="hidden" name="id" class="form-control" value="<?= $row['id_paket']?>">	
																		<label class="col-form-label">Gambar</label>
																		<div class="input-group mb-3">
																			<div class="custom-file">
																				<input type="file" name="foto" class="custom-file-input" id="file-_<?= $row['id_paket'];?>" aria-describedby="inputGroupFileAddon01" onChange="loadFilee_<?= $row['id_paket'];?>(event)" accept="image/jpeg,image/jpg,image/png," value="<?= $row['gambar']?>">
																				<label class="custom-file-label" for="inputGroupFile01"><?= $row['gambar']?></label>
																			</div>
																		</div>	

																		<img src="assets/images/<?= $row['gambar']?>" class="rounded mx-auto d-block" alt="..." id="preview__<?= $row['id_paket'];?>" style="width:50%">
																	</div>
																	<script>
																		$('#file-_<?= $row['id_paket'];?>').change(function(event){
																			// console.log(event.target.files)
																			console.log($(this).parents('.modal'))
																			var fileName = event.target.files[0].name;
																			if (event.target.nextElementSibling!=null){
																				event.target.nextElementSibling.innerText=fileName;
																			}
																		});
																		var loadFilee_<?= $row['id_paket'];?> = function (event) {
																			let output = document.querySelector("#preview__<?= $row['id_paket'];?>");
																			console.log(output)
																			output.src = URL.createObjectURL(event.target.files[0]);
																			output.onload = function () {
																				URL.revokeObjectURL(output.src)
																			}
																		};
																		$(document).on('bs.modal.hide','.modal--edit',function(e){
																			$(this).find('#file-<?= $row['id_paket'];?>').val('')
																		})
																	</script>
																	<div class="form-group row m-1">	
																		<label class="col-form-label">Detail</label>				
																		<textarea class="ckeditor" id="ckedtor" name="detail" required><?= $row['detail']?></textarea>
																	</div>
																	<div class="form-group row m-1">
																		<label class="col-form-label">Harga</label>
																		<input type="text" name="harga" class="form-control" value="<?= $row['harga']?>" required onkeypress="return hanyaAngka(event)" maxlength="8">		<p style="color: red;">Tulis harga hanya angka tanpa titik atau koma, Misal : 2000000</p>		

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
				<div class="modal-header bg-pink">
					<h5 class="modal-title" id="exampleModalLabel" style="color:black;">Tambah Data paket</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form action="tambahpaket.php" method="POST" enctype="multipart/form-data">
						<div class="form-group row m-1">
							<label class="col-form-label">Nama paket</label>
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
							<label class="col-form-label">Detail</label>				
							<textarea class="ckeditor" id="ckedtor" name="detail" required></textarea>
						</div>
						<div class="form-group row m-1">
							<label class="col-form-label">Harga</label>
							<input type="text" name="harga" class="form-control" required onkeypress="return hanyaAngka(event)" maxlength="8">
							<p style="color: red;">Tulis harga hanya angka tanpa titik atau koma, Misal : 2000000</p>		
						</div>
						<br>

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
