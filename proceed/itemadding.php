<?php
session_start();
include '../conectdb.php';
$url = $url;

$_POST['itemName'] ? $itemName = $_POST['itemName'] : header("Location: {$url}itemaddform.php");
$_POST['detail'] ? $detail = $_POST['detail'] : header("Location: {$url}itemaddform.php");
$_POST['group'] ? $itemGroup = $_POST['group'] : header("Location: {$url}itemaddform.php");

if (empty($_FILES['image']['name'])) {
    $_SESSION['error'] = "Image is required";
    header("Location: {$url}itemaddform.php");
    exit;
}

$originalItemImageName = $_FILES['image']['name'];
$itemImageTmp = $_FILES['image']['tmp_name'];

$baseName = pathinfo($originalItemImageName, PATHINFO_FILENAME);
$extension = pathinfo($originalItemImageName, PATHINFO_EXTENSION);

// เริ่มต้นตัวเลขต่อท้าย
$counter = 1;
$itemImageName = $originalItemImageName;

// ตรวจสอบชื่อไฟล์ซ้ำในโฟลเดอร์ uploads
$folder = "../uploads/";
while (file_exists($folder . $itemImageName)) {
    $itemImageName = $baseName . "_" . $counter . "." . $extension;
    $counter++;
}

$targetFile = $folder . $itemImageName;
$folder1 = "uploads/";
$targetFile1 = $folder1 . $itemImageName; // ใช้ชื่อไฟล์ที่ไม่ซ้ำ

$imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
    $_SESSION['error'] = "Sorry, only JPG, JPEG & PNG files are allowed.";
    header("Location: {$url}itemaddform.php");
    exit;
}


if (move_uploaded_file($itemImageTmp, $targetFile)) {
    $sql = $conn->prepare("INSERT INTO item (item_name, item_detail, item_group, item_picture) VALUES (?, ?, ?, ?)");
    $sql->execute([$itemName, $detail, $itemGroup, $targetFile1]); // ใช้ชื่อไฟล์ที่ไม่ซ้ำ
    $_SESSION['success'] = "Product saved successfully";
} else {
    $_SESSION['error'] = "Sorry, Failed to uploaded.";
}

header("Location: {$url}itemaddform.php");
exit();
?>