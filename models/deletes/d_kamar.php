<?php
include('../../config/koneksi.php');

$idkamar = $_POST['idkamar'];

//query delete
$querydelete = mysqli_query($konekdb, "DELETE FROM tbl_kamar WHERE id_kamar='$idkamar' ");

if ($querydelete) {
    echo '<script>document.location="../../views/v_kamar.php?alert_hapus";</script>';
} else {
    echo "ERROR, data gagal dihapus" . mysqli_error($konekdb);
}
