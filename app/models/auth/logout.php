<?php
session_start();
session_destroy();
header('location:../../views/auth/v_login.php');
