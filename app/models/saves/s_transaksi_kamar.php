<?php
include("../../config/koneksi.php");

$notransaksi  = $_POST['notransaksi'];
$tgltransaksi  = $_POST['tgltransaksi'];
$periode  = $_POST['periode'];
$idpenyewa = $_POST['idpenyewa'];
$kodekamar = $_POST['kodekamar'];
$tarif = $_POST['tarif'];

$hasil = mysqli_query($konekdb, "INSERT INTO tbl_transaksi_kamar VALUES('','$notransaksi','$tgltransaksi','$periode','$idpenyewa','$kodekamar','$tarif','Belum Lunas',0)");

buatAlert("Transaksi kamar berhasil di tambah", "success");
header('Location:../../views/admin/v_transaksi_kamar.php');
