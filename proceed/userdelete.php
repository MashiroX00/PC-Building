<?php
session_start();
include '../conectdb.php';
$_POST['id'] ? $id = $_POST['id'] : header("Location:" . $url . "Usermanage.php");
$sql = "SELECT * FROM useraccount WHERE id = (?)";
$stmt = $conn->prepare($sql);
$stmt->execute([$id]);
$query = $stmt->fetchAll(PDO::FETCH_ASSOC);
foreach ($query as $data) {
    $role = $data['role'];
}
if ($role == "admin") {
    $_SESSION['error'] = "Delete user failed. Becuse this user is Admin.";
    header("Location:" . $url . "Usermanage.php");
} else {
    $delete = "DELETE FROM useraccount WHERE id = (?)";
    $stmt1 = $conn->prepare($delete);
    $stmt1->execute([$id]);
    if ($stmt1) {
        $_SESSION['success'] = "Delete user successfully.";
        header("Location:" . $url . "Usermanage.php");
    } else {
        $_SESSION['error'] = "Delete user failed.";
        header("Location:" . $url . "Usermanage.php");
    }
}


?>