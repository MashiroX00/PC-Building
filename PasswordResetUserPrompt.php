<?php
session_start();
include './conectdb.php';
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
                    <form action="<?php $url;?>ResetPassword.php  " class="bg-color p-3 rounded-3" method="POST">
                        <div class="">
                            <div class="input-group mb-3">
                                <span class="input-group-text"><i class="fa-solid fa-user"></i></span>
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="floatingInput" placeholder="Username" name="username">
                                    <label for="floatingInput" class="form-label">Username</label>
                                </div>
                            </div>
                        </div>
                        <div class="">
                            <div class="input-group mb-3">
                                <span class="input-group-text"><i class="fa-solid fa-envelope"></i></span>
                                <div class="form-floating">
                                    <input type="email" class="form-control" placeholder="Password" name="email" id="email1">
                                    <label for="email1" class="form-label">Email</label>
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