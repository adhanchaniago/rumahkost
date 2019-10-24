<?php

$idkamar = $_POST['idkamar'];
$kodekamar = $_POST['kodekamar'];
$idfasilitas = $_POST['idfasilitas'];
$tarif = preg_replace('/\D/', '', $_POST['tarif']);

include('..\..\config\koneksi.php');

//query update
$queryupdate = mysqli_query($konekdb, "UPDATE tbl_kamar SET kode_kamar='$kodekamar', id_fasilitas='$idfasilitas', tarif='$tarif' WHERE id_kamar='$idkamar'");

if ($queryupdate) {
    header('Location:..\..\views\admin\v_kamar.php?alert_edit');
} else {
    echo "ERROR, data gagal diupdate" . mysqli_error($konekdb);
}
