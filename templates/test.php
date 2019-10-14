<?php include '../templates/linkheader.php' ?>

<body class="grey lighten-3">

  <!-- Nav -->
  <div class="white">
    <div class="container py-2">
      <ul class="nav md-tabs white justify-content-center shadow-none mx-0 mb-0">

        <li class="nav-item mr-5">
          <a class="nav-link white-text text-primary font-weight-bold">
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
            <a class="dropdown-item">
              Fasilitas
            </a>
            <a class="dropdown-item">
              Kamar
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item">
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
            <a class="dropdown-item">
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
            <a class="dropdown-item">
              Penyewa
            </a>
          </div>
        </li>

      </ul>
    </div>
  </div>
  <!-- Akhir Nav -->

</body>

<?php include '../templates/linkfooter.php' ?>