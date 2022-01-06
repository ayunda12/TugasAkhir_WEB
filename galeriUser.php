<?php include 'User/header.php'; ?>
<?php include 'User/navbar.php'; ?>
<!--/ Header end -->
<div id="banner-area" class="banner-area" style="background-image:url(assets/images/glr.jpg); background-attachment: fixed;">
  <div class="banner-text">
    <div class="container">
        <div class="row">
          <div class="col-lg-12">
              <div class="banner-heading">
                <h1 class="banner-title" style="font-size:45px; ">Galeri</h1>
                
              </div>
          </div><!-- Col end -->
        </div><!-- Row end -->
    </div><!-- Container end -->
  </div><!-- Banner text end -->
</div><!-- Banner area end --> 

<section id="project-area" class="project-area solid-bg">
    <div class="container">
      <div class="row text-center">
        <div class="col-lg-12">

          <h3 class="section-sub-title" style="font-size:35px;font-family: Book Antique;">Galeri Kami
          </h3>
        </div>
      </div>
      <!--/ Title row end -->

      <div class="row">
        <div class="col-12">


 
          <div class="row shuffle-wrapper">
            <div class="col-1 shuffle-sizer"></div>
            <?php  
           $batas = 12;
           $halaman = isset($_GET['halaman'])?(int)$_GET['halaman'] : 1;
           $halaman_awal = ($halaman>1) ? ($halaman * $batas) - $batas : 0;  

           $previous = $halaman - 1;
           $next = $halaman + 1;

           $data = mysqli_query($koneksi,"select * from galeri");
           $jumlah_data = mysqli_num_rows($data);
           $total_halaman = ceil($jumlah_data / $batas);
           

           $query = mysqli_query($koneksi, "SELECT * FROM galeri ORDER BY id DESC limit $halaman_awal, $batas");
           $nomor = $halaman_awal+1;
           foreach($query as $row ) { ?>
            <div class="col-lg-4 col-md-6 shuffle-item" data-groups="[&quot;government&quot;,&quot;healthcare&quot;]">
              <div class="project-img-container">
                <a class="gallery-popup" href="assets/images/<?= $row['foto']?>" aria-label="project-img">
                  <img class="img-fluid" src="assets/images/<?= $row['foto']?>" alt="project-img">
                  <span class="gallery-icon"><i class="fa fa-plus"></i></span>
                </a>
                <div class="project-item-info">
                  <div class="project-item-info-content">
                    <h3 class="project-item-title">
                      <a><?= $row['keterangan']?></a>
                    </h3>
                  </div>
                </div>
              </div>
            </div><!-- shuffle item 1 end -->
             <?php } ?>
            
          </div><!-- shuffle end -->
        </div>
         <div class="col-12">
        <br>
        <nav>
            <ul class="pagination justify-content-center">
              <li class="page-item ">
                <a class="page-link" style="color: black" <?php if($halaman > 1){ echo "href='?halaman=$previous'"; } ?>>Previous</a>
              </li>
              <?php 
              for($x=1;$x<=$total_halaman;$x++){
                ?> 
                <li class="page-item"><a style="color: black" class="page-link" href="?halaman=<?php echo $x ?>"><?php echo $x; ?></a></li>
                <?php
              }
              ?>        
              <li class="page-item">
                <a style="color: black"  class="page-link" <?php if($halaman < $total_halaman) { echo "href='?halaman=$next'"; } ?>>Next</a>
              </li>
            </ul>
          </nav>
        </div>
      </div><!-- Content row end -->
    </div>
    <!--/ Container end -->
  </section><!-- Project area end -->

<?php include 'User/footer.php'; ?>