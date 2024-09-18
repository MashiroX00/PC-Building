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
        .Basic {
            background-image: url(./src/assets/basic.png);
            background-size: contain;
            background-repeat: no-repeat;
            background-position: center;
        }
        .Adv {
            background-image: url(./src/assets/advance.png);
            background-size: contain;
            background-repeat: no-repeat;
            background-position: center;
        }
        .Back {
            background-image: url(./src/assets/back.png);
            background-size: contain;
            background-repeat: no-repeat;
            background-position: center;
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
        <div class="col-12 text-center mt-5 mb-5"><p class="text fs-2 text-light">Choose difficulty.<br>เลือกความยาก</p></div>
        <div class="col-12 text-center justify-content-center align-content-center hov">
            <a href="<?php echo $url."TimerMode.php"?>" class="btn w-50 h-100 text-center align-content-center Basic">&nbsp;</a>
            <a href="<?php echo $url."AdvanceMode.php"?>" class="btn w-50 h-100 text-center align-content-center mt-3 Adv">&nbsp;</a>
            <a href="<?php echo $url."ModeSelection.php"?>" class="btn w-50 h-100 text-center align-content-center mt-3 Back">&nbsp;</a>
        </div>
    </div>
    </div>
<?php 
        require ROOT_DIR . '/packlink2.php';
    ?>
</body>
</html>