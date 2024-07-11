<?php
$_POST['itemName'] ? $itemName = $_POST['itemName'] : header("Location: $url"."itemaddform.php");
$_POST['detail'] ? $detail = $_POST['detail'] : header("Location: $url"."itemaddform.php");
$_POST['group'] ? $Itemgroup = $_POST['group'] : header("Location: $url"."itemaddform.php");
$_FILES['image']['name'] ? $ItemImageName =  $_FILES['image']['name'] : header("Location: $url"."itemaddform.php");
$_FILES['image']['tmp_name'] ? $ItemImageTmp = $_FILES['image']['tmp_name'] : header("Location: $url"."itemaddform.php");
?>