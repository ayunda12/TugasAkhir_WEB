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
  <section id="main-container" class="main-container">
    <div class="container">
      <div class="row">
        <div class="col-md-2">
        </div>
        <div class="col-md-8">
         <h3><center>Pembayaran</center></h3>
         <p style="font-size:17px">Batas waktu Pembayaran Anda 24 jam. Silahkan lakukan pembayaran ke bank di bawah ini :</p>
         <p style="font-size:14px; color:red; margin-top:-10px"><i><b>Catatan : Uang yang sudah ditransfer tidak bisa dikembalikan</i></b></p>
         <div class="card">
          <div class="card-body">
            <div class="row col-md-12">
              <div class="col-md-6 text-center">
                <img src="assets/images/mandiri.png" style="width:180px">
              </div>
              <div class="col-md-6">
               <p class="card-text mb-2">Nama Bank &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp: Mandiri</p>
               <p class="card-text mb-2">No Rekening : 9876543210</p>
               <p class="card-text">Atas Nama &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp: Dyah Ayu Lenita</p>
             </div>
           </div>

         </div>
         
       </div>
       <br>
       <div class=" col md-6 text-right">
        <a href="Pesanan.php" class="btn btn-danger btn-sm" >Kembali</a>
        <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#pilihbayar">Konfirmasi Pesanan
        </button>
      </div> 
      </div>
      <div class="col-md-2">
      </div>
      </div>
    </div>
</section>

<?php }
?>

<!--/ Header end -->


<?php include 'User/footer.php'; ?>

<div class="modal fade" id="pilihbayar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Bukti Transfer</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="prosesPesan.php" method="POST" enctype="multipart/form-data"> 
          <input type="hidden" name="id" value="<?php echo $row['id_user']; ?>">   
          <div class="form-group row">
            <label class="col-form-label col-md-12 col-sm-12 ">Masukkan bukti transfer</label><br>
            <div class="col-md-12 col-sm-12 ">
              <div class="custom-file">
                <input type="file" name="foto" class="custom-file-input" id="filee" aria-describedby="inputGroupFileAddon01" onChange="loadFile(event)" accept="image/jpeg,image/jpg,image/png,">
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