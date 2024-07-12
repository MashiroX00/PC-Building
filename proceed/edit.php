<?php
session_start();
include '../conectdb.php';
$id = $_POST['id'];
$_POST['itemName'] ? $itemName = $_POST['itemName'] : header("Location: $url" . "itemaddform.php");
$_POST['detail'] ? $detail = $_POST['detail'] : header("Location: $url" . "itemaddform.php");
$Itemgroup = $_POST['group'];
$ItemImageName =  $_FILES['image']['name'];
$ItemImageTmp = $_FILES['image']['tmp_name'];

$sql = "SELECT * FROM item WHERE item_id = (?)";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$id]);
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
    foreach ($data as $Data) {
        $ItemImage = $Data['item_picture'];
    }

if (empty($ItemImageTmp)) {
    $query = $conn->prepare("UPDATE item SET item_name=?,item_detail=?,item_group=? WHERE item_id=?");
    $query->execute([$itemName, $detail, $Itemgroup, $id]);
    $_SESSION['success'] = "Item saved success";
        header("Location: $url"."itemaddform.php");
} else {
    @unlink("../" . $ItemImage);
    $folder = "../uploads/";
    $targetFile = $folder . basename($ItemImageName);
    $folder1 = "uploads/";
    $targetFile1 = $folder1 . basename($ItemImageName);
    if (move_uploaded_file($ItemImageTmp, $targetFile)) {
        $query = $conn->prepare("UPDATE item SET item_name=?,item_detail=?,item_group=?,item_picture=? WHERE item_id=?");
        $query->execute([$itemName, $detail, $Itemgroup, $targetFile1, $id]);
        $_SESSION['success'] = "Item saved success";
        header("Location: $url"."itemaddform.php");
    } else {
        $_SESSION['error'] = "Sorry, Failed to uploaded.";
        header("Location" . $url . "itemaddform.php");
    }
}
?>