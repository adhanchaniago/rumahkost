<?php
include('../../config/koneksi.php');

$idbiaya = $_POST['idbiaya'];

//query delete
$querydelete = mysqli_query($konekdb, "DELETE FROM tbl_biaya WHERE id_biaya='$idbiaya' ");

if ($querydelete) {
    echo '<script>document.location="../../views/v_biaya.php?alert_hapus";</script>';
} else {
    echo "ERROR, data gagal dihapus" . mysqli_error($konekdb);
}
