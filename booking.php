
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
			if($_GET['pesan'] == "berhasilkonfirmasibayar"){
				echo '<div class="alert alert-success alert-dismissible" role="alert" style="font-size:15px; width : 500px">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
				</button>Status pembayaran berhasil diperbarui !</div>';
			} else if ($_GET['pesan'] == "berhasilkonfirmasipaket"){
				echo '<div class="alert alert-success alert-dismissible" role="alert" style="font-size:15px; width : 500px">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
				</button>Status pemesanan berhasil dikonfirmasi !</div>';
			}else if ($_GET['pesan'] == "berhasiledit"){
				echo '<div class="alert alert-success alert-dismissible" role="alert" style="font-size:15px; width : 500px">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
				</button>Data Berhasil diubah !</div>';
			}
		}
		?>
		<div class="col-md-12 col-sm-12 "> 
			
			<div class="x_panel">
				<h5 class="alert alert-unguu" style="font-size: 18px; color: white;">Data Pemesanan Paket Pernikahan</h5>	
				<hr>
				<div class="alert alert-pinkk col-md-12" role="alert" style="color: black;">
					<h6 class="alert-heading"><b>Penjelasan :</b></h6>
					<h6 style="font-size:15px"><li>Tombol Konfirmasi digunakan untuk mengkonfirmasi status pemesanan.</li>
						<li>Tombol Detail digunakan untuk melihat detail pemesanan</li>
						<li>Tombol Lunas digunakan untuk merubah status pembayaran ketika pelanggan melakukan pelunasan ditempat.</li>
					</h6>

				</div>

				<div class="x_content">
					<div class="row">
						<div class="col-sm-12">
							<div class="card-box table-responsive">
								<table id="datatable" class="table table-striped table-bordered" style="width:100%">
									<thead>
										<tr>
											<th>No</th> 
											<th>Nama Pelanggan</th>
											<th>Paket</th>
											<th>Tanggal Pesan</th>
											<th style="width:20px">Status Pembayaran</th>
											<th style="width:20px">Status Pemesanan</th>
											<th>Aksi</th>
										</tr>
									</thead> 
									<tbody>  
										<?php 
										$query = mysqli_query($koneksi, "SELECT * FROM booking JOIN user ON booking.id_user = user.id_user JOIN paket ON booking.id_paket = paket.id_paket ORDER BY id_booking DESC");
										$no = 1;
										foreach($query as $row ) { ?>
											<tr>
												<td><?= $no++?></td>
												<td><?= $row['nama']?></td>
												<td><?= $row['nama_paket']?></td>
												<td><?= tanggal_indonesia($row['tgl_booking'])?></td>
												<td>
													<?php
													if($row['keterangan_bayar']=="lunas"){?>
														<b style="color: green;"><?php echo strtoupper($row['keterangan_bayar']) ?>
													</b>
												<?php }else{ ?>
													<b style="color: red;"><?php echo strtoupper($row['keterangan_bayar']) ?>
												</b>
											<?php	}
											?>
										</td>
										<td>
											<?php
											if($row['status']=="dikonfirmasi"){?>
												<h6><span class="badge badge-pill badge-primary"><?= $row['status']?></span></h6>
											<?php }else{ ?>
												<h6><span class="badge badge-pill badge-warning"><?= $row['status']?></span></h6>
											<?php	}
											?>

										</td>
										<td>
											<?php
											if($row['status']=="dikonfirmasi" && $row['keterangan_bayar']=="lunas"){?>
												<a type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#detail<?= $row['id_booking'];?>" style="color:white">Detail</a>

											<?php }else if($row['status']=="dikonfirmasi" && $row['keterangan_bayar']=="DP"){ ?>
												<a type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#detail<?= $row['id_booking'];?>" style="color:white">Detail</a>
												| &nbsp<a type="button" href="konfirmasilunas.php?id_booking=<?= $row['id_booking'];?>" class="btn btn-success btn-sm" onclick="return confirm('Apakah anda yakin akan melakukan pelunasan?')" style="color:white">Lunas </a>

											<?php }else if($row['status']=="Menunggu Bukti Transfer" && $row['keterangan_bayar']=="lunas"){ ?>
												<a type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#detail<?= $row['id_booking'];?>" style="color:white">Detail</a>
											<?php }else if($row['status']=="Menunggu Bukti Transfer" && $row['keterangan_bayar']=="DP"){ ?>
											<a type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#detail<?= $row['id_booking'];?>" style="color:white">Detail</a>
											<?php }else if($row['status']=="diproses" && $row['keterangan_bayar']=="lunas"){ ?>
												<a class="btn btn-primary btn-sm" href="konfirmasipaket.php?id_booking=<?= $row['id_booking'];?>" onclick="return confirm('Apakah anda yakin akan mengkonfirmasi data ini?')">Konfirmasi</a>
												| &nbsp<a type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#detail<?= $row['id_booking'];?>" style="color:white">Detail</a>

											<?php }else if($row['status']=="diproses" && $row['keterangan_bayar']=="DP"){ ?>
											<a class="btn btn-primary btn-sm" href="konfirmasipaket.php?id_booking=<?= $row['id_booking'];?>" onclick="return confirm('Apakah anda yakin akan mengkonfirmasi data ini?')">Konfirmasi</a>
											| &nbsp<a type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#detail<?= $row['id_booking'];?>" style="color:white">Detail</a>
												| &nbsp<a type="button" href="konfirmasilunas.php?id_booking=<?= $row['id_booking'];?>" class="btn btn-success btn-sm" onclick="return confirm('Apakah anda yakin akan melakukan pelunasan?')" style="color:white">Lunas </a>
											<?php }else if($row['status']=="Menunggu Pembayaran") { ?>
												<a type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#detail<?= $row['id_booking'];?>" style="color:white">Detail</a>

											<?php	}else{?>
												
											<?php	}
											?>

										</a>
									</td> 
								</tr>
								<!-- modal detail -->
								 <div class="modal fade" id="detail<?= $row['id_booking'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                      <div class="modal-header alert-unguu">
                        <h5 class="modal-title" id="exampleModalLabel" style="color:white">Detail Data Pemesanan</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div> 
                      <div class="modal-body">
                        <div class="form-row" style="color: #000;">
                          <div class="form-group col-md-6">
                            <label for="inputtext4">Nama Pelanggan</label>
                            <input type="text" class="form-control" id="inputtext4" readonly value="<?= $row['nama']?>" style="color: #000;">
                          </div>
						  <div class="form-group col-md-6">
                            <label for="inputtext4">No HP/WA</label>
                            <input type="text" class="form-control" id="inputtext4" readonly 
                            value="<?= $row['no_telp']?>" style="color: #000;">
                          </div>
                          
                        </div>
                        <div class="form-row" style="color: #000;">
                          <div class="form-group col-md-6">
						  	<label for="inputtext4">Alamat</label>
                            <textarea id="message" required="required" class="form-control" name="message" data-parsley-trigger="keyup" data-parsley-minlength="20" data-parsley-maxlength="100" data-parsley-validation-threshold="10" readonly disabled style="color: #000;"><?= $row['alamat']?></textarea>
 						  </div>
						   <div class="form-group col-md-6">
                            <label for="inputEmail4">Tanggal Pemesanan</label>
                            <input type="email" class="form-control" name="id" id="inputEmail4" placeholder="Email" readonly value="<?= tanggal_indonesia($row['tgl_booking'])?>" style="color: #000;">
                          </div> 
                        </div> 
                        <div class="form-row" style="color: #000;">
                          <div class="form-group col-md-6">
                            <label for="inputEmail4">Nama Paket</label>
                            <input type="email" class="form-control" name="id" id="inputEmail4" placeholder="Email" readonly value="<?= $row['nama_paket']?>" style="color: #000;">
                          </div>
                          <div class="form-group col-md-6">
                            <label for="inputtext4">Harga Paket</label>
                            <input type="text" class="form-control" id="inputtext4" readonly 
                            value="<?= rupiah($row['harga_paket'])?>" style="color: #000;">
                          </div>
                        </div>
                        <div class="form-row" style="color: #000;">
                          <div class="form-group col-md-6">
                            <label for="inputEmail4">Tanggal Acara</label>
                            <input type="email" class="form-control" name="id" id="inputEmail4" placeholder="Email" readonly value="<?= tanggal_indonesia($row['tgl_acara'])?>" style="color: #000;">
                          </div> 
                          <div class="form-group col-md-6">
                            <label for="inputtext4">Status Pembayaran</label>
                            <input type="text" class="form-control" id="inputtext4" readonly value="<?php echo strtoupper($row['keterangan_bayar']) ?>" style="color: #000;">
                          </div>
                        </div>
                        <div class="form-row" style="color: #000;">

                          <div class="form-group col-md-6">
                            <label for="inputEmail4">Status Pemesanan</label>
                            <?php
                            if($row['status']=="dikonfirmasi"){?>
                              <h6><span class="badge badge-pill badge-primary"><?= $row['status']?></span></h6>
                            <?php }else{ ?>
                              <h5><span class="badge badge-pill badge-warning"><?= $row['status']?></span></h5>
                            <?php }
                            ?>

                          </div>
                          <div class="form-group col-md-6">
                            <label for="inputtext4">Jumlah Pembayaran</label>
                            <input type="text" class="form-control" id="inputtext4" readonly value="<?php echo rupiah($row['jumlah_bayar']) ?>" style="color: #000;">
                          </div>
                          <div class="form-group col-md-6">
                            <label for="inputtext4">Bukti Pembayaran</label>
                            <img src="assets/images/<?= $row['bukti_bayar']; ?>"class="mx-auto d-block img-thumbnail" id="">
                          </div>

                        </div>
                      </div> 
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                      </div>
                    </div>

                  </div>
                </div>


								<!-- modal edit -->
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
