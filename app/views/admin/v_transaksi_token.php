<?php include '../templates/linkheader.php' ?>
<?php include '../templates/navadmin.php' ?>

<title>Transaksi Listrik</title>

<div class="container mt-5 mb-5">
  <h2 class="h1 text-black-50 d-inline">LISTRIK</h2>
  <button type="button" name="tambah" class="btn btn-primary rounded mb-5 float-right" data-toggle="modal" data-target="#ModalTambahData">
    <i class="fas fa-fw fa-plus"></i>
    Tambah Data
  </button>

  <div class="bg-white shadow-sm rounded pt-3 pb-4 px-5 mt-5">
    <div>
      <label class="mdb-main-label text-dark">Pilih Peroide</label>
      <select class="form-control browser-default bulan">
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
  </div>
  <div class="bg-white shadow-sm rounded pt-4 pb-4 px-5 mt-4">
    <div class="panel panel-default">
      <div class="panel-body">
        <?php include '../templates/alert.php' ?>
        <div class="data"></div>
      </div>
    </div>
  </div>
</div>

<!-- Modal Untuk menginput Data -->
<div class="modal fade left" id="ModalTambahData" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-full-height modal-left" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h4 class="modal-title w-100 font-weight-bold text-primary">INPUT</h4>
      </div>

      <div class="modal-body">
        <form action="../../models/saves/s_transaksi_token.php" method="post" role="form" name="forminput" id="forminput">
          <div class="form-group">
            <label for="tgltransaksi">Tanggal Transaksi</label>
            <input type='text' name="tgltransaksi" class="form-control" id='tgltransaksi' required readonly value="<?= date('Y-m-d') ?>">
          </div>
          <div class="form-group">
            <label for="idpenyewa">Penyewa</label>
            <select id="idpenyewa" name="idpenyewa" class="browser-default custom-select" required>
              <option data-live-search="true" value="" disabled selected> - Pilih Nama Penyewa - </option>
              <?php
              $query = "SELECT * FROM tbl_penyewa";
              $hasil = mysqli_query($konekdb, $query);
              while ($qtabel = mysqli_fetch_assoc($hasil)) { ?>
                <option value="<?= $qtabel['id_penyewa'] ?>"><?= $qtabel['id_penyewa'] . ' - ' . $qtabel['nama'] ?></option>
              <?php } ?>
            </select>
          </div>
          <div class="form-group">
            <label for="idbiaya">Token Listrik</label>
            <select id="idbiaya" name="idbiaya" class="browser-default custom-select" required>
              <option data-live-search="true" value="" disabled selected> - Pilih Token Listrik - </option>
              <?php
              $query = "SELECT * FROM tbl_biaya";
              $hasil = mysqli_query($konekdb, $query);
              while ($qtabel = mysqli_fetch_assoc($hasil)) { ?>
                <option value="<?= $qtabel['id_biaya'] ?>"> <?= $qtabel['token_listrik'] ?></option>
              <?php } ?>
            </select>
          </div>
          <div class="form-group" id="token">
            <label for="jumlahbiaya">Total Bayar Token</label>
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text">Rp.</span>
              </div>
              <input type="text" class="form-control uang" id="jumlahbiaya" name="jumlahbiaya" required readonly autocomplete="off">
            </div>
          </div>
      </div>

      <div class="modal-footer justify-content-center">
        <button type="submit" name="submit" id="tokenlistrik" class="btn btn-primary">ADD</button>
        <button type="button" class="btn btn-outline-primary waves-effect" data-dismiss="modal">NO</button>
      </div>

      </form>
    </div>
  </div>
</div>
<!-- Menutup modal input data -->

<?php include '../templates/linkfooter.php' ?>