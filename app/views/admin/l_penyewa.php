<?php include '../templates/linkheader.php' ?>
<?php include '../templates/navadmin.php' ?>

<title>Penyewa</title>

<div class="container mt-5 mb-5">
  <div class="text-center">
    <h1 class="h1 text-black">LAPORAN PENYEWA</h1>
    <span class="h6" id="no-print">
      Tekan tombol
      <span class="badge badge-warning shadow-none">CTRL + P</span>
      untuk mencetak
    </span>
  </div>
  <div class="bg-white rounded py-4 px-5 mt-4">
    <div class="panel panel-default">
      <div class="panel-body">
        <div>
          <table class="table table-bordered table-responsive-md">
            <thead>
              <tr class="text-center">
                <th>No</th>
                <th>No.KTP</th>
                <th>Nama</th>
                <th>Jenis Kelamin</th>
                <th>Pekerjaan</th>
                <th>No.Handphone</th>
                <th>Kode Kamar</th>
                <th>Tanggal Sewa</th>
                <th>Tanggal Expire</th>
              </tr>
            </thead>
            <tbody>
              <?php
              include('../../config/koneksi.php');

              $query = mysqli_query($konekdb, "SELECT * FROM view_penyewa");
              $no = 1;
              while ($row = mysqli_fetch_array($query)) {
                ?>
                <tr class="text-center">
                  <td class="align-middle"><?php echo $no++ ?></td>
                  <td class="align-middle"><?php echo $row['no_ktp'] ?></td>
                  <td class="align-middle"><?php echo $row['nama'] ?></td>
                  <td class="align-middle"><?php echo $row['jk'] ?></td>
                  <td class="align-middle"><?php echo $row['pekerjaan'] ?></td>
                  <td class="align-middle telp"><?php echo $row['no_handphone']; ?></td>
                  <td class="align-middle"><?php echo $row['kode_kamar'] ?></td>
                  <td class="align-middle"><?php echo $row['tgl_masuk'] ?></td>
                  <td class="align-middle"><?php echo $row['tgl_expiresewa'] ?></td>
                </tr>
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

<?php include '../templates/linkfooter.php' ?>