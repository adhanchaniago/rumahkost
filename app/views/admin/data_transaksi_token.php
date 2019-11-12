<table id="dt" class="table table-hover table-responsive-md">
  <thead class="elegant-color-dark">
    <tr class="text-center text-white">
      <th>#</th>
      <th>Tgl Transaksi</th>
      <th>No.Transaksi</th>
      <th>Penyewa</th>
      <th>Token Listrik</th>
      <th>Harga</th>
      <th>Status</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
    <?php
    include('../../config/koneksi.php');

    if (isset($_GET['datatoken'])) {
      $tanggal = $_GET['datatoken'];
      if ($tanggal == "0") {
        $query = mysqli_query($konekdb, "SELECT * FROM view_transaksi_listrik WHERE arsip = 0");
        $no = 1;
      } else {
        $query = mysqli_query($konekdb, "SELECT * FROM view_transaksi_listrik WHERE month(tgl_transaksi) = '$tanggal' AND arsip = 0");
        $no = 1;
      }
    } else {
      $query = mysqli_query($konekdb, "SELECT * FROM view_transaksi_listrik WHERE arsip = 0");
      $no = 1;
    }

    while ($row = mysqli_fetch_array($query)) {
      ?>

      <tr class="text-center">
        <td class="align-middle"><?php echo $no++; ?></td>
        <td class="align-middle"><?php echo $row['tgl_transaksi']; ?></td>
        <td class="align-middle"><?php echo $row['no_transaksi']; ?></td>
        <td class="align-middle"><?php echo $row['nama']; ?></td>
        <td class="align-middle"><?php echo $row['token_listrik']; ?></td>
        <td class="align-middle">Rp. <span class="uang"><?php echo $row['jumlah_biaya']; ?></span>,-</td>
        <!-- Status -->
        <td class="align-middle">
          <select class="browser-default custom-select status" name="Status" transaksi="<?= $row['id_transaksi'] ?>" id="StatusTransaksi">
            <option <?php if ($row['status_bayar'] == "Lunas") {
                        echo 'selected';
                      } ?> value="Lunas">Lunas</option>
            <option <?php if ($row['status_bayar'] == "Belum Lunas") {
                        echo 'selected';
                      } ?> value="Belum Lunas">Belum Lunas</option>
          </select>
        </td>
        <td class="align-middle">
          <?php if ($row['status_bayar'] == 'Belum Lunas') : ?>
            <a class="btn btn-sm btn-indigo rounded shadow-none waves-effect arsip disabled">
              <i class="fas fa-fw fa-folder-open"></i>
            </a>
          <?php else : ?>
            <a href="../../models/updates/a_berhasil_transaksi_token.php?id=<?= $row['id_transaksi'] ?>" class="btn btn-sm btn-indigo rounded shadow-none waves-effect">
              <i class="fas fa-fw fa-folder-open"></i>
            </a>
          <?php endif; ?>
          <button type="button" name="hapus" class="btn btn-sm btn-danger shadow-none rounded waves-effect" data-toggle="modal" data-target="#ModalHapusData<?php echo $row['id_transaksi']; ?>"><i class="fas fa-fw fa-times"></i></button>
        </td>
      </tr>

      <!-- Modal Untuk hapus Data -->
      <div class="modal fade" id="ModalHapusData<?php echo $row['id_transaksi']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content text-center">
            <div class="modal-header">
              <h4 class="modal-title w-100 font-weight-bold text-danger">DELETE</h4>
            </div>

            <div class="modal-body grey lighten-5">
              <form action="../../models/deletes/d_token.php" method="post" role="form">
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

<script>
  // Data Tables
  $("#dt").DataTable();

  // Show Rows
  $("select[name='dt_length']").addClass("d-inline");

  // Status
  $('.status').change(function() {
    var status = $(this).val();
    var transaksi = $(this).attr('transaksi');

    console.log(status);

    $.ajax({
      url: '../../models/saves/s_updatestatus_token.php',
      type: 'POST',
      data: {
        'status': status,
        'transaksi': transaksi
      },
      success: function(html) {
        location.reload();
      }
    })
  });
</script>