<?php include '../templates/linkheader.php' ?>
<?php include '../templates/navadmin.php' ?>

<title>Kamar</title>

<div class="container mt-5 mb-5">
  <div class="text-center">
    <h1 class="h1 text-black mb-2">LAPORAN TRANSAKSI KAMAR BELUM LUNAS</h1>
    <span class="btn btn-warning shadow-none btn-sm rounded text-dark ml-3 print" id="no-print">
      <i class="fas fa-print fa-fw"></i><span class="ml-1">Print</span>
    </span>
  </div>

  <div class="bg-white shadow-sm rounded pt-1 pb-3 px-5 mt-5" id="no-print">
    <select class="mdb-select md-form colorful-select dropdown-warning bulan0">
      <option value="" disabled selected>Pilih Bulan Transaksi</option>
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
  <div class="bg-white rounded py-4 px-5 mt-4">
    <div class="panel panel-default">
      <div class="panel-body">
        <div class="kamarbelum"></div>
      </div>
    </div>
  </div>
</div>

<?php include '../templates/linkfooter.php' ?>