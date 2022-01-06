
<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Dyah Ayu Salon </title>

  <!-- Bootstrap --> 
  <link href="Admin/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link href="Admin/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <!-- NProgress -->
  <link href="Admin/vendors/nprogress/nprogress.css" rel="stylesheet">
  <!-- Animate.css -->
  <link href="Admin/vendors/animate.css/animate.min.css" rel="stylesheet">

  <!-- Custom Theme Style -->
  <link href="Admin/build/css/custom.min.css" rel="stylesheet">
</head>
<body class="login">
  <div>
    <a class="hiddenanchor" id="signup"></a>
    <a class="hiddenanchor" id="signin"></a>

    <div class="login_wrapper">
      <div class="animate form login_form">

        <section class="login_content">
          <form action="ceklogin.php" method="POST">

            <h1>Form Login</h1>
            <?php 
            if(isset($_GET['pesan'])){
              if($_GET['pesan'] == "gagal"){
                echo '<div class="alert alert-danger alert-dismissible" role="alert" style="font-size:15px">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                </button>Maaf, username atau password salah !</div>';
              }else if($_GET['pesan'] == "berhasil"){
                echo '<div class="alert alert-success alert-dismissible" role="alert" style="font-size:15px">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                </button>Anda berhasil melakukan registrasi, silahkan login !</div>';
              }else if($_GET['pesan'] == "logout"){
                echo "Anda telah berhasil logout";
              }else if($_GET['pesan'] == "belum_login"){
               echo '<div class="alert alert-danger alert-dismissible" role="alert" style="font-size:15px">
               <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
               </button>Silahkan login terlebih dahulu!</div>';
             }
           }
           ?>
          <div> 
            <input type="text" class="form-control" name="username" placeholder="Username" required="" />
          </div>
          <div>
            <input type="password" class="form-control" minlength="5" name="password" placeholder="Password" required="" />
          </div>
          <div>
            <a href="index.php" value="Kembali" class="btn btn-sm btn-danger" style="float:left;"><i class="fa fa-arrow-left"></i> Kembali</a>
            <input type="submit" name="login" value="Masuk" class="btn btn-success" style="float:right;">
          </div>

          <div class="clearfix"></div>

          <div class="separator">
            <p class="change_link">Belum punya akun?
              <a href="register.php" class="to_register" style="color:blue"> Buat Akun Baru </a>
            </p>

            <div class="clearfix"></div>
            <br />

          </div>
        </form>
      </section>
    </div>

  </div>
</div>
<script src="Admin/vendors/jquery/dist/jquery.min.js"></script>

<script src="Admin/vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

<script src="Admin/vendors/fastclick/lib/fastclick.js"></script>

<script src="Admin/vendors/nprogress/nprogress.js"></script>

<script src="Admin/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>

<script src="Admin/vendors/iCheck/icheck.min.js"></script>
</body>
</html>
