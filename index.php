<?php
include "./conectdb.php"
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PC Building Simulator</title>
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="<?php echo $url; ?>node_modules//bootstrap//dist/css/bootstrap.min.css">
  <script src="<?php echo $url; ?>node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="<?php echo $url; ?>fontawesome-free-6.5.1-web/css/fontawesome.css">
  <link rel="stylesheet" href="<?php echo $url; ?>fontawesome-free-6.5.1-web/css/brands.css">
  <link rel="stylesheet" href="<?php echo $url; ?>fontawesome-free-6.5.1-web/css/solid.css">
  <link rel="stylesheet" href="<?php echo $url; ?>font.css">
</head>

<body>
  <?php
  include "./Navheader.php"
  ?>

  <div class="container text-center menu">
    <div class="row">
      <div class="col">
        <div class="d-grid gap-2 col-6 mx-auto">
          <a href="<?php $url; ?>ModeSelection.php" class="btn btn-primary btn-lg">Start Game</a>
        </div>
      </div>
      <div class="col">
        <div class="d-grid gap-2 col-6 mx-auto">
          <a href="<?php $url ?>" class="btn btn-secondary btn-lg">View PC</a>
        </div>
      </div>
    </div>
  </div>
  <div class="container moreinfo">
  <div class="row">

    <div class="col-12">
    <div class="card mb-3 rounded-3" style="width: 80em; height: 300px;">
  <div class="row g-0">
    <div class="col-md-4">
      <img src="..." class="img-fluid rounded-start" alt="...">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title">คอมพิวเตอร์ คืออะไร?</h5>
        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
        <a href="<?php echo $url;?>infomation.php" class="btn btn-primary text-end">อ่านเพิ่มเติม</a>
      </div>
    </div>
  </div>
</div>
    </div>

  </div>
</div>
  <script src="<?php echo $url; ?>node_modules/@popperjs/core/dist/umd/popper.min.js"></script>
  <script src="<?php echo $url; ?>node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
</body>

</html>