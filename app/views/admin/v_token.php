<?php include '../templates/linkheader.php' ?>
<?php include '../templates/navadmin.php' ?>

<title>Token Listrik</title>

<div class="container mt-5 mb-5">
  <h2 class="h1 text-black d-inline">
    TOKEN LISTRIK
  </h2>
  <button type="button" name="tambah" class="btn btn-success btn-md rounded mb-5 float-right" data-toggle="modal" data-target="#ModalTambahData">
    <i class="fas fa-fw fa-plus"></i>
    Tambah Data
  </button>
  <div class="mt-3">
    <span class="text-black-50" style="font-size:17px">
      <i class="fa fa-home fa-fw font-weight-bold"></i>
      <span class="mx-3 font-weight-bold">|</span>
      <a href="dashboard.php" class="text-black-50">Dashboard</a>
      <i class="fa fa-angle-right fa-fw mx-2 font-weight-bold"></i>
      <a href="v_token.php" class="font-weight-bold text-black-50">Token Listrik</a>
    </span>
  </div>

  <div class="bg-white shadow-sm rounded py-4 px-5 mt-5">
    <div class="panel panel-default">
      <div class="panel-body">
        <?php include '../templates/alert.php' ?>
        <div>
          <table id="dt" class="table table-hover table-responsive-md">
            <thead class="elegant-color-dark">
              <tr class="text-center text-white">
                <th>#</th>
                <th>Token Listrik</th>
                <th>Harga Token</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php
              include('../../config/koneksi.php');

              $query = mysqli_query($konekdb, "SELECT * FROM tbl_biaya");
              $no = 1;
              while ($row = mysqli_fetch_array($query)) {
                ?>
                <tr class="text-center">
                  <td class="align-middle"><?php echo $no++; ?></td>
                  <td class="align-middle">TKN <?php echo  $row['token_listrik']; ?></td>
                  <td class="align-middle">Rp. <span class="uang"><?php echo  $row['jumlah_biaya']; ?></span>,-</td>
                  <td>
                    <button type="button" name="edit" class="btn btn-sm btn-warning shadow-none rounded text-white" data-toggle="modal" data-target="#ModalEditData<?php echo $row['id_biaya']; ?>"><i class="fas fa-fw fa-edit"></i></button>
                    <button type="button" name="hapus" class="btn btn-sm btn-danger shadow-none rounded" data-toggle="modal" data-target="#ModalHapusData<?php echo $row['id_biaya']; ?>"><i class="fas fa-fw fa-trash"></i></button>
                  </td>
                </tr>

                <!-- Modal Untuk edit Data -->
                <div class="modal fade" id="ModalEditData<?php echo $row['id_biaya']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                      <div class="modal-header text-center">
                        <h4 class="modal-title w-100 font-weight-bold text-warning ">EDIT</h4>
                      </div>

                      <div class="modal-body grey lighten-5">
                        <form action="../../models/updates/u_biaya.php" method="post" role="form">
                          <?php
                            $idbiaya = $row['id_biaya'];
                            $query_view = mysqli_query($konekdb, "SELECT * FROM tbl_biaya WHERE id_biaya='$idbiaya'");
                            while ($baris = mysqli_fetch_assoc($query_view)) {
                              ?>
                            <div>
                              <input type="hidden" name="idbiaya" class="form-control" value="<?php echo $baris['id_biaya']; ?>" readonly>
                            </div>
                            <div class="md-form input-group">
                              <div class="input-group-prepend">
                                <span class="input-group-text md-addon">TKN</span>
                              </div>
                              <input type="text" name="tokenlistrik" class="form-control" value="<?php echo $baris['token_listrik']; ?>" readonly>
                            </div>
                            <div class="md-form input-group">
                              <div class="input-group-prepend">
                                <span class="input-group-text md-addon">Rp.</span>
                              </div>
                              <input type="text" name="jumlahbiaya" class="form-control uang" value="<?php echo $baris['jumlah_biaya']; ?>">
                            </div>
                      </div>

                      <div class="modal-footer justify-content-center">
                        <button type="submit" class="btn btn-warning">UPDATE</button>
                        <button type="text" class="btn btn-outline-warning waves-effect" data-dismiss="modal">NO</button>
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
                        <h4 class="modal-title w-100 font-weight-bold text-danger">DELETE</h4>
                      </div>

                      <div class="modal-body grey lighten-5">
                        <form action="../../models/deletes/d_biaya.php" method="post" role="form">
                          <input type="hidden" name="idbiaya" class="form-control" value="<?php echo $row['id_biaya']; ?>">
                          <center>
                            <h4>Yakin data akan dihapus ?</h4>
                          </center>
                      </div>

                      <div class="modal-footer justify-content-center">
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
        <form action="../../models/saves/s_biaya.php" method="post" role="form" name="forminput" id="forminput">
          <div class="md-form input-group">
            <div class="input-group-prepend">
              <span class="input-group-text md-addon">TKN</span>
            </div>
            <input type="text" name="tokenlistrik" id="tokenlistrik" class="form-control uang" required>
          </div>
          <div class="md-form input-group">
            <div class="input-group-prepend">
              <span class="input-group-text md-addon">Rp.</span>
            </div>
            <input type="text" name="jumlahbiaya" id="jumlahbiaya" class="form-control uang" required>
          </div>

          <div class="modal-footer justify-content-center">
            <button type="submit" name="submit" id="tokenlistrik" class="btn btn-success">ADD</button>
            <button type="text" class="btn btn-outline-success waves-effect" data-dismiss="modal">NO</button>
          </div>

        </form>
      </div>
    </div>
  </div>
  <!-- Menutup modal input data -->

  <?php include '../templates/linkfooter.php' ?>