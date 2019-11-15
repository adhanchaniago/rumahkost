<?php
include('../../config/koneksi.php');

$idtransaksi = $_GET['id'];

$queryupdate = mysqli_query($konekdb, "DELETE FROM tbl_transaksi_listrik WHERE id_transaksi ='$idtransaksi'");

if ($queryupdate) {
  buatAlert("Transaksi token di batalkan", "danger", "fas fa-trash");
  header('Location:../../views/admin/v_transaksi_token.php');
} else {
  echo "ERROR, data gagal diarsip" . mysqli_error($konekdb);
}
