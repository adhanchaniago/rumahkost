<?php include '../templates/linkheader.php' ?>
<?php include '../templates/navadmin.php' ?>

<title>Kamar</title>

<div class="container mt-5 mb-5">
  <h2 class="h1 text-black d-inline">
    KAMAR
  </h2>
  <button type="button" name="tambah" class="btn success-color btn-md text-white rounded mb-5 float-right" data-toggle="modal" data-target="#ModalTambahData">
    <i class="fas fa-fw fa-plus"></i>
    Tambah Data
  </button>
  <div class="mt-3">
    <span class="text-black-50" style="font-size:17px">
      <i class="fa fa-home fa-fw font-weight-bold"></i>
      <span class="mx-3 font-weight-bold">|</span>
      <a href="dashboard.php" class="text-black-50">Dashboard</a>
      <i class="fa fa-angle-right fa-fw mx-2 font-weight-bold"></i>
      <span>Manajemen</span>
      <i class="fa fa-angle-right fa-fw mx-2 font-weight-bold"></i>
      <a href="v_kamar.php" class="font-weight-bold text-black-50">Kamar</a>
    </span>
  </div>

  <div class="bg-white shadow-sm rounded py-4 px-5 mt-5">
    <div class="panel panel-default">
      <div class="panel-body">
        <?php Alert() ?>
        <div>
          <table id="dt" class="table table-hover table-responsive-md">
            <thead class="elegant-color-dark">
              <tr class="text-center text-white">
                <th>#</th>
                <th>Kode Kamar</th>
                <th>Fasilitas</th>
                <th>Tarif</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php
              include('../../config/koneksi.php');

              $query = mysqli_query($konekdb, "SELECT * FROM view_kamar");
              $no = 1;
              while ($row = mysqli_fetch_array($query)) {
                ?>
                <tr class="text-center">
                  <td class="align-middle"><?php echo $no++; ?></td>
                  <td class="align-middle"><?php echo $row['kode_kamar']; ?>
                    <span class="ml-1 shadow-none badge 
                      <?php if ($row['status_kamar'] == 'Kosong') echo 'badge-success';
                        else if ($row['status_kamar'] == 'Terisi') echo 'badge-danger';
                        ?>">
                      <?= ucfirst($row['status_kamar']); ?>
                    </span>
                  </td>
                  <td class=" align-middle"><?php echo $row['nm_fasilitas']; ?></td>
                  <td class="align-middle">Rp. <span class="uang"><?php echo  $row['tarif']; ?></span>,-</td>
                  <td>
                    <button type="button" name="edit" class="btn btn-sm btn-warning shadow-none rounded text-white" data-toggle="modal" data-target="#ModalEditData<?php echo $row['id_kamar']; ?>"><i class="fas fa-fw fa-edit"></i></button>
                    <button type="button" name="hapus" class="btn btn-sm btn-danger shadow-none rounded" data-toggle="modal" data-target="#ModalHapusData<?php echo $row['id_kamar']; ?>"><i class="fas fa-fw fa-trash"></i></button>
                  </td>
                </tr>

                <!-- Modal Untuk edit Data -->
                <div class="modal fade" id="ModalEditData<?php echo $row['id_kamar']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                      <div class="modal-header text-center">
                        <h4 class="modal-title w-100 font-weight-bold text-warning">EDIT</h4>
                      </div>

                      <div class="modal-body grey lighten-5">
                        <form action="../../models/updates/u_kamar.php" method="post" role="form">
                          <?php
                            $idkamar = $row['id_kamar'];
                            $query_view = mysqli_query($konekdb, "SELECT * FROM tbl_kamar WHERE id_kamar='$idkamar'");
                            while ($baris = mysqli_fetch_assoc($query_view)) {
                              ?>

                            <input type="hidden" name="idkamar" class="form-control" value="<?php echo $baris['id_kamar']; ?>" readonly>

                            <label for="kodekamar">Kode Kamar</label>
                            <input type="text" name="kodekamar" class="form-control" value="<?php echo $baris['kode_kamar']; ?>" readonly>

                            <label for="idfasilitas" class="mt-3">Fasilitas</label>
                            <select class="custom-select browser-default" name="idfasilitas" id="idfasilitas">
                              <?php
                                  $query_view = mysqli_query($konekdb, "SELECT * FROM tbl_fasilitas");
                                  while ($fasilitas = mysqli_fetch_assoc($query_view)) {
                                    ?>
                                <option value="<?= $fasilitas['id_fasilitas'] ?>" <?php if ($fasilitas['id_fasilitas'] == $row['id_fasilitas']) echo "selected"; ?>> <?= $fasilitas['id_fasilitas'] . ') ' . $fasilitas['nm_fasilitas'] ?>
                                </option>
                              <?php } ?>
                            </select>

                            <label for="tarif" class="mt-3">Tarif</label>
                            <div class="input-group">
                              <div class="input-group-prepend">
                                <span class="input-group-text">Rp.</span>
                              </div>
                              <input type="text" name="tarif" class="form-control uang" value="<?php echo $baris['tarif']; ?>">
                            </div>

                      </div>

                      <div class="modal-footer justify-content-center">
                        <button type="submit" class="btn btn-warning">UPDATE</button>
                        <button type="button" class="btn btn-outline-warning waves-effect" data-dismiss="modal">NO</button>
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
                        <h4 class="modal-title w-100 font-weight-bold text-danger">DELETE</h4>
                      </div>

                      <div class="modal-body grey lighten-5">
                        <form action="../../models/deletes/d_kamar.php" method="post" role="form">
                          <input type="hidden" name="idkamar" class="form-control" value="<?php echo $row['id_kamar']; ?>">
                          <center>
                            <h4>Yakin data akan dihapus ?</h4>
                          </center>
                      </div>

                      <div class="modal-footer justify-content-center">
                        <button type="submit" class="btn btn-outline-danger waves-effect">YES</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">NO</button>
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
        <h4 class="modal-title w-100 font-weight-bold text-success">INPUT</h4>
      </div>
      <div class="modal-body grey lighten-5">
        <form action="../../models/saves/s_kamar.php" method="post" role="form" name="forminput" id="forminput">
          <div class="md-form">
            <?php
            $query_autonumber = mysqli_query($konekdb, "SELECT * FROM tbl_kamar ORDER BY kode_kamar DESC LIMIT 1");
            if (mysqli_num_rows($query_autonumber) > 0) {
              $latestKD = mysqli_fetch_assoc($query_autonumber);
              $kodeKamar = autonumber($latestKD['kode_kamar'], 1, 3);
            } else {
              $kodeKamar = "K001";
            }
            ?>
            <label for="kodekamar">Kode Kamar</label>
            <input type="text" name="kodekamar" id="kodekamar" class="form-control" value="<?= $kodeKamar ?>" readonly>
          </div>
          <select id="idfasilitas" name="idfasilitas" class="mdb-select md-form colorful-select dropdown-success">
            <option data-live-search="true" value="" disabled selected>Pilih Fasilitas</option>
            <?php
            $query = "SELECT * FROM tbl_fasilitas";
            $hasil = mysqli_query($konekdb, $query);
            while ($qtabel = mysqli_fetch_assoc($hasil)) { ?>
              <option value="<?= $qtabel['id_fasilitas'] ?>"><?= $qtabel['id_fasilitas'] . ') ' . $qtabel['nm_fasilitas'] ?></option>
            <?php } ?>
          </select>
          <div class="md-form input-group">
            <div class="input-group-prepend">
              <span class="input-group-text md-addon">Rp.</span>
            </div>
            <input type="text" name="tarif" id="tarif" class="form-control uang" required>
          </div>

          <div class=" modal-footer justify-content-center">
            <button type="submit" name="submit" id="kodekamar" class="btn btn-success">ADD</button>
            <button type="button" class="btn btn-outline-success waves-effect" data-dismiss="modal">NO</button>
          </div>

        </form>
      </div>
    </div>
  </div>
</div>
<!-- Menutup modal input data -->

<?php include '../templates/linkfooter.php' ?>