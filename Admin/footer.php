<footer>
  <div class="center">
    <span>Copyright &copy; 
      <script>
        document.write(new Date().getFullYear())
      </script>, Design &amp; Development by Team 4 (TIF C) with 
      <i class="fa fa-heart">
      </i>
    </span> 
  </div>
  <div class="clearfix">
  </div>
</footer>
<!-- /footer content -->
</div>
</div>
<!-- jQuery -->
<script src="Admin/vendors/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="Admin/vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<!-- FastClick -->
<script src="Admin/vendors/fastclick/lib/fastclick.js"></script>
<!-- NProgress -->
<script src="Admin/vendors/nprogress/nprogress.js"></script>
<!-- bootstrap-progressbar -->
<script src="Admin/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
<!-- iCheck -->
<script src="Admin/vendors/iCheck/icheck.min.js"></script>
<!-- bootstrap-daterangepicker -->
<script src="Admin/vendors/moment/min/moment.min.js"></script>
<script src="Admin/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- bootstrap-wysiwyg -->
<script src="Admin/vendors/bootstrap-wysiwyg/js/bootstrap-wysiwyg.min.js"></script>
<script src="Admin/vendors/jquery.hotkeys/jquery.hotkeys.js"></script>
<script src="Admin/vendors/google-code-prettify/src/prettify.js"></script>
<!-- jQuery Tags Input -->
<script src="Admin/vendors/jquery.tagsinput/src/jquery.tagsinput.js"></script>
<!-- Switchery -->
<script src="Admin/vendors/switchery/dist/switchery.min.js"></script>
<!-- Select2 -->
<script src="Admin/vendors/select2/dist/js/select2.full.min.js"></script>
<!-- Parsley -->
<script src="Admin/vendors/parsleyjs/dist/parsley.min.js"></script>
<!-- Autosize -->
<script src="Admin/vendors/autosize/dist/autosize.min.js"></script>
<!-- jQuery autocomplete -->
<script src="Admin/vendors/devbridge-autocomplete/dist/jquery.autocomplete.min.js"></script>
<!-- starrr -->
<script src="Admin/vendors/starrr/dist/starrr.js"></script>
<!-- Custom Theme Scripts -->

<!-- lightbox -->

 
<!--datatable -->
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
<script src="Admin/vendors/jszip/dist/jszip.min.js"></script>
<script src="Admin/vendors/pdfmake/build/pdfmake.min.js"></script>
<script src="Admin/vendors/pdfmake/build/vfs_fonts.js"></script>
<script type="text/javascript" src="ckeditor/ckeditor.js"></script>
<script src="Admin/build/js/custom.min.js"></script>
<script type="text/javascript">
 function hanyaAngka(evt) {
  var charCode = (evt.which) ? evt.which : event.keyCode
  if (charCode > 31 && (charCode < 48 || charCode > 57))

    return false; 
  return true;
}
 

$(function(){
setInterval(timestamp, 1000);//fungsi yang dijalan setiap detik, 1000 = 1 detik
});

//Fungi ajax untuk Menampilkan Jam dengan mengakses File ajax_timestamp.php
function timestamp() {
  $.ajax({
    url: 'ajax_timestamp.php',
    success: function(data) {
      $('#timestamp').html(data);
    },
  });
}


</script>
</body>
</html>
