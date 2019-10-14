<?php

$tokenlistrik = $_POST['tokenlistrik'];
$jumlahbiaya = preg_replace('/\D/', '', $_POST['jumlahbiaya']);

include("../../config/koneksi.php");

$prosescek = mysqli_query($konekdb, "SELECT * FROM tbl_biaya WHERE 'id_biaya'");
if (mysqli_num_rows($prosescek) > 0) {
    echo '<script>alert("Data sudah pernah di rekam sebelumnya !");document.location="../../views/v_biaya.php";</script>';
} else {
    $hasil = mysqli_query($konekdb, "INSERT INTO tbl_biaya VALUES('id_biaya','$tokenlistrik','$jumlahbiaya')");
    echo '<script>document.location="../../views/v_biaya.php?alert_simpan";</script>';
}
