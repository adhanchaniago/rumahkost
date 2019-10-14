<?php include '../templates/linkheader.php' ?>

<title>Dashboard</title>

<nav class="navbar navbar-expand-lg navbar-dark elegant-color">
  <div class="container py-2">
    <a class="navbar-brand mr-4" href="#">
      Dashboard
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">

        <!-- Dropdown Manajemen -->
        <li class="nav-item dropdown mr-4">
          <a class="nav-link" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Manajemen
          </a>
          <div class="dropdown-menu mt-1" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="#">
              Fasilitas
            </a>
            <a class="dropdown-item" href="#">
              Kamar
            </a>
            <a class="dropdown-item" href="#">
              Token Listrik
            </a>
          </div>
        </li>

        <!-- Dropdown Transaksi -->
        <li class="nav-item dropdown mr-4">
          <a class="nav-link" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Transaksi
          </a>
          <div class="dropdown-menu mt-1" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="#">
              Kamar
            </a>
            <a class="dropdown-item" href="#">
              Token Listrik
            </a>
          </div>
        </li>

        <!-- Dropdown Data Akun -->
        <li class="nav-item dropdown mr-4">
          <a class="nav-link" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Data Akun
          </a>
          <div class="dropdown-menu mt-1" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="#">
              Pemilik
            </a>
            <a class="dropdown-item" href="#">
              Penyewa
            </a>
          </div>
        </li>
      </ul>
      </ul>

      <!-- Dropdown Avatar -->
      <div class="dropdown">
        <a href="#" id="dropdownMenuAvatar" data-toggle="dropdown">
          <img src="..\public\img\fotouser\default.png" alt="" class="rounded-circle" height="35">
        </a>
        <div class="dropdown-menu dropdown-menu-right mt-2" aria-labelledby="dropdownMenuAvatar">
          <a class="dropdown-item" href="#">
            Profil
          </a>
          <a class="dropdown-item" href="#">
            Logout
          </a>
        </div>
      </div>

    </div>
  </div>
</nav>

<?php include '../templates/linkfooter.php' ?>