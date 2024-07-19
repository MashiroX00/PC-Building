<?php
session_start();
include '../conectdb.php';
unset($_SESSION['user']);
unset($_SESSION['admin']);
header("Location: $url" . "index.php");
exit;
?>