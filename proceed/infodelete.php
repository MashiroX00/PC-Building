<?php
session_start();
include '../conectdb.php';
$_POST['id'] ? $id = $_POST['id'] : header("Location:" . $url . "infomationAdd.php");
$sql = "SELECT * FROM infomationdata WHERE id = (?)";
$stmt = $conn->prepare($sql);
$stmt->execute([$id]);
$query = $stmt->fetchAll(PDO::FETCH_ASSOC);
foreach ($query as $data) {
    $path = $data['picture'];
}
@unlink('../' . $path);
$delete = "DELETE FROM infomationdata WHERE id = (?)";
$stmt1 = $conn->prepare($delete);
$stmt1->execute([$id]);

if ($stmt1) {
    $_SESSION['success'] = "Delete item successfully.";
    header("Location:" . $url . "infomationAdd.php");
} else {
    $_SESSION['error'] = "Delete item failed.";
    header("Location:" . $url . "infomationAdd.php");
}
