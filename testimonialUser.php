<?php include 'User/header.php'; ?>
<?php include 'User/navbar.php'; ?>
<!--/ Header end -->
<div id="banner-area" class="banner-area" style="background-image:url(assets/images/testiii.jpg); background-attachment: fixed;">
  <div class="banner-text">
    <div class="container">
        <div class="row">
          <div class="col-lg-12">
              <div class="banner-heading">
                <h1 class="banner-title" style="font-size:45px">Testimonial</h1>
                
              </div>
          </div><!-- Col end -->
        </div><!-- Row end -->
    </div><!-- Container end -->
  </div><!-- Banner text end -->
</div><!-- Banner area end --> 

<section id="main-container" class="main-container">
   <div class="container">
      <div class="row text-center">
         <div class="col-12">
            <h3 class="section-sub-title mb-4" style="font-size:25px;font-family: Book Antiqua;">Apa Yang klien Katakan ?</h3>
         </div>
      </div>
      <!--/ Title row end -->

      <div class="row">
        <?php
          $no = 1;
          $query = mysqli_query($koneksi, "SELECT * FROM testimoni JOIN user ON testimoni.id_user = user.id_user ORDER BY id_testimoni DESC");
          foreach($query as $row ) { ?> 
         <div class="col-lg-4 col-md-6">
            <div class="quote-item quote-border mt-5">
               <div class="quote-text-border">
                   <?= $row['keterangan'];?>
               </div>

               <div class="quote-item-footer">
                  <img loading="lazy" class="testimonial-thumb" src="assets/images/<?= $row['foto']?>" alt="testimonial">
                  <div class="quote-item-info">
                     <h3 class="quote-author"><?= $row['nama']?></h3>
                     <span class="quote-subtext"><?= tanggal_indonesia($row['tgl_upload'])?></span>
                  </div>
               </div>
            </div><!-- Quote item end -->
         </div><!-- End col md 4 -->
         <?php } ?>
      </div><!-- Content row end -->
   </div><!-- Container end -->
</section><!-- Main container end -->
<?php include 'User/footer.php'; ?>