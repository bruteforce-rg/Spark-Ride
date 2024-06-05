<?php
session_start();
unset($_SESSION['user_mail']) ;
unset($_SESSION['en_psd']);
session_destroy();
header('location: index.php');
die();
?>
