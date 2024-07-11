<?php
session_start();
include '../conectdb.php';
$_POST['id'] ? $id = $_POST['id'] : header("Location:" . $url . "itemaddform.php");
$sql = "SELECT * FROM item WHERE item_id = (?)";
$stmt = $conn->prepare($sql);
$stmt->execute([$id]);
$query = $stmt->fetchAll(PDO::FETCH_ASSOC);
foreach ($query as $data) {
    $itemid = $data['item_id'];
    $path = $data['item_picture'];
}
@unlink('../' . $path);
$delete = "DELETE FROM item WHERE item_id = (?)";
$stmt1 = $conn->prepare($delete);
$stmt1->execute([$itemid]);

if ($stmt1) {
    $_SESSION['success'] = "Delete item successfully.";
    header("Location:" . $url . "itemaddform.php");
} else {
    $_SESSION['error'] = "Delete item failed.";
    header("Location:" . $url . "itemaddform.php");
}
