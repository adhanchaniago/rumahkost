<?php
include("../../config/koneksi.php");

$notransaksi  = $_POST['notransaksi'];
$tgltransaksi  = $_POST['tgltransaksi'];
$idpenyewa = $_POST['idpenyewa'];
$idbiaya = $_POST['idbiaya'];
$jumlahbiaya = $_POST['jumlahbiaya'];

$hasil = mysqli_query($konekdb, "INSERT INTO tbl_transaksi_listrik VALUES('','$notransaksi','$tgltransaksi','$idpenyewa','$idbiaya','$jumlahbiaya','Belum Lunas',0)");

buatAlert("Transaksi kamar berhasil di tambah", "success");
header('Location:../../views/admin/v_transaksi_token.php');
