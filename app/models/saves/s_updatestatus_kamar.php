<?php

$status = $_POST['status'];
$transaksi = $_POST['transaksi'];

include("../../config/koneksi.php");

$hasil = mysqli_query($konekdb, "UPDATE tbl_transaksi_kamar SET status_bayar = '$status' WHERE id_transaksi='$transaksi'");
