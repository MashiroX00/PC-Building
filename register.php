<?php
include "./conectdb.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="<?php echo $url; ?>node_modules//bootstrap//dist/css/bootstrap.min.css">
    <script src="<?php echo $url; ?>node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="<?php echo $url; ?>fontawesome-free-6.5.1-web/css/fontawesome.css">
    <link rel="stylesheet" href="<?php echo $url; ?>fontawesome-free-6.5.1-web/css/brands.css">
    <link rel="stylesheet" href="<?php echo $url; ?>fontawesome-free-6.5.1-web/css/solid.css">
    <link rel="stylesheet" href="<?php echo $url; ?>font.css">
    <link rel="stylesheet" href="<?php echo $url; ?>css/login.css">
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
                    <h4 class="text-center">Register</h4>
                    <h4 class="text-center mb-4">สมัครสมาชิก</h4>
                    <form action="" class="bg-color p-3 rounded-3">
                        <div class="">
                            <div class="input-group mb-3">
                                <span class="input-group-text"><i class="fa-solid fa-user"></i></span>
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="floatingInput" placeholder="Username">
                                    <label for="username" class="form-label">Username</label>
                                </div>
                            </div>
                        </div>
                        <div class="">
                            <div class="input-group mb-3">
                                <span class="input-group-text"><i class="fa-solid fa-envelope"></i></span>
                                <div class=" form-floating">
                                    <input type="email" class="form-control" placeholder="Email">
                                    <label for="email" class="form-label">Email</label>
                                </div>
                            </div>
                        </div>
                        <div class="">
                            <div class="input-group mb-3">
                                <span class="input-group-text"><i class="fa-solid fa-lock"></i></span>
                                <div class="form-floating">
                                    <input type="password" class="form-control" placeholder="Password">
                                    <label for="floatingPassword" class="form-label">Password</label>
                                </div>
                            </div>
                        </div>
                        <div class="">
                            <div class="input-group mb-3">
                                <span class="input-group-text"><i class="fa-solid fa-lock"></i></span>
                                <div class="form-floating">
                                    <input type="cfpassword" class="form-control" placeholder="Confirm Password">
                                    <label for="floatingPassword" class="form-label">Confirm Password</label>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row gx-4">
                            <div class="col-md-6 ">
                                <button type="submit" class="btn btn-primary me-1 rounded-pill"><i class="fa-solid fa-arrow-right"></i> Register</button>
                            </div>
                            <div class="col-md-6 ">
                                <a href="<?php echo $url ?>index.php" role="button" class="btn btn-danger rounded-pill"><i class="fa-solid fa-xmark"></i> Cancal</a>
                            </div>
                        </div>
                        <p class="d-block text text-center mt-5 ">
                            มีบัญชีอยู่แล้วหรอ? <a href="<?php echo $url;?>register.php" class="text-decoration-none">ลงชื่อเข้าใช้</a>เลย.
                        </p>

                    </form>
                </div>

            </div>

            <div class="col-lg-4 col-md-3">

            </div>
        </div>
    </div>

    <script src="<?php echo $url; ?>node_modules/@popperjs/core/dist/umd/popper.min.js"></script>
    <script src="<?php echo $url; ?>node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
</body>

</html> 