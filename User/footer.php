<footer id="footer" class="footer bg-overlay" style="color:white">
  <div class="footer-main">
    <div class="container">
      <div class="row justify-content-between">
        <div class="col-lg-4 col-md-6 footer-widget footer-about">
          <h3 class="widget-title">Tentang Kami</h3>
          <a href="index.php">
          <img loading="lazy" class="image" src="assets/images/da.png" alt="Constra" style="width:30%"></a>
          <p>Jl. Puring No.6, Beteng, Sidomekar, Semboro, Kabupaten Jember, Jawa Timur 68157
            <br>Telepon: <a href="https://api.whatsapp.com/send?phone=6285232249295" style="color: white;">0852-3224-9295</a></p> 
          </div><!-- Col end -->
          <div class="col-lg-4 col-md-6 footer-widget mt-5 mt-md-0">
            <h3 class="widget-title">Jam Buka</h3>
            <div class="working-hours">

              Senin - Minggu : <span class="ml-5" >08.00 - 19:00 </span><br>
            </div>
          </div><!-- Col end -->
          <div class="col-lg-3 col-md-6 mt-5 mt-lg-0 footer-widget">
            <h3 class="widget-title">Ikuti Kami</h3>
            <div class="footer-social">
              <ul>
                <li><a href="https://facebook.com/dyahaiiyuw.makeup" aria-label="Facebook"><i
                  class="fab fa-facebook-f ml-4" style="color: pink;"></i></a>
                </li>
                <li><a href="https://instagram.com/dyah_ayu_salon?utm_medium=copy_link" aria-label="Instagram" aria-label="Instagram"><i
                  class="fab fa-instagram"  style="color: pink;"></i></a>
                </li>
              </ul>
            </div>
          </div><!-- Col end -->
        </div><!-- Row end -->
      </div><!-- Container end -->
    </div><!-- Footer main end -->

    <div class="copyright">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-md-6">
            <div class="copyright-info">
              <span>Copyright &copy; <script>
                document.write(new Date().getFullYear())
              </script>, Designed &amp; Developed by <a href="https://themefisher.com">Team 4 (TIF C)</a> with <i class="fa fa-heart"></i></span>
            </div>
          </div>
        </div><!-- Row end -->

        <div id="back-to-top" data-spy="affix" data-offset-top="10" class="back-to-top position-fixed">
          <button class="btn btn-primary" title="Back to Top">
            <i class="fa fa-angle-double-up"></i>
          </button>
        </div>

      </div><!-- Container end -->
    </div><!-- Copyright end -->
  </footer><!-- Footer end -->

  <!-- Javascript Files
    ================================================== -->

    <!-- initialize jQuery Library -->
    <script src="assets/plugins/jQuery/jquery.min.js"></script>
    <!-- Bootstrap jQuery -->
    <script src="assets/plugins/bootstrap/bootstrap.min.js" defer></script>
    <!-- Slick Carousel -->
    <script src="assets/plugins/slick/slick.min.js"></script>
    <script src="assets/plugins/slick/slick-animation.min.js"></script>
    <!-- Color box -->
    <script src="assets/plugins/colorbox/jquery.colorbox.js"></script>
    <!-- shuffle -->
    <script src="assets/plugins/shuffle/shuffle.min.js" defer></script>
    <script src="Admin/vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="Admin/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="Admin/vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="Admin/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="Admin/vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="Admin/vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="Admin/vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="Admin/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="Admin/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="Admin/vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="Admin/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="Admin/vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>


    <!-- Google Map API Key-->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCcABaamniA6OL5YvYSpB3pFMNrXwXnLwU" defer></script>
    <!-- Google Map Plugin-->
    <script src="assets/plugins/google-map/map.js" defer></script>
    <script type="text/javascript" src="ckeditor/ckeditor.js"></script>
    <!-- Template custom -->
    <script src="assets/js/script.js"></script>
    <script type="text/javascript">
     function hanyaAngka(evt) {
      var charCode = (evt.which) ? evt.which : event.keyCode
      if (charCode > 31 && (charCode < 48 || charCode > 57))

        return false;
      return true;
    }
    function validation(){
      var validasiHuruf = /^[a-zA-Z ]+$/;
      var nama = document.getElementById("nama");
      if (nama.value.match(validasiHuruf)) {
      } else {
        alert("Mohon mengisi inputan hanya huruf!");
        nama.value="";
        nama.focus();
        return false;
      }
    }
    
  </script>
</div><!-- Body inner end -->
</body>

</html>