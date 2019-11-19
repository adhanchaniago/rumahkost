<?php
session_start();
include('../../config/koneksi.php');

$user = mysqli_real_escape_string($konekdb, htmlentities($_POST['username']));
$pass = mysqli_real_escape_string($konekdb, htmlentities(md5($_POST['password'])));

$sql = mysqli_query($konekdb, "SELECT * FROM tbl_login WHERE username='$user' AND password='$pass'") or die(mysql_error());
if (mysqli_num_rows($sql) == 0) {
  buatAlert("Password / Username Anda Salah", "danger", "fas fa-info-circle");
  header('location:../../views/auth/v_login.php');
} else {
  $hasil = mysqli_fetch_assoc($sql);
  $_SESSION['Login'] = [
    'username' => $hasil['username'],
    'role' => $hasil['role']
  ];
  if ($_SESSION['Login']['role'] == 'admin') {
    buatAlert("Anda Berhasil Login", "success");
    header('location:../../views/admin/dashboard.php');
  } else {
    echo '<script language="javascript">alert("Anda berhasil Login Sebagai User!");</script>';
    header('location:#!');
  }
}
