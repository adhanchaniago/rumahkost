<?php

$idkamar = $_POST['idkamar'];

include('..\..\config\koneksi.php');

//query delete
$querydelete = mysqli_query($konekdb, "DELETE FROM tbl_kamar WHERE id_kamar='$idkamar' ");

if ($querydelete) {
    header('Location:..\..\views\admin\v_kamar.php?alert_hapus');
} else {
    echo "ERROR, data gagal dihapus" . mysqli_error($konekdb);
}
