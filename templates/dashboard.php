<?php include '../templates/linkheader.php' ?>

<style>
  #up {
    margin-top: -15px;
    z-index: 10;
  }
</style>

<title>Dashboard</title>

<!--Navbar-->
<nav class="navbar navbar-expand-lg navbar-dark mdb-color darken-3 py-3">
  <div class="container">

    <!-- Navbar brand -->
    <a class="navbar-brand mb-3" href="#">
      Cost <span class="font-weight-bold">Kost</span>an
    </a>
    <!--/ Navbar brand -->

    <!-- Collapse button -->
    <button class="navbar-toggler order-first mb-3" type="button" data-toggle="collapse" data-target="#Search" aria-controls="Search" aria-expanded="false" aria-label="Toggle navigation">
      <i class="fas fa-search"></i>
    </button>
    <button class="navbar-toggler mb-3" type="button" data-toggle="collapse" data-target="#Avatar" aria-controls="Avatar" aria-expanded="false" aria-label="Toggle navigation">
      <i class="fas fa-ellipsis-v"></i>
    </button>
    <!--/ Collapse button -->

    <!-- Collapsible content -->
    <div class="collapse navbar-collapse" id="Search">

      <!-- Search form -->
      <form class="form-inline">
        <div class="mx-auto my-0 ml-3 mb-3">
          <input class="form-control w-auto mr-sm-2" type="text" placeholder="Search" aria-label="Search">
        </div>
      </form>
      <!--/ Search form -->

    </div>

    <div class="collapse navbar-collapse justify-content-end" id="Avatar">

      <!-- Dropdown Avatar -->
      <div class="dropdown float-right mr-3 mb-3">
        <a href="#" id="dropdownMenuAvatar" data-toggle="dropdown" class="">
          <img src="..\public\img\fotouser\default.png" alt="" class="rounded" height="35">
        </a>
        <div class="dropdown-menu dropdown-warning dropdown-menu-right mt-2" aria-labelledby="dropdownMenuAvatar">
          <a class="dropdown-item" href="#">
            Profil
          </a>
          <a class="dropdown-item" href="#">
            Logout
          </a>
        </div>
      </div>
      <!--/ Dropdown Avatar -->

    </div>

    <!--/ Collapsible content -->

  </div>
</nav>
<!--/.Navbar-->

<div class="container">

  <!-- Tab & Dropdown -->
  <ul id="up" class="nav md-tabs cyan">
    <li class="nav-item ml-2">
      <a class="nav-link active" href="#">
        <i class="fa-fw fas fa-tachometer-alt"></i>
        <span class="ml-1">Dashboard</span>
      </a>
    </li>
    <li class="nav-item dropdown ml-2">
      <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
        <i class="fa-fw fas fa-stream"></i>
        <span class="ml-1">Manajemen</span>
      </a>
      <div class="dropdown-menu dropdown-warning">
        <a class="dropdown-item" href="#">
          Fasilitas
        </a>
        <a class="dropdown-item" href="#">
          Token Listrik
        </a>
        <a class="dropdown-item" href="#">
          Kamar
        </a>
      </div>
    </li>

    <li class="nav-item dropdown ml-2">
      <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
        <i class="fa-fw fas fa-dollar-sign"></i>
        <span class="ml-1">Transaksi</span>
      </a>
      <div class="dropdown-menu dropdown-warning">
        <a class="dropdown-item" href="#">
          Kamar
        </a>
        <a class="dropdown-item" href="#">
          Listrik
        </a>
      </div>
    </li>

    <li class="nav-item dropdown ml-2">
      <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
        <i class="fa-fw fas fa-users"></i>
        <span class="ml-1">Data Akun</span>
      </a>
      <div class="dropdown-menu dropdown-warning">
        <a class="dropdown-item" href="#">
          Pemilik
        </a>
        <a class="dropdown-item" href="#">
          Penyewa
        </a>
      </div>
    </li>
  </ul>
  <!--/ Tab & Dropdown -->

</div>

<?php include '../templates/linkfooter.php' ?>