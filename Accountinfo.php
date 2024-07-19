<?php
session_start();
include './conectdb.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Infomation</title>
    <?php
        include './packlink.php';
    ?>
    <style>
        body {
            background-color: #1d0c1b !important;
        }
    </style>
</head>
<body>
<?php
        include './proceed/navdisplay.php';
    ?>
    <div class="container mt-3">
  <div class="row ">

    <div class="col-lg-4 col-md-12">
        <h4 class="text-white">Account Infomation</h4>
    </div>

    <div class="col-lg-4 col-md-6">
        <form action="" method="post">
            
        </form>
    </div>

    <div class="col-lg-4 col-md-6">

    </div>

  </div>
</div>
<?php
        include './packlink2.php';
    ?>
</body>
</html>