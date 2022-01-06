

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
  if(isset($_GET['pesan'])){
    if($_GET['pesan'] == "alamat"){
      echo "<script>alert('Mohon Lengkapi Data Alamat Anda Terlebih Dahulu di Halaman Profil Anda!!');</script>";
    }
  }
  ?>

<section id="project-area" class="project-area">
  <div class="container">
    <div class="row">

      <div class="col-md-6">
        <?php  
        if(isset($_GET['pesan'])){
          if($_GET['pesan'] == "berhasil"){
            echo '<div class="alert alert-success alert-dismissible" role="alert" style="font-size:15px; width : 500px">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
            </button>Data Berhasil diubah !</div>';
          } else if ($_GET['pesan'] == "gagal"){
            echo '<div class="alert alert-danger alert-dismissible" role="alert" style="font-size:15px; width : 500px">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
            </button>Data Gagal diubah !</div>';
          }else if ($_GET['pesan'] == "size"){
            echo '<div class="alert alert-danger alert-dismissible" role="alert" style="font-size:15px; width : 500px">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
            </button>Size file tidak boleh lebih dari 5 mb !</div>';
          }
        }
        ?> 


        <div class="x_panel">     
          <h5 class="alert alert-info" style="font-size: 20px; color: white; background: #3759ff;">Perbarui Profil Anda</h5> 
          <?php
        $id = $_SESSION['id']; // mengambil username dari session yang login
        $sql = $koneksi->query("SELECT * FROM user WHERE id_user='$id'"); // query memilih entri username pada database
        if(mysqli_num_rows($sql) == 0){
        }else{
          $row = mysqli_fetch_assoc($sql);
        }
        ?>
        
        <a href ="" class="center" data-toggle="modal" data-target="#caridata" >
          <img src="assets/images/<?= $row['foto']; ?>" style="width: 35%; margin-bottom: 10px;" class="mx-auto d-block img-thumbnail" id="">
        </a>
        <form action="ubahprofiluser.php" method="POST" enctype="multipart/form-data" onsubmit="return validation()">
          <input type="hidden" name="id" value="<?php echo $row['id_user']; ?>">
          <div class="form-group row">
            <label class="col-form-label col-md-3 col-sm-3 ">Nama</label>
            <div class="col-md-9 col-sm-9 ">
              <input type="text" name="nama" class="form-control" style="color: black;" value="<?php echo $row['nama']; ?>" onkeypress="return (event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || (event.charCode==32)" required>
            </div> 
          </div> 
          <div class="form-group row">
            <label class="col-form-label col-md-3 col-sm-3 ">Username</label>
            <div class="col-md-9 col-sm-9 ">
              <input type="text" name="username" class="form-control" style="color: black;" value="<?php echo $row['username']; ?>" required>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-form-label col-md-3 col-sm-3 ">No Hp/ WA</label>
            <div class="col-md-9 col-sm-9 ">
              <input type="text" onkeypress="return hanyaAngka(event)" maxlength="13" name="no_telp" class="form-control" style="color: black;" value="<?php echo $row['no_telp']; ?>" required>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-form-label col-md-3 col-sm-3 ">Alamat</label>
            <div class="col-md-9 col-sm-9 ">
             <textarea class="form-control" style="color: black;" name="alamat" required id="exampleFormControlTextarea1" rows="3"><?php echo $row['alamat']; ?></textarea>
           </div>
         </div>
         <div style="text-align: right;">

          <a href="ProfilUser.php" class="btn btn-danger btn-sm pull-right"><i class="fa fa-close"></i> Batal</a>
          <button type="submit" name="submit" class="btn btn-sm btn-info" onclick="return confirm('Apakah anda yakin data sudah benar?')"><i class="fa fa-save"></i> Simpan Data</button>
        </div>

        <div class="item form-group">
          <div class="col-md-12 col-sm-12 offset-md-12 ">

          </div>
        </div>
      </form>
    </div>
  </div>
  <div class="col-md-6">
    <?php 
    if(isset($_GET['pesan'])){
      if($_GET['pesan'] == "pwdtdksama"){
        echo '<div class="alert alert-danger alert-dismissible" role="alert" style="font-size:15px; width : 500px">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
        </button>Maaf, Password Baru tidak boleh sama dengan Password Lama !</div>';
      } else if ($_GET['pesan'] == "berhasilpwd"){
        echo '<div class="alert alert-success alert-dismissible" role="alert" style="font-size:15px; width : 500px">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
        </button>Password Berhasil diubah !</div>';
      }else if ($_GET['pesan'] == "gagalpwd"){
        echo '<div class="alert alert-danger alert-dismissible" role="alert" style="font-size:15px; width : 500px">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
        </button>Password Gagal diubah !</div>';
      }else if ($_GET['pesan'] == "gagalkonfirmasi"){
        echo '<div class="alert alert-danger alert-dismissible" role="alert" style="font-size:15px; width : 500px">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
        </button>Konfirmasi Password tidak sama !</div>';
      }else if ($_GET['pesan'] == "min"){
        echo '<div class="alert alert-danger alert-dismissible" role="alert" style="font-size:15px; width : 500px">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
        </button>Password baru kurang dari 5 karakter !</div>';
      }else if ($_GET['pesan'] == "pwdlamatdkcocok"){
        echo '<div class="alert alert-danger alert-dismissible" role="alert" style="font-size:15px; width : 500px">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
        </button>Maaf, Password Lama tidak sesuai !</div>';
      }
    }
    ?>  
    <div class="x_panel">     
      <h5 class="alert alert-info" style="font-size: 20px; color: white; background: #3759ff;">Perbarui Password Anda</h5> 
      <form action="ubahpassworduser.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $row['id_user']; ?>">

        <div class="form-group row">
          <label class="col-form-label col-md-3 col-sm-3 ">Password Lama</label>
          <div class="col-md-9 col-sm-9 ">
            <input type="password" class="form-control" name="password_lama" required>
          </div>
        </div>
        <div class="form-group row">
          <label class="col-form-label col-md-3 col-sm-3 ">Password Baru</label>
          <div class="col-md-9 col-sm-9 ">
            <input type="password" class="form-control" name="password_baru" minlength="5" required>
          </div>
        </div>
        <div class="form-group row">
          <label class="col-form-label col-md-3 col-sm-3 ">Konfirmasi Password</label>
          <div class="col-md-9 col-sm-9 ">
            <input type="password" class="form-control" minlength="5" name="konfirmasi_password" required>
          </div>
        </div>
        <div style="text-align: right;"> 
          <a href="ProfilUser.php" class="btn btn-danger btn-sm pull-right"><i class="fa fa-close"></i> Batal</a> &nbsp
          <button type="submit" name="submit" class="btn btn-sm btn-info btn-lg" onclick="return confirm('Apakah anda yakin data sudah benar?')"><i class="fa fa-save"></i> Ganti Password</button></div>
      </form>
    </div>
  </div>
</div>
</div>
</section>

<?php }
?>

<!--/ Header end -->




<?php include 'User/footer.php'; ?>
<div class="modal fade" id="caridata" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header bg-info">
        <h5 class="modal-title" id="exampleModalLabel" style="color:white; font-size: 18px;">Foto profil</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body"> 
        <form action="ubahfotoprofilUser.php" method="POST" enctype="multipart/form-data"> 
          <input type="hidden" name="id" value="<?php echo $row['id_user']; ?>">
          <img src="assets/images/<?= $row['foto']; ?>" style="margin-bottom: 15px;" class="mx-auto d-block img-thumbnail" id="prevbaru">
          <div class="form-group row">
            <label class="col-form-label col-md-3 col-sm-3 ">Ganti Foto</label>
            <div class="col-md-9 col-sm-9 ">
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
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Batal</button>
            <button type="submit" name="submit" class="btn btn-sm btn-info pull-right" onclick="return confirm('Apakah anda yakin data sudah benar?')"><i class="fa fa-save"></i> Ubah Foto</button>
          </div>  
        </form>
      </div>
    </div>
  </div>
</div>