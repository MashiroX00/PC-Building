<?php
session_start();
require './../conectdb.php';
require ROOT_DIR . "/Components/alert.php";
$Notify = new alert();

if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $Name = $_POST['name'] ?? false;
    $type = $_POST['type'] ?? false;
    $Size = $_POST['size'] ?? false;
    $imgName = $_FILES['image']['name'] ?? false;
    $imgtmp = $_FILES['image']['tmp_name'] ?? false;
    $detail = $_POST['detail'] ?? false;
} else {
    $Notify->CreSession("error", "ID id empty.");
    $Notify->header("itemaddform.php");
    exit;
}

switch ($type) {
    case "0":
        $_SESSION['error'] = "Please Choose Storage Type.";
        header("Lcation: {$url}ItemAdd/storage.php");
        break;
    case "1":
        $typeid = "HDD";
        break;
    case "2":
        $typeid = "SSD SATA";
        break;
    case "3":
        $typeid = "Nvme SATA";
        break;
    case "4":
        $typeid = "Nvme M.2";
        break;
    default:
        $_SESSION['error'] = "Please Choose Storage Type.";
        header("Lcation: {$url}ItemAdd/storage.php");
        exit;
        break;
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
        $_SESSION['error'] = "Sorry, only JPG, JPEG & PNG files are allowed.";
        header("Location: {$url}ItemAdd/storage.php");
        exit;
    }
}

if (!empty($imgName)) {
    $status = move_uploaded_file($imgtmp,$targetFile);
    if ($status) {
        $uploaded = "uploads/".$itemName;
        $Controller->updateTable("storge",
        ["Name",
        "Size",
        "Type",
        "picture",
        "detail"],[
            $Name,$Size,$typeid,$uploaded,$detail
        ],$id);
        $Notify->CreSession("success","Storage item Updated. With Data[$Name,$Size,$typeid,$uploaded,$detail]");
        $Notify->header("itemaddform.php");
    }else {
        $Notify->CreSession("error","Storage item Failed. With Data[$Name,$Size,$typeid,$uploaded,$detail]");
        $Notify->header("itemaddform.php");
    }
}else {
    $Controller->updateTable("storge",
        ["Name",
        "Size",
        "Type",
        "detail"],[
            $Name,$Size,$typeid,$detail
        ],$id);
        $Notify->CreSession("success","Storage item Updated. With Data[$Name,$Size,$typeid,$uploaded,$detail]");
        $Notify->header("itemaddform.php");
}
?>
