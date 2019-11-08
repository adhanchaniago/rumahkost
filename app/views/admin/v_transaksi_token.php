<?php include '../templates/linkheader.php' ?>
<?php include '../templates/navadmin.php' ?>

<title>Token Listrik</title>

<div class="container mt-5 mb-5">
  <h2 class="h1 text-black d-inline">TOKEN LISTRIK</h2>
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
      <a href="v_transaksi_token.php" class="font-weight-bold text-black-50">Token Listrik</a>
    </span>
  </div>
  <!-- /Breadcrumb -->


  <div class="bg-white shadow-sm rounded pt-1 pb-3 px-5 mt-5">
    <select class="mdb-select md-form colorful-select dropdown-dark bulan">
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
        <?php include '../templates/alert.php' ?>
        <div class="datatoken"></div>
      </div>
    </div>
  </div>
</div>

<!-- Modal Untuk menginput Data -->
<div class="modal fade" id="ModalTambahData" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h4 class="modal-title w-100 font-weight-bold text-success">INPUT</h4>
      </div>

      <div class="modal-body grey lighten-5">
        <form action="../../models/saves/s_transaksi_token.php" method="post" role="form" name="forminput" id="forminput">
          <div class="md-form">
            <label for="tgltransaksi">Tanggal Transaksi</label>
            <input type='text' name="tgltransaksi" class="form-control" id='tgltransaksi' required readonly value="<?= date('Y-m-d') ?>">
          </div>
          <select id="idpenyewa" name="idpenyewa" class="mdb-select md-form colorful-select dropdown-success" required>
            <option data-live-search="true" value="" disabled selected>Pilih Nama Penyewa</option>
            <?php
            $query = "SELECT * FROM tbl_penyewa";
            $hasil = mysqli_query($konekdb, $query);
            while ($qtabel = mysqli_fetch_assoc($hasil)) { ?>
              <option value="<?= $qtabel['id_penyewa'] ?>"><?= $qtabel['id_penyewa'] . ' - ' . $qtabel['nama'] ?></option>
            <?php } ?>
          </select>
          <select id="idbiaya" name="idbiaya" class="mdb-select md-form colorful-select dropdown-success" required>
            <option data-live-search="true" value="" disabled selected>Pilih Token Listrik</option>
            <?php
            $query = "SELECT * FROM tbl_biaya";
            $hasil = mysqli_query($konekdb, $query);
            while ($qtabel = mysqli_fetch_assoc($hasil)) { ?>
              <option value="<?= $qtabel['id_biaya'] ?>"> <?= $qtabel['token_listrik'] ?></option>
            <?php } ?>
          </select>
          <div class="md-form input-group" id="token">
            <div class="input-group-prepend">
              <span class="input-group-text md-addon">Rp.</span>
            </div>
            <input type="text" class="form-control uang" id="jumlahbiaya" name="jumlahbiaya" required readonly autocomplete="off">
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