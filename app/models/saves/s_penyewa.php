<?php
include("../../config/koneksi.php");

$noktp = $_POST['noktp'];
$nama = $_POST['nama'];
$jk = $_POST['jk'];
$pekerjaan = $_POST['pekerjaan'];
$nohandphone = preg_replace('/\D/', '', $_POST['nohandphone']);
$kodekamar = $_POST['kodekamar'];
$tglmasuk = $_POST['tglmasuk_submit'];
$tglexpiresewa = date('Y-m-d', strtotime('+1 month', strtotime($tglmasuk)));

$prosescek = mysqli_query($konekdb, "SELECT * FROM tbl_penyewa WHERE no_ktp = '$noktp'");
if (mysqli_num_rows($prosescek) > 0) {
  header('Location:../../views/admin/v_penyewa.php?alert_terpakai');
} else {
  mysqli_query($konekdb, "UPDATE tbl_kamar SET status_kamar='Terisi' WHERE kode_kamar='$kodekamar'");

  $hasil = mysqli_query($konekdb, "INSERT INTO tbl_penyewa VALUES('','$noktp','$nama','$jk','$pekerjaan','$nohandphone','$kodekamar','$tglmasuk','$tglexpiresewa')");
  header('Location:../../views/admin/v_penyewa.php?alert_simpan');
}
