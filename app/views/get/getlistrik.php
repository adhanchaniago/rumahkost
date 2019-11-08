<?php
include '../../config/koneksi.php';

$idbiaya = $_GET['idbiaya'];

$sql = mysqli_query($konekdb, "SELECT * FROM tbl_biaya WHERE id_biaya='$idbiaya'");
$get = mysqli_fetch_array($sql);
?>
<div class="input-group-prepend">
  <span class="input-group-text md-addon">Rp.</span>
</div>
<input type="text" class="form-control uang" id="jumlahbiaya" name="jumlahbiaya" required readonly autocomplete="off" value="<?= $get['jumlah_biaya'] ?>">