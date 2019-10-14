<?php include '../templates/linkheader.php' ?>

<style>
  .col-2 {
    height: 92vh;
    transition: 0.5s;
  }

  .hidden {
    max-width: 4.8%;
    padding: 0px !important;
    overflow: hidden;
  }

  .sidebar:hover {
    cursor: pointer;
  }

  nav {
    height: 59px !important;
  }

  .hilang {
    display: none;
  }
</style>

<title>Rumah Kost</title>

<!-- Navbar -->
<nav class="navbar elegant-color-dark">
  <i class="fas fa-bars text-white sidebar" style="font-size:18px; margin-left:10px;"></i>
  <h5 class="text-white mr-auto ml-4 my-auto">Rumah Kost</h5>
</nav>

<div class="row no-gutters">
  <div class="col-2 elegant-color accordion" id="menu" style="diplay:flex;">
    <ul class="list-group list-group-flush">
      <div>
        <a href="#" class="list-group-item list-group-item-action text-white bg-transparent waves-effect mt-3" style="display : flex">
          <span><i class="fas fa-tachometer-alt text-white ml-2 mr-4" style="font-size:13px"></i></span>
          <span class="nama-menu">Dashboard</span>
        </a>
      </div>

      <!-- Button Manajemen -->
      <div id="menu">
        <a href="#dropdown1" class="list-group-item list-group-item-action text-white bg-transparent waves-effect mt-3 " data-toggle="collapse" style="display : flex">
          <span><i class="fas fa-tasks text-white ml-2" style="font-size:13px; margin-right:27px"></i></span>
          <span class="nama-menu">Manajemen</span>
        </a>
        <div id="dropdown1" class="collapse" data-parent="#menu">
          <a href="#" class="list-group-item text-white elegant-color-dark">
            <span class="ml-5">Token Listrik</span>
          </a>
          <a href="#" class="list-group-item text-white elegant-color-dark">
            <span class="ml-5">Fasilitas</span>
          </a>
          <a href="#" class="list-group-item text-white elegant-color-dark">
            <span class="ml-5">Kamar</span>
          </a>
        </div>
      </div>

      <!-- button Tansaksi -->
      <div id="menu">
        <a href="#dropdown2" class="list-group-item list-group-item-action text-white bg-transparent waves-effect mt-3" data-toggle="collapse" style="display : flex">
          <span><i class="fas fa-dollar-sign text-white" style="font-size:13px; margin-left:11px; margin-right:30px"></i></span>
          <span class="nama-menu">Transaksi</span>
        </a>
        <div id="dropdown2" class="collapse" data-parent="#menu">
          <a href="#" class="list-group-item text-white elegant-color-dark ">
            <span class="ml-5">Transaksi Kamar</span>
          </a>
          <a href="#" class="list-group-item text-white elegant-color-dark">
            <span class="ml-5">Transaksi Listrik</span>
          </a>
        </div>
      </div>

      <!-- Button Data Akun -->
      <div>
        <a href="#" class="list-group-item list-group-item-action text-white bg-transparent waves-effect mt-3" style="display : flex">
          <span><i class="fas fa-users text-white ml-2" style="font-size:13px; margin-right:27px"></i></span>
          <span class="nama-menu">Data</span>
          <span class="nama-menu ml-1">Akun</span>
        </a>
      </div>

    </ul>
  </div>
</div>


<?php include '../templates/linkfooter.php' ?>
<script>
  $(document).ready(function(i) {
    $('.sidebar').on('click', function() {
      $('.col-2').toggleClass('hidden');
      setTimeout(function() {
        $('.nama-menu').toggleClass('hilang');
      }, 130)
    });
  });
</script>