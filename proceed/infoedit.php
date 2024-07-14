<?php
session_start();
include '../conectdb.php';
$id = $_POST['id'];
$_POST['Header'] ? $header = $_POST['Header'] : header("Location: $url" . "infomationAdd.php");
$_POST['content'] ? $content = $_POST['content'] : header("Location: $url" . "infomationAdd.php");
$ItemImageName =  $_FILES['image']['name'];
$ItemImageTmp = $_FILES['image']['tmp_name'];

$sql = "SELECT * FROM infomationdata WHERE id = (?)";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$id]);
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
    foreach ($data as $Data) {
        $ItemImage = $Data['picture'];
    }

if (empty($ItemImageTmp)) {
    $query = $conn->prepare("UPDATE infomationdata SET head=?,content=? WHERE id=?");
    $query->execute([$header, $content, $id]);
    $_SESSION['success'] = "Item saved success";
        header("Location: $url"."infomationAdd.php");
} else {
    @unlink("../" . $ItemImage);
    $folder = "../infoimg/";
    $targetFile = $folder . basename($ItemImageName);
    $folder1 = "infoimg/";
    $targetFile1 = $folder1 . basename($ItemImageName);
    if (move_uploaded_file($ItemImageTmp, $targetFile)) {
        $query = $conn->prepare("UPDATE infomationdata SET head=?,content=?,picture=?,FileName=? WHERE id=?");
        $query->execute([$header, $content, $targetFile1, $$ItemImage, $id]);
        $_SESSION['success'] = "Item saved success";
        header("Location: $url"."infomationAdd.php");
    } else {
        $_SESSION['error'] = "Sorry, Failed to uploaded.";
        header("Location" . $url . "infomationAdd.php");
    }
}
?>