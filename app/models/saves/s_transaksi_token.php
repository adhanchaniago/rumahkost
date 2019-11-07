<?php
include("../../config/koneksi.php");

$tgltransaksi  = $_POST['tgltransaksi'];
$idpenyewa = $_POST['idpenyewa'];
$idbiaya = $_POST['idbiaya'];
$jumlahbiaya = $_POST['jumlahbiaya'];

$hasil = mysqli_query($konekdb, "INSERT INTO tbl_transaksi_listrik VALUES('','$tgltransaksi','$idpenyewa','$idbiaya','$jumlahbiaya','Belum Lunas',0)");

header('Location:../../views/admin/v_transaksi_token.php?alert_simpan');
