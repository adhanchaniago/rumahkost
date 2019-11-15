<?php include '../templates/linkheader.php' ?>
<?php include '../templates/navadmin.php' ?>

<title>Kamar</title>

<div class="container mt-5 mb-5">
  <h2 class="h1 text-black d-inline">KAMAR</h2>
  <button type="button" name="tambah" class="btn btn-success btn-md rounded mb-5 float-right" data-toggle="modal" data-target="#ModalTambahData">
    <i class="fas fa-fw fa-plus"></i>
    Tambah Data
  </button>

  <!-- Breadcrumb -->
  <div class="mt-3">
    <span class="text-black-50" style="font-size:17px">
      <i class="fa fa-home fa-fw font-weight-bold"></i>
      <span class="mx-3 font-weight-bold">|</span>
      <a href="dashboard.php" class="text-black-50">Dashboard</a>
      <i class="fa fa-angle-right fa-fw mx-2 font-weight-bold"></i>
      <span>Transaksi</span>
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
        <?php Alert() ?>
        <div class="datakamar"></div>
      </div>
    </div>
  </div>
</div>

<!-- Modal Untuk menginput Data -->
<div class="modal fade" id="ModalTambahData" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">

    <div class="modal-content">
      <div class="modal-header text-center">
        <h4 class="modal-title w-100 font-weight-bold text-success">INPUT</h4>
      </div>

      <div class="modal-body grey lighten-5">
        <form action="../../models/saves/s_transaksi_kamar.php" method="post" role="form" name="forminput" id="forminput">
          <div class="md-form">
            <label for="tgltransaksi">Tanggal Transaksi</label>
            <input type='text' name="tgltransaksi" class="form-control" id='tgltransaksi' required readonly value="<?= date('Y-m-d') ?>">
          </div>
          <div class="md-form">
            <?php
            include '../../functions/auto_number.php';
            $query_autonumber = mysqli_query($konekdb, "SELECT * FROM tbl_transaksi_kamar ORDER BY no_transaksi DESC LIMIT 1");
            if (mysqli_num_rows($query_autonumber) > 0) {
              $latestKD = mysqli_fetch_assoc($query_autonumber);
              $notransaksi = autonumber($latestKD['no_transaksi'], 2, 5);
            } else {
              $notransaksi = "TK00001";
            }
            ?>
            <label for="notransaksi">No.Transaksi</label>
            <input type="text" name="notransaksi" id="notransaksi" class="form-control" value="<?= $notransaksi ?>" readonly>
          </div>
          <select class="mdb-select md-form colorful-select dropdown-success" name="periode" required>
            <option value="" disabled selected>Pilih Periode</option>
            <option value="Januari">Januari</option>
            <option value="Februari">Februari</option>
            <option value="Maret">Maret</option>
            <option value="April">April</option>
            <option value="Mei">Mei</option>
            <option value="Juni">Juni</option>
            <option value="Juli">Juli</option>
            <option value="Agustus">Agustus</option>
            <option value="September">September</option>
            <option value="Oktober">Oktober</option>
            <option value="November">November</option>
            <option value="Desember">Desember</option>
          </select>
          <select id="idpenyewa0" name="idpenyewa" class="mdb-select md-form colorful-select dropdown-success" required>
            <option data-live-search="true" value="" disabled selected>Pilih Nama Penyewa</option>
            <?php
            $query = "SELECT * FROM tbl_penyewa";
            $hasil = mysqli_query($konekdb, $query);
            while ($qtabel = mysqli_fetch_assoc($hasil)) { ?>
              <option value="<?= $qtabel['id_penyewa'] ?>"><?= $qtabel['id_penyewa'] . ' - ' . $qtabel['nama'] ?></option>
            <?php } ?>
          </select>
          <div class="md-form" id="kamar">
            <input type="text" id="kodekamar" name="kodekamar" class="form-control" readonly required>
            <label for="kodekamar">Kode Kamar</label>
          </div>
          <div class="md-form input-group" id="tarif">
            <div class="input-group-prepend">
              <span class="input-group-text md-addon">Rp.</span>
            </div>
            <input type="text" class="form-control uang" id="tarif" name="tarif" required readonly autocomplete="off">
          </div>
      </div>

      <div class="modal-footer justify-content-center">
        <button type="submit" name="submit" id="tokenlistrik" class="btn btn-success">ADD</button>
        <button type="button" class="btn btn-outline-success waves-effect" data-dismiss="modal">NO</button>
      </div>

      </form>
    </div>
  </div>
</div>
<!-- Menutup modal input data -->

<?php include '../templates/linkfooter.php' ?>