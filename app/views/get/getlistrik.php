<?php

$idbiaya = $_GET['idbiaya'];

include '..\..\config\koneksi.php';

$sql = mysqli_query($konekdb, "SELECT * FROM tbl_biaya WHERE id_biaya='$idbiaya'");

while ($get = mysqli_fetch_array($sql)) : ?>
  <label for="total">Total Bayar Token</label>
  <div class="input-group">
    <div class="input-group-prepend">
      <span class="input-group-text">Rp.</span>
    </div>
    <input type="text" class="form-control uang" id="total" required readonly value="<?= $get['jumlah_biaya'] ?>">
  </div>
<?php endwhile; ?>