<table id="dt" class="table table-hover">
  <thead class="header">
    <tr class="text-center text-white">
      <th>#</th>
      <th>Tanggal Transaksi</th>
      <th>Penyewa</th>
      <th>Token Listrik</th>
      <th>Harga</th>
      <th>Status</th>
    </tr>
  </thead>
  <tbody>
    <?php
    include('../../config/koneksi.php');

    if (isset($_GET['data'])) {
      $tanggal = $_GET['data'];
      if ($tanggal == "0") {
        $query = mysqli_query($konekdb, "SELECT * FROM view_transaksi_listrik");
        $no = 1;
      } else {
        $query = mysqli_query($konekdb, "SELECT * FROM view_transaksi_listrik WHERE month(tgl_transaksi) = '$tanggal'");
        $no = 1;
      }
    } else {
      $query = mysqli_query($konekdb, "SELECT * FROM view_transaksi_listrik");
      $no = 1;
    }

    while ($row = mysqli_fetch_array($query)) {
      ?>

      <tr class="text-center">
        <td class="align-middle"><?php echo $no++; ?></td>
        <td class="align-middle"><?php echo $row['tgl_transaksi']; ?></td>
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
      url: '../../models/saves/s_updateStatus.php',
      type: 'POST',
      data: {
        'status': status,
        'transaksi': transaksi
      }
    })
  });
</script>