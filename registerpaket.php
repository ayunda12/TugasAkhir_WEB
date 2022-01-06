
<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Dyah Ayu Salon</title>
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
          <form action="cek_registerpaket.php" method="POST" onsubmit="return validation()">
            <h1>Form Register</h1>

              <?php 
            if(isset($_GET['pesan'])){
              if($_GET['pesan'] == "usernamesama"){
                echo "<script>alert('Maaf, Username sudah terdaftar, silahkan tulis username lain!')</script>";
              }else if($_GET['pesan'] == "berhasil"){
                echo '<div class="alert alert-success alert-dismissible" role="alert" style="font-size:15px">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                </button>Maaf, registrasi tidak berhasil !</div>';
              }
           }
           ?> 
            <div>
              <input type="text" class="form-control" name="nama" placeholder="Nama lengkap" id="nama" onkeypress="return (event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || (event.charCode==32)" required />
            </div>
            <div>
              <input type="text" class="form-control" name="username" placeholder="Username" required />
            </div>
            <div>
              <input type="password" class="form-control" minlength="5" name="password" placeholder="Password" required />
            </div>
            <div>
              <input type="text" class="form-control" name="no_telp" placeholder="No HP / WA" id="nama" required onkeypress="return hanyaAngka(event)" maxlength="13"/>
            </div> 
            <div>
              <input type="submit" name="submit" value="Daftar" class="btn btn-primary" onclick="return confirm('Apakah anda yakin data sudah benar?')" style="float: right;">
            </div>
            <div class="clearfix"></div>
            <div class="separator">
              <p class="change_link">Sudah punya akun?
                <a href="loginpaket.php" class="to_register" style="color:blue"> Login </a>
              </p>
              <div class="clearfix"></div>
              <br />
            </div>
          </form>
        </section>
      </div>
    </div>
  </div>
</body>
</html>

<script type="text/javascript">
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

  function hanyaAngka(evt) {
      var charCode = (evt.which) ? evt.which : event.keyCode
       if (charCode > 31 && (charCode < 48 || charCode > 57))
 
        return false;
      return true;
    }
</script>
