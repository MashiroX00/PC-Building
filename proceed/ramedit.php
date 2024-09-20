<?php
session_start();
require './../conectdb.php';
require ROOT_DIR . "/Components/alert.php";
$Notify = new alert();
if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $Name = $_POST['name'] ?? false;
    $ddr = $_POST['DDR'] ?? false;
    $bus = $_POST['bus'] ?? false;
    $size = $_POST['size'] ?? false;
    $imgName = $_FILES['image']['name'] ?? false;
    $imgTmp = $_FILES['image']['tmp_name'] ?? false;
    $detail = $_POST['detail'] ?? false;
}else {
    $Notify->CreSession("error","ID invaild");
    $Notify->header("itemaddform.php");
    exit;
}
if ($imgName != false) {
    $pathfile = ROOT_DIR . "/uploads/";

$basename = pathinfo($imgName, PATHINFO_FILENAME);
$extension = pathinfo($imgName, PATHINFO_EXTENSION);

$counter = 1;
$itemName = $imgName;
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

switch ($bus) {
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
if (!empty($imgName)) {
    $status = move_uploaded_file($imgTmp,$targetFile);
    if ($status) {
        $uploade = "uploads/". $itemName;
        $Controller->updateTable("ram",["Name","bus","Size","ddr","detail","picture"],[$Name,$Rambus,$Sizeid,$ddrid,$detail,$uploade],$id);
        $Notify->CreSession("success","Upadate Ram Sucessfully. With data [$Name,$Rambus,$Sizeid,$ddrid,$detail,$uploade]");
        $Notify->header("itemaddform.php");
    }else {
        $Notify->CreSession("error","Update Failed.");
        $Notify->header("itemaddform.php");
    }
}else {
    $Controller->updateTable("ram",["Name","bus","Size","ddr","detail"],[$Name,$Rambus,$Sizeid,$ddrid,$detail],$id);
}
?>