<?php
include('../../config/koneksi.php');

$idtransaksi = $_GET['id'];

$queryupdate = mysqli_query($konekdb, "DELETE FROM tbl_transaksi_listrik WHERE id_transaksi ='$idtransaksi'");

if ($queryupdate) {
  header('Location:../../views/admin/v_transaksi_token.php?alert_arsip_batal');
} else {
  echo "ERROR, data gagal diarsip" . mysqli_error($konekdb);
}
