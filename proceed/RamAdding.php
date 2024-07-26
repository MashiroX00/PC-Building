<?php
session_start();
include __DIR__ . '/../conectdb.php';

$name = $_POST['name'] ?? null;
$ddr = $_POST['DDR'] ?? null;
$Bus = $_POST['bus'] ?? null;
$size = $_POST['size'] ?? null;
$pictureName = $_FILES['image']['name'] ?? null;
$picturetmp = $_FILES['image']['tmp_name'] ?? null;
$detail = $_POST['detail'] ?? null;

// var_dump($name,$ddr,$Bus,$pictureName,$detail);

if (!$name || !$ddr || !$Bus || !$pictureName || !$picturetmp || !$detail || !$size ===  null) {
    $_SESSION['error'] = "Something went wrongs.";
    header("Location: {$url}ItemAdd/Ramadd.php");
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
    header("Location: {$url}ItemAdd/Ramadd.php");
    exit;
}

switch ($ddr) {
    case "0" : $_SESSION['error'] = "Please Choose RAM DDR."; header("Lcation: {$url}ItemAdd/Ramadd.php");
    break;
    case "1" : $ddrid = "DDR3";
    break;
    case "2" : $ddrid = "DDR4";
    break;
    case "3" : $ddrid = "DDR5";
    break;
    default : $_SESSION['error'] = "Please Choose RAM DDR."; header("Lcation: {$url}ItemAdd/Ramadd.php");
    break;
}

switch ($Bus) {
    case "0" : $_SESSION['error'] = "Please Choose RAM Bus."; header("Lcation: {$url}ItemAdd/Ramadd.php");
    break;
    case "1" : $Rambus = "1333";
    break;
    case "2" : $Rambus = "1600";
    break;
    case "3" : $Rambus = "1866";
    break;
    case "4" : $Rambus = "2133";
    break;
    case "5" : $Rambus = "2400";
    break;
    case "6" : $Rambus = "2666";
    break;
    case "7" : $Rambus = "3000";
    break;
    case "8" : $Rambus = "3200";
    break;
    case "9" : $Rambus = "3600";
    break;
    case "10" : $Rambus = "4800";
    break;
    case "11" : $Rambus = "5200";
    break;
    case "12" : $Rambus = "5600";
    break;
    case "13" : $Rambus = "6000";
    break;
    default : $_SESSION['error'] = "Please Choose CPU Socket."; header("Lcation: {$url}ItemAdd/Ramadd.php");
    break;
}

switch ($size) {
    case "0" : $_SESSION['error'] = "Please Choose RAM DDR."; header("Lcation: {$url}ItemAdd/Ramadd.php");
    break;
    case "1" : $Sizeid = "4";
    break;
    case "2" : $Sizeid = "8";
    break;
    case "3" : $Sizeid = "16";
    break;
    case "3" : $Sizeid = "32";
    break;
    default : $_SESSION['error'] = "Please Choose RAM DDR."; header("Lcation: {$url}ItemAdd/Ramadd.php");
    break;
}

if (move_uploaded_file($picturetmp,$targetFile)) {
    $savedpath = "uploads/".$itemName;
    $stmt = $conn->prepare("INSERT INTO ram (ram.Name,bus,ddr, ram.Size,picture,detail) VALUES (?,?,?,?,?,?)");
    $stmt->execute([$name,$Rambus,$ddrid,$Sizeid,$savedpath,$detail]);
    $_SESSION['success'] = "Succesfully.";
    header("Location: {$url}itemaddform.php");
    exit;
}else {
    $_SESSION['error'] = "Cannot save Cpu item."; 
    header("Lcation: {$url}ItemAdd/Ramadd.php");
}


?>