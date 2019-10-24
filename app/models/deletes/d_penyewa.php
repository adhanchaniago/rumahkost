<?php
include('../../config/koneksi.php');

$idpenyewa = $_POST['idpenyewa'];

//query delete
$querydelete = mysqli_query($konekdb, "DELETE FROM tbl_penyewa WHERE id_penyewa='$idpenyewa' ");

if ($querydelete) {
  echo '<script>document.location="../../views/v_penyewa.php?alert_hapus";</script>';
} else {
  echo "ERROR, data gagal dihapus" . mysqli_error($konekdb);
}
