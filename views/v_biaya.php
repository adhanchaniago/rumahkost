<?php include '..\templates\linkheader.php' ?>
<?php include '..\templates\navadmin.php' ?>

<title>Token Listrik</title>

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
          <table id="dt" class="table table-bordered table-striped">
            <thead>
              <tr class="text-center">
                <th>ID Biaya</th>
                <th>Token Listrik</th>
                <th>Jumlah Biaya</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php
              include('../config/koneksi.php');

              $query = mysqli_query($konekdb, "SELECT * FROM tbl_biaya");
              while ($row = mysqli_fetch_array($query)) {
                ?>
                <tr class="text-center">
                  <td class="align-middle"><?php echo $row['id_biaya']; ?></td>
                  <td class="align-middle"><?php echo $row['token_listrik']; ?></td>
                  <td class="align-middle">Rp. <span class="uang"><?php echo  $row['jumlah_biaya']; ?></span>,-</td>
                  <td>
                    <button type="button" name="edit" class="btn btn-warning rounded text-white" data-toggle="modal" data-target="#ModalEditData<?php echo $row['id_biaya']; ?>"><i class="fas fa-fw fa-edit"></i></button>
                    <button type="button" name="hapus" class="btn btn-danger rounded" data-toggle="modal" data-target="#ModalHapusData<?php echo $row['id_biaya']; ?>"><i class="fas fa-fw fa-trash"></i></button>
                  </td>
                </tr>

                <!-- Modal Untuk edit Data -->
                <div class="modal fade" id="ModalEditData<?php echo $row['id_biaya']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                      <div class="modal-header text-center">
                        <h4 class="modal-title w-100 font-weight-bold text-warning ml-5">Edit</h4>
                        <button type="button" class="close text-warning" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>

                      <div class="modal-body">
                        <form action="../models/updates/u_biaya.php" method="post" role="form">
                          <?php
                            $idbiaya = $row['id_biaya'];
                            $query_view = mysqli_query($konekdb, "SELECT * FROM tbl_biaya WHERE id_biaya='$idbiaya'");
                            while ($baris = mysqli_fetch_assoc($query_view)) {
                              ?>
                            <div class="form-group">
                              <label for="idbiaya">ID Biaya</label>
                              <input type="text" name="idbiaya" class="form-control" value="<?php echo $baris['id_biaya']; ?>" readonly>
                            </div>
                            <div class="form-group">
                              <label for="tokenlistrik">Token Listrik</label>
                              <input type="text" name="tokenlistrik" class="form-control" value="<?php echo $baris['token_listrik']; ?>" readonly>
                            </div>
                            <div class="form-group">
                              <label for="jumlahbiaya">Jumlah Biaya</label>
                              <input type="text" name="jumlahbiaya" class="form-control uang" value="<?php echo $baris['jumlah_biaya']; ?>">
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
                <div class="modal fade" id="ModalHapusData<?php echo $row['id_biaya']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content text-center">
                      <div class="modal-header">
                        <h4 class="modal-title w-100 font-weight-bold text-danger ml-5">Delete</h4>
                        <button type=" button" class="close text-danger" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>

                      <div class="modal-body">
                        <form action="../models/deletes/d_biaya.php" method="post" role="form">
                          <input type="hidden" name="idbiaya" class="form-control" value="<?php echo $row['id_biaya']; ?>">
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
        <form action="../models/saves/s_biaya.php" method="post" role="form" name="forminput" id="forminput">
          <div class="form-group">
            <label for="tokenlistrik">Token Listrik</label>
            <input type="text" name="tokenlistrik" id="tokenlistrik" class="form-control" required autofocus>
          </div>
          <div class="form-group">
            <label for="jumlahbiaya">Harga Token</label>
            <input type="text" name="jumlahbiaya" id="jumlahbiaya" class="form-control uang" required>
          </div>
      </div>

      <div class="modal-footer flex-center">
        <button type="submit" name="submit" id="tokenlistrik" class="btn btn-outline-primary btn-block">ADD</button>
      </div>

      </form>
    </div>
  </div>
</div>
<!-- Menutup modal input data -->

<?php include '../templates/linkfooter.php' ?>