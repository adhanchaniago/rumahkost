<?php
include('../../config/koneksi.php');

$notransaksi = $_POST['notransaksi'];

//query delete
$querydelete = mysqli_query($konekdb, "DELETE FROM tbl_transaksi_token WHERE no_transaksi='$notransaksi' ");

if ($querydelete) {
  echo '<script>document.location="../../views/v_transaksi_token.php?alert_hapus";</script>';
} else {
  echo "ERROR, data gagal dihapus" . mysqli_error($konekdb);
}
