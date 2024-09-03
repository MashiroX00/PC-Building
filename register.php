<?php
session_start();
include "./conectdb.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="<?php echo $url; ?>css/login.css">
    <?php 
        include ROOT_DIR . '/packlink.php';
    ?>
</head>

<body>
    <?php
    include "./LoginHeaderbar.php";
    ?>
    <div class="container mt-1">
        <div class="row">
            <div class="col-lg-3 ">
            </div>
            <div class="col-lg-6 ">
                <div class="texthead">
                    <h4 class="text-center">Register</h4>
                    <h4 class="text-center mb-4">สมัครสมาชิก</h4>
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
                    <form action="<?php echo $url;?>proceed/REGGISTER.php" class="bg-color p-3 rounded-3" method="POST">
                        <div class="">
                            <div class="input-group mb-3">
                                <span class="input-group-text"><i class="fa-solid fa-user"></i></span>
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="floatingInput" placeholder="Username" name="username">
                                    <label for="username" class="form-label">Username</label>
                                </div>
                            </div>
                        </div>
                        <div class="">
                            <div class="input-group mb-3">
                                <span class="input-group-text"><i class="fa-solid fa-envelope"></i></span>
                                <div class=" form-floating">
                                    <input type="email" class="form-control" placeholder="Email" name="email">
                                    <label for="email" class="form-label">Email</label>
                                </div>
                            </div>
                        </div>
                        <div class="row g-1">
                        <div class="col-md">
                            <div class="input-group mb-3">
                                <span class="input-group-text"><i class="fa-solid fa-quote-left"></i></i></span>
                                <div class=" form-floating">
                                    <input type="text" class="form-control" placeholder="First Name" name="Fname">
                                    <label for="Fname" class="form-label">First Name</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="input-group mb-3">
                                <span class="input-group-text"><i class="fa-solid fa-quote-left"></i></i></span>
                                <div class=" form-floating">
                                    <input type="text" class="form-control" placeholder="Last Name" name="Lname">
                                    <label for="Lname" class="form-label">Last Name</label>
                                </div>
                            </div>
                        </div>
                        
                        </div>
                        <div class="">
                            <div class="input-group mb-3">
                                <span class="input-group-text"><i class="fa-solid fa-lock"></i></span>
                                <div class="form-floating">
                                    <input type="password" class="form-control" placeholder="Password" name="password">
                                    <label for="floatingPassword" class="form-label">Password</label>
                                </div>
                            </div>
                        </div>
                        <div class="">
                            <div class="input-group mb-3">
                                <span class="input-group-text"><i class="fa-solid fa-lock"></i></span>
                                <div class="form-floating">
                                    <input type="password" class="form-control" placeholder="Confirm Password" name="cfpassword">
                                    <label for="floatingPassword" class="form-label">Confirm Password</label>
                                </div>
                            </div>
                        </div>
                        <div class="">
                            <div class="input-group mb-3">
                                <span class="input-group-text"><i class="fa-solid fa-phone"></i></span>
                                <div class=" form-floating">
                                    <input type="text" class="form-control" placeholder="Tel." name="tel">
                                    <label for="Tel" class="form-label">Tel.</label>
                                </div>
                            </div>
                        </div>
                        <!-- กำหนดระดับการเข้าถึง -->
                        <input type="hidden" name="role" value="user">
                        <!-- ปุ่มไปหน้าอื่นๆ -->
                        <div class="row gx-4">
                            <div class="col-md-6 ">
                                <button type="submit" class="btn btn-primary me-1 rounded-pill"><i class="fa-solid fa-arrow-right"></i> Register</button>
                            </div>
                            <div class="col-md-6 ">
                                <a href="<?php echo $url ?>index.php" role="button" class="btn btn-danger rounded-pill"><i class="fa-solid fa-xmark"></i> Cancal</a>
                            </div>
                        </div>
                        <p class="d-block text text-center mt-3 ">
                            มีบัญชีอยู่แล้วหรอ? <a href="<?php echo $url;?>loginUser.php" class="text-decoration-none">ลงชื่อเข้าใช้</a>เลย.
                        </p>

                    </form>
                </div>

            </div>

            <div class="col-lg-4">

            </div>
        </div>
    </div>

    <script src="<?php echo $url; ?>node_modules/@popperjs/core/dist/umd/popper.min.js"></script>
    <script src="<?php echo $url; ?>node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
</body>

</html> 