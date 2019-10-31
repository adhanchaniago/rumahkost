<?php include '../templates/linkheader.php' ?>
<?php include '../templates/navadmin.php' ?>

<title>Fasilitas</title>

<div class="container mt-5 mb-5">
  <h2 class="h1 text-black d-inline">
    FASILITAS
  </h2>
  <button type="button" name="tambah" class="btn btn-success rounded mb-5 float-right" data-toggle="modal" data-target="#ModalTambahData">
    <i class="fas fa-fw fa-plus"></i>
    Tambah Data
  </button>
  <div class="mt-3">
    <span class="text-black-50" style="font-size:17px">
      <i class="fa fa-home fa-fw font-weight-bold"></i>
      <span class="mx-3 font-weight-bold">|</span>
      <a href="#!.php" class="text-black-50">Home</a>
      <i class="fa fa-angle-right fa-fw mx-2 font-weight-bold"></i>
      <a href="dashboard.php" class="text-black-50">Dashboard</a>
      <i class="fa fa-angle-right fa-fw mx-2 font-weight-bold"></i>
      <span>Manajemen</span>
      <i class="fa fa-angle-right fa-fw mx-2 font-weight-bold"></i>
      <a href="v_fasilitas.php" class="font-weight-bold text-black-50">Fasilitas</a>
    </span>
  </div>

  <div class="bg-white shadow-sm rounded py-4 px-5 mt-5">
    <div class="panel panel-default">
      <div class="panel-body">
        <?php include '../templates/alert.php' ?>
        <div>
          <table id="dt" class="table table-hover">
            <thead class="header ">
              <tr class="text-center text-white">
                <th>#</th>
                <th>Nama Fasilitas</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php
              include('../../config/koneksi.php');

              $query = mysqli_query($konekdb, "SELECT * FROM tbl_fasilitas");
              $no = 1;
              while ($row = mysqli_fetch_array($query)) {
                ?>
                <tr class="text-center">
                  <td class="align-middle"><?php echo $no++; ?></td>
                  <td class="align-middle"><?php echo $row['nm_fasilitas']; ?></td>
                  <td>
                    <button type="button" name="edit" class="btn btn-sm btn-warning shadow-none rounded text-white" data-toggle="modal" data-target="#ModalEditData<?php echo $row['id_fasilitas']; ?>"><i class="fas fa-fw fa-edit"></i></button>
                    <button type="button" name="hapus" class="btn btn-sm btn-danger shadow-none rounded" data-toggle="modal" data-target="#ModalHapusData<?php echo $row['id_fasilitas']; ?>"><i class="fas fa-fw fa-trash"></i></button>
                  </td>
                </tr>

                <!-- Modal Untuk edit Data -->
                <div class="modal fade" id="ModalEditData<?php echo $row['id_fasilitas']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                      <div class="modal-header text-center">
                        <h4 class="modal-title w-100 font-weight-bold text-warning">EDIT</h4>
                      </div>

                      <div class="modal-body grey lighten-5">
                        <form action="../../models/updates/u_fasilitas.php" method="post" role="form">
                          <?php
                            $idfasilitas = $row['id_fasilitas'];
                            $query_view = mysqli_query($konekdb, "SELECT * FROM tbl_fasilitas WHERE id_fasilitas='$idfasilitas'");
                            while ($baris = mysqli_fetch_assoc($query_view)) {
                              ?>
                            <div>
                              <input type="hidden" name="idfasilitas" class="form-control" value="<?php echo $baris['id_fasilitas']; ?>" readonly>
                            </div>
                            <div class="md-form">
                              <label for="nmfasilitas">Nama Fasilitas</label>
                              <input type="text" name="nmfasilitas" class="form-control" value="<?php echo $baris['nm_fasilitas']; ?>">
                            </div>
                      </div>

                      <div class="modal-footer justify-content-center">
                        <button type="submit" class="btn btn-warning">UPDATE</button>
                        <button type="button" class="btn btn-outline-warning" data-dismiss="modal">NO</button>
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
                <div class="modal fade" id="ModalHapusData<?php echo $row['id_fasilitas']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content text-center">
                      <div class="modal-header">
                        <h4 class="modal-title w-100 font-weight-bold text-danger">DELETE</h4>
                      </div>

                      <div class="modal-body grey lighten-5">
                        <form action="../../models/deletes/d_fasilitas.php" method="post" role="form">
                          <input type="hidden" name="idfasilitas" class="form-control" value="<?php echo $row['id_fasilitas']; ?>">
                          <center>
                            <h4>Yakin data akan dihapus ?</h4>
                          </center>
                      </div>

                      <div class="modal-footer flex-center">
                        <button type="submit" class="btn btn-outline-danger">YES</button>
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
        <form action="../../models/saves/s_fasilitas.php" method="post" role="form" name="forminput" id="forminput">
          <div class="md-form">
            <label for="nmfasilitas">Nama Fasilitas</label>
            <input type="text" name="nmfasilitas" id="nmfasilitas" class="form-control" required autofocus>
          </div>
      </div>

      <div class="modal-footer justify-content-center">
        <button type="submit" name="submit" id="nmfasilitas" class="btn btn-success">ADD</button>
        <button type="button" class="btn btn-outline-success waves-effect" data-dismiss="modal">NO</button>
      </div>

      </form>
    </div>
  </div>
</div>
<!-- Menutup modal input data -->

<?php include '../templates/linkfooter.php' ?>