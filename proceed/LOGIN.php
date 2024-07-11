<?php
    session_start();
    include '../conectdb.php';

    $_POST['username'] ? $username = $_POST['username'] : header("Location:".$url."loginUser.php");
    $_POST['password'] ? $pass = $_POST['password'] : header("Location:".$url."loginUser.php");
    
    $data = $conn->prepare("SELECT * FROM useraccount WHERE username = (?)");
    $data->execute([$username]);

    while ($row = $data->fetch(PDO::FETCH_ASSOC)) {
        $userid = $row['id'];
        $user = $row["username"];
        $dbpassword = $row["password"];
        $role = $row["role"];
      }
    if ($user == $username) {
        if (password_verify($pass,$dbpassword)) {
            $_SESSION["success"] = "Login Success!";
            $cookie_name = $role;
            $cookie_value = $user;
            $_SESSION[$role] = $user;
            $sql = "INSERT INTO loggeruser (user_id,username,role)VALUES (?,?,?)";
            $query = $conn->prepare($sql);
            $query->execute([$userid,$username,$role]);
            header("Location:".$url."index.php");
        }else {
            $_SESSION["error"] = "Login failed! Username or password is incorrect.";
            header("Location:".$url."loginUser.php");
        }
    }else {
        $_SESSION["error"] = "Login failed! Username or password is incorrect.";
            header("Location:".$url."loginUser.php");
    }
    
?>