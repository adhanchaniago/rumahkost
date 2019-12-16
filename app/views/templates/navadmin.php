<?php
if (!isset($_SESSION['Login'])) {
  header('location:../auth/v_login.php');
}
?>

<!-- Header -->
<header>
  <nav class="navbar navbar-expand-lg navbar-dark py-3 shadow-none header1">
    <div class="container">

      <a class="navbar-brand" href="#!">
        <span style="font-size:25px" class="font-weight-bold deep-purple-text">Terima</span>
        <span style="font-size:25px" class="font-weight-bold text-warning">Kost</span>
      </a>

      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navResponsive" aria-controls="navResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span><i class="fas fa-equals"></i></span>
      </button>

      <div class="collapse navbar-collapse" id="navResponsive">
        <ul class="navbar-nav ml-auto"></ul>
        <ul class="navbar-nav nav-flex-icons">

          <!-- Jika ada sesi Login -->
          <li class="nav-item dropdown ml-auto">
            <a class="nav-link waves-effect" id="kost" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <span class="text-white mr-2 font-weight-regular"><?= $_SESSION['Login']['username'] ?></span>
              <img src="../../../public/img/fotouser/default.jpg" class="rounded border" height="35">
            </a>

            <div class="dropdown-menu dropdown-menu-right dropdown-warning mt-1" aria-labelledby="kost">
              <a class="dropdown-item deep-purple-text" href="../../models/auth/logout.php">Logout</a>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </nav>
</header>
<!-- /Header -->

<!-- Nav -->
<div id="no-print" class="menu1 shadow-sm sticky-top" style="z-index:3">
  <div class="pt-1">
    <ul class="nav md-tabs bg-transparent shadow-none justify-content-center mb-0">

      <li class="nav-item dropdown mx-2">
        <a class="nav-link dropdown-toggle text-white waves-light" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Manajemen</a>
        <div class="dropdown-menu dropdown-warning mt-1">
          <a href="v_fasilitas.php" class="dropdown-item deep-purple-text waves-light">Fasilitas</a>
          <a href="v_kamar.php" class="dropdown-item deep-purple-text waves-light">Kamar</a>
          <a href="v_token.php" class="dropdown-item deep-purple-text waves-light">Listrik</a>
        </div>
      </li>

      <li class="nav-item dropdown mx-2">
        <a class="nav-link dropdown-toggle text-white waves-light" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Data</a>
        <div class="dropdown-menu dropdown-warning mt-1">
          <a href="v_penyewa.php" class="dropdown-item deep-purple-text waves-light">Penyewa</a>
          <a href="../admin/l_penyewa.php" class="dropdown-item deep-purple-text waves-light">Laporan</a>
        </div>
      </li>

      <li class="nav-item mx-2">
        <a href="dashboard.php" class="nav-link text-white deep-purple rounded font-weight-bold waves-effect">Dashboard</a>
      </li>

      <li class="nav-item dropdown mx-2">
        <a class="nav-link dropdown-toggle text-white waves-light" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Transaksi</a>
        <div class="dropdown-menu dropdown-warning mt-1">
          <h6 class="dropdown-header text-center text-dark">Kamar</h6>
          <a href="v_transaksi_kamar.php" class="dropdown-item deep-purple-text waves-light">Transaksi</a>
          <a href="../admin/l_kamar_b.lunas.php" class="dropdown-item deep-purple-text waves-light">Laporan</a>
          <h6 class="dropdown-header text-center text-dark">Listrik</h6>
          <a href="v_transaksi_token.php" class="dropdown-item deep-purple-text waves-light">Transaksi</a>
          <a href="../admin/l_token_b.lunas.php" class="dropdown-item deep-purple-text waves-light">Laporan</a>
        </div>
      </li>

      <li class="nav-item dropdown mx-2">
        <a class="nav-link dropdown-toggle text-white waves-light" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Arsip</a>
        <div class="dropdown-menu dropdown-warning mt-1">
          <h6 class="dropdown-header text-center text-dark">Kamar</h6>
          <a href="a_transaksi_kamar.php" class="dropdown-item deep-purple-text waves-light">Arsip</a>
          <a href="../admin/l_kamar_lunas.php" class="dropdown-item deep-purple-text waves-light">Laporan</a>
          <h6 class="dropdown-header text-center text-dark">Listrik</h6>
          <a href="a_transaksi_token.php" class="dropdown-item deep-purple-text waves-light">Arsip</a>
          <a href="../admin/l_token_lunas.php" class="dropdown-item deep-purple-text waves-light">Laporan</a>
        </div>
      </li>

    </ul>
  </div>
</div>
<!-- /Nav -->