<?php
include('../../config/koneksi.php');

$idtransaksi = $_POST['idtransaksi'];

//query delete
$querydelete = mysqli_query($konekdb, "DELETE FROM tbl_transaksi_listrik WHERE id_transaksi='$idtransaksi'");

if ($querydelete) {
  header('Location:../../views/admin/v_transaksi_token.php?alert_hapus');
} else {
  echo "ERROR, data gagal dihapus" . mysqli_error($konekdb);
}
