<?php
session_start();
require './../conectdb.php';
require_once ROOT_DIR . "/Components/alert.php";
$utils = new alert();


isset($_POST['id']) ? $id = $_POST['id'] : $id = false;
isset($_POST['name']) ? $name = $_POST['name'] : $name = false;
isset($_POST['DDR']) ? $Ram = $_POST['DDR'] : $Ram = false;
isset($_POST['socket']) ? $Cpu = $_POST['socket'] : $Cpu = false;
isset($_POST['detail']) ? $detail = $_POST['detail'] : $detail = false;
isset($_FILES['image']) ? $imgName = $_FILES['image']['name'] : $imgName = false;
isset($_FILES['image']) ? $imgtmp = $_FILES['image']['tmp_name'] : $imgtmp = false;

if ($id == false) {
    $utils->CreSession("error", "Invalid ID");
    $utils->header("ItemAdd/Mainboardadd.php");
}

if ($Ram && $Cpu != false) {
    switch ($Ram) {
        case "0":
            $_SESSION['error'] = "Please Choose RAM DDR.";
            header("Lcation: {$url}ItemAdd/Mainboardadd.php");
            break;
        case "1":
            $ddrid = "DDR3";
            break;
        case "2":
            $ddrid = "DDR4";
            break;
        case "3":
            $ddrid = "DDR5";
            break;
        default:
            $_SESSION['error'] = "Please Choose RAM DDR.";
            header("Lcation: {$url}ItemAdd/Mainboardadd.php");
            break;
    }

    switch ($Cpu) {
        case "0":
            $_SESSION['error'] = "Please Choose CPU Socket.";
            header("Lcation: {$url}ItemAdd/Mainboardadd.php");
            break;
        case "1":
            $socketid = "AM4";
            break;
        case "2":
            $socketid = "AM5";
            break;
        case "3":
            $socketid = "LGA1700";
            break;
        case "4":
            $socketid = "LGA1200";
            break;
        case "5":
            $socketid = "LGA1151";
            break;
        case "6":
            $socketid = "LGA1150";
            break;
        case "7":
            $socketid = "LGA1155";
            break;
        case "8":
            $socketid = "LGA1156";
            break;
        case "9":
            $socketid = "LGA2066";
            break;
        default:
            $_SESSION['error'] = "Please Choose CPU Socket.";
            header("Lcation: {$url}ItemAdd/Mainboardadd.php");
            break;
    }
}

if ($imgName && $imgtmp != false) {
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
        header("Location: {$url}ItemAdd/Mainboardadd.php");
        exit;
    }
}
if ($Ram && $imgName && $Cpu != false) {
    if (move_uploaded_file($imgtmp,$targetFile)) {
    $savedpath = "uploads/".$itemName;
    $stmt = $conn->prepare("UPDATE mainboard SET Name = ?, Ram_ddr = ?, Cpu_socket = ?, detail = ?, picture = ? WHERE id = ?");
    $stmt->execute([$name,$ddrid,$socketid,$detail,$savedpath,$id]);
    $_SESSION['success'] = "Succesfully.";
    header("Location: {$url}itemaddform.php");
    exit;
    }
}elseif ($Ram && $Cpu != false) {
    $stmt = $conn->prepare("UPDATE mainboard SET Name = ?, Ram_ddr = ?, Cpu_socket = ?, detail = ? WHERE id = ?");
    $stmt->execute([$name,$ddrid,$socketid,$detail,$id]);
    $_SESSION['success'] = "Succesfully.";
    header("Location: {$url}itemaddform.php");
    exit;
}elseif ($imgName != false) {
    if (move_uploaded_file($imgtmp,$targetFile)) {
        $savedpath = "uploads/".$itemName;
        $stmt = $conn->prepare("UPDATE mainboard SET Name = ?, detail = ?, picture = ? WHERE id = ?");
        $stmt->execute([$name,$detail,$savedpath,$id]);
        $_SESSION['success'] = "Succesfully.";
        header("Location: {$url}itemaddform.php");
        exit;
        }
}
?>