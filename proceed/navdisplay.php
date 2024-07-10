<?php
    if (isset($_SESSION['user'])) {
        include './usernav.php';
    }elseif (isset($_SESSION['admin'])) {
        include './adminNav.php';
    }else {
        include './Navheader.php';
    }
?>