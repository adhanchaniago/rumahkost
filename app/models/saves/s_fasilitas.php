<?php

$nmfasilitas = $_POST['nmfasilitas'];

include("..\..\config\koneksi.php");

$prosescek = mysqli_query($konekdb, "SELECT * FROM tbl_fasilitas WHERE 'id_fasilitas'");
if (mysqli_num_rows($prosescek) > 0) {
    header('Location:..\..\views\admin\v_fasilitas.php?alert_terpakai');
} else {
    $hasil = mysqli_query($konekdb, "INSERT INTO tbl_fasilitas VALUES('id_fasilitas','$nmfasilitas')");
    header('Location:..\..\views\admin\v_fasilitas.php?alert_simpan');
}
