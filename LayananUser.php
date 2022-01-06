<?php include 'User/header.php'; ?>
<?php include 'User/navbar.php'; ?>
<!--/ Header end -->
<div id="banner-area" class="banner-area" style="background-image:url(assets/images/bglynn.jpg); background-attachment: fixed;">
  <div class="banner-text">
    <div class="container">
        <div class="row">
          <div class="col-lg-12">
              <div class="banner-heading">
                <h1 class="banner-title" style="font-size:45px">Layanan</h1>
                
              </div>
          </div><!-- Col end -->
        </div><!-- Row end -->
    </div><!-- Container end -->
  </div><!-- Banner text end -->
</div><!-- Banner area end --> 

<section id="ts-service-area" class="ts-service-area pb-0">
  <div class="container">
    <div class="row text-center">
      <div class="col-12">
        <h2 class="section-title"></h2>
        <h3 class="section-sub-title" style="font-family: Book Antique; font-size: 35px;">Layanan Kami</h3>
      </div>
    </div>
    <!--/ Title row end -->

    <div class="row">
      <?php 
      $no = 1;
      $query = mysqli_query($koneksi, "SELECT * FROM layanan ORDER BY id DESC");
      foreach($query as $row ) { ?>
        <div class="col-lg-4 col-md-6 mb-5">
          <div class="ts-service-box">
            <div class="d-flex">
              <div class="ts-service-box-img">
                <img loading="lazy" src="assets/images/<?= $row['gambar']?>" alt="service-icon" style="width: 80px;">
              </div>
              <div class="ts-service-info">
                <h3 class="service-box-title"><?= $row['nama_layanan']?></h3>
                <!--  <a class="learn-more d-inline-block" href="service-single.html" aria-label="service-details"><i class="fa fa-caret-right"></i> Learn more</a> -->
              </div>
            </div>
          </div><!-- Service1 end -->
        </div><!-- Col 1 end -->
      <?php } ?>
    </div>   
    <!--/ Container end -->
</section><!-- Service end -->


<?php include 'User/footer.php'; ?>