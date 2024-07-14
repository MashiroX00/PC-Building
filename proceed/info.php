<?php
session_start();
include '../conectdb.php';

$_POST['Header'] ? $head = $_POST['Header'] : header("Location: $url" . "infomationAdd.php");
$_POST['content'] ? $content = $_POST['content'] : header("Location: $url" . "infomationAdd.php");
$_POST['Header'] ? $head = $_POST['Header'] : header("Location: $url" . "infomationAdd.php");
$_FILES['image']['name'] ? $imgName = $_FILES['image']['name'] : header("Location: $url" . "infomationAdd.php");
$_FILES['image']['tmp_name'] ? $imgTmp = $_FILES['image']['tmp_name'] : header("Location: $url" . "infomationAdd.php");

$status = 1;
$folder = "../infoimg/";
$folderSaveToDb = "infoimg/";
$targetFile = $folder . basename($imgName);
$targetFileSaveToDb = $folderSaveToDb . basename($imgName);
$imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
if (file_exists($targetFile)) {
    $_SESSION['error'] = "Sorry, file already exists.";
    header("Location:" . $url . "infomationAdd.php");
    $status = 0;
}
if (
    $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif"
) {
    $_SESSION['error'] = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $status = 0;
    header("Location:" . $url . "infomationAdd.php");
}
if ($status == 0) {
    $_SESSION['error'] = "Sorry, Failed to uploaded.";
    header("Location" . $url . "infomationAdd.php");
}else {
    if (move_uploaded_file($imgTmp,$targetFile)) {
        $sql = $conn->prepare("INSERT INTO infomationdata (head,content,picture,FileName) VALUES (?,?,?,?)");
        $sql->execute([$head, $content, $targetFileSaveToDb, $imgName]);
        $_SESSION['success'] = "Product saved success";
        header("Location: $url" . "infomationAdd.php");
    }else {
        $_SESSION['error'] = "Sorry, Failed to uploaded.";
        header("Location" . $url . "infomationAdd.php");
    }
}
?>