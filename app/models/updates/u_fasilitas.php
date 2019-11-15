<?php
include('../../config/koneksi.php');

$idfasilitas = $_POST['idfasilitas'];
$nmfasilitas = $_POST['nmfasilitas'];

//query update
$queryupdate = mysqli_query($konekdb, "UPDATE tbl_fasilitas SET nm_fasilitas='$nmfasilitas' WHERE id_fasilitas='$idfasilitas'");

if ($queryupdate) {
    buatAlert("Fasilitas berhasil di update", "warning",);
    header('Location:../../views/admin/v_fasilitas.php');
} else {
    echo "ERROR, data gagal diupdate" . mysqli_error($konekdb);
}
