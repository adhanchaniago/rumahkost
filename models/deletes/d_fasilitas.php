<?php
include('../../config/koneksi.php');

$idfasilitas = $_POST['idfasilitas'];

$kamar = mysqli_query($konekdb, "SELECT * FROM tbl_kamar WHERE id_fasilitas='$idfasilitas'");
$a1 = mysqli_num_rows($kamar);

if ($a1 > 0) {
    echo '<script>document.location="../../views/v_fasilitas.php?alert_terpakai";</script>';
} else {
    //query delete
    $querydelete = mysqli_query($konekdb, "DELETE FROM tbl_fasilitas WHERE id_fasilitas='$idfasilitas' ");

    if ($querydelete) {
        echo '<script>document.location="../../views/v_fasilitas.php?alert_hapus";</script>';
    } else {
        echo "ERROR, data gagal dihapus" . mysqli_error($konekdb);
    }
}
