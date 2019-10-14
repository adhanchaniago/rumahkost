<?php
include('../../config/koneksi.php');

$idkamar = $_POST['idkamar'];
$kodekamar = $_POST['kodekamar'];
$idfasilitas = $_POST['idfasilitas'];
$tarif = preg_replace('/\D/', '', $_POST['tarif']);

//query update
$queryupdate = mysqli_query($konekdb, "UPDATE tbl_kamar SET kode_kamar='$kodekamar', id_fasilitas='$idfasilitas', tarif='$tarif' WHERE id_kamar='$idkamar' ");

if ($queryupdate) {
    echo '<script>document.location="../../views/v_kamar.php?alert_edit";</script>';
} else {
    echo "ERROR, data gagal diupdate" . mysqli_error($konekdb);
}
