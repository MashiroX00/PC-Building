<?php
session_start();
include '../conectdb.php';

$_POST['itemName'] ? $itemName = $_POST['itemName'] : header("Location: $url" . "itemaddform.php");
$_POST['detail'] ? $detail = $_POST['detail'] : header("Location: $url" . "itemaddform.php");
$_POST['group'] ? $Itemgroup = $_POST['group'] : header("Location: $url" . "itemaddform.php");
$_FILES['image']['name'] ? $ItemImageName =  $_FILES['image']['name'] : header("Location: $url" . "itemaddform.php");
$_FILES['image']['tmp_name'] ? $ItemImageTmp = $_FILES['image']['tmp_name'] : header("Location: $url" . "itemaddform.php");
$stat = 1;
$folder = "../uploads/";
$targetFile = $folder . basename($ItemImageName);
$folder1 = "uploads/";
$targetFile1 = $folder1 . basename($ItemImageName);
$imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
if (file_exists($targetFile)) {
    $_SESSION['error'] = "Sorry, file already exists.";
    header("Location:" . $url . "itemaddform.php");
    $stat = 0;
}

if (
    $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif"
) {
    $_SESSION['error'] = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $stat = 0;
    header("Location:" . $url . "itemaddform.php");
}
if ($stat == 0) {
    $_SESSION['error'] = "Sorry, Failed to uploaded.";
    header("Location" . $url . "itemaddform.php");
}else {
    if (move_uploaded_file($ItemImageTmp,$targetFile)) {
        $sql = $conn->prepare("INSERT INTO item (item_name,item_detail,item_group,item_picture) VALUES (?,?,?,?)");
        $sql->execute([$itemName, $detail, $Itemgroup, $targetFile1]);
        $_SESSION['success'] = "Product saved success";
        header("Location: $url" . "itemaddform.php");
    }else {
        $_SESSION['error'] = "Sorry, Failed to uploaded.";
        header("Location" . $url . "itemaddform.php");
    }
}
?>