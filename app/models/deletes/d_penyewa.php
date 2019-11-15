<?php
include('../../config/koneksi.php');

$idpenyewa = $_POST['idpenyewa'];
$kodekamar = $_POST['kodekamar'];

//query delete
mysqli_query($konekdb, "UPDATE tbl_kamar SET status_kamar='Kosong' WHERE kode_kamar='$kodekamar'");
$querydelete = mysqli_query($konekdb, "DELETE FROM tbl_penyewa WHERE id_penyewa='$idpenyewa' ");

if ($querydelete) {
  buatAlert("Penyewa berhasil di tambah", "danger", "fas fa-trash");
  header('Location:../../views/admin/v_penyewa.php?alert_hapus');
} else {
  echo "ERROR, data gagal dihapus" . mysqli_error($konekdb);
}
