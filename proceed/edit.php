<?php
session_start();
include '../conectdb.php';
$url = $url;
$id = $_POST['id'];
$itemName = $_POST['itemName'];
$detail = $_POST['detail'];
$itemGroup = $_POST['group'];

// ดึงข้อมูลรูปภาพเก่าจากฐานข้อมูล
$sql = "SELECT item_picture FROM item WHERE item_id = ?";
$stmt = $conn->prepare($sql);
$stmt->execute([$id]);
$data = $stmt->fetch(PDO::FETCH_ASSOC);
$oldItemImage = $data['item_picture'];

// ตรวจสอบว่ามีการอัปโหลดไฟล์รูปภาพใหม่
if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
    $itemImageTmp = $_FILES['image']['tmp_name'];
    $originalItemImageName = $_FILES['image']['name'];

    // แยกชื่อไฟล์และนามสกุล
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

    // อัปเดตข้อมูลและรูปภาพ
    $targetFile = $folder . $itemImageName;
    $folder1 = "uploads/";
    $targetFile1 = $folder1 . $itemImageName; // ใช้ชื่อไฟล์ที่ไม่ซ้ำ

    if (move_uploaded_file($itemImageTmp, $targetFile)) {
        // ลบรูปภาพเก่าออกจากโฟลเดอร์
        if (!empty($oldItemImage) && file_exists("../" . $oldItemImage)) {
            unlink("../" . $oldItemImage);
        }

        $query = $conn->prepare("UPDATE item SET item_name = ?, item_detail = ?, item_group = ?, item_picture = ? WHERE item_id = ?");
        $query->execute([$itemName, $detail, $itemGroup, $targetFile1, $id]);
    } else {
        $_SESSION['error'] = "Sorry, Failed to uploaded.";
        header("Location: {$url}itemaddform.php");
        exit();
    }
} else {
    // อัปเดตเฉพาะข้อมูล (ไม่มีการอัปโหลดรูปภาพใหม่)
    $query = $conn->prepare("UPDATE item SET item_name = ?, item_detail = ?, item_group = ? WHERE item_id = ?");
    $query->execute([$itemName, $detail, $itemGroup, $id]);
}

$_SESSION['success'] = "Item saved successfully";
header("Location: {$url}itemaddform.php");
exit();

// $id = $_POST['id'];
// $_POST['itemName'] ? $itemName = $_POST['itemName'] : header("Location: $url" . "itemaddform.php");
// $_POST['detail'] ? $detail = $_POST['detail'] : header("Location: $url" . "itemaddform.php");
// $Itemgroup = $_POST['group'];
// $ItemImageName =  $_FILES['image']['name'];
// $ItemImageTmp = $_FILES['image']['tmp_name'];

// $sql = "SELECT * FROM item WHERE item_id = (?)";
//     $stmt = $conn->prepare($sql);
//     $stmt->execute([$id]);
//     $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
//     foreach ($data as $Data) {
//         $ItemImage = $Data['item_picture'];
//     }

// if (empty($ItemImageTmp)) {
//     $query = $conn->prepare("UPDATE item SET item_name=?,item_detail=?,item_group=? WHERE item_id=?");
//     $query->execute([$itemName, $detail, $Itemgroup, $id]);
//     $_SESSION['success'] = "Item saved success";
//         header("Location: $url"."itemaddform.php");
//         exit();
// } else {
//     @unlink("../" . $ItemImage);
//     $folder = "../uploads/";
//     $targetFile = $folder . basename($ItemImageName);
//     $folder1 = "uploads/";
//     $targetFile1 = $folder1 . basename($ItemImageName);
//     if (move_uploaded_file($ItemImageTmp, $targetFile)) {
//         $query = $conn->prepare("UPDATE item SET item_name=?,item_detail=?,item_group=?,item_picture=? WHERE item_id=?");
//         $query->execute([$itemName, $detail, $Itemgroup, $targetFile1, $id]);
//         $_SESSION['success'] = "Item saved success";
//         header("Location: $url"."itemaddform.php");
//         exit();
//     } else {
//         $_SESSION['error'] = "Sorry, Failed to uploaded.";
//         header("Location" . $url . "itemaddform.php");
//         exit();
//     }
// }
?>