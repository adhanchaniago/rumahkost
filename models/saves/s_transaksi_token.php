<?php

$notransaksi = $_POST['notransaksi'];
$tanggal = $_POST['tanggal'];
$idpenyewa = $_POST['idpenyewa'];
$idbiaya = $_POST['idbiaya'];

include("../../config/koneksi.php");

$hasil = mysqli_query($konekdb, "INSERT INTO tbl_transaksi_token VALUES('$notransaksi','$tanggal','$idpenyewa','$idbiaya')");
echo '<script>document.location="../../views/v_transaksi_token.php?alert_simpan";</script>';
