<?php
// SESSION
if (!session_id()) session_start();
// KONEKSI
$konekdb = mysqli_connect("localhost", "root", "", "rumahkost");
// FUNCTION
require_once '../../functions/alert.php';
require_once '../../functions/auto_number.php';
