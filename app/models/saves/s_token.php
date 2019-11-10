<?php
include("../../config/koneksi.php");

$tokenlistrik = $_POST['tokenlistrik'];
$jumlahbiaya = preg_replace('/\D/', '', $_POST['jumlahbiaya']);

//query Add
$prosescek = mysqli_query($konekdb, "SELECT * FROM tbl_biaya WHERE 'id_biaya'");

if (mysqli_num_rows($prosescek) > 0) {
    header('Location:../../views/admin/v_token.php?alert_terpakai');
} else {
    $hasil = mysqli_query($konekdb, "INSERT INTO tbl_biaya VALUES('id_biaya','$tokenlistrik','$jumlahbiaya')");
    header('Location:../../views/admin/v_token.php?alert_simpan');
}
