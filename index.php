<?php
session_start();
include "./conectdb.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PC Building Simulator</title>
  <link rel="stylesheet" href="style.css">
  <?php include './packlink.php'?>
</head>

<body>
  <?php
  include "./proceed/navdisplay.php";
  ?>

<div class="container-fluid mt-5">
  <div class="row">
    <div class="col-4 col-sm-4">
      <!-- column1 -->
    </div>
    <div class="col-4 col-sm-4 text-center mt-5">
      <!-- column2 -->
    <a href="<?php echo$url;?>ModeSelection.php" class="btn mt-5 mb-3 imgHover" ><img src="<?php echo$url;?>src/assets/Start.png" style="width: 350px;"></a><br>
    <a href="<?php echo$url;?>ModeSelection.php" class="btn imgHover"><img src="<?php echo$url;?>src/assets/View_PC.png" style="width: 350px;"></a> 
    </div>

    <div class="col-4 col-sm-3 me-1 mt-4">
      <!-- column3 -->
      <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner boxsha rounded-4">
    <div class="carousel-item active ">
      <img src="./src/assets/Game BG2.png" class="d-block w-100 imgslide rounded-4 " alt="...">
      <div class="carousel-caption d-none d-md-block text-black">
        <h5><a href="<?php echo $url?>infomation.php">คอมพิวเตอร์ คืออะไร?</a></h5>
      </div>
    </div>
    <div class="carousel-item">
      <img src="./src/assets/Game Background.png" class="d-block w-100 imgslide rounded-4" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>Second slide label</h5>
        <p>Some representative placeholder content for the second slide.</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="./src/assets/Game BG4.png" class="d-block w-100 imgslide rounded-4" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>Third slide label</h5>
        <p>Some representative placeholder content for the third slide.</p>
      </div>
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
    </div>
  </div>
</div>
  <script src="<?php echo $url; ?>node_modules/@popperjs/core/dist/umd/popper.min.js"></script>
  <script src="<?php echo $url; ?>node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
</body>

</html>