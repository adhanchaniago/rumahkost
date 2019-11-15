<?php
include('../../config/koneksi.php');

$idfasilitas = $_POST['idfasilitas'];

$kamar = mysqli_query($konekdb, "SELECT * FROM tbl_kamar WHERE id_fasilitas='$idfasilitas'");
$double = mysqli_num_rows($kamar);

if ($double > 0) {
    header('Location:../../views/admin/v_fasilitas.php?alert_terpakai');
} else {
    //query delete
    $querydelete = mysqli_query($konekdb, "DELETE FROM tbl_fasilitas WHERE id_fasilitas='$idfasilitas' ");

    if ($querydelete) {
        buatAlert("Fasilitas berhasil di hapus", "danger", "fas fa-trash");
        header('Location:../../views/admin/v_fasilitas.php?alert_hapus');
    } else {
        echo "ERROR, data gagal dihapus" . mysqli_error($konekdb);
    }
}
