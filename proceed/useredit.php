<?php
session_start();
include '../conectdb.php';
$id = $_POST['id'];
$_POST['username'] ? $username = $_POST['username'] : header("Location: $url" . "Usermanage.php");
$_POST['email'] ? $email = $_POST['email'] : header("Location: $url" . "Usermanage.php");
$_POST['Firstname'] ? $firstname = $_POST['Firstname'] : header("Location: $url" . "Usermanage.php");
$_POST['Lastname'] ? $Lastname = $_POST['Lastname'] : header("Location: $url" . "Usermanage.php");
$_POST['tel'] ? $tel = $_POST['tel'] : header("Location: $url" . "Usermanage.php");
    $query = $conn->prepare("UPDATE useraccount SET username=?,email=?,firstname=?,lastname=?,tel=? WHERE id=?");
    $query->execute([$username, $email, $firstname,$Lastname,$tel, $id]);
    if ($query) {
        $_SESSION['success'] = "User update successfully";
        header("Location: $url" . "Usermanage.php");
    }else {
        $_SESSION['success'] = "User update successfully";
        header("Location: $url" . "Usermanage.php");
    }
?>