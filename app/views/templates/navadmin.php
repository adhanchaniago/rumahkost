<!--Main Navigation-->
<header>
  <nav class="navbar navbar-expand-lg navbar-dark py-3 shadow-none header">
    <div class="container">

      <a class="navbar-brand" href="#!">
        Cost <span style="font-size:25px" class="font-weight-bold">Kost</span>an
      </a>

      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navResponsive" aria-controls="navResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span><i class="fas fa-equals"></i></span>
      </button>

      <div class="collapse navbar-collapse" id="navResponsive">
        <ul class="navbar-nav ml-auto"></ul>
        <ul class="navbar-nav nav-flex-icons">

          <!-- Jika ada sesi Login -->
          <li class="nav-item dropdown ml-auto">
            <a class="nav-link mr-1" id="kost" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <span style="font-size:15px" class="text-white mr-2 font-weight-regular"></span>
              <img src="../../../public/img/fotouser/default.png" class="rounded border" height="35">
            </a>

            <div class="dropdown-menu dropdown-menu-right dropdown-secondary mt-1" aria-labelledby="kost">
              <a class="dropdown-item" href="#">Profile</a>
              <a class="dropdown-item" href="#">Logout</a>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </nav>
</header>
<!--Main Navigation-->

<!-- Nav -->
<div class="menu shadow-sm sticky-top" style="z-index:1">
  <div class="pt-1">
    <ul class="nav md-tabs bg-transparent shadow-none justify-content-center mb-0">

      <li class="nav-item dropdown mr-2">
        <a class="nav-link dropdown-toggle text-white waves-light" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Manajemen</a>
        <div class="dropdown-menu dropdown-secondary mt-1">
          <a href="v_kamar.php" class="dropdown-item waves-light">Kamar</a>
          <a href="v_fasilitas.php" class="dropdown-item waves-light">Fasilitas</a>
        </div>
      </li>

      <li class="nav-item dropdown mr-2">
        <a class="nav-link dropdown-toggle text-white waves-light" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Listrik</a>
        <div class="dropdown-menu dropdown-secondary mt-1">
          <a href="v_biaya.php" class="dropdown-item waves-light">Token Listrik</a>
        </div>
      </li>

      <li class="nav-item dropdown mr-2">
        <a class="nav-link dropdown-toggle text-white waves-light" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Data</a>
        <div class="dropdown-menu dropdown-secondary mt-1">
          <a href="v_penyewa.php" class="dropdown-item waves-light">Penyewa</a>
        </div>
      </li>

      <li class="nav-item mr-2">
        <a href="dashboard.php" class="nav-link text-white deep-purple lighten-1 rounded font-weight-bold waves-light">Dashboard</a>
      </li>

      <li class="nav-item dropdown mr-2">
        <a class="nav-link dropdown-toggle text-white waves-light" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Transaksi</a>
        <div class="dropdown-menu dropdown-secondary mt-1">
          <a href="#!" class="dropdown-item waves-light">Kamar</a>
          <a href="v_transaksi_token.php" class="dropdown-item waves-light">Token Listrik</a>
        </div>
      </li>

      <li class="nav-item dropdown mr-2">
        <a class="nav-link dropdown-toggle text-white waves-light" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Arsip</a>
        <div class="dropdown-menu dropdown-secondary mt-1">
          <a href="#!" class="dropdown-item waves-light">Kamar</a>
          <a href="#!" class="dropdown-item waves-light">Token Listrik</a>
        </div>
      </li>

      <li class="nav-item dropdown mr-2">
        <a class="nav-link dropdown-toggle text-white waves-light" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Laporan</a>
        <div class="dropdown-menu dropdown-secondary mt-1">
          <a href="#!" class="dropdown-item waves-light">Kamar</a>
          <a href="#!" class="dropdown-item waves-light">Penyewa</a>
          <a href="#!" class="dropdown-item waves-light">Token Listrik</a>
        </div>
      </li>

    </ul>
  </div>
</div>
<!-- Akhir Nav -->