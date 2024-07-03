
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
    <link rel="stylesheet" href="<?php echo $url;?>node_modules//bootstrap//dist/css/bootstrap.min.css">
    <script src="<?php echo $url;?>node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="<?php echo $url;?>fontawesome-free-6.5.1-web/css/fontawesome.css">
    <link rel="stylesheet" href="<?php echo $url;?>fontawesome-free-6.5.1-web/css/brands.css">
    <link rel="stylesheet" href="<?php echo $url;?>fontawesome-free-6.5.1-web/css/solid.css">
    <link rel="stylesheet" href="<?php echo $url;?>font.css">
</head>
<body>
    <?php
        include "./Navheader.php"    
    ?>

<div class="container text-center menu">
  <div class="row">
    <div class="col">
      <form action="<?php echo $url."ModeSelection.php";?>" method="post">
      <div class="d-grid gap-2 col-6 mx-auto">
      <button type="submit" class="btn btn-primary btn-lg">Start Game</button>
      </div>
        
      </form>
    </div>
    <div class="col">
    <form action="" method="post">
        <div class="d-grid gap-2 col-6 mx-auto">
        <button type="submit" class="btn btn-secondary btn-lg">View PC</button>
        </div>
    
    </form>
    </div>
  </div>
  
</div>
<script src="<?php echo $url;?>node_modules/@popperjs/core/dist/umd/popper.min.js"></script>
<script src="<?php echo $url;?>node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
</body>
</html>