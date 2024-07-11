<?php
    if (!isset($_SESSION['admin'])) {
        header("Location: $url"."index.php");
    }
?>