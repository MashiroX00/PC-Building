<?php
    session_start();
    include '../conectdb.php';

    $_POST['username'] ? $username = $_POST['username'] : header("Location:../register.php");
    $_POST['email'] ? $email = $_POST['email'] : header("Location:../register.php");
    $_POST['password'] ? $pass = $_POST['password'] : header("Location:../register.php");
    $_POST['cfpassword'] ? $cfpass = $_POST['cfpassword'] : header("Location:../register.php");
    $encrptPassword = password_hash($pass,PASSWORD_DEFAULT);

    $usercheck = $conn->prepare("SELECT * FROM useraccount WHERE username = (?)");
    $usercheck->execute([$username]);
    while ($row = $usercheck->fetch(PDO::FETCH_ASSOC)) {
        $username_count = $row["username"];
      }
    $emailcheck = $conn->prepare("SELECT * FROM useraccount WHERE email = (?)");
    $emailcheck->execute([$email]);
    while ($row = $emailcheck->fetch(PDO::FETCH_ASSOC)) {
        $email_count = $row["email"];
      }
    if ($username_count > 0) {
        $_SESSION["error"] = "That username is already taken";
        header("Location: ../register.php");
    }elseif($email_count > 0) {
        $_SESSION["error"] = "That email is already taken";
        header("Location: ../register.php");
    }elseif (password_verify($cfpass,$encrptPassword)) {
        
        $sql = $conn->prepare("INSERT INTO useraccount (username,email,password) VALUES (?,?,?)");
        $sql->execute([$username,$email,$encrptPassword]);
        $_SESSION["success"] = "Successful Register";
        header("Location: ../register.php");
    }else {
        $_SESSION["error"] = "Password not match";
        header("Location: ../register.php");
    }
    
?>

