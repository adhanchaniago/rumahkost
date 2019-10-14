<?php
include('../../config/koneksi.php');

$idbiaya = $_POST['idbiaya'];
$tokenlistrik = $_POST['tokenlistrik'];
$jumlahbiaya = preg_replace('/\D/', '', $_POST['jumlahbiaya']);

//query update
$queryupdate = mysqli_query($konekdb, "UPDATE tbl_biaya SET token_listrik='$tokenlistrik', jumlah_biaya='$jumlahbiaya' WHERE id_biaya='$idbiaya' ");

if ($queryupdate) {
    echo '<script>document.location="../../views/v_biaya.php?alert_edit";</script>';
} else {
    echo "ERROR, data gagal diupdate" . mysqli_error($konekdb);
}
