<?php
session_start();
include './conectdb.php';

if (!empty($_POST['username']) and !empty($_POST['email'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
}else {
    $_SESSION["error"] = "Username or Email is incorrect.";
    header("Location: {$url}PasswordResetUserPrompt.php");
    exit;
}
$sql = "SELECT useraccount.id FROM useraccount WHERE username = ? AND email = ?";
$stmt = $conn->prepare($sql);
$stmt->execute([$username,$email]);
$query = $stmt->fetchAll(PDO::FETCH_ASSOC);
$queryForRow = $conn->prepare($sql);
$queryForRow->execute([$username,$email]);
$row = $queryForRow->fetchColumn();
$id = null;
if ($row == 0) {
    $_SESSION["error"] = "Username or Email is incorrect.0";
    header("Location: {$url}PasswordResetUserPrompt.php");
    exit;
}
foreach ($query as $data) {
    $id = $data['id'];
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Reset</title>
    <link rel="stylesheet" href="./css/regis.css">
    <?php include './packlink.php';?>
</head>
<body>
<?php
    include "./LoginHeaderbar.php";
    ?>
    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-4 col-md-3">
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="texthead">
                    <h4 class="text-center">Reset Password</h4>
                    <h4 class="text-center mb-4">รีเซ็ตรหัสผ่าน</h4>
                    <?php if (isset($_SESSION["success"])) { ?>
                    <div class="alert alert-success">
                        <?php
                        echo $_SESSION["success"];
                        unset($_SESSION["success"]);
                        ?>
                    </div>
                <?php } ?>
                <?php if (isset($_SESSION["error"])) { ?>
                    <div class="alert alert-warning">
                        <?php
                        echo $_SESSION["error"];
                        unset($_SESSION["error"]);
                        ?>
                    </div>
                <?php } ?>
                    <form action="<?php $url;?>proceed/UserPasswordReset.php" class="bg-color p-3 rounded-3" method="POST">
                    <div class="">
                            <div class="input-group mb-3">
                                <span class="input-group-text"><i class="fa-solid fa-key"></i></span>
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="id1" placeholder="Password" name="id" value="<?php echo $id?>" disabled>
                                    <input type="hidden" class="form-control" id="id1" placeholder="Password" name="id" value="<?php echo $id?>">
                                    <label for="id1" class="form-label">User ID</label>
                                </div>
                            </div>
                        </div>
                        <div class="">
                            <div class="input-group mb-3">
                                <span class="input-group-text"><i class="fa-solid fa-lock"></i></span>
                                <div class="form-floating">
                                    <input type="password" class="form-control" id="floatingInput" placeholder="Password" name="Pass">
                                    <label for="floatingInput" class="form-label">New Password</label>
                                </div>
                            </div>
                        </div>

                        <div class="">
                            <div class="input-group mb-3">
                                <span class="input-group-text"><i class="fa-solid fa-lock"></i></span>
                                <div class="form-floating">
                                    <input type="password" class="form-control" placeholder="Password" name="CPass" id="Conf">
                                    <label for="Conf" class="form-label">Confirm Password</label>
                                </div>
                            </div>
                        </div>
                        <div class="row gx-4">
                            <div class="col-md-6 ">
                                <button type="submit" class="btn btn-primary me-1 rounded-pill"><i class="fa-solid fa-arrow-right"></i> Login</button>
                            </div>
                            <div class="col-md-6 ">
                                <a href="<?php echo $url ?>index.php" role="button" class="btn btn-danger rounded-pill"><i class="fa-solid fa-xmark"></i> Cancal</a>
                            </div>
                        </div>
                        <p class="d-block text text-center mt-5 ">
                            ยังไม่มีบัญชีหรอ? <a href="<?php echo $url;?>register.php" class="text-decoration-none">สมัครสมาชิก</a>เลย.
                        </p>

                    </form>
                </div>

            </div>

            <div class="col-lg-4 col-md-3">

            </div>
        </div>
    </div>
    <?php
        include './packlink2.php';
    ?>
</body>
</html>