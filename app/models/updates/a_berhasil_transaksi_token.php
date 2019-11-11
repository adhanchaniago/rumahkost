<?php
include('../../config/koneksi.php');

$id_transaksi = $_GET['id'];

$queryupdate = mysqli_query($konekdb, "UPDATE tbl_transaksi_listrik SET arsip = 1 WHERE id_transaksi ='$id_transaksi'");

if ($queryupdate) {
  header('Location:../../views/admin/v_transaksi_token.php?alert_arsip_berhasil');
} else {
  echo "ERROR, data gagal diarsip" . mysqli_error($konekdb);
}
