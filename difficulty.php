<?php
    session_start();
    require 'conectdb.php';
    require ROOT_DIR . '/Components/alert.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Difficulty</title>
    <style>
        body {
            background-image: url(./src/assets/View\ PC\ Bg.png);
            background-repeat: no-repeat;
            background-size: cover;
            backdrop-filter: blur(15px);
        }
        .hov a{
            transition: ease-in-out 0.5s;
        }
        .hov a:hover {
            scale: 1.1;
            transition: ease-in-out 0.5s;
        }
    </style>
    <?php 
        require ROOT_DIR . '/packlink.php';
    ?>
</head>
<body>
<?php 
        require ROOT_DIR . '/proceed/navdisplay.php';
    ?>
    <div class="container">
    <div class="row">
        <div class="col-12 text-center mt-5 mb-5"><p class="text fs-3 text-light">Choose difficulty.<br>เลือกความยาก</p></div>
        <div class="col-12 text-center justify-content-center align-content-center mt-5 hov">
            <a href="<?php echo $url."TimerMode.php"?>" class="btn btn-light w-50 h-75 text-center align-content-center ">Basic</a>
            <a href="<?php echo $url."AdvanceMode.php"?>" class="btn btn-danger w-50 h-75 text-center align-content-center mt-3">Advance</a>
        </div>
        <div class="col-2"></div>
    </div>
    </div>
<?php 
        require ROOT_DIR . '/packlink2.php';
    ?>
</body>
</html>