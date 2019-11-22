<?php include '../templates/linkheader.php' ?>
<?php include '../templates/navadmin.php' ?>

<title>Penyewa</title>

<div class="container mt-5 mb-5">
  <h1 class="h1 text-black d-inline">
    DATA PENYEWA
  </h1>
  <button type="button" name="tambah" class="btn btn-success btn-md rounded mb-5 shadow-none float-right" data-toggle="modal" data-target="#ModalTambahData">
    <i class="fas fa-fw fa-plus"></i>
    Tambah Data
  </button>
  <div class="mt-3">
    <span class="text-black-50" style="font-size:17px">
      <i class="fa fa-home fa-fw font-weight-bold"></i>
      <span class="mx-3 font-weight-bold">|</span>
      <a href="dashboard.php" class="text-black-50">Dashboard</a>
      <i class="fa fa-angle-right fa-fw mx-2 font-weight-bold"></i>
      <a href="v_penyewa.php" class="font-weight-bold text-black-50">Penyewa</a>
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
                <th>No.KTP</th>
                <th>Nama</th>
                <th>JK</th>
                <th>Pekerjaan</th>
                <th>No.Hp</th>
                <th>Kode Kamar</th>
                <th>Tgl Sewa</th>
                <th>Tgl Expire</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php
              include('../../config/koneksi.php');

              $query = mysqli_query($konekdb, "SELECT * FROM view_penyewa");
              $no = 1;
              while ($row = mysqli_fetch_array($query)) {
                ?>
                <tr class="text-center">
                  <td class="align-middle"><?php echo $no++ ?></td>
                  <td class="align-middle"><?php echo $row['no_ktp'] ?></td>
                  <td class="align-middle"><?php echo $row['nama'] ?>
                    <span class="badge badge-secondary shadow-none ml-1">Active</span>
                  </td>
                  <td class="align-middle"><?php echo $row['jk'] ?></td>
                  <td class="align-middle"><?php echo $row['pekerjaan'] ?></td>
                  <td class="align-middle telp"><?php echo $row['no_handphone']; ?></td>
                  <td class="align-middle"><?php echo $row['kode_kamar'] ?></td>
                  <td class="align-middle"><?php echo $row['tgl_masuk'] ?></td>
                  <td class="align-middle"><?php echo $row['tgl_expiresewa'] ?></td>
                  <td>
                    <button type="button" name="edit" class="btn btn-sm btn-warning shadow-none rounded text-white" data-toggle="modal" data-target="#ModalEditData<?php echo $row['id_penyewa']; ?>"><i class="fas fa-fw fa-edit"></i></button>
                    <button type="button" name="hapus" class="btn btn-sm btn-danger shadow-none rounded" data-toggle="modal" data-target="#ModalHapusData<?php echo $row['id_penyewa']; ?>"><i class="fas fa-fw fa-trash"></i></button>
                  </td>
                </tr>

                <!-- Modal Untuk edit Data -->
                <div class="modal fade" id="ModalEditData<?php echo $row['id_penyewa']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-scrollable" role="document">
                    <div class="modal-content">
                      <div class="modal-header text-center">
                        <h4 class="modal-title w-100 font-weight-bold text-warning">EDIT</h4>
                      </div>

                      <div class="modal-body grey lighten-5">
                        <form action="../../models/updates/u_penyewa.php" method="post" role="form">
                          <?php
                            $idpenyewa = $row['id_penyewa'];
                            $query_view = mysqli_query($konekdb, "SELECT * FROM tbl_penyewa WHERE id_penyewa='$idpenyewa'");
                            while ($baris = mysqli_fetch_assoc($query_view)) {
                              ?>

                            <input type="hidden" name="idpenyewa" class="form-control" value="<?php echo $baris['id_penyewa']; ?>" readonly>

                            <label for="noktp">No.KTP</label>
                            <input type="text" name="noktp" class="form-control" value="<?php echo $baris['no_ktp']; ?>" readonly>

                            <label for="nama" class="mt-3">Nama</label>
                            <input type="text" name="nama" class="form-control" value="<?php echo $baris['nama']; ?>" readonly>

                            <label for="jk" class="mt-3">Jenis Kelamin</label>
                            <select name="jk" id="jk" class="custom-select browser-default">
                              <option value="L" <?php if ($baris['jk'] == 'L') echo 'selected' ?>>L</option>
                              <option value="P" <?php if ($baris['jk'] == 'P') echo 'selected' ?>>P</option>
                            </select>

                            <label for="pekerjaan" class="mt-3">Pekerjaan</label>
                            <select name="pekerjaan" id="pekerjaan" class="custom-select browser-default">
                              <option value="Mahasiswa" <?php if ($baris['pekerjaan'] == 'Mahasiswa') echo 'selected' ?>>Mahasiswa</option>
                              <option value="PNS" <?php if ($baris['pekerjaan'] == 'PNS') echo 'selected' ?>>PNS</option>
                              <option value="Karyawan Swasta" <?php if ($baris['pekerjaan'] == 'Karyawab Swasta') echo 'selected' ?>>Karyawan Swasta</option>
                            </select>


                            <label for="nohandphone" class="mt-3">No.Hp</label>
                            <input type="text" name="nohandphone" class="form-control telp" value="<?php echo $baris['no_handphone']; ?>">


                            <label for="kodekamar" class="mt-3">Kode Kamar</label>
                            <select class="custom-select browser-default" name="kodekamar" id="kodekamar">
                              <?php
                                  $query_view = mysqli_query($konekdb, "SELECT * FROM view_kamar");
                                  while ($fasilitas = mysqli_fetch_assoc($query_view)) {
                                    ?>
                                <option value="<?= $fasilitas['kode_kamar'] ?>" <?php if ($fasilitas['kode_kamar'] == $row['kode_kamar']) echo "selected"; ?>> <?= $fasilitas['kode_kamar'] . ') ' . $fasilitas['nm_fasilitas'] ?>
                                </option>
                              <?php } ?>
                            </select>

                            <label for="tglmasuk" class="mt-3">Tanggal Sewa</label>
                            <input type='text' name="tglmasuk" class="form-control datepicker" id='tglmasuk' value="<?php echo $row['tgl_masuk']; ?>">

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
                <div class="modal fade" id="ModalHapusData<?php echo $row['id_penyewa']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content text-center">
                      <div class="modal-header">
                        <h4 class="modal-title w-100 font-weight-bold text-danger">DELETE</h4>
                      </div>

                      <div class="modal-body grey lighten-5">
                        <form action="../../models/deletes/d_penyewa.php" method="post" role="form">
                          <input type="hidden" name="idpenyewa" class="form-control" value="<?php echo $row['id_penyewa']; ?>">
                          <input type="hidden" name="kodekamar" class="form-control" value="<?php echo $row['kode_kamar']; ?>">
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
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h4 class="modal-title w-100 font-weight-bold text-success">INPUT</h4>
      </div>
      <div class="modal-body grey lighten-5">
        <form action="../../models/saves/s_penyewa.php" method="post" role="form" name="forminput" id="forminput">
          <div class="md-form">
            <label for="noktp">No.KTP</label>
            <input type="number" name="noktp" id="noktp" class="form-control" required autofocus>
          </div>
          <div class="md-form">
            <label for="nama">Nama</label>
            <input type="text" name="nama" id="nama" class="form-control" required>
          </div>
          <select class="mdb-select md-form colorful-select dropdown-success" name="jk" required>
            <option value="" disabled selected>Pilih Jenis Kelamin</option>
            <option value="L">L</option>
            <option value="P">P</option>
          </select>
          <select class="mdb-select md-form colorful-select dropdown-success" name="pekerjaan" required>
            <option value="" disabled selected>Pilih Pekerjaan</option>
            <option value="Mahasiswa">Mahasiswa</option>
            <option value="PNS">PNS</option>
            <option value="Karyawan Swasta">Karyawan Swasta</option>
          </select>
          <div class="md-form">
            <label for="nohandphone">No.Hp</label>
            <input type="text" name="nohandphone" id="nohandphone" class="form-control telp" required>
          </div>
          <select id="kodekamar" name="kodekamar" class="mdb-select md-form colorful-select dropdown-success" required>
            <option data-live-search="true" value="" disabled selected>Pilih Kode Kamar</option>
            <?php
            $query = "SELECT * FROM view_kamar WHERE status_kamar='Kosong'";
            $hasil = mysqli_query($konekdb, $query);
            while ($qtabel = mysqli_fetch_assoc($hasil)) { ?>
              <option value="<?= $qtabel['kode_kamar'] ?>"><?= $qtabel['kode_kamar'] . ' - ' . $qtabel['nm_fasilitas'] ?></option>
            <?php } ?>
          </select>
          <div class="md-form">
            <label for="tglmasuk">Tanggal Sewa</label>
            <input type='text' name="tglmasuk" class="form-control datepicker" id='tglmasuk' required>
          </div>
      </div>

      <div class="modal-footer justify-content-center">
        <button type="submit" name="submit" id="noktp" class="btn btn-success">ADD</button>
        <button type="button" class="btn btn-outline-success waves-effect" data-dismiss="modal">NO</button>
      </div>

      </form>
    </div>
  </div>
</div>
<!-- Menutup modal input data -->

<?php include '../templates/linkfooter.php' ?>