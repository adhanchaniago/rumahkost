<?php
include('..\..\config\koneksi.php');

$idfasilitas = $_POST['idfasilitas'];
$nmfasilitas = $_POST['nmfasilitas'];

//query update
$queryupdate = mysqli_query($konekdb, "UPDATE tbl_fasilitas SET nm_fasilitas='$nmfasilitas' WHERE id_fasilitas='$idfasilitas'");

if ($queryupdate) {
    header('Location:..\..\views\admin\v_fasilitas.php?alert_edit');
} else {
    echo "ERROR, data gagal diupdate" . mysqli_error($konekdb);
}
