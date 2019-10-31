<?php include '../templates/linkheader.php' ?>
<?php include '../templates/navadmin.php' ?>

<title>Dashboard</title>

<div class="container mt-5 mb-5">
  <h2 class="h1 text-black d-inline">
    DASHBOARD
  </h2>
  <div class="mt-3">
    <span class="text-black-50" style="font-size:17px">
      <i class="fa fa-home fa-fw font-weight-bold"></i>
      <span class="font-weight-bold mx-3">|</span>
      <a href="#!" class="font-weight-bold text-black-50">Home</a>
      <i class="fa fa-angle-right fa-fw mx-2 font-weight-bold"></i>
      <a href="dashboard.php" class="text-black-50">Dashboard</a>
    </span>
  </div>
</div>

<div class="container">
  <div class="row mb-4" id="count-dashboard">
    <div class="col-md">
      <div class="bg-white p-4 rounded shadow-sm">
        <h1 class="h1 text-center"></h1>
        <h1 class="h6 text-center">Kamar</h1>
      </div>
    </div>
    <div class="col-md">
      <div class="bg-white p-4 rounded shadow-sm">
        <h1 class="h1 text-center"></h1>
        <h1 class="h6 text-center">Token Listrik</h1>
      </div>
    </div>
    <div class="col-md">
      <div class="bg-white p-4 rounded shadow-sm">
        <h1 class="h1 text-center"></h1>
        <h1 class="h6 text-center">Penyewa</h1>
      </div>
    </div>
    <div class="col-md">
      <div class="bg-white p-4 rounded shadow-sm">
        <h1 class="h1 text-center"></h1>
        <h1 class="h6 text-center">Transaksi</h1>
      </div>
    </div>
    <div class="col-md">
      <div class="bg-white p-4 rounded shadow-sm">
        <h1 class="h1 text-center"></h1>
        <h1 class="h6 text-center">Arsip</h1>
      </div>
    </div>
  </div>

  <?php include '../templates/linkfooter.php' ?>