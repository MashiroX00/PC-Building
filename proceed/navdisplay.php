<?php
    if (isset($_SESSION['user'])) {
        include './usernav.php';
    }elseif (isset($_SESSION['admin'])) {
        include ROOT_DIR.'/adminNav.php';
    }else {
        include ROOT_DIR.'/Navheader.php';
    }
?>