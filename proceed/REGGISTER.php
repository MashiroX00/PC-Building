<?php
    session_start();
    include '../conectdb.php';
    require ROOT_DIR . "/Components/alert.php";
    $util = new alert();
    $_POST['username'] ? $username = $_POST['username'] : header("Location:../register.php");
    $_POST['email'] ? $email = $_POST['email'] : header("Location:../register.php");
    $_POST['password'] ? $pass = $_POST['password'] : header("Location:../register.php");
    $_POST['cfpassword'] ? $cfpass = $_POST['cfpassword'] : header("Location:../register.php");
    $_POST['Fname'] ? $Fname = $_POST['Fname'] : header("Location:../register.php");
    $_POST['Lname'] ? $Lname = $_POST['Lname'] : header("Location:../register.php");
    $_POST['tel'] ? $Tel = $_POST['tel'] : header("Location:../register.php");
    $_POST['role'] ? $role = $_POST['role'] : header("Location:../register.php");
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
        
        $sql = $conn->prepare("INSERT INTO useraccount (username,email,password,firstname,lastname,tel,role) VALUES (?,?,?,?,?,?,?)");
        $sql->execute([$username,$email,$encrptPassword,$Fname,$Lname,$Tel,$role]);
        $_SESSION["success"] = "Successful Register";
        $util->CreSession("Shoot",true);
        header("Location: ../loginUser.php");
    }else {
        $_SESSION["error"] = "Password not match";
        header("Location: ../register.php");
    }
    
?>

