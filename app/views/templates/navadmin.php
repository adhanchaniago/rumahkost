<!-- Header -->
<header>
  <nav class="navbar navbar-expand-lg navbar-dark py-3 shadow-none header1">
    <div class="container">

      <a class="navbar-brand" href="#!">
        <span style="font-size:25px;color:#6861ce;" class="font-weight-bold">Teras </span>
        <span style="font-size:25px" class="font-weight-bold text-white">Kost</span>
      </a>

      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navResponsive" aria-controls="navResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span><i class="fas fa-equals"></i></span>
      </button>

      <div class="collapse navbar-collapse" id="navResponsive">
        <ul class="navbar-nav ml-auto"></ul>
        <ul class="navbar-nav nav-flex-icons">

          <!-- Jika ada sesi Login -->
          <li class="nav-item dropdown ml-auto">
            <a class="nav-link waves-effect mr-1" id="kost" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <span style="font-size:15px" class="text-white mr-2 font-weight-regular"></span>
              <img src="../../../public/img/fotouser/default.png" class="rounded border" height="35">
            </a>

            <div class="dropdown-menu dropdown-menu-right dropdown-dark mt-1" aria-labelledby="kost">
              <a class="dropdown-item" href="#">Profile</a>
              <a class="dropdown-item" href="#">Logout</a>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </nav>
</header>
<!-- /Header -->

<!-- Nav -->
<div class="menu1 shadow-sm sticky-top" style="z-index:3">
  <div class="pt-1">
    <ul class="nav md-tabs bg-transparent shadow-none justify-content-center mb-0">

      <li class="nav-item dropdown mx-2">
        <a class="nav-link dropdown-toggle text-white waves-light" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Manajemen</a>
        <div class="dropdown-menu dropdown-dark mt-1">
          <a href="v_fasilitas" class="dropdown-item waves-light">Fasilitas</a>
          <a href="v_kamar" class="dropdown-item waves-light">Kamar</a>
        </div>
      </li>

      <li class="nav-item mx-2">
        <a href="v_token" class="nav-link text-white waves-light">Listrik</a>
      </li>

      <li class="nav-item mx-2">
        <a href="v_penyewa" class="nav-link text-white waves-light">Penyewa</a>
      </li>

      <li class="nav-item mx-2">
        <a href="dashboard" class="nav-link text-white active1 rounded font-weight-bold waves-light">Dashboard</a>
      </li>

      <li class="nav-item dropdown mx-2">
        <a class="nav-link dropdown-toggle text-white waves-light" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Transaksi</a>
        <div class="dropdown-menu dropdown-dark mt-1">
          <a href="v_transaksi_kamar" class="dropdown-item waves-light">Kamar</a>
          <a href="v_transaksi_token" class="dropdown-item waves-light">Token Listrik</a>
        </div>
      </li>

      <li class="nav-item dropdown mx-2">
        <a class="nav-link dropdown-toggle text-white waves-light" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Arsip</a>
        <div class="dropdown-menu dropdown-dark mt-1">
          <h6 class="dropdown-header text-center">Transaksi</h6>
          <a href="a_transaksi_kamar" class="dropdown-item waves-light">Kamar</a>
          <a href="a_transaksi_token" class="dropdown-item waves-light">Token Listrik</a>
        </div>
      </li>

      <li class="nav-item dropdown mx-2">
        <a class="nav-link dropdown-toggle text-white waves-light" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Laporan</a>
        <div class="dropdown-menu dropdown-dark mt-1">
          <a href="#!" class="dropdown-item waves-light">Kamar</a>
          <a href="#!" class="dropdown-item waves-light">Penyewa</a>
          <a href="#!" class="dropdown-item waves-light">Token Listrik</a>
        </div>
      </li>

    </ul>
  </div>
</div>
<!-- /Nav -->