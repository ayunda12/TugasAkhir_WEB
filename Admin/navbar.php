<div class="top_nav">
  <div class="nav_menu">
    <div class="nav toggle">
      <a id="menu_toggle">
        <i class="fa fa-bars">
        </i>
      </a>
    </div>
    <nav class="nav navbar-nav">
      <ul class=" navbar-right">
        <li class="nav-item dropdown open" style="padding-left: 15px;">
        <?php
        $id = $_SESSION['id']; // mengambil username dari session yang login
        $sql = $koneksi->query("SELECT * FROM user WHERE id_user='$id'"); // query memilih entri username pada database
        if(mysqli_num_rows($sql) == 0){
        }else{
          $row = mysqli_fetch_assoc($sql);
        }
        ?>
        <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
          <img src="assets/images/<?= $row['foto']; ?>" alt="">
          <?= $row['nama']; ?>
        </a>
        <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
          <a class="dropdown-item"  href="profil.php"> <i class="fa fa-user pull-right">
          </i>Profil
        </a>
        <a class="dropdown-item" href="logout.php" onclick="return confirm('Apakah anda yakin akan keluar?')">
          <i class="fa fa-sign-out pull-right">
          </i> Log Out
        </a>
      </div>
    </li>
  </ul>
</nav>
</div>
</div>