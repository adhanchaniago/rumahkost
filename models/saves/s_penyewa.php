<?php

$noktp = $_POST['noktp'];
$nama = $_POST['nama'];
$jk = $_POST['jk'];
$pekerjaan = $_POST['pekerjaan'];
$nohandphone = preg_replace('/\D/', '', $_POST['nohandphone']);
$kodekamar = $_POST['kodekamar'];
$tglmasuk = $_POST['tglmasuk'];
$tglexpiresewa = date('Y-m-d', strtotime('+1 month', strtotime($tglmasuk)));

include("../../config/koneksi.php");

$prosescek = mysqli_query($konekdb, "SELECT * FROM tbl_penyewa WHERE no_ktp = '$noktp'");
if (mysqli_num_rows($prosescek) > 0) {
  echo '<script>alert("Data sudah pernah di rekam sebelumnya !");document.location="../../views/v_penyewa.php";</script>';
} else {
  $hasil = mysqli_query($konekdb, "INSERT INTO tbl_penyewa VALUES('','$noktp','$nama','$jk','$pekerjaan','$nohandphone','$kodekamar','$tglmasuk','$tglexpiresewa')");
  echo '<script>document.location="../../views/v_penyewa.php?alert_simpan";</script>';
}
