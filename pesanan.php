<?php include 'User/header.php'; ?>
<?php include 'User/navbar.php'; ?>

<?php 
if(!isset($_SESSION['id'])){?>
  <br>
  <div class="container"> 
    <a href="login.php" class="btn btn-danger">Silahkan Login Terlebih Dahulu !!</a>
  </div>
  <br>
<?php }else{ ?>

<?php

mysqli_query($koneksi,"DELETE FROM booking
WHERE tglwaktu < (NOW() - INTERVAL 24 HOUR) AND status='Menunggu Bukti Transfer'");

mysqli_query($koneksi,"DELETE FROM booking
WHERE tglwaktu < (NOW() - INTERVAL 24 HOUR) AND status='Menunggu Pembayaran'");
?>
  <?php 
  if(isset($_GET['pesan'])){
    if($_GET['pesan'] == "notelp"){
      echo "<script>alert('Mohon Lengkapi Data No HP/WA Anda di Halaman Profil Anda!!');</script>";
    }else if($_GET['pesan'] == "alamat"){
      echo "<script>alert('Mohon Lengkapi Data Alamat Anda di Halaman Profil Anda!!');</script>";
    }else if($_GET['pesan'] == "berhasilbatal"){
      echo "<script>alert('Pesanan Berhasil di Batalkan');</script>";
    }
  }
  ?>

  <?php
  $id = $_SESSION['id']; 
  $query = mysqli_query($koneksi, "SELECT * FROM booking JOIN user ON booking.id_user = user.id_user JOIN paket ON booking.id_paket = paket.id_paket WHERE booking.id_user='$id'ORDER BY id_booking DESC");
  $no = 1;

  foreach($query as $row ) { ?>
   <?php  $tgl_booking =  $row['tgl_booking']?>
   <?php if(strtotime("+24 hours ", strtotime($tgl_booking) < strtotime(date('Y-m-d H:i:s')))){
    $query = mysqli_query($koneksi,"DELETE FROM booking
      WHERE bukti_bayar='' and status='menunggu'");

  }else{

  }?>
<?php }
?>
<section id="project-area" class="project-area">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <h3><center>Pesanan Saya</center></h3> 
        
        <div class="alert alert-success col-md-12" role="alert" style="color: black; background: #ffe7d5;">
          <a class="alert-heading"><b>Penjelasan :</b></a><br>
          <a style="font-size:14px; text-align:justify;">Mohon melakukan pembayaran dan pengiriman bukti transfer bagi status pemesanan : Menunggu Pembayaran dan Menunggu Bukti Transfer.
           <br> Batas waktu <b> 24 jam.</b> Jika tidak, pesanan akan dibatalkan secara otomatis.
         </a>

       </div>
       <?php 
       if(isset($_GET['pesan'])){
        if($_GET['pesan'] == "berhasilpesan"){
         echo '<div class="alert alert-success alert-dismissible" role="alert" style="font-size:15px; width : 500px">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
            </button>Berhasil Melakukan Pemesanan !</div>';
          }
      }
      ?>
      <div class="card-box table-responsive">
        <table id="datatable" class="table table-striped table-bordered">
          <thead>
            <tr>
              <th scope="col">No</th>
              <th scope="col">Nama Paket</th> 
              <th scope="col">Tanggal Pesan</th>
              <th scope="col">Tanggal Acara</th>
                <th scope="col">Harga</th><!-- 
                  <th scope="col">Bukti Bayar</th> -->
                  <th scope="col">Status</th>
                  <th scope="col"></th>
                </tr>
              </thead>
              <!-- <form action="cekkeranjang.php" method="POST"> -->
                <tbody>
                  <?php
                  $id = $_SESSION['id']; 
                  $query = mysqli_query($koneksi, "SELECT * FROM booking JOIN user ON booking.id_user = user.id_user JOIN paket ON booking.id_paket = paket.id_paket WHERE booking.id_user='$id'ORDER BY id_booking DESC");
                  $nomor = 1;
                  foreach($query as $row ) { ?>
                   <tr>
                    <th scope="row"><center><?= $nomor++?></center></th> 
                    <td><?= $row['nama_paket']?></td>  
                    <td><?= tanggal_indonesia($row['tgl_booking'])?></td> 
                    <td><?= tanggal_indonesia($row['tgl_acara'])?></td> 
                  <td><?= rupiah($row['harga_paket'])?></td><!-- 
                    <td><img src="assets/images/<?= $row['bukti_bayar']?>" style="width: 100px;"></td>  -->
                    <td><b><?= $row['status']?></b></td>
                    <td>

                     <?php
                     $id = $_SESSION['id']; 
                     $query = mysqli_query($koneksi, "SELECT * FROM testimoni");
                     $no = 1;

                     foreach($query as $testi ) { ?>
                      <?php if ($testi['id_booking']==$row['id_booking']){?>

                      <?php }else{?>

                      <?php }} 
                      ?>
 
                      <!--  --> 
                      <?php
                      if($row['status']=="Menunggu Pembayaran"){?>
                        <a href="pembayaran.php" class="btn btn-sm btn-success" data-toggle="modal" data-target="#pilihbayar<?= $row['id_booking'];?>"><b>Bayar</b></a><br>
                        <a style="margin-top: 10px" href="pembayaran.php" class="btn btn-sm btn-info" data-toggle="modal" data-target="#detail<?= $row['id_booking'];?>"><b>Detail</b></a><br>
                         <a style="margin-top: 10px;" href="hapuspesan.php?id_booking=<?= $row['id_booking'];?>" class="btn btn-sm btn-danger" onclick="return confirm('Apakah anda yakin akan membatalkan pesanan data ini?')"><b>Batalkan Pesanan</b></a><br>
                      <?php }else  if($row['status']=="Menunggu Bukti Transfer"){?>

                        <a href="pembayaran.php" class="btn btn-sm btn-success" data-toggle="modal" data-target="#buktitf"><b>Bayar</b></a><br>
                        <a style="margin-top: 10px" href="pembayaran.php" class="btn btn-sm btn-info" data-toggle="modal" data-target="#detail<?= $row['id_booking'];?>"><b>Detail</b></a><br>
                        <a style="margin-top: 10px;" href="hapuspesan.php?id_booking=<?= $row['id_booking'];?>" class="btn btn-sm btn-danger" onclick="return confirm('Apakah anda yakin akan membatalkan pesanan data ini?')"><b>Batalkan Pesanan</b></a><br>


                   
                      <?php }else  if($row['status']=="diproses"){?>
                       <a style="margin-top: 10px" href="pembayaran.php" class="btn btn-sm btn-info" data-toggle="modal" data-target="#detail<?= $row['id_booking'];?>"><b>Detail</b></a><br>

                     <?php }else  if($row['status']=="dikonfirmasi"){?>
                       <a style="margin-top: 10px" href="pembayaran.php" class="btn btn-sm btn-info" data-toggle="modal" data-target="#detail<?= $row['id_booking'];?>"><b>Detail</b></a><br>
                       <?php
                       $id = $_SESSION['id']; 
                       $cek = $row['id_booking'];
                       $checkUser="SELECT * FROM testimoni WHERE id_booking='$cek'";
                       $result=mysqli_query($koneksi,$checkUser); ?>

                       <?php if(mysqli_num_rows($result)>0){ ?>
                         <a style="margin-top: 10px" href="pembayaran.php" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#selesaitesti"><b>Selesai</b></a><br>
                       <?php }else{?>
                        <a style="margin-top: 10px" href="pembayaran.php" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#tulistesti<?= $row['id_booking'];?>"><b>Selesai</b></a><br>
                        
                      <?php }
                      ?>

                    <?php } 
                    ?>
                  </td>
                </tr>
              </tbody>
              <!-- Modal -->

              <div class="modal fade" id="tulistesti<?= $row['id_booking'];?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Tulis Testimoni Anda</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div> 
                    <div class="modal-body">
                      <form action="prosesPesan.php" method="POST">
                        <input type="hidden" name="id_user" value="<?= $row['id_user']?>">
                        <input type="hidden" name="id_booking" value="<?= $row['id_booking']?>">
                        <div class="form-group row m-1">  
                          <label class="col-form-label">Keterangan</label> <br>       
                          <textarea class="form-control" name="keterangan" required></textarea>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                          <button type="submit" name="testi" class="btn btn-success">Simpan</button>
                        </div>
                      </form>
                    </div> 

                  </div> 
                </div>
              </div>

              <div class="modal fade" id="detail<?= $row['id_booking'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="modal-content">
                    <div class="modal-header alert-unguu">
                      <h5 class="modal-title" id="exampleModalLabel" style="color:black;">Detail Data Pemesanan</h5>
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
                          <input type="text" class="form-control" id="inputtext4" readonly value="<?= $row['no_telp']?>" style="color: #000;">
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

              <!-- modal pilih bayar -->
              <div class="modal fade" id="pilihbayar<?= $row['id_booking'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="modal-content">
                    <div class="modal-header bg-info">
                      <h5 class="modal-title" id="exampleModalLabel" style="color:white; font-size: 18px;">Pilih Pembayaran</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body"> 
                      <form action="prosesPesan.php" method="POST">
                      <div class="row">
                        <input type="hidden" name="id_booking" value="<?= $row['id_booking']?>">
                        <input type="hidden" name="harga" value="<?= $row['harga']?>">
                        <div class="col-lg-12 text-center">
                          <button type="submit" class="btn btn-sm btn-danger" data-dismiss="modal" data-toggle="modal" data-target="#exampleModal<?= $row['id_booking'];?>">Pembayaran DP</button>&nbsp&nbsp&nbsp
                          <button type="submit" name="lunas" class="btn btn-sm btn-info pull-right">Pembayaran Lunas</button>
                        </div> 
                      </div> 
                    </form>
                    </div>
                  </div>
                </div>
              </div>

              <!-- modal dp -->
              <div class="modal fade" id="exampleModal<?= $row['id_booking'];?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Jumlah Pembayaran DP</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div> 
                    <div class="modal-body">
                      <h5>Minimal DP : Rp. 500.000</h5> 
                      

                        <form action="prosesPesan.php" method="POST" enctype="multipart/form-data"> 
                          <input type="hidden" name="id_booking" value="<?= $row['id_booking']?>">
                        <div class="form-group row">
                          <label class="col-form-label col-md-3 col-sm-3 ">Jumlah DP</label>
                          <div class="col-md-9 col-sm-9 ">
                            <input type="text" name="jumlah" placeholder="Masukkan jumlah yang akan ditransfer" class="form-control" onkeypress="return hanyaAngka(event)" maxlength="8" style="color: black;" required>
                            <p style="color: red;">Tulis hanya angka tanpa titik atau koma, Misal : 2000000</p>  
                          </div>
                        </div>
                        <div class="col-lg-12 text-right">
                          <button type="submit" class="btn btn-sm btn-danger" data-dismiss="modal">Batal</button>&nbsp&nbsp&nbsp
                          <button type="submit" name="dp" class="btn btn-sm btn-info pull-right">Lanjutkan</button>
                        </div> 
                      </form>

                    </div>
                  </div> 
                </div>
              </div>
            <?php } ?> 
          </table> 
        </div> 

      </div>
    </div> 
  </div>
</div>
</section>



<?php }
?>

<!--/ Header end -->


<?php include 'User/footer.php'; ?>







<!-- modal bukti transfer -->
<div class="modal fade" id="buktitf" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div> 
      <div class="modal-body">
        <?php
        $id = $_SESSION['id'];  
        $query = mysqli_query($koneksi, "SELECT * FROM booking JOIN user ON booking.id_user = user.id_user JOIN paket ON booking.id_paket = paket.id_paket WHERE booking.id_user='$id' AND booking.status = 'Menunggu Bukti Transfer'");
        $no = 1;
        $jumlahTotal=0; foreach($query as $row ) { ?>

          <form action="prosesPesan.php" method="POST" enctype="multipart/form-data"> 
            <input type="hidden" name="id_booking" value="<?= $row['id_booking']?>">
          <?php } ?> 
          <div class="row">
            <div class="col-md-12">
             <h4><center>Pembayaran</center></h4>
             <p style="font-size:15px">Batas waktu Pembayaran Anda 24 jam. Silahkan lakukan pembayaran ke bank di bawah ini :</p>
             <p style="font-size:14px; color:red; margin-top:-10px"><i><b>Catatan : Uang yang sudah ditransfer tidak bisa dikembalikan</i></b></p>
             <div class="card">
              <div class="card-body">
                <div class="row col-md-12">
                  <div class="col-md-6 text-center">
                    <img src="assets/images/mandiri.png" style="width:100%">
                  </div>
                  <div class="col-md-6">
                   <p class="card-text mb-2">Nama Bank : <b>Mandiri</b></p>
                   <p class="card-text mb-2">Nomor Rekening : <b>9876543210</b></p>
                   <p class="card-text">Atas Nama : <b>Dyah Ayu Lenita</b></p>
                 </div>
               </div>

             </div> 

           </div>
           <br>
           <div class=" col md-6 text-right">
            <button type="button"  data-dismiss="modal" class="btn btn-danger btn-sm" >Kembali</button>&nbsp&nbsp&nbsp
            <button type="button" class="btn btn-info btn-sm" data-dismiss="modal" data-toggle="modal" data-target="#kirimtf">Konfirmasi Pesanan
            </button>
          </div> 
        </div>
      </div>
    </form>

  </div>
</div> 
</div>
</div>

<div class="modal fade" id="kirimtf" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Bukti Transfer</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?php
        $id = $_SESSION['id'];  
        $query = mysqli_query($koneksi, "SELECT * FROM booking JOIN user ON booking.id_user = user.id_user JOIN paket ON booking.id_paket = paket.id_paket WHERE booking.id_user='$id' AND booking.status = 'Menunggu Bukti Transfer'");
        $no = 1; 
        $jumlahTotal=0; foreach($query as $row ) { ?>

          <form action="prosesPesan.php" method="POST" enctype="multipart/form-data"> 
            <input type="hidden" name="id" value="<?= $row['id_user']?>">
          <?php } ?> 
          <div class="form-group row">
            <label class="col-form-label col-md-12 col-sm-12 ">Masukkan bukti transfer</label><br>
            <div class="col-md-12 col-sm-12 ">
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
                  var output = document.getElementById('prevbaru');
                  output.src = URL.createObjectURL(event.target.files[0]);
                  output.onload = function () {
                    URL.revokeObjectURL(output.src)
                  }
                };
              </script>
            </div>
            <br>
          </div>
          <img src="" class="mx-auto d-block img-thumbnail" id="prevbaru">
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Batal</button>
            <button type="submit" name="bayar" class="btn btn-sm btn-info pull-right" onclick="return confirm('Apakah anda yakin data sudah benar?')"><i class="fa fa-save"></i> Simpan Gambar</button>
          </div>   
        </form>
      </div>
      
    </div>
  </div>
</div>

<div class="modal fade" id="selesaitesti" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div> 
      <div class="modal-body">
       <p style="font-size:17px"><center><b>Terimakasih, testimoni untuk pesanan ini sudah ada</b></center></p>
     </div> 

   </div> 
 </div>
</div>

<script type="text/javascript">

  function hanyaAngka(evt) {
    var charCode = (evt.which) ? evt.which : event.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57))

      return false;
    return true;
  }
</script>