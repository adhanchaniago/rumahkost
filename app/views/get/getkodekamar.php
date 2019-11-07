<?php
include '../../config/koneksi.php';

$idpenyewa = $_GET['idpenyewa'];

$sql = mysqli_query($konekdb, "SELECT * FROM view_penyewa WHERE id_penyewa='$idpenyewa'");
$get = mysqli_fetch_array($sql);
?>
<input type="text" class="form-control" id="kodekamar" name="kodekamar" required readonly autocomplete="off" value="<?= $get['kode_kamar'] ?>">