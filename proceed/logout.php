<?php
session_start();
include '../conectdb.php';
if (isset($_SESSION['user'])) {
    unset($_SESSION['user']);
    header("Location: $url"."index.php");
}elseif (isset($_COOKIE['admin'])) {
    unset($_SESSION['admin']);
    header("Location: $url"."index.php");
}else {
    header("Location: $url"."index.php");
}
?>