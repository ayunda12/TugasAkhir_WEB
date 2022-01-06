  <body>
    <div class="body-inner">
      <div id="top-bar" class="top-bar">
        <div class="container">
          <div class="row">
            <div class="col-lg-8 col-md-8">
              <ul class="top-info text-center text-md-left">
                <li><i class="fas fa-map-marker-alt"></i> <p class="info-text">Jl. Puring No.6, Beteng, Sidomekar, Semboro, Kabupaten Jember, Jawa Timur 68157</p>
                </li>
              </ul>
            </div>  
            <!--/ Top info end -->

            <div class="col-lg-4 col-md-4 top-social text-center text-md-right">
              <ul class="list-unstyled">
                <li>
                  <a href="https://facebook.com/dyahaiiyuw.makeup" target="_blank">
                    <span class="social-icon"><i class="fab fa-facebook-f"></i></span>
                  </a>
                  <a href="https://instagram.com/dyah_ayu_salon?utm_medium=copy_link" target="_blank">
                    <span class="social-icon"><i class="fab fa-instagram"></i></span>
                  </a>
                  <a href="https://api.whatsapp.com/send?phone=6285232249295" target="_blank">
                    <span class="social-icon"><i class="fab fa-whatsapp"></i></span>
                  </a>

                </li>
              </ul>
            </div>
            <!--/ Top social end -->
          </div>
          <!--/ Content row end -->
        </div>
        <!--/ Container end -->
      </div>
      <!--/ Topbar end -->
      <!-- Header start -->
      <header id="header" class="header-one">
        <div class="bg-white">
          <div class="container">
            <div class="logo-area">
              <div class="row align-items-center">
                <div class="col-lg-3 text-center text-lg-left mb-3 mb-md-5 mb-lg-0">
                  <a class="d-block" href="index.php" style="color:#e83e8c; font-family: inherit; font-size: 30px;">
                    <img class="image" src="assets/images/da.png" alt="Constra" style="width:30%"><b>DASalon</b>
                  </a>
                </div><!-- logo end -->

                <div class="col-lg-9 header-right">
                  <ul class="top-info-box">
                    <li>
                      <div class="info-box">
                        <div class="info-box-content">
                          <p class="info-box-title">Whatsapp </p>
                          <p class="info-box-subtitle"><a href="https://api.whatsapp.com/send?phone=6285232249295" target="_blank" style="color: black;">0852-3224-9295</a></p>
                        </div>
                      </div>
                    </li>
                    <li>
                      <div class="info-box">
                        <div class="info-box-content">
                          <p class="info-box-title">Instagram</p>
                          <p class="info-box-subtitle"><a href="https://instagram.com/dyah_ayu_salon?utm_medium=copy_link" target="_blank">@dyah_ayu_salon</a></p>
                        </div>
                      </div>
                    </li>
                    <li class="last">
                      <div class="info-box last">
                        <div class="info-box-content">
                          <p class="info-box-title">Facebook</p>
                          <p class="info-box-subtitle"><a href="https://facebook.com/dyahaiiyuw.makeup" target="_blank">Dyah Aiiyuw Salonn</a></p>
                        </div>
                      </div>
                    </li>
                    <!-- <li class="header-get-a-quote">
                      <a class="btn btn-primary" href="login.php">Login</a>
                    </li> -->
                  </ul><!-- Ul end -->
                </div><!-- header right end -->
              </div><!-- logo area end -->

            </div><!-- Row end -->
          </div><!-- Container end -->
        </div>

        <div class="site-navigation">
          <div class="container">
            <div class="row">
              <div class="col-lg-12">
                <nav class="navbar navbar-expand-lg navbar-dark p-0">
                  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".navbar-collapse" aria-controls="navbar-collapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                  </button>

                  <div id="navbar-collapse" class="collapse navbar-collapse">
                    <ul class="nav navbar-nav mr-auto">
                      <li class="nav-item"><a class="nav-link" href="index.php">Beranda</a></li>
                      <li class="nav-item"><a class="nav-link" href="LayananUser.php">Layanan</a></li>
                      <li class="nav-item"><a class="nav-link" href="paketUser.php">Paket Pernikahan</a></li>
                      <li class="nav-item"><a class="nav-link" href="galeriUser.php">Galeri</a></li>
                      <li class="nav-item"><a class="nav-link" href="testimonialUser.php">Testimonial</a></li>
                      <li class="nav-item"><a class="nav-link" href="kontakUser.php">Kontak Kami</a></li>

 
                      <?php 
                      if(!isset($_SESSION['id'])){?>
                        <li class="nav-item"><a class="nav-link" href="login.php">Login</a></li>

                      <?php }else{ 


                        $id = $_SESSION['id']; // mengambil username dari session yang login
                        $sql = $koneksi->query("SELECT * FROM user WHERE id_user='$id'"); // query memilih entri username pada database
                        if(mysqli_num_rows($sql) == 0){
                        }else{
                          $row = mysqli_fetch_assoc($sql);
                        }
                        ?>
                        <li class="nav-item"><a class="nav-link" style="font-size:10px; margin-right: -15px"><img class="img img-responsive rounded-circle mb-3 mt-2 ml-5" width="30" src="assets/images/<?= $row['foto']; ?>"></a></li>
                        <li class="nav-item dropdown">
                          <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown"> <?= $row['username']; ?> <i class="fa fa-angle-down"></i></a>
                          <ul class="dropdown-menu" role="menu">
                            <li><a href="ProfilUser.php">Profil</a></li>
                           <!--  <li><a href="pembayaran.php">Pembayaran</a></li> -->
                            <li><a href="Pesanan.php">Pesanan Saya</a></li>
                            <li><a href="logout.php" onclick="return confirm('Apakah anda yakin akan keluar?')">Logout</a></li>
                          </ul>
                        </li>
                      <?php }
                      ?>
                    </ul>
                  </div> 
                </nav>  
              </div>
              <!--/ Col end -->
            </div>
            <!--/ Row end -->
              <div class="search-block" style="display: none;">
                <label for="search-field" class="w-100 mb-0">
                  <input type="text" class="form-control" id="search-field" placeholder="Type what you want and enter">
                </label>
                <span class="search-close">&times;</span>
              </div><!-- Site search end -->
          </div>
        </div>
    <!--/ Navigation end -->
      </header>

  <!--/ Header end -->