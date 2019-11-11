<?php include '../templates/linkheader.php' ?>
<?php include '../templates/navadmin.php' ?>

<title>Kamar</title>

<div class="container mt-5 mb-5">
  <h2 class="h1 text-black d-inline">KAMAR</h2>

  <!-- Breadcrumb -->
  <div class="mt-3">
    <span class="text-black-50" style="font-size:17px">
      <i class="fa fa-home fa-fw font-weight-bold"></i>
      <span class="mx-3 font-weight-bold">|</span>
      <a href="dashboard.php" class="text-black-50">Dashboard</a>
      <i class="fa fa-angle-right fa-fw mx-2 font-weight-bold"></i>
      <span>Arsip</span>
      <i class="fa fa-angle-right fa-fw mx-2 font-weight-bold"></i>
      <a href="v_transaksi_kamar.php" class="font-weight-bold text-black-50">Kamar</a>
    </span>
  </div>
  <!-- /Breadcrumb -->

  <div class="bg-white shadow-sm rounded pt-1 pb-3 px-5 mt-5">
    <select class="mdb-select md-form colorful-select dropdown-warning bulan">
      <option value="" disabled selected>Pilih Periode</option>
      <option value="0">Semua</option>
      <option value="01">Januari</option>
      <option value="02">Februari</option>
      <option value="03">Maret</option>
      <option value="04">April</option>
      <option value="05">Mei</option>
      <option value="06">Juni</option>
      <option value="07">Juli</option>
      <option value="08">Agustus</option>
      <option value="09">September</option>
      <option value="10">Oktober</option>
      <option value="11">November</option>
      <option value="12">Desember</option>
    </select>
  </div>
  <div class="bg-white shadow-sm rounded py-4 px-5 mt-4">
    <div class="panel panel-default">
      <div class="panel-body">
        <div class="arsipkamar"></div>
      </div>
    </div>
  </div>
</div>

<?php include '../templates/linkfooter.php' ?>