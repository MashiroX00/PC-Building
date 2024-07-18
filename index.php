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
    <div class="col-lg-4 col-md-12">

    </div>

    <div class="col-lg-4 col-md-6 text-center mt-5">
    <a href="<?php echo$url;?>ModeSelection.php" class="btn mt-5 mb-3 imgHover" ><img src="<?php echo$url;?>src/assets/Start.png" style="width: 350px;"></a><br>
    <a href="<?php echo$url;?>ModeSelection.php" class="btn imgHover"><img src="<?php echo$url;?>src/assets/View_PC.png" style="width: 350px;"></a> 
    </div>

    <div class="col-lg-4 col-md-6">
      
    </div>
  </div>
</div>
  <div class="container mt-5">
    <div class="row">
      <div class="col-4 col-sm-3"></div>
      <div class="col-4 col-sm-6">
        <div class="card mb-3 rounded-3">
          <div class="row g-0">
            <div class="col-md-4">
              <img src="..." class="img-fluid rounded-start" alt="...">
            </div>
            <div class="col-md-8">
              <div class="card-body">
                <h5 class="card-title">คอมพิวเตอร์ คืออะไร?</h5>
                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                <a href="<?php echo $url; ?>infomation.php" class="btn btn-primary text-end mb-2">อ่านเพิ่มเติม</a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-4 col-sm-6"></div>
    </div>
  </div>
  <script src="<?php echo $url; ?>node_modules/@popperjs/core/dist/umd/popper.min.js"></script>
  <script src="<?php echo $url; ?>node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
</body>

</html>