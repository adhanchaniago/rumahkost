<table id="dt" class="table table-hover table-responsive-md">
  <thead class="elegant-color-dark">
    <tr class="text-center text-white">
      <th>#</th>
      <th>Tgl Transaksi</th>
      <th>No.Transaksi</th>
      <th>Penyewa</th>
      <th>Tkn Listrik</th>
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
        <td>
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
          <a href="../../models/updates/a_berhasil_transaksi_token.php?id=<?= $row['id_transaksi'] ?>" class="btn btn-sm btn-indigo rounded shadow-none waves-effect"><i class="fas fa-fw fa-folder-open"></i></a>
          <a href="../../models/updates/a_batal_transaksi_token.php?id=<?= $row['id_transaksi'] ?>" class="btn btn-sm btn-danger rounded shadow-none waves-effect"><i class="fas fa-fw fa-times"></i></a>
        </td>
      </tr>

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
      }
    })
  });
</script>