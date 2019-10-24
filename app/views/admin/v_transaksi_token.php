<?php include '..\templates\navadmin.php' ?>

<title>Transaksi Listrik</title>

<div class="container mt-5 mb-5">
  <h2 class="h1 text-black-50 d-inline">
    LISTRIK
  </h2>
  <button type="button" name="tambah" class="btn btn-primary rounded mb-5 float-right" data-toggle="modal" data-target="#ModalTambahData">
    <i class="fas fa-fw fa-plus"></i>
    Tambah Data
  </button>
  <div class="bg-white shadow-sm rounded pt-5 pb-5 px-5 mt-5">

    <div class="panel panel-default">
      <div class="panel-body">
        <?php include '..\templates\alert.php' ?>
        <div>
          <table id="dt" class="table table-hover">
            <thead>
              <tr class="text-center white-text bg-primary">
                <th>#</th>
                <th>Tgl Transaksi</th>
                <th>Penyewa</th>
                <th>Token Listrik</th>
                <th>Harga</th>
                <th>Status</th>
              </tr>
            </thead>
            <tbody>
              <?php
              include('..\..\config\koneksi.php');

              $query = mysqli_query($konekdb, "SELECT * FROM view_transaksi_listrik");
              while ($row = mysqli_fetch_array($query)) {
                ?>

                <tr class="text-center">
                  <td class="align-middle"><?php echo $row['id_transaksi']; ?></td>
                  <td class="align-middle"><?php echo $row['tgl_transaksi']; ?></td>
                  <td class="align-middle"><?php echo $row['nama']; ?></td>
                  <td class="align-middle"><?php echo $row['token_listrik']; ?></td>
                  <td class="align-middle">Rp. <span class="uang"><?php echo $row['jumlah_biaya']; ?></span>,-</td>
                  <!-- Status -->
                  <select class="browser-default custom-select" name="Status" id="Status">
                    <option value="1">Lunas</option>
                    <option value="2" selected>Belum Lunas</option>
                  </select>
                </tr>

              <?php
              }
              ?>
            </tbody>
          </table>
        </div>
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
        <form action="..\..\models\saves\s_transaksi_token.php" method="post" role="form" name="forminput" id="forminput">
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
              <input type="text" class="form-control uang" id="jumlahbiaya" required readonly autocomplete="off">
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

<?php include '..\templates\linkfooter.php' ?>