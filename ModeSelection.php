<?php
    include './conectdb.php'
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mode Selection</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="Modestyle.css">
</head>
<body>
    <?php
        include './Navheader.php';
    ?>
    <p class="fs-3 text text-center" style="margin-bottom: -13rem;">Choose Gamemode</p>
    <div class="container d-flex justify-content-center align-items-center min-vh-100" style="margin-top: -100px;">
    <div class="row row-cols-1 row-cols-md-3 g-4">
  <div class="col">
    <div class="card">
      <img src="./src/assets/พื้นหลัง2.png" class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title text-center">Play Classic Mode</h5>
        <p class="card-text text-center">โหมดธรรมดา สามารถประกอบคอมพิวเตอร์ได้ตามต้องการโดยไม่จำกัดเวลา</p>
      </div>
    </div>
  </div>
  <div class="col">
    <div class="card">
      <img src="./src/assets/พื้นหลัง2.png" class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title text-center">Play Timer Mode</h5>
        <p class="card-text text-center">โหมดจับเวลา เป็นโหมดที่จะจับเวลาผู้เล่นและผู้เล่นจะต้องหาชิ้นส่วนที่หายไปของคอมพิวเตอร์ภายใน 2 นาที</p>
      </div>
    </div>
  </div>
  <div class="col">
    <div class="card">
      <img src="./src/assets/พื้นหลัง2.png" class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title text-center">Play Tutorial Mode</h5>
        <p class="card-text text-center">โหมดสอนเล่น โหมดที่จะพาผู้เล่นไปทำความรู้จักส่วนต่าง ๆ ของเกม</p>
      </div>
    </div>
  </div>
</div>
    </div>
    <div class="container d-flex justify-content-center align-items-center">
      <div class="d-grid gap-2 col-4 mx-auto" style="margin-top: -25rem;">
      <a href="<?php echo $url."index.php";?>" class="btn btn-outline-secondary">Return to main menu</a>
      </div>
        
    </div>
    
    
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>
</html>