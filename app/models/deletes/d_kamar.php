<?php
include('../../config/koneksi.php');

$idkamar = $_POST['idkamar'];

//query delete
$querydelete = mysqli_query($konekdb, "DELETE FROM tbl_kamar WHERE id_kamar='$idkamar'");

if ($querydelete) {
    buatAlert("kamar berhasil di hapus", "danger", "fas fa-trash");
    header('Location:../../views/admin/v_kamar.php');
} else {
    echo "ERROR, data gagal dihapus" . mysqli_error($konekdb);
}
