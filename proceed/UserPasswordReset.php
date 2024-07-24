<?php
    session_start();
    include '../conectdb.php';
    $eid = empty($_POST['id']);
    $epass = empty($_POST['Pass']);
    $ecpass = empty($_POST['CPass']);


    if ($eid or $epass or $ecpass) {
        $_SESSION['error'] = "Somethings went worng.";
        header("Location: {$url}PasswordResetUserPrompt.php");
        exit;
    }
    $id = $_POST['id'];
    $pass = $_POST['Pass'];
    $cpass = $_POST['CPass'];
    if ($pass != $cpass) {
        $_SESSION['error'] = "Password isn't match.";
        header("Location: {$url}PasswordResetUserPrompt.php");
        exit;
    }
    $hashPassword = password_hash($pass,PASSWORD_DEFAULT) or die("Password Hashing error");
    $sql = "UPDATE useraccount SET useraccount.password = ? WHERE useraccount.id = ?";
    $Update = $conn->prepare($sql);
    $Update->execute([$hashPassword,$id]);

    if ($Update) {
        $_SESSION['success'] = "Reset Password Successfully.";
        header("Location: {$url}loginUser.php");
        exit;
    }else {
        $_SESSION['error'] = "Reset Password failed.";
        header("Location: {$url}loginUser.php");
        exit;
    }
?>