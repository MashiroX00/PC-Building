<?php
session_start();
    include './conectdb.php'
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mode Selection</title>
    <link rel="stylesheet" href="<?php echo $url;?>mode.css">
    <?php include './packlink.php'?>
    <style>
      .navbar {
    box-shadow: rgba(255, 255, 255, 0.35) 0px 5px 15px;
}
    </style>
</head>
<body>
    <?php
        include "./proceed/navdisplay.php";
    ?>
    <div class="container mt-5 position-relative">
    <div class="row row-cols-md-3 g-4 position-absolute" style="top: 10em;">
  <div class="col">
    <div class="card border-0 h-100">
      <img src="<?php echo $url;?>src/assets/Game BG4.png" class="card-img-top bg-img" alt="background" width="416px" height="234px">
      <div class="card-img-overlay d-flex justify-content-center align-items-center" style="margin-top: -100px;">
        <a href="<?php echo $url?>ClassicMode.php"><img src="<?php echo $url;?>src/icon/play-solid.svg" alt="play" width="50px" height="66px"></a>
      </div>
      <div class="card-body">
        <h5 class="card-title text-center">Play Classic Mode</h5>
        <p class="card-text text-center">โหมดธรรมดา สามารถประกอบคอมพิวเตอร์ได้ตามต้องการโดยไม่จำกัดเวลา</p>
      </div>
    </div>  
    
  </div>
  <div class="col">
    <div class="card border-0 h-100">
      <img src="<?php echo $url;?>src/assets/Game BG2.png" class="card-img-top bg-img" alt="background" width="416px" height="234px">
      <div class="card-img-overlay d-flex justify-content-center align-items-center" style="margin-top: -100px;">
        <a href="<?php echo $url . "TimerMode.php"?>"><img src="<?php echo $url;?>src/icon/hourglass-end-solid.svg" alt="play" width="50px" height="66px"></a>
      </div>
      <div class="card-body">
        <h5 class="card-title text-center">Play Timer Mode</h5>
        <p class="card-text text-center">โหมดจับเวลา เป็นโหมดที่จะจับเวลาผู้เล่นและผู้เล่นจะต้องหาชิ้นส่วนที่หายไปของคอมพิวเตอร์ภายใน 2 นาที</p>
      </div>
    </div>
    
  </div>
  <div class="col">
    <div class="card border-0 h-100">
      <img src="<?php echo $url;?>src/assets/Game BG3.png" class="card-img-top bg-img" alt="background" width="416px" height="234px">
      <div class="card-img-overlay d-flex justify-content-center align-items-center" style="margin-top: -100px;">
        <a href="<?php echo $url . "Tutorial.php";?>"><img src="<?php echo $url;?>src/icon/desktop-solid.svg" alt="play" width="76px" height="69px"></a>
      </div>
      <div class="card-body">
        <h5 class="card-title text-center">Play Tutorial Mode</h5>
        <p class="card-text text-center">โหมดสอนเล่น โหมดที่จะพาผู้เล่นไปทำความรู้จักส่วนต่าง ๆ ของเกม</p>
      </div>
      
    </div>
    
  </div>
</div>
<div class="position-absolute ab">
      <div class="d-grid gap-2 col-4 mx-auto mt-4">
      <a href="<?php echo $url;?> "index.php"" class="btn btnhover"><img src="./src//assets/return button.png" alt="" srcset=""></a>
      </div>
        
    </div>
    </div>
    
    

<script src="<?php echo $url;?>node_modules/@popperjs/core/dist/umd/popper.min.js"></script>
<script src="<?php echo $url;?>node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
</body>
</html>