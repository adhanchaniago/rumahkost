<table class="table table-bordered table-responsive-md">
  <thead>
    <tr class="text-center">
      <th>No</th>
      <th>Tgl Transaksi</th>
      <th>No.Transaksi</th>
      <th>Penyewa</th>
      <th>Token Listrik</th>
      <th>Harga</th>
      <th>Status</th>
    </tr>
  </thead>
  <tbody>
    <?php
    include('../../config/koneksi.php');

    if (isset($_GET['tokenbelum'])) {
      $tanggal = $_GET['tokenbelum'];
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
        <td class="align-middle font-weight-bold">
          <?php if ($row['status_bayar'] == "Belum Lunas") {
              echo 'Belum Lunas';
            } ?>
        </td>
      </tr>

    <?php
    }
    ?>
  </tbody>
</table>