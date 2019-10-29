<?php

$kodekamar = $_POST['kodekamar'];
$idfasilitas = $_POST['idfasilitas'];
$tarif = preg_replace('/\D/', '', $_POST['tarif']);

include("..\..\config\koneksi.php");

//query Add
$prosescek = mysqli_query($konekdb, "SELECT * FROM tbl_kamar WHERE 'kode_kamar'");

if (mysqli_num_rows($prosescek) > 0) {
    header('Location:..\..\views\admin\v_kamar.php?alert_terpakai');
} else {
    $hasil = mysqli_query($konekdb, "INSERT INTO tbl_kamar VALUES('id_kamar','$kodekamar','$idfasilitas','$tarif','Kosong')");
    header('Location:..\..\views\admin\v_kamar.php?alert_simpan');
}
