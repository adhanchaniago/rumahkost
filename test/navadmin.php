  <?php include '..\templates\linkheader.php' ?>

  <!--Main Navigation-->
  <header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary py-2 shadow-none">
      <div class="container">

        <!-- Nav Brans -->
        <a class="navbar-brand" href="#">
          Cost <span style="font-size:25px" class="font-weight-bold">Kost</span>an
        </a>
        <!--/ Nav Brans -->

        <!-- Button Collapse -->
        <button class="navbar-toggler order-first" type="button" data-toggle="collapse" data-target="#navResponsive" aria-controls="navResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <i class="fas fa-search"></i>
        </button>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#Avatar" aria-controls="Avatar" aria-expanded="false" aria-label="Toggle navigation">
          <i class="fas fa-ellipsis-v"></i>
        </button>
        <!--/ Button Collapse -->

        <div class="collapse navbar-collapse" id="navResponsive">
          <!-- Search Form -->
          <ul class="navbar-nav">
            <li class="nav-item">
              <input class="form-control form-control-sm p-3 mx-auto" type="text" placeholder="Search..." style="width:200px">
            </li>
          </ul>
          <!--/ Search Form -->
        </div>


        <div class="collapse navbar-collapse justify-content-end" id="Avatar">

          <ul class="navbar-nav nav-flex-icons">
            <!-- Avatar Dropdown -->
            <li class="nav-item dropdown ml-auto">

              <a class="nav-link" id="kost" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span style="font-size:15px" class="text-white mr-2 font-weight-regular"></span>
                <img src="..\public\img\fotouser\default.png" class="rounded border" height="35">
              </a>

              <div class="dropdown-menu dropdown-primary dropdown-menu-right" aria-labelledby="kost">
                <a class="dropdown-item" href="#">
                  Edit Profile
                </a>
                <a class="dropdown-item" href="#">
                  Logout
                </a>
              </div>

            </li>
            <!--/ Avatar Dropdown -->
          </ul>
        </div>

      </div>
    </nav>
  </header>
  <!--/ Main Navigation-->

  <!-- Nav Menu-->
  <div class="white sticky-top shadow-sm" style="z-index:1">
    <div class="container py-2">
      <ul class="nav md-tabs white shadow-none justify-content-center mb-0">

        <!-- Menu 1 -->
        <li class="nav-item">
          <a href="..\views\dashboard.php" class="nav-link white-text bg-primary rounded font-weight-bold">
            <i class="fas fa-tachometer-alt fa-fw mr-1"></i>
            Dashboard
          </a>
        </li>
        <!--/ Menu 1 -->

        <!-- Menu 2 -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle text-primary" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
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
        <!--/ Menu 2 -->


        <!-- Menu 3 -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle text-primary" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-dollar-sign fa-fw"></i>
            Transaksi
          </a>
          <div class="dropdown-menu dropdown-primary">
            <a href="#" class="dropdown-item">
              Kamar
            </a>
            <a href="..\views\v_transaksi_token.php" class="dropdown-item">
              Token Listrik
            </a>
          </div>
        </li>
        <!--/ Menu 3 -->

        <!-- Menu 4 -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle text-primary" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-users fa-fw mr-1"></i>
            Data AKun
          </a>
          <div class="dropdown-menu dropdown-primary">
            <a href="#" class="dropdown-item">
              Pemilik
            </a>
            <a href="..\views\v_penyewa.php" class="dropdown-item">
              Penyewa
            </a>
          </div>
        </li>
        <!--/ Menu 4 -->

      </ul>
    </div>
  </div>
  <!-- Akhir Nav -->