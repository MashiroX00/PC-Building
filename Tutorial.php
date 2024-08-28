<?php
session_start();
include './conectdb.php';
include ROOT_DIR . '/Components/alert.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tutorial Mode </title>
    <style>
        body {
            background-color: 1d0c1b !important;
        }
    </style>
    <?php
    include ROOT_DIR . "/packlink.php";
    ?>
</head>

<body>
    <?php
    include ROOT_DIR . "/proceed/navdisplay.php";
    ?>
    <div class="container-fluid">
        <p class="text text-white fs-2">
            Welcome to Tutorial Mode.
        </p>
        <p class="text text-white fs-4">
            &emsp;โหมดนี้จะพาไปรู้จักกับการเล่นโหมดต่างๆภายในเว็บไซต์นี้.
        </p>
        <div class="row">
            <div class="col-4 col-sm-12">
                <div class="Classic">
                    <p class="text text-white fs-3">
                        1.Classic Mode
                    </p>
                    <p class="text text-white fs-4">
                        &emsp; โหมด Classic จะเป็นโหมดที่พาผู้เล่นไปทำความรู้จักกับส่วนประกอบต่างๆในคอมพิวเตอร์และชิ้นส่วนต่างๆ<br>
                        โดยมีวิธีการเล่นคือ
                    <ul class="list-group list-group-numbered list-group-flush " style="width: 25vw;">
                        <li class="list-group-item bg-transparent text-white">ผู้เล่นจะต้องลากไอเทมจากทางด้านซ้ายมาลงกรอบต่างๆ</li>
                        <li class="list-group-item bg-transparent text-white">เมื่อประกอบเสร็จแล้วสามารถกดปุ่ม finish เพื่อเป็นการจบการเล่น</li>
                        <li class="list-group-item bg-transparent text-white">หากผู้เล่นใส่อุปกรณ์ครบ ผู้เล่นจะสามารถกด Save computer ได้</li>
                    </ul>
                    </p>
                    <div class="p-5">
                    <img src="<?php echo $url . "/src/assets/ClassicTotorial.png"?>" class="img-fluid" alt="...">
                    </div>
                </div>

            </div>
            <hr class="border border-danger border-2 opacity-50">

            <div class="col-4 col-sm-12">
            <div class="Timer">
                    <p class="text text-white fs-3">
                        Timer Mode
                    </p>
                    <p class="text text-white fs-4">
                        &emsp; โหมด Timer จะเป็นโหมดที่จำกัดเวลาผู้เล่นและผู้เล่นต้องต้องหาชิ้นส่วนที่หายไปของคอมพิวเตอร์ให้เจอและนำมาใส่กลับคืนโดยมีเวลาจำกัดคือ 120 วินาที ผู้เล่นจะต้องหาชิ้นส่วนที่หายไปให้ได้มากที่สุด<br>
                        โดยมีวิธีการเล่นคือ
                    <ul class="list-group list-group-numbered list-group-flush " style="width: 25vw;">
                        <li class="list-group-item bg-transparent text-white">ผู้เล่นจะต้องหาชิ้นส่วนที่หายไปโดยสังเกตุได้จากกรอบใดไม่มีชื่อเขียนไว้</li>
                        <li class="list-group-item bg-transparent text-white">เมื่อผู้เล่นหาชิ้นส่วนที่หายไปเจอแล้วให้ผู้เล่นลากชิ้นส่วนจากทางด้านซ้ายมาวางให้ตรงกรอบ</li>
                        <li class="list-group-item bg-transparent text-white">หากผู้เล่นมั่นใจแล้ว่าถูกต้องให้ผู้เล่นทำการกดปุ่ม Answer หรือ ส่งคำตอบ เพื่อบันทึกคะแนนและระบบจะสุ่มชิ้นส่วนที่หายไปใหม่</li>
                        <li class="list-group-item bg-transparent text-white">และถ้าเกิดว่าเวลาหมดระบบจะตัดคะแนนให้ทันที หรือ หากผู้เล่นอยากจบเกมเพียงเท่านั้นให้ทำการกดปุ่ม Finish หรือ จบการเล่น</li>
                    </ul>
                    </p>
                    <div class="p-5">
                    <img src="<?php echo $url . "/src/assets/TimerTotorial.png"?>" class="img-fluid" alt="...">
                    </div>
                </div>
            </div>
            <hr class="border border-danger border-2 opacity-50">
        </div>
    </div>
    <?php
    include ROOT_DIR . "/packlink2.php";
    ?>
</body>

</html>