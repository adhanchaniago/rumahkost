<?php

$nmfasilitas = $_POST['nmfasilitas'];

include("../../config/koneksi.php");

$prosescek = mysqli_query($konekdb, "SELECT * FROM tbl_fasilitas WHERE 'id_fasilitas'");
if (mysqli_num_rows($prosescek) > 0) {
    echo '<script>alert("Data sudah pernah di rekam sebelumnya !");document.location="../../views/v_fasilitas.php";</script>';
} else {
    $hasil = mysqli_query($konekdb, "INSERT INTO tbl_fasilitas VALUES('id_fasilitas','$nmfasilitas')");
    echo '<script>document.location="../../views/v_fasilitas.php?alert_simpan";</script>';
}
