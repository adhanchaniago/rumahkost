<?php

$kodekamar = $_POST['kodekamar'];
$idfasilitas = $_POST['idfasilitas'];
$tarif = preg_replace('/\D/', '', $_POST['tarif']);

include("../../config/koneksi.php");

$prosescek = mysqli_query($konekdb, "SELECT * FROM tbl_kamar WHERE 'kode_kamar'");
if (mysqli_num_rows($prosescek) > 0) {
    echo '<script>alert("Data sudah pernah di rekam sebelumnya !");document.location="../../views/v_kamar.php";</script>';
} else {
    $hasil = mysqli_query($konekdb, "INSERT INTO tbl_kamar VALUES('id_kamar','$kodekamar','$idfasilitas','$tarif')");
    echo '<script>document.location="../../views/v_kamar.php?alert_simpan";</script>';
}
