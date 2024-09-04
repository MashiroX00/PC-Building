<?php
session_start();
include "./conectdb.php";
include ROOT_DIR . "/Components/alert.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About.</title>
    <link rel="stylesheet" href="About.css">
    <?php
    include ROOT_DIR . "/packlink.php";
    ?>
</head>

<body>
    <?php include ROOT_DIR . "/proceed/navdisplay.php"; ?>
    <div class="container mt-5">
        <div class="row row-cols-2">
            <div class="col-sm-6">
                <div class="card bg-transparent border border-0 card-bg-glass rounded-4 h-100" style="width: 30vw;">
                    <div class="text-center mt-4">
                        <img src="./src/assets/rapephat.jpg" alt="" class="img-fluid border border-0 cycle " draggable="false">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title text-center">Full-Stack Developer</h5>
                        <h6 class="card-subtitle mb-2 text-body-secondary text-center">About</h6>
                        <p class="card-text">สวัสดีคับผมชื่อ ระพีพัฒน์ วรรณสำราญ กำลังศึกษาอยู่ในระดับประกาศนียบัตรวิชาชีพ(ปวช.) ชั้นปีที่ 3 ห้อง 2 สาขาวิชาคอมพิวเตอร์ธุรกิจ วิทยาลัยเทคนิคพิจิตร ผมรับหน้าที่ในการทำเว็บทั้งหน้าบ้านและหลังบ้านด้วย PHP,Javascript</p>
                    </div>
                    <ul class="list-group list-group-flush border border-0 ">
                            <li class="list-group-item border-0 bg-transparent">Email: mink69875@gmail.com</li>
                            <li class="list-group-item border-0 bg-transparent">Facebook: <a href="https://www.facebook.com/MxiaCl" class="link-info link-offset-2 link-underline link-underline-opacity-0" target="_blank">Mxia Cl</a></li>
                            <li class="list-group-item border-0 bg-transparent">Github: <a href="https://github.com/MashiroX00" class=" ink-offset-2 link-underline link-underline-opacity-0 link-info" target="_blank">MashiroX00</a></li>
                            <li class="list-group-item border-0 bg-transparent">Tel: 0993673106</li>
                        </ul>
                        <div class="card-body">
                        <a href="https://mail.google.com/mail/u/0/?tab=rm&ogbl#sent?compose=GTvVlcRwRCXBrHqBmJRTDPbbbthvcxlWnhkHQrbtLXKJNgbnMrrgpgkKcjVTcrgshbKTGqLNbDBjr" class="btn btn-light mt-2 ms-1 w-100" target="_blank">Send Email</a>
                        </div>
                </div>
            </div>
            <div class="col-sm-6">
            <div class="card bg-transparent border border-0 card-bg-glass rounded-4 h-100" style="width: 30vw;">
                    <div class="text-center mt-4">
                        <img src="./src/assets/poramed.jpg" alt="" class="img-fluid border border-0 cycle " draggable="false">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title text-center">Graphic Designer/UXUI Designer</h5>
                        <h6 class="card-subtitle mb-2 text-body-secondary text-center">About</h6>
                        <p class="card-text">ผมนายปรเมศวร์ แย้มสุข กำลังศึกษาอยู่ระดับประกาศนียบัตรวิชาชีพ(ปวช.) ชั้นปีที่ 3 ห้อง 2 สาขาวิชาคอมพิวเตอร์ธุรกิจ วิทลัยเทคนิคพิจิตร ตอนนี้ในเว็บไซต์ผมดูแลเกี่ยวกับเรื่องกราฟฟิก,ภาพเคลื่อนไหว และรูปถ่าย ในการจัดทำเว็บไซต์ครั้งนี้</p>
                    </div>
                    <ul class="list-group list-group-flush border border-0 ">
                            <li class="list-group-item border-0 bg-transparent">Email: poramedyamsook@gmail.com</li>
                            <li class="list-group-item border-0 bg-transparent">Facebook: <a href="https://www.facebook.com/poramed.yamsook" class="link-info link-offset-2 link-underline link-underline-opacity-0" target="_blank">Poramed Yamsook </a></li>
                            <li class="list-group-item border-0 bg-transparent">Instagram: <a href="https://www.instagram.com/isagix11/" class=" ink-offset-2 link-underline link-underline-opacity-0 link-info" target="_blank">isagix11</a></li>
                            <li class="list-group-item border-0 bg-transparent">Tel: 0626962512</li>
                        </ul>
                        <div class="card-body">
                        <a href="https://mail.google.com/mail/u/0/#inbox/FMfcgzQVzPCGPPNDpGvnXfbzLxkBWGSB?compose=GTvVlcSHwCqPwZVVZJkhxPTWNgDtzcWCKjMjmNBZkKGsbQKjbPGhvvHPMdBCgkrcLQwmkznSSPfTq" class="btn btn-light mt-2 ms-1 w-100" target="_blank">Send Email</a>
                        </div>
                </div>
            </div>
        </div>
    </div>
    <?php include ROOT_DIR . "/packlink2.php"; ?>
</body>

</html>