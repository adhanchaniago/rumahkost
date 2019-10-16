<?php include '..\templates\linkheader.php' ?>
<?php include '..\templates\navadmin.php' ?>

<title>Kamar</title>

<div class="container mt-5 mb-5">
  <h2 class="h1 text-black-50 d-inline">
    KAMAR
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
          <table id="dt" class="table table-bordered table-striped">
            <thead>
              <tr class="text-center">
                <th>ID Kamar</th>
                <th>Kode Kamar</th>
                <th>Fasilitas</th>
                <th>Tarif</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php
              include('../config/koneksi.php');

              $query = mysqli_query($konekdb, "SELECT * FROM view_kamar");
              while ($row = mysqli_fetch_array($query)) {
                ?>
                <tr class="text-center">
                  <td class="align-middle"><?php echo $row['id_kamar']; ?></td>
                  <td class="align-middle"><?php echo $row['kode_kamar']; ?></td>
                  <td class="align-middle"><?php echo $row['nm_fasilitas']; ?></td>
                  <td class="align-middle">Rp. <span class="uang"><?php echo  $row['tarif']; ?></span>,-</td>
                  <td>
                    <button type="button" name="edit" class="btn btn-warning rounded text-white" data-toggle="modal" data-target="#ModalEditData<?php echo $row['id_kamar']; ?>"><i class="fas fa-fw fa-edit"></i></button>
                    <button type="button" name="hapus" class="btn btn-danger rounded" data-toggle="modal" data-target="#ModalHapusData<?php echo $row['id_kamar']; ?>"><i class="fas fa-fw fa-trash"></i></button>
                  </td>
                </tr>

                <!-- Modal Untuk edit Data -->
                <div class="modal fade" id="ModalEditData<?php echo $row['id_kamar']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                      <div class="modal-header text-center">
                        <h4 class="modal-title w-100 font-weight-bold text-warning ml-5">Edit</h4>
                        <button type="button" class="close text-warning" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>

                      <div class="modal-body">
                        <form action="../models/updates/u_kamar.php" method="post" role="form">
                          <?php
                            $idkamar = $row['id_kamar'];
                            $query_view = mysqli_query($konekdb, "SELECT * FROM tbl_kamar WHERE id_kamar='$idkamar'");
                            while ($baris = mysqli_fetch_assoc($query_view)) {
                              ?>
                            <div class="form-group">
                              <label for="idkamar">ID Kamar</label>
                              <input type="text" name="idkamar" class="form-control" value="<?php echo $baris['id_kamar']; ?>" readonly>
                            </div>
                            <div class="form-group">
                              <label for="kodekamar">Kode Kamar</label>
                              <input type="text" name="kodekamar" class="form-control" value="<?php echo $baris['kode_kamar']; ?>" readonly>
                            </div>
                            <div class="form-group">
                              <label for="idfasilitas">Fasilitas</label>
                              <select class="browser-default custom-select" name="idfasilitas" id="idfasilitas">
                                <?php
                                    $query_view = mysqli_query($konekdb, "SELECT * FROM tbl_fasilitas");
                                    while ($fasilitas = mysqli_fetch_assoc($query_view)) {
                                      ?>
                                  <option value="<?= $fasilitas['id_fasilitas'] ?>" <?php if ($fasilitas['id_fasilitas'] == $row['id_fasilitas']) echo "selected"; ?>> <?= $fasilitas['id_fasilitas'] . ') ' . $fasilitas['nm_fasilitas'] ?>
                                  </option>
                                <?php } ?>
                              </select>
                            </div>
                            <div class="form-group">
                              <label for="tarif">Tarif</label>
                              <input type="text" name="tarif" class="form-control uang" value="<?php echo $baris['tarif']; ?>">
                            </div>
                      </div>

                      <div class="modal-footer">
                        <button type="submit" class="btn btn-outline-warning btn-block">Update</button>
                      </div>
                    <?php
                      }
                      ?>
                    </form>
                    </div>
                  </div>
                </div>
                <!-- Menutup modal edit data -->

                <!-- Modal Untuk hapus Data -->
                <div class="modal fade" id="ModalHapusData<?php echo $row['id_kamar']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content text-center">
                      <div class="modal-header">
                        <h4 class="modal-title w-100 font-weight-bold text-danger ml-5">Delete</h4>
                        <button type=" button" class="close text-danger" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>

                      <div class="modal-body">
                        <form action="../models/deletes/d_kamar.php" method="post" role="form">
                          <input type="hidden" name="idkamar" class="form-control" value="<?php echo $row['id_kamar']; ?>">
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
<div class="modal fade" id="ModalTambahData" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h4 class="modal-title w-100 font-weight-bold text-primary ml-5">Input</h4>
        <button type="button" class="close text-primary" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="../models/saves/s_kamar.php" method="post" role="form" name="forminput" id="forminput">
          <div class="form-group">
            <?php
            include '..\models\functions\auto_number.php';
            $query = mysqli_query($konekdb, "SELECT * FROM tbl_kamar ORDER BY kode_kamar DESC LIMIT 1");
            $latestKD = mysqli_fetch_assoc($query);
            $kodeKamar = autonumber($latestKD['kode_kamar'], 2, 3);
            ?>
            <label for="kodekamar">Kode Kamar</label>
            <input type="text" name="kodekamar" id="kodekamar" class="form-control" value="<?= $kodeKamar ?>" readonly>
          </div>
          <div class="form-group">
            <label for="idfasilitas">Fasilitas</label>
            <select id="idfasilitas" name="idfasilitas" class="browser-default custom-select">
              <option data-live-search="true" value="" disabled selected> - Pilih Fasilitas - </option>
              <?php
              $query = "SELECT * FROM tbl_fasilitas";
              $hasil = mysqli_query($konekdb, $query);
              while ($qtabel = mysqli_fetch_assoc($hasil)) { ?>
                <option value="<?= $qtabel['id_fasilitas'] ?>"><?= $qtabel['id_fasilitas'] . ') ' . $qtabel['nm_fasilitas'] ?></option>
              <?php } ?>
            </select>
          </div>
          <div class="form-group">
            <label for="tarif">Tarif</label>
            <input type="text" name="tarif" id="tarif" class="form-control uang" required>
          </div>
      </div>

      <div class="modal-footer">
        <button type="submit" name="submit" id="kodekamar" class="btn btn-outline-primary btn-block">ADD</button>
      </div>

      </form>
    </div>
  </div>
</div>
<!-- Menutup modal input data -->

<?php include '../templates/linkfooter.php' ?>