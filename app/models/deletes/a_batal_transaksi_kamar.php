<?php
include('../../config/koneksi.php');

$idtransaksi = $_GET['id'];

$queryupdate = mysqli_query($konekdb, "DELETE FROM tbl_transaksi_kamar WHERE id_transaksi ='$idtransaksi'");

if ($queryupdate) {
  buatAlert("Transaksi kamar di batalkan", "danger", "fas fa-trash");
  header('Location:../../views/admin/v_transaksi_kamar.php');
} else {
  echo "ERROR, data gagal diarsip" . mysqli_error($konekdb);
}
