<?php
session_start();
unset($_SESSION['ADMIN_NAME']);
unset($_SESSION['ADMIN_LOGIN']);
header('location: page-login.php');
die();
?>