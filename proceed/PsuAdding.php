<?php
session_start();
include __DIR__ . '/../conectdb.php';

$name = $_POST['name'] ?? null;
$watt = $_POST['watt'] ?? null;
$pictureName = $_FILES['image']['name'] ?? null;
$picturetmp = $_FILES['image']['tmp_name'] ?? null;
$detail = $_POST['detail'] ?? null;

// var_dump($name,$type,$Bus,$pictureName,$detail);

if (!$name || !$pictureName || !$picturetmp || !$detail || !$size ===  null) {
    $_SESSION['error'] = "Something went wrongs.";
    header("Location: {$url}ItemAdd/powersupply.php");
    exit;
}

$pathfile = ROOT_DIR . "/uploads/";

$basename = pathinfo($pictureName, PATHINFO_FILENAME);
$extension = pathinfo($pictureName, PATHINFO_EXTENSION);

$counter = 1;
$itemName = $pictureName;
while (file_exists($pathfile . $itemName)) {
    $itemName = $basename . "_" . $counter . "." . $extension;
    $counter++;
}
$targetFile = $pathfile . $itemName;
$imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
    $_SESSION['error'] = "Sorry, only JPG, JPEG & PNG files are allowed.";
    header("Location: {$url}ItemAdd/powersupply.php");
    exit;
}

if (move_uploaded_file($picturetmp,$targetFile)) {
    $savedpath = "uploads/".$itemName;
    $stmt = $conn->prepare("INSERT INTO psu (psu.Name, psu.watt,picture,detail) VALUES (?,?,?,?)");
    $stmt->execute([$name,$watt,$savedpath,$detail]);
    $_SESSION['success'] = "Succesfully.";
    header("Location: {$url}itemaddform.php");
    exit;
}else {
    $_SESSION['error'] = "Cannot save Cpu item."; 
    header("Lcation: {$url}ItemAdd/powersupply.php");
}


?>