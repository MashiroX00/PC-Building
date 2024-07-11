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
    <link rel="stylesheet" href="<?php echo $url;?>node_modules//bootstrap//dist/css/bootstrap.min.css">
    <script src="<?php echo $url;?>node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="<?php echo $url;?>fontawesome-free-6.5.1-web/css/fontawesome.css">
    <link rel="stylesheet" href="<?php echo $url;?>fontawesome-free-6.5.1-web/css/brands.css">
    <link rel="stylesheet" href="<?php echo $url;?>fontawesome-free-6.5.1-web/css/solid.css">
    <link rel="stylesheet" href="<?php echo $url;?>font.css">
    

</head>
<body>
    <?php
        include "./proceed/navdisplay.php";
    ?>
    <p class="fs-3 text text-center" style="margin-bottom: -13rem;">Choose Gamemode</p>
    <div class="container d-flex justify-content-center align-items-center min-vh-100" style="margin-top: -100px;">
    <div class="row row-cols-1 row-cols-md-3 g-4">
  <div class="col">
    <div class="card border-0">
      <img src="<?php echo $url;?>src/assets/Game BG4.png" class="card-img-top bg-img" alt="background" width="416px" height="234px">
      <div class="card-img-overlay d-flex justify-content-center align-items-center" style="margin-top: -100px;">
        <a href=""><img src="<?php echo $url;?>src/icon/play-solid.svg" alt="play" width="50px" height="66px"></a>
      </div>
      <div class="card-body">
        <h5 class="card-title text-center">Play Classic Mode</h5>
        <p class="card-text text-center">โหมดธรรมดา สามารถประกอบคอมพิวเตอร์ได้ตามต้องการโดยไม่จำกัดเวลา</p>
      </div>
    </div>
    <a href="" class="d-flex justify-content-center align-items-center"><img src="<?php echo $url;?>src/icon/circle-question-regular.svg" alt="" width="23px" height="23px" data-bs-toggle="tooltip" data-bs-placement="top" title="help"></a>
  </div>
  <div class="col">
    <div class="card border-0">
      <img src="<?php echo $url;?>src/assets/Game BG2.png" class="card-img-top bg-img" alt="background" width="416px" height="234px">
      <div class="card-img-overlay d-flex justify-content-center align-items-center" style="margin-top: -100px;">
        <a href=""><img src="<?php echo $url;?>src/icon/hourglass-end-solid.svg" alt="play" width="50px" height="66px"></a>
      </div>
      <div class="card-body">
        <h5 class="card-title text-center">Play Timer Mode</h5>
        <p class="card-text text-center">โหมดจับเวลา เป็นโหมดที่จะจับเวลาผู้เล่นและผู้เล่นจะต้องหาชิ้นส่วนที่หายไปของคอมพิวเตอร์ภายใน 2 นาที</p>
      </div>
    </div>
    <a href="" class="d-flex justify-content-center align-items-center"><img src="<?php echo $url;?>src/icon/circle-question-regular.svg" alt="" width="23px" height="23px" data-bs-toggle="tooltip" data-bs-placement="top" title="help"></a>
  </div>
  <div class="col">
    <div class="card border-0">
      <img src="<?php echo $url;?>src/assets/Game BG3.png" class="card-img-top" alt="background" width="416px" height="234px">
      <div class="card-img-overlay d-flex justify-content-center align-items-center" style="margin-top: -100px;">
        <a href=""><img src="<?php echo $url;?>src/icon/desktop-solid.svg" alt="play" width="76px" height="69px"></a>
      </div>
      <div class="card-body">
        <h5 class="card-title text-center">Play Tutorial Mode</h5>
        <p class="card-text text-center">โหมดสอนเล่น โหมดที่จะพาผู้เล่นไปทำความรู้จักส่วนต่าง ๆ ของเกม</p>
      </div>
      
    </div>
    <a href="" class="d-flex justify-content-center align-items-center"><img src="<?php echo $url;?>src/icon/circle-question-regular.svg" alt="" width="23px" height="23px" data-bs-toggle="tooltip" data-bs-placement="top" title="help"></a>
  </div>
</div>
    </div>
    <div class="container d-flex justify-content-center align-items-center">
      <div class="d-grid gap-2 col-4 mx-auto" style="margin-top: -25rem;">
      <a href="<?php echo $url;?> "index.php"" class="btn btn-outline-secondary">Return to main menu</a>
      </div>
        
    </div>
    

<script src="<?php echo $url;?>node_modules/@popperjs/core/dist/umd/popper.min.js"></script>
<script src="<?php echo $url;?>node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
</body>
</html>