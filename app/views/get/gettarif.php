<?php
include '../../config/koneksi.php';

$idpenyewa = $_GET['idpenyewa'];

$sql = mysqli_query($konekdb, "SELECT * FROM view_penyewa WHERE id_penyewa='$idpenyewa'");
$get = mysqli_fetch_array($sql);
?>
<div class="input-group-prepend">
  <span class="input-group-text md-addon">Rp.</span>
</div>
<input type="text" class="form-control uang" id="tarif" name="tarif" required readonly autocomplete="off" value="<?= $get['tarif'] ?>">