<?php include '../templates/linkheader.php' ?>

<title>Fasilitas</title>

<div class="container">
  <div class="panel panel-default">&nbsp;
    <div class="panel-heading mb-3">
      <center>
        <h3 class="font-weight-bold">Input Data Fasilitas
      </center>
      </h3>
    </div>
    <button type="button" name="tambah" class="btn btn-primary rounded mb-3" data-toggle="modal" data-target="#ModalTambahData">ADD</button>
    <div class="panel-body">
      <?php include '../templates/alert.php' ?>
      <div>
        <table id="dt" class="table table-bordered table-striped">
          <thead>
            <tr class="text-center">
              <th>ID Fasilitas</th>
              <th>Nama Fasilitas</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php
            include('../config/koneksi.php');

            $query = mysqli_query($konekdb, "SELECT * FROM tbl_fasilitas");
            while ($row = mysqli_fetch_array($query)) {
              ?>
              <tr class="text-center">
                <td class="align-middle"><?php echo $row['id_fasilitas']; ?></td>
                <td class="align-middle"><?php echo $row['nm_fasilitas']; ?></td>
                <td>
                  <button type="button" name="edit" class="btn btn-warning rounded text-white" data-toggle="modal" data-target="#ModalEditData<?php echo $row['id_fasilitas']; ?>"><i class="fas fa-fw fa-edit"></i></button>
                  <button type="button" name="hapus" class="btn btn-danger rounded" data-toggle="modal" data-target="#ModalHapusData<?php echo $row['id_fasilitas']; ?>"><i class="fas fa-fw fa-trash"></i></button>
                </td>
              </tr>

              <!-- Modal Untuk edit Data -->
              <div class="modal fade" id="ModalEditData<?php echo $row['id_fasilitas']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title w-100 font-weight-bold text-warning ml-5">Edit</h4>
                      <button type="button" class="close text-warning" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>

                    <div class="modal-body">
                      <form action="../models/updates/u_fasilitas.php" method="post" role="form">
                        <?php
                          $idfasilitas = $row['id_fasilitas'];
                          $query_view = mysqli_query($konekdb, "SELECT * FROM tbl_fasilitas WHERE id_fasilitas='$idfasilitas'");
                          while ($baris = mysqli_fetch_assoc($query_view)) {
                            ?>
                          <div class="form-group">
                            <label for="idfasilitas">ID Fasilitas</label>
                            <input type="text" name="idfasilitas" class="form-control" value="<?php echo $baris['id_fasilitas']; ?>" readonly>
                          </div>
                          <div class="form-group">
                            <label for="nmfasilitas">Nama Fasilitas</label>
                            <input type="text" name="nmfasilitas" class="form-control" value="<?php echo $baris['nm_fasilitas']; ?>">
                          </div>
                    </div>

                    <div class="modal-footer flex-center">
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
              <div class="modal fade" id="ModalHapusData<?php echo $row['id_fasilitas']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="modal-content text-center">
                    <div class="modal-header">
                      <h4 class="modal-title w-100 font-weight-bold text-danger ml-5">Delete</h4>
                      <button type=" button" class="close text-danger" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>

                    <div class="modal-body">
                      <form action="../models/deletes/d_fasilitas.php" method="post" role="form">
                        <input type="hidden" name="idfasilitas" class="form-control" value="<?php echo $row['id_fasilitas']; ?>">
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
        <form action="../models/saves/s_fasilitas.php" method="post" role="form" name="forminput" id="forminput">
          <div class="form-group">
            <label for="nmfasilitas">Nama Fasilitas</label>
            <input type="text" name="nmfasilitas" id="nmfasilitas" class="form-control" required autofocus>
          </div>
      </div>

      <div class="modal-footer">
        <button type="submit" name="submit" id="nmfasilitas" class="btn btn-outline-primary btn-block">ADD</button>
      </div>

      </form>
    </div>
  </div>
</div>
<!-- Menutup modal input data -->

<?php include '../templates/linkfooter.php' ?>