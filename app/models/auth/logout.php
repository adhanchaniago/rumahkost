<?php
session_start();
session_destroy();
header('location:../../views/admin/v_login.php');
