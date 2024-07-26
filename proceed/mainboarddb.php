<?php
session_start();
include __DIR__ . '/../conectdb.php';

$name = $_POST['name'] ?? null;
$ddr = $_POST['DDR'] ?? null;
$socket = $_POST['socket'] ?? null;
$pictureName = $_FILES['image']['name'] ?? null;
$picturetmp = $_FILES['image']['tmp_name'] ?? null;
$detail = $_POST['detail'] ?? null;



if (!$name || !$ddr || !$socket || !$pictureName || !$picturetmp || !$detail ===  null) {
    $_SESSION['error'] = "Something went wrongs.";
    header("Location: {$url}ItemAdd/Mainboardadd.php");
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
    header("Location: {$url}ItemAdd/Mainboardadd.php");
    exit;
}

switch ($ddr) {
    case "0" : $_SESSION['error'] = "Please Choose RAM DDR."; header("Lcation: {$url}ItemAdd/Mainboardadd.php");
    break;
    case "1" : $ddrid = "DDR3";
    break;
    case "2" : $ddrid = "DDR4";
    break;
    case "3" : $ddrid = "DDR5";
    break;
    default : $_SESSION['error'] = "Please Choose RAM DDR."; header("Lcation: {$url}ItemAdd/Mainboardadd.php");
    break;
}

switch ($socket) {
    case "0" : $_SESSION['error'] = "Please Choose CPU Socket."; header("Lcation: {$url}ItemAdd/Mainboardadd.php");
    break;
    case "1" : $socketid = "AM4";
    break;
    case "2" : $socketid = "AM5";
    break;
    case "3" : $socketid = "LGA1700";
    break;
    case "4" : $socketid = "LGA1200";
    break;
    case "5" : $socketid = "LGA1151";
    break;
    case "6" : $socketid = "LGA1150";
    break;
    case "7" : $socketid = "LGA1155";
    break;
    case "8" : $socketid = "LGA1156";
    break;
    case "9" : $socketid = "LGA2066";
    break;
    default : $_SESSION['error'] = "Please Choose CPU Socket."; header("Lcation: {$url}ItemAdd/Mainboardadd.php");
    break;
} 
if (move_uploaded_file($picturetmp,$targetFile)) {
    $savedpath = "uploads/".$itemName;
    $stmt = $conn->prepare("INSERT INTO mainboard (mainboard.Name,Ram_ddr,Cpu_socket,picture,detail) VALUES (?,?,?,?,?)");
    $stmt->execute([$name,$ddrid,$socketid,$savedpath,$detail]);
    $_SESSION['success'] = "Succesfully.";
    header("Location: {$url}itemaddform.php");
    exit;
}else {
    $_SESSION['error'] = "Cannot save Cpu item."; 
    header("Lcation: {$url}ItemAdd/Mainboardadd.php");
}

// var_dump($name,$ddr,$socket,$pictureName,$detail,$ddrid,$socketid);
?>