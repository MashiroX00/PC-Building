<?php
session_start();
include './../conectdb.php';
require ROOT_DIR . "/Components/alert.php";

$event = new alert();

$id = $_POST['id'] ?? null;

if ($id != null) {
    $name = $_POST['name'] ?? null;
    $ghz = $_POST['ghz'] ?? null;
    $socket = $_POST['socket'] ?? null;
    $imgName = $_FILES['img']['name'] ?? null;
    $imgTmp = $_FILES['img']['tmp_name'] ?? null;
    $detail = $_POST['detail'] ?? null;
    $path = $_POST['path'] ?? null;
if ($socket == null) {
    $event->setalert("error", "Fail to updated");
            $event->header("itemaddform.php");
}
    switch ($socket) {
        case "0":
            $_SESSION['error'] = "Please Choose Socket.";
            $event->header("ItemAdd/Cpuadd.php");
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
            $_SESSION['error'] = "Please Choose Socket.";
            $event->header("ItemAdd/Cpuadd.php");
            break;
    }

    if ($imgName == null) {
        $stmt = $conn->prepare("UPDATE cpu SET Name = ?,Socket = ?,Ghz = ?,detail = ? WHERE id = ?");
        $stmt->execute([$name, $socketid, $ghz, $detail, $id]);

        if ($stmt) {
            $event->setalert("success", "Updated");
            $event->header("itemaddform.php");
        } else {
            $event->setalert("error", "Fail to updated");
            $event->header("itemaddform.php");
        }
    } else {
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
            $event->setalert("error", "Sorry, only JPG, JPEG & PNG files are allowed.");
            header("Location: {$url}ItemAdd/Cpuadd.php");
            exit;
        }
        if (move_uploaded_file($imgTmp, $targetFile)) {
            $oldpath = ROOT_DIR . $path;
            unlink($oldpath);
            $stmt = $conn->prepare("UPDATE cpu SET Name = ?,Socket = ?,Ghz = ?,picture = ?, detail = ? WHERE id = ?");
            $stmt->execute([$name, $socketid, $ghz, $targetFile, $detail, $id]);
        }
    }
}
