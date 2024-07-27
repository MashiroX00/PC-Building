<?php
session_start();
include __DIR__ . '/../conectdb.php';
include __DIR__ . '/../Components/alert.php';
$alert1 = new alert();

$name = $_POST['name'] ?? null;
$ghz = $_POST['ghz'] ?? null;
$socket = $_POST['socket'] ?? null;
$pictureName = $_FILES['image']['name'] ?? null;
$picturetmp = $_FILES['image']['tmp_name'] ?? null;
$detail = $_POST['detail'] ?? null;

// var_dump($name,$ghz,$socket,$pictureName,$detail);

if (!$name || !$ghz || !$socket || !$pictureName || !$picturetmp || !$detail ===  null) {

    $alert1->setalert("error","Something went worng.");

    header("Location: {$url}ItemAdd/Cpuadd.php");
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
    $alert1->setalert("error","Sorry, only JPG, JPEG & PNG files are allowed.");
    header("Location: {$url}ItemAdd/Cpuadd.php");
    exit;
}
switch ($socket) {
    case "0" : $_SESSION['error'] = "Please Choose Socket."; header("Lcation: {$url}ItemAdd/Cpuadd.php");
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
    default : $_SESSION['error'] = "Please Choose Socket."; header("Lcation: {$url}ItemAdd/Cpuadd.php");
    break;
} 
if (move_uploaded_file($picturetmp,$targetFile)) {
    $savedpath = "uploads/".$itemName;
    $stmt = $conn->prepare("INSERT INTO cpu (cpu.Name,Socket,Ghz,picture,detail) VALUES (?,?,?,?,?)");
    $stmt->execute([$name,$socketid,$ghz,$savedpath,$detail]);
    $alert1->setalert("error","Successfully");
    header("Location: {$url}itemaddform.php");
    exit;
}else {
    $alert1->setalert("error","Can't Save Cpu item.");
    header("Lcation: {$url}ItemAdd/Cpuadd.php");
}


?>