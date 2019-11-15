<?php
include('../../config/koneksi.php');

$idpenyewa = $_POST['idpenyewa'];
$noktp = $_POST['noktp'];
$nama = $_POST['nama'];
$jk = $_POST['jk'];
$pekerjaan = $_POST['pekerjaan'];
$nohandphone = preg_replace('/\D/', '', $_POST['nohandphone']);
$kodekamar = $_POST['kodekamar'];
$tglmasuk = $_POST['tglmasuk'];
$tglexpiresewa = date('Y-m-d', strtotime('+1 month', strtotime($tglmasuk)));

//query update
$queryupdate = mysqli_query($konekdb, "UPDATE tbl_penyewa SET no_ktp='$noktp', nama='$nama', jk='$jk', pekerjaan='$pekerjaan', no_handphone='$nohandphone', kode_kamar='$kodekamar', tgl_masuk='$tglmasuk', tgl_expiresewa='$tglexpiresewa' WHERE id_penyewa='$idpenyewa' ");

if ($queryupdate) {
  buatAlert("Penyewa berhasil di tambah", "warning");
  header('Location:../../views/admin/v_penyewa.php');
} else {
  echo "ERROR, data gagal diupdate" . mysqli_error($konekdb);
}
