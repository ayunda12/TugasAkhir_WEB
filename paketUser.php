<?php include 'User/header.php'; ?>
<?php include 'User/navbar.php'; ?>
<!--/ Header end -->
<!--  -->


<section id="main-container" class="main-container">
  <div class="container">
    <div class="row text-center">
      <div class="col-12">
        <h3 class="section-sub-title" style="font-size:30px; font-family: Book Antiqua;">Macam-macam Paket
         <br><img src="assets/images/clip.png" alt="service-icon" style="width:80px; margin-top: -5px;">
       </h3>
       <?php  
       if(isset($_GET['pesan'])){
        if($_GET['pesan'] == "tglsama"){
          echo '<script type="text/javascript">';
            echo ' alert("Maaf, Paket sudah dipesan untuk tanggal ini. Mohon pilih tanggal lain!!")';  //not showing an alert box.
            echo '</script>';
          } 
        }
        ?> 
      </div>
    </div>  
    <!--/ Title row end -->
    <div class="row row-cols-1 row-cols-md-3">
     <?php
     $no = 1;
     $query = mysqli_query($koneksi, "SELECT * FROM paket ORDER BY id_paket DESC");
     while ($row = mysqli_fetch_assoc($query)) 
      {?>
        <div class="col mb-4">
          <div class="card">
            <img src="assets/images/<?= $row['gambar']?>" class="card-img-top" alt="...">
            <div class="card-body" style="background-color: #aecff3; color: black;">
              <h4 class="card-title"><center><?= $row['nama_paket']?></center></h4>
              <p class="card-text"><?= $row['detail']?></p>
              <p style="text-align:right"><?= rupiah($row['harga'])?></p>
              <form method="POST">
                <input type="hidden" name="id_paket" value="<?= $row['id_paket']?>">
                <?php 
                if(!isset($_SESSION['id'])){?>
                  <a href="loginpaket.php?pesan=belum_login" type="button" class="btn btn-primary" >
                    Pesan
                  </a>
                <?php }else{ ?>
                  <?php
                  $id = $_SESSION['id']; // mengambil username dari session yang login
                  $sql = $koneksi->query("SELECT * FROM user WHERE id_user='$id'"); // query memilih entri username pada database
                  if(mysqli_num_rows($sql) == 0){
                  }else{
                    $roww = mysqli_fetch_assoc($sql);
                  }
                  ?>
                 <?php if($roww['alamat'] == ""){ ?>
                  <a href="ProfilUser.php?pesan=alamat" type="button" class="btn btn-primary">
                  Pesan
                </a>
                 <?php }else{?>
                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal<?= $row['id_paket']?>">
                  Pesan
                </button>
                 <?php }
                 ?>
                 
              <?php }
              ?>
            </form>
            <div class="modal fade" id="exampleModal<?= $row['id_paket']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Pilih Tanggal Acara</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div> 
                  <div class="modal-body"> 
                    <?php
                      $id = $_SESSION['id']; // mengambil username dari session yang login
                      $sql = $koneksi->query("SELECT * FROM user WHERE id_user='$id'"); // query memilih entri username pada database
                      if(mysqli_num_rows($sql) == 0){
                      }else{
                        $roww = mysqli_fetch_assoc($sql);
                      }
                      ?>
                      <form action="prosesPesan.php" method="POST">
                       <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-4 col-form-label">Tanggal Acara</label>
                        <div class="col-sm-8">
                          <input type="hidden" name="id_paket" value="<?= $row['id_paket']?>">
                          <input type="hidden" name="harga" value="<?= $row['harga']?>">


                          <input type="hidden" name="id_user" value="<?= $roww['id_user']?>">
                          <!-- <input type="date" id="datepicker" name="tgl_acara" class="form-control" required> -->
                          <input type="date" name="tgl_acara" class="form-control" required/>

                        </div>
                      </div>  
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" name="submit" class="btn btn-primary" onclick="return confirm('Apakah anda yakin akan memesan paket ini?')">Pesan Sekarang</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>


    <?php } ?>
  </div>
</div><!-- Conatiner end -->
</section><!-- Main container end -->



<section style="background-color: #70caff;height: 100px; padding-top: 0px; ">

<div class="row text-center">
  <div class="col-md-12 text-center ">
    <div class="call-to-action-text">
      <h1 class="action-title" style="font-size:18px; color: black; margin-top: 20px;"><i>“Rencanakan Momen Sakral Pernikahan dengan WO terbaik” </i></h1>
    </div>
  </div>
</div>
</div><!-- Conatiner end -->
</section><!-- Main container end -->

<?php include 'User/footer.php'; ?>


