<?php
include('../../config/koneksi.php');

$idtransaksi = $_GET['id'];

$queryupdate = mysqli_query($konekdb, "UPDATE tbl_transaksi_kamar SET arsip = 1 WHERE id_transaksi ='$idtransaksi'");

if ($queryupdate) {
  header('Location:../../views/admin/v_transaksi_kamar.php?alert_arsip_berhasil');
} else {
  echo "ERROR, data gagal diarsip" . mysqli_error($konekdb);
}
