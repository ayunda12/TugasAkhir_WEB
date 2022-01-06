  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="index.html" class="site_title"> 
                <span>Dyah Ayu Salon
                </span>
              </a>
            </div>
            <div class="clearfix">
            </div>
            <?php 
            $id = $_SESSION['id']; // mengambil username dari session yang login
            $sql = $koneksi->query("SELECT * FROM user WHERE id_user='$id'"); // query memilih entri username pada database
            if(mysqli_num_rows($sql) == 0){
            }else{
              $row = mysqli_fetch_assoc($sql);
            }
            ?>
            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <a href="" data-toggle="modal" data-target="#caridata">
                <img src="assets/images/<?php echo $row['foto']; ?>" alt="..." class="img-circle profile_img" style="width: 70px; height:70px;">
              </a>
              </div>
              <div class="profile_info">
                <span>Selamat Datang,
                </span>
                <h2>
                  <?php echo $row['nama']; ?>
                </h2>
              </div>
            </div>
            <!-- /menu profile quick info -->
            <br />
            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <ul class="nav side-menu">
                  <li>
                    <a href="dashboard.php">
                      <i class="fa fa-home">
                      </i> Beranda
                    </a>
                  </li>
                  <li>
                    <a href="pelanggan.php">
                      <i class="fa fa-users">
                      </i> Pelanggan
                    </a>
                  </li>
                  <li>
                    <a href="layanan.php">
                      <i class="fa fa-file">
                      </i> Layanan
                    </a>
                  </li>
                  <li>
                    <a href="paket.php">
                      <i class="fa fa-briefcase">
                      </i> Paket Pernikahan

                    </a>
                  </li>
                  <li>
                    <a href="galeri.php">
                      <i class="fa fa-image">
                      </i> Galeri
                    </a>
                  </li>
                  <li>
                    <a href="testimoni.php">
                      <i class="fa fa-users">
                      </i> Testimoni
                    </a>
                  </li>
                  <li>
                    <a href="booking.php">
                      <i class="fa fa-dollar">
                      </i> Pemesanan Paket
                    </a>
                  </li>
                  <li>
                    <a href="laporan.php">
                      <i class="fa fa-files-o">
                      </i> Laporan
                    </a>
                  </li>
                  <li>
                    <a href="Logout.php" onclick="return confirm('Apakah anda yakin akan keluar?')">
                      <i class="fa fa-sign-out">
                      </i> Logout
                    </a>
                  </li>
                </ul>
              </div>
              <div class="sidebar-footer hidden-small">
                <a data-toggle="tooltip" data-placement="top" >
                  <span class="glyphicon glyphicon-" aria-hidden="true"></span>
                </a>
                <a data-toggle="tooltip" data-placement="top" >
                  <span class="glyphicon glyphicon-" aria-hidden="true"></span>
                </a>
                <a data-toggle="tooltip" data-placement="top" >
                  <span class="glyphicon glyphicon-eye-" aria-hidden="true"></span>
                </a>
                <a data-toggle="tooltip" data-placement="top">
                  <span class="glyphicon glyphicon-" aria-hidden="true"></span>
                </a>
              </div>
            </div>
          </div>
        </div>

        <div class="modal fade" id="caridata" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-info">
        <h5 class="modal-title" id="exampleModalLabel" style="color:white">Foto profil</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body"> 
        <form action="ubahfotoprofil.php" method="POST" enctype="multipart/form-data"> 
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
            <button type="submit" name="submit" class="btn btn-sm btn-primary pull-right" onclick="return confirm('Apakah anda yakin data sudah benar?')"><i class="fa fa-save"></i> Ubah Foto</button>
          </div>  
        </form>
      </div>
    </div>
  </div>
</div>

