<?php
include('../../config/koneksi.php');

$idbiaya = $_POST['idbiaya'];

//query delete
$querydelete = mysqli_query($konekdb, "DELETE FROM tbl_biaya WHERE id_biaya='$idbiaya' ");

if ($querydelete) {
    buatAlert("Token berhasil di hapus", "danger", "fas fa-trash");
    header('Location:../../views/admin/v_token.php');
} else {
    echo "ERROR, data gagal dihapus" . mysqli_error($konekdb);
}
