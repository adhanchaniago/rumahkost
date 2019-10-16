  <?php include '..\templates\linkheader.php' ?>

  <!--Main Navigation-->
  <header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary py-2 shadow-none">
      <div class="container">

        <a class="navbar-brand py-0" href="">
          Cost <span style="font-size:25px" class="font-weight-bold">Kost</span>an
        </a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navResponsive" aria-controls="navResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse ml-4" id="navResponsive">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item">
              <input class="form-control form-control-sm ml-4" type="text" placeholder="Search" style="width:190px">
            </li>
          </ul>
          <ul class="navbar-nav nav-flex-icons">

            <!-- Jika ada sesi Login -->
            <li class="nav-item dropdown">
              <a class="nav-link" id="mobil" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="badge badge-light shadow-none mr-2"></span>
                <span style="font-size:15px" class="text-white mr-2 font-weight-regular"></span>
                <img src="..\public\img\fotouser\default.png" class="rounded border" width="35" height="35">
              </a>

              <div class="dropdown-menu dropdown-primary dropdown-menu-right" aria-labelledby="mobil">
                <a class="dropdown-item" href="">
                  Edit Profile
                </a>
                <a class="dropdown-item" href="">
                  Logout
                </a>
              </div>

            </li>
          </ul>
        </div>
      </div>
    </nav>
  </header>
  <!--Main Navigation-->

  <!-- Nav -->
  <div class="white sticky-top shadow-sm" style="z-index:1">
    <div class="container py-2">
      <ul class="nav md-tabs white justify-content-center shadow-none mx-0 mb-0">

        <li class="nav-item mr-5">
          <a class="nav-link white-text bg-primary rounded font-weight-bold">
            <i class="fas fa-tachometer-alt fa-fw mr-1"></i>
            Dashboard
          </a>
        </li>

        <li class="nav-item dropdown mr-5">
          <a class="nav-link dropdown-toggle grey-text" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-tasks fa-fw mr-1"></i>
            Manajemen
          </a>
          <div class="dropdown-menu dropdown-primary">
            <a href="..\views\v_fasilitas.php" class="dropdown-item">
              Fasilitas
            </a>
            <a href="..\views\v_kamar.php" class="dropdown-item">
              Kamar
            </a>
            <div class="dropdown-divider"></div>
            <a href="..\views\v_biaya.php" class="dropdown-item">
              Token Listrik
            </a>
          </div>
        </li>

        <li class="nav-item dropdown mr-5">
          <a class="nav-link dropdown-toggle grey-text" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-dollar-sign fa-fw mr-1"></i>
            Transaksi
          </a>
          <div class="dropdown-menu dropdown-primary">
            <a class="dropdown-item">
              Kamar
            </a>
            <a href="..\views\v_transaksi_token.php" class="dropdown-item">
              Token Listrik
            </a>
          </div>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle grey-text" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-users fa-fw mr-1"></i>
            Data AKun
          </a>
          <div class="dropdown-menu dropdown-primary">
            <a class="dropdown-item">
              Pemilik
            </a>
            <a href="..\views\v_penyewa.php" class="dropdown-item">
              Penyewa
            </a>
          </div>
        </li>

      </ul>
    </div>
  </div>
  <!-- Akhir Nav -->

  <?php include '..\templates\linkfooter.php' ?>