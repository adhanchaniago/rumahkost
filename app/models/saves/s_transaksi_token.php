<?php

$tgltransaksi  = $_POST['tgltransaksi'];
$idpenyewa = $_POST['idpenyewa'];
$idbiaya = $_POST['idbiaya'];
$jumlahbiaya = $_POST['jumlahbiaya'];

include("..\..\config\koneksi.php");

$hasil = mysqli_query($konekdb, "INSERT INTO tbl_transaksi_listrik VALUES('','$tgltransaksi','$idpenyewa','$idbiaya','$jumlahbiaya','Belum Lunas')");

header('Location:..\..\views\admin\v_transaksi_token.php?alert_simpan');
