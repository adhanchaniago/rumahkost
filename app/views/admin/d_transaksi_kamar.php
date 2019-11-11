<table id="dt" class="table table-hover table-responsive-md">
  <thead class="elegant-color-dark">
    <tr class="text-center text-white">
      <th>#</th>
      <th>Tgl Transaksi</th>
      <th>No.Transaksi</th>
      <th>Periode</th>
      <th>Penyewa</th>
      <th>Kode Kamar</th>
      <th>Tarif</th>
      <th>Print</th>
    </tr>
  </thead>
  <tbody>
    <?php
    include('../../config/koneksi.php');

    if (isset($_GET['arsipkamar'])) {
      $tanggal = $_GET['arsipkamar'];
      if ($tanggal == "0") {
        $query = mysqli_query($konekdb, "SELECT * FROM view_transaksi_kamar WHERE arsip = 1");
        $no = 1;
      } else {
        $query = mysqli_query($konekdb, "SELECT * FROM view_transaksi_kamar WHERE month(tgl_transaksi) = '$tanggal' AND arsip = 1");
        $no = 1;
      }
    } else {
      $query = mysqli_query($konekdb, "SELECT * FROM view_transaksi_kamar WHERE arsip = 1");
      $no = 1;
    }

    while ($row = mysqli_fetch_array($query)) {
      ?>

      <tr class="text-center">
        <td class="align-middle"><?php echo $no++; ?></td>
        <td class="align-middle"><?php echo $row['tgl_transaksi']; ?></td>
        <td class="align-middle"><?php echo $row['no_transaksi']; ?></td>
        <td class="align-middle"><?php echo $row['periode']; ?></td>
        <td class="align-middle"><?php echo $row['nama']; ?></td>
        <span class="ml-1 shadow-none badge 
          <?php if ($row['arsip'] == 'Lunas') echo 'badge-success';
            ?>">
          <?= ucfirst($row['arsip']); ?>
        </span>
        <td class="align-middle"><?php echo $row['kode_kamar']; ?></td>
        <td class="align-middle">Rp. <span class="uang"><?php echo $row['tarif']; ?></span>,-</td>
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