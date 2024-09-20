<?php 
session_start();
require './../conectdb.php';
require ROOT_DIR . "/Components/alert.php";
$Notify = new alert();

if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $Name = $_POST['name'] ?? false;
    $Watt = $_POST['watt'] ?? false;
    $imgName = $_FILES['image']['name'] ?? false;
    $imgTmp = $_FILES['image']['tmp_name'] ?? false;
    $detail = $_POST['detail'];
}else {
    $Notify->CreSession("error","id is empty.");
    $Notify->header("itemaddform.php");
    exit;
}

if (!empty($imgName)) {
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
    $alert1->setalert("error","Sorry, only JPG, JPEG & PNG files are allowed.");
    header("Location: {$url}ItemAdd/powersupply.php");
    exit;
}
    $status = move_uploaded_file($imgTmp,$targetFile);
    if($status) {
        $uploaded = "uploads/".$itemName;
        $Controller->updateTable("psu",["Name","watt","picture","detail"],[$Name,$Watt,$uploaded,$detail],$id);
        $Notify->CreSession("success","Power supply item updated. With Data[$Name,$Watt,$uploaded,$detail]");
        $Notify->header("itemaddform.php");
        exit;
    }else {
        $Notify->CreSession("error","Power supply item Failed. With Data[$Name,$Watt,$uploaded,$detail]");
        $Notify->header("itemaddform.php");
    }
}else {
    $Controller->updateTable("psu",["Name","watt","detail"],[$Name,$Watt,$detail],$id);
        $Notify->CreSession("success","Power supply item updated. With Data[$Name,$Watt,$detail]");
        $Notify->header("itemaddform.php");
}
?>