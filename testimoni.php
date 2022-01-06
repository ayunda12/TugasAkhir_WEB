<?php include 'Admin/header.php'; ?>
<?php include 'Admin/sidebar.php'; ?>
<!-- /sidebar menu -->
<!-- top navigation -->
<?php include 'Admin/navbar.php'; ?>
<!-- /top navigation -->
<!-- page content -->
<div class="right_col" role="main">
	<div class="row"> 
		<div class="ml-2">
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
				}else if ($_GET['pesan'] == "kosong"){
					echo '<div class="alert alert-danger alert-dismissible" role="alert" style="font-size:15px; width : 500px">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
					</button>Mohon memasukkan foto !</div>';
				}else if ($_GET['pesan'] == "gagal"){
					echo '<div class="alert alert-danger alert-dismissible" role="alert" style="font-size:15px; width : 500px">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
					</button>Maaf, data gagal ditambahkan !</div>';
				}else if ($_GET['pesan'] == "ekstensi"){
					echo '<div class="alert alert-danger alert-dismissible" role="alert" style="font-size:15px; width : 500px">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
					</button>Mohon memasukkan foto berekstensi jpg/jpeg/png!</div>';
				} else if ($_GET['pesan'] == "size"){
					echo '<div class="alert alert-danger alert-dismissible" role="alert" style="font-size:15px; width : 500px">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
					</button>Size file tidak boleh dari 2 mb</div>';
				}else if ($_GET['pesan'] == "berhasiledit"){
					echo '<div class="alert alert-success alert-dismissible" role="alert" style="font-size:15px; width : 500px">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
					</button>Data berhasil diubah!</div>';
				}else if ($_GET['pesan'] == "gagaledit"){
					echo '<div class="alert alert-danger alert-dismissible" role="alert" style="font-size:15px; width : 500px">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
					</button>Data gagal diubah!</div>';
				}else if ($_GET['pesan'] == "kosongedit"){
					echo '<div class="alert alert-danger alert-dismissible" role="alert" style="font-size:15px; width : 500px">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
					</button>Mohon mengubah foto!</div>';
				}
			}
			?>
		</div>
		<div class="col-md-12 col-sm-12 "> 
			<div class="x_panel">
				<h5 class="alert alert-hijau" style="font-size: 18px; color: white;">Data Testimoni</h5>	
				<hr>
				<div class="x_content">
					<!-- <a class="btn btn-primary btn-sm" data-toggle="modal" data-toggle="modal" data-target="#tambah" style="color:white"><i class="fa fa-plus"></i> Tambah Data</a> -->
					<div class="row">
						<div class="col-sm-12">
							<div class="card-box table-responsive">

								<table id="datatable" class="table table-striped table-bordered" style="width:100%">
									<thead>
										<tr>
											<th>No</th>
											<th>Nama</th>
											<th>Tgl Upload</th>
											<th>Keterangan</th>
											<th>Aksi</th>
										</tr>
									</thead> 
									<tbody> 
										<?php
										$no = 1;
										$query = mysqli_query($koneksi, "SELECT * FROM testimoni JOIN user ON testimoni.id_user = user.id_user  ORDER BY id_testimoni DESC");
										foreach($query as $row ) { ?>
											<tr>
												<td><?= $no++?></td>
												<td><?= $row['nama'];?></td>
												<td> 
													<?= tanggal_indonesia($row['tgl_upload']);?>
												</td>
												<td> 
													<?= $row['keterangan'];?>
												</td>
												<td>

													<a class="btn btn-info btn-sm"href="#" data-toggle="modal" data-target="#detail<?= $row['id_testimoni'];?>">Detail</a>
												</td>

											</tr>

											<!-- modal edit -->
											<div class="modal fade" id="detail<?= $row['id_testimoni'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
												<div class="modal-dialog" role="document">
													<div class="modal-content">
														<div class="modal-header alert-hijau">
															<h5 class="modal-title" id="exampleModalLabel" style="color:white">Detail Data testimoni</h5>
															<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																<span aria-hidden="true">&times;</span>
															</button>
														</div>
														<div class="modal-body">
															<form action="edittestimoni.php" method="POST" enctype="multipart/form-data">
																<div class="form-group row m-1">
																	<label class="col-form-label">Nama Pelanggan</label>
																	<input type="text" name="nama" class="form-control" value="<?= $row['nama']?>" readonly>		
																</div>
																<div class="form-group row m-1">
																	<label class="col-form-label">Tanggal Upload</label>
																	<input type="text" name="nama" class="form-control" value="<?= tanggal_indonesia($row['tgl_upload']);?>" readonly>		
																</div>

																<div class="form-group row m-1">
																	<label class="col-form-label">Keterangan</label>
																	<textarea type="text" name="nama" class="form-control" value="<?= $row['nama']?>" readonly><?=  strip_tags($row['keterangan'])?> 	</textarea>	
																</div> 	


																<div class="modal-footer">
																	<button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
																
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

<!-- footer content -->
<?php include 'Admin/footer.php'; ?>