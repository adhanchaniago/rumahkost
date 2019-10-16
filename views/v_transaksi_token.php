<?php include '..\templates\navadmin.php' ?>

<title>Transaksi Token Listrik</title>

<div class="container mt-5 mb-5">
  <h2 class="h1 text-black-50 d-inline">
    TOKEN LISTRIK
  </h2>
  <button type="button" name="tambah" class="btn btn-primary rounded mb-5 float-right" data-toggle="modal" data-target="#ModalTambahData">
    <i class="fas fa-fw fa-plus"></i>
    Tambah Data
  </button>
  <div class="bg-white shadow-sm rounded pt-5 pb-5 px-5 mt-5">

    <div class="panel panel-default">
      <div class="panel-body">
        <?php include '../templates/alert.php' ?>
        <div>
          <table id="dt" class="table table-bordered table-hover">
            <thead>
              <tr class="text-center">
                <th>No Transaksi</th>
                <th>Tanggal</th>
                <th>Penyewa</th>
                <th>Token Listrik</th>
                <th>Harga</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php
              include('../config/koneksi.php');

              $query = mysqli_query($konekdb, "SELECT * FROM view_transaksi_token");
              while ($row = mysqli_fetch_array($query)) {
                ?>
                <tr class="text-center">
                  <td class="align-middle"><?php echo ucfirst($row['no_transaksi']); ?></td>
                  <td class="align-middle"><?php echo $row['tanggal'] ?></td>
                  <td class="align-middle"><?php echo $row['nama'] ?></td>
                  <td class="align-middle"><?php echo $row['token_listrik']; ?></td>
                  <td class="align-middle"><?php echo $row['jumlah_biaya'] ?></td>
                  <td>
                    <button type="button" name="hapus" class="btn btn-danger rounded" data-toggle="modal" data-target="#ModalHapusData<?php echo $row['id_penyewa']; ?>"><i class="fas fa-fw fa-trash"></i></button>
                  </td>
                </tr>

                <!-- Modal Untuk hapus Data -->
                <div class="modal fade" id="ModalHapusData<?php echo $row['id_penyewa']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content text-center">
                      <div class="modal-header">
                        <h4 class="modal-title w-100 font-weight-bold text-danger ml-5">Delete</h4>
                        <button type=" button" class="close text-danger" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>

                      <div class="modal-body">
                        <form action="../models/deletes/d_transaksi_token.php" method="post" role="form">
                          <input type="hidden" name="notransaksi" class="form-control" value="<?php echo $row['no_transaksi']; ?>">
                          <center>
                            <h4>Yakin data akan dihapus ?</h4>
                          </center>
                      </div>

                      <div class="modal-footer flex-center">
                        <button type="submit" class="btn btn-outline-danger">Yes</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
                      </div>

                      </form>
                    </div>
                  </div>
                </div>
                <!-- Menutup modal hapus data -->

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
        <button type="button" class="close px-0" data-dismiss="modal" aria-label="Close">
          <i class="fas fa-angle-left fa-fw text-primary mt-2"></i>
        </button>
        <h4 class="modal-title w-100 font-weight-bold text-primary">Input</h4>
      </div>
      <div class="modal-body">
        <form action="../models/saves/s_transaksi_token.php" method="post" role="form" name="forminput" id="forminput">
          <div class="form-group">
            <?php
            include '..\models\functions\auto_number.php';
            $query = mysqli_query($konekdb, "SELECT * FROM tbl_transaksi_token ORDER BY no_transaksi DESC LIMIT 1");
            $latestKD = mysqli_fetch_assoc($query);
            $notransaksi = autonumber($latestKD['no_transaksi'], 2, 3);
            ?>
            <label for="notransaksi">No.Transaksi</label>
            <input type="text" name="notransaksi" id="notransaksi" class="form-control" value="<?= $notransaksi ?>" readonly>
          </div>
          <div class="form-group">
            <label for="tanggal">Tanggal</label>
            <input type='text' name="tanggal" class="form-control" id='tanggal' required readonly value="<?= date('Y-m-d') ?>">
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
                <option value="<?= $qtabel['id_biaya'] ?>"><?= $qtabel['token_listrik'] . ' - ' . $qtabel['jumlah_biaya'] ?></option>
              <?php } ?>
            </select>
          </div>
      </div>

      <div class="modal-footer">
        <button type="submit" name="submit" id="notransaksi" class="btn btn-outline-primary btn-block">ADD</button>
      </div>

      </form>
    </div>
  </div>
</div>
<!-- Menutup modal input data -->

<?php include '..\templates\linkfooter.php' ?>