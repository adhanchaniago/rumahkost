<table class="table table-bordered table-responsive-md">
  <thead>
    <tr class="text-center">
      <th>No</th>
      <th>Tgl Transaksi</th>
      <th>No.Transaksi</th>
      <th>Penyewa</th>
      <th>Token Listrik</th>
      <th>Harga</th>
    </tr>
  </thead>
  <tbody>
    <?php
    include('../../config/koneksi.php');

    if (isset($_GET['tokenlunas'])) {
      $tanggal = $_GET['tokenlunas'];
      if ($tanggal == "0") {
        $query = mysqli_query($konekdb, "SELECT * FROM view_transaksi_listrik WHERE arsip = 1");
        $no = 1;
      } else {
        $query = mysqli_query($konekdb, "SELECT * FROM view_transaksi_listrik WHERE month(tgl_transaksi) = '$tanggal' AND arsip = 1");
        $no = 1;
      }
    } else {
      $query = mysqli_query($konekdb, "SELECT * FROM view_transaksi_listrik WHERE arsip = 1");
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
</script>