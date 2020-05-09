<?php include '../templates/linkheader.php' ?>
<?php include '../templates/navadmin.php' ?>

<title>Dashboard</title>

<div class="container mt-4 mb-4">
  <div class="mb-3">
    <?php Alert(); ?>
  </div>
  <div class="row mb-4">

    <div class="col-md">
      <div class="bg-white p-4 rounded shadow-sm">
        <h1 class="h1 text-center">
          <?php
          include('../../config/koneksi.php');
          $query = mysqli_query($konekdb, "SELECT * FROM tbl_fasilitas");
          ($jumlah = mysqli_num_rows($query))
          ?>
          <?php echo $jumlah; ?>
        </h1>
        <h1 class="h6 text-center">Fasilitas</h1>
      </div>
    </div>

    <div class="col-md">
      <div class="bg-white p-4 rounded shadow-sm">
        <h1 class="h1 text-center">
          <?php
          include('../../config/koneksi.php');
          $query = mysqli_query($konekdb, "SELECT * FROM tbl_kamar");
          ($jumlah = mysqli_num_rows($query))
          ?>
          <?php echo $jumlah; ?>
        </h1>
        <h1 class="h6 text-center">Kamar</h1>
      </div>
    </div>

    <div class="col-md">
      <div class="bg-white p-4 rounded shadow-sm">
        <h1 class="h1 text-center">
          <?php
          include('../../config/koneksi.php');
          $query = mysqli_query($konekdb, "SELECT * FROM tbl_penyewa");
          ($jumlah = mysqli_num_rows($query))
          ?>
          <?php echo $jumlah; ?>
        </h1>
        <h1 class="h6 text-center">Penyewa</h1>
      </div>
    </div>

    <div class="col-md">
      <div class="bg-white p-4 rounded shadow-sm">
        <h1 class="h1 text-center">
          <?php
          include('../../config/koneksi.php');
          $queryK = mysqli_query($konekdb, "SELECT * FROM tbl_transaksi_kamar WHERE status_bayar != 'Lunas'");
          ($jumlah = mysqli_num_rows($queryK))
          ?>
          <?php echo $jumlah; ?>
        </h1>
        <h1 class="h6 text-center">Transaksi Kamar</h1>
      </div>
    </div>

    <div class="col-md">
      <div class="bg-white p-4 rounded shadow-sm">
        <h1 class="h1 text-center">
          <?php
          include('../../config/koneksi.php');
          $queryL = mysqli_query($konekdb, "SELECT * FROM tbl_transaksi_listrik WHERE status_bayar != 'Lunas'");
          ($jumlah = mysqli_num_rows($queryL))
          ?>
          <?php echo $jumlah; ?>
        </h1>
        <h1 class="h6 text-center">Transaksi Listrik</h1>
      </div>
    </div>

  </div>

  <div class="row">
    <div class="col-md-6">
      <div class="bg-white shadow-sm rounded pt-5 pb-4">
        <h1 class="h4 text-center">Daftar Kamar</h1>
        <hr class="w-50 border border-secondary">

        <table class="table table-hover table-borderless">
          <?php $query = mysqli_query($konekdb, "SELECT * FROM view_kamar");
          while ($row = mysqli_fetch_array($query)) {
          ?>
            <tr class="text-center">
              <td class="align-middle"><?php echo $row['kode_kamar']; ?>
                <span class="ml-1 shadow-none badge 
                      <?php if ($row['status_kamar'] == 'Kosong') echo 'badge-success';
                                        else if ($row['status_kamar'] == 'Terisi') echo 'badge-danger';
                      ?>">
                  <?= ucfirst($row['status_kamar']); ?>
                </span>
              </td>
              <td class=" align-middle"><?php echo $row['nm_fasilitas']; ?></td>
              <td class="align-middle">Rp. <span class="uang"><?php echo  $row['tarif']; ?></span>,-</td>
            </tr>
          <?php } ?>
        </table>
      </div>
    </div>
    <!-- USER UNACTIVE -->
    <div class="col-md-6">
      <div class="bg-white shadow-sm rounded pt-5 pb-4">
        <h1 class="h4 text-center">Penyewa</h1>
        <hr class="w-50 border border-secondary">

        <table class="table table-hover table-borderless">
          <?php
                                                            $queryp = mysqli_query($konekdb, "SELECT * FROM view_penyewa");
                                                            $no = 1;
                                                            while ($row = mysqli_fetch_array($queryp)) {
          ?>
            <tr class="text-center">
              <td class="align-middle"><?php echo $row['no_ktp'] ?></td>
              <td class="align-middle"><?php echo $row['nama'] ?></td>
              <td class="align-middle"><?php echo $row['kode_kamar'] ?></td>
              <td class="align-middle telp"><?php echo $row['no_handphone']; ?></td>
            </tr>
          <?php } ?>
        </table>
      </div>
    </div>
  </div>

</div>

<?php include '../templates/linkfooter.php' ?>