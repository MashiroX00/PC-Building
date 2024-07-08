<?php
    session_start();
    include '../conectdb.php';

    $_POST['username'] ? $username = $_POST['username'] : header("Location:".$url."loginUser.php");
    $_POST['password'] ? $pass = $_POST['password'] : header("Location:".$url."loginUser.php");
    
    $data = $conn->prepare("SELECT * FROM useraccount WHERE username = (?)");
    $data->execute([$username]);

    while ($row = $data->fetch(PDO::FETCH_ASSOC)) {
        $user = $row["username"];
        $dbpassword = $row["password"];
      }
    if ($user == $username) {
        if (password_verify($pass,$dbpassword)) {
            $_SESSION["success"] = "Login Success!";
            header("Location:".$url."loginUser.php");
        }else {
            $_SESSION["error"] = "Login failed! Username or password is incorrect.";
            header("Location:".$url."loginUser.php");
        }
    }else {
        $_SESSION["error"] = "Login failed! Username or password is incorrect.";
            header("Location:".$url."loginUser.php");
    }
    
?>