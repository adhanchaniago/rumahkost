<?php include '../templates/linkheader.php' ?>
<?php include '../templates/navadmin.php' ?>

<title>Dashboard</title>

<div class="container mt-4 mb-4">
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
          $query = mysqli_query($konekdb, "SELECT * FROM tbl_biaya");
          ($jumlah = mysqli_num_rows($query))
          ?>
          <?php echo $jumlah; ?>
        </h1>
        <h1 class="h6 text-center">Token Listrik</h1>
      </div>
    </div>

    <div class="col-md">
      <div class="bg-white p-4 rounded shadow-sm">
        <h1 class="h1 text-center">
          <?php
          include('../../config/koneksi.php');
          $query = mysqli_query($konekdb, "SELECT * FROM tbl_transaksi_kamar WHERE no_transaksi != 'TK00000'");
          ($jumlah = mysqli_num_rows($query))
          ?>
          <?php echo $jumlah; ?>
        </h1>
        <h1 class="h6 text-center">Transaksi</h1>
      </div>
    </div>

  </div>

  <div class="row">
    <div class="col-md-6">
      <div class="bg-white shadow-sm rounded pt-5 pb-4">
        <h1 class="h4 text-center">Daftar Kamar</h1>

        <div class="d-flex justify-content-center">
          <div class="hr mb-4 mt-2"></div>
        </div>

        <table class="table table-hover table-borderless">
          <!-- <?php foreach ($data['MobilKosong'] as $mk) : ?>
            <tr class="text-center">
              <td><?= $mk['NoPlat']; ?></td>
              <td><?= $mk['NmMerk']; ?></td>
              <td><?= $mk['NmType']; ?></td>
              <td>
                Rp.<span class="uang"><?= $mk['HargaSewa']; ?></span>,-
              </td>
              <td>
                <a href="" class="btn btn-success btn-sm shadow-none">PESAN</a>
              </td>
            </tr>
          <?php endforeach; ?> -->
        </table>
      </div>
    </div>
    <!-- USER UNACTIVE -->
    <div class="col-md-6">
      <div class="bg-white shadow-sm rounded pt-5 pb-4">
        <h1 class="h4 text-center">Penyewa</h1>

        <div class="d-flex justify-content-center">
          <div class="hr mb-4 mt-2"></div>
        </div>
        <table class="table table-hover table-borderless">
          <!-- <?php if ($_SESSION['Login']['RoleId'] == 1)
                  foreach ($data['UserUn'] as $Un) : ?>
            <tr class="text-center">
              <td><?= $Un['NIK'] ?> </td>
              <td><?= $Un['Nama'] ?> </td>
              <td>
                <a href="<?= BASEURL . '/' . $_SESSION['Login']['Role'] ?>/pending" class="btn btn-success btn-sm shadow-none">Lihat</a>
              </td>
            </tr>
          <?php endforeach; ?> -->
        </table>
      </div>
    </div>
  </div>

</div>

<?php include '../templates/linkfooter.php' ?>